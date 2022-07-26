<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        //
        $result['data']=Product::all();
        return view('admin.product', $result);
    }

    public function manage_product(Request $request, $id='')
    {
        //
        if($id>0){
            $arr=Product::where(['id'=>$id])->get();
            $result['category_id']=$arr['0']->category_id;
            $result['product_name']=$arr['0']->product_name;
            $result['product_slug']=$arr['0']->product_slug;
            $result['product_image']=$arr['0']->product_image;
            $result['model']=$arr['0']->model;
            $result['short_desc']=$arr['0']->short_desc;
            $result['desc']=$arr['0']->desc;
            $result['keywords']=$arr['0']->keywords;
            $result['technical_specification']=$arr['0']->technical_specification;
            $result['warranty']=$arr['0']->warranty;
            $result['lead_time']=$arr['0']->lead_time;
            $result['tax_id']=$arr['0']->tax_id;
            $result['is_promo']=$arr['0']->is_promo;
            $result['is_featured']=$arr['0']->is_featured;
            $result['is_discounted']=$arr['0']->is_discounted;
            $result['is_trending']=$arr['0']->is_trending;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;

            $result['productAttrArr']=DB::table('products_attr')->where(['products_id'=>$id])->get();

            $productImagesArr=DB::table('product_images')->where(['products_id'=>$id])->get();

            if(!isset($productImagesArr[0])){
                $result['productImagesArr']['0']['id']='';
                $result['productImagesArr']['0']['images']='';
            }else{
                $result['productImagesArr']=$productImagesArr;
            }
        }
        else{
            $result['category_id']='';
            $result['product_name']='';
            $result['product_slug']='';
            $result['product_image']='';
            $result['status']='';
            $result['model']='';
            $result['short_desc']='';
            $result['desc']='';
            $result['keywords']='';
            $result['technical_specification']='';
            $result['warranty']='';
            $result['lead_time']='';
            $result['tax_id']='';
            $result['is_promo']='';
            $result['is_featured']='';
            $result['is_discounted']='';
            $result['is_trending']='';
            $result['id']='';

            $result['productAttrArr'][0]['id']='';
            $result['productAttrArr'][0]['products_id']='';
            $result['productAttrArr'][0]['sku']='';
            $result['productAttrArr'][0]['attr_image']='';
            $result['productAttrArr'][0]['mrp']='';
            $result['productAttrArr'][0]['price']='';
            $result['productAttrArr'][0]['qty']='';
            $result['productAttrArr'][0]['size_id']='';
            $result['productAttrArr'][0]['color_id']='';

            $result['productImagesArr']['0']['id']='';
            $result['productImagesArr']['0']['images']='';
        }

        $result['category']=DB::table('categories')->where(['status'=>1])->get();

        $result['sizes']=DB::table('sizes')->where(['status'=>1])->get();

        $result['taxes']=DB::table('taxes')->where(['status'=>1])->get();

        return view('admin.manage_product', $result);
    }

    public function manage_product_process(Request $request)
    {
        //
        if($request->post('id')<0)
        {
            $image_validation="required|mimes:png,jpg,jpeg";
        }
        else{
            $image_validation="";
        }
        $request->validate([
            'product_name'=>'required',
            'product_image'=>$image_validation,
            'product_slug'=>'required|unique:products,product_slug,'.$request->post('id'),
            'attr_image.*' =>'mimes:jpg,jpeg,png,webp',
            'images.*' =>'mimes:jpg,jpeg,png'

        ]);
        $paidArr=$request->post('paid');
        $skuArr=$request->post('sku');
        $mrpArr=$request->post('mrp');
        $priceArr=$request->post('price');
        $qtyArr=$request->post('qty');
        $size_idArr=$request->post('size_id');
        foreach($skuArr as $key=>$val){
            $check=DB::table('products_attr')->
            where('sku','=',$skuArr[$key])->
            where('id','!=',$paidArr[$key])->
            get();

            if(isset($check[0])){
                $request->session()->flash('sku_error',$skuArr[$key].' SKU already used');
                return redirect(request()->headers->get('referer'));
            }
        }

        if($request->post('id')>0)
        {
            $model=Product::find($request->post('id'));
            $msg="Product Updated";
        }
        else
        {
            $model=new Product();
            $msg="Product Inserted";
        }

        if($request->hasFile('product_image')){
            if($request->post('id')>0){
                $arrImage=DB::table('products')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/products/'.$arrImage[0]->product_image)){
                    Storage::delete('/public/media/products/'.$arrImage[0]->product_image);
                }
            }

            $image=$request->file('product_image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/products/',$image_name);
            $model->product_image=$image_name;
        }

        $model->product_name=$request->post('product_name');
        $model->product_slug=$request->post('product_slug');
        $model->category_id=$request->post('category_id');
        $model->model=$request->post('model');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');
        $model->technical_specification=$request->post('technical_specification');
        $model->warranty=$request->post('warranty');
        $model->lead_time=$request->post('lead_time');
        $model->tax_id=$request->post('tax_id');
        $model->is_promo=$request->post('is_promo');
        $model->is_featured=$request->post('is_featured');
        $model->is_discounted=$request->post('is_discounted');
        $model->is_trending=$request->post('is_trending');
        $model->status=1;
        $model->save();
        $pid=$model->id;
                /*Product Attr Start*/
                foreach($skuArr as $key=>$val){
                    $productAttrArr['products_id']=$pid;
                    $productAttrArr['sku']=$skuArr[$key];
                    $productAttrArr['mrp']=$mrpArr[$key];
                    $productAttrArr['price']=$priceArr[$key];
                    $productAttrArr['qty']=$qtyArr[$key];
                    if($size_idArr[$key]==''){
                        $productAttrArr['size_id']=0;
                    }else{
                        $productAttrArr['size_id']=$size_idArr[$key];
                    }

                    if($request->hasFile("attr_image.$key")){

                        if($paidArr[$key]!=''){
                            $arrImage=DB::table('products_attr')->where(['id'=>$paidArr[$key]])->get();
                            if(Storage::exists('/public/media/'.$arrImage[0]->attr_image)){
                                Storage::delete('/public/media/'.$arrImage[0]->attr_image);
                            }
                        }

                        $rand=rand('111111111','999999999');
                        $attr_image=$request->file("attr_image.$key");
                        $ext=$attr_image->extension();
                        $image_name=$rand.'.'.$ext;
                        $request->file("attr_image.$key")->storeAs('/public/media/products',$image_name);
                        $productAttrArr['attr_image']=$image_name;
                    }

                    if($paidArr[$key]!=''){
                        DB::table('products_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
                    }else{
                        DB::table('products_attr')->insert($productAttrArr);
                    }

                }
                /*Product Attr End*/

        /*Product Images Start*/
        $piidArr=$request->post('piid');
        foreach($piidArr as $key=>$val){
            $productImageArr['products_id']=$pid;
            if($request->hasFile("images.$key")){

                if($piidArr[$key]!=''){
                    $arrImage=DB::table('product_images')->where(['id'=>$piidArr[$key]])->get();
                    if(Storage::exists('/public/media/'.$arrImage[0]->images)){
                        Storage::delete('/public/media/'.$arrImage[0]->images);
                    }
                }

                $rand=rand('111111111','999999999');
                $images=$request->file("images.$key");
                $ext=$images->extension();
                $image_name=$rand.'.'.$ext;
                $request->file("images.$key")->storeAs('/public/media/products',$image_name);
                $productImageArr['images']=$image_name;
            }

            if($piidArr[$key]!=''){
                DB::table('product_images')->where(['id'=>$piidArr[$key]])->update($productImageArr);
            }else{
                DB::table('product_images')->insert($productImageArr);
            }
        }
        /*Product Images End*/
        $request->session()->flash('message', $msg);
        return redirect('admin/product');

    }

    public function delete(Request $request, $id)
    {
        //
        $model=Product::find($id);
        $model->delete();
        $request->session()->flash('message', 'Product {{$id}} Deleted');
        return redirect('admin/product');
    }

    public function product_attr_delete(Request $request,$paid,$pid){
        $arrImage=DB::table('products_attr')->where(['id'=>$paid])->get();
        if(Storage::exists('/public/media/'.$arrImage[0]->attr_image)){
            Storage::delete('/public/media/'.$arrImage[0]->attr_image);
        }
        DB::table('products_attr')->where(['id'=>$paid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function product_images_delete(Request $request,$paid,$pid){
        $arrImage=DB::table('product_images')->where(['id'=>$paid])->get();
        if(Storage::exists('/public/media/'.$arrImage[0]->images)){
            Storage::delete('/public/media/'.$arrImage[0]->images);
        }
        DB::table('product_images')->where(['id'=>$paid])->delete();
        return redirect('admin/product/manage_product/'.$pid);
    }

    public function status(Request $request, $status, $id)
    {
        //
        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Product Status Updated');
        return redirect('admin/product');
    }
}
