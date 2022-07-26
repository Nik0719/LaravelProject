<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    public function index()
    {
        // Fetch HomeBanner
        $result['home_banner']=DB::table('home_banners')
                ->where(['status'=>1])
                ->get();

        // Fetch Categories
        $result['homeCategories']=DB::table('categories')
        ->where(['status'=>1])
        ->where(['is_home'=>1])
        ->get();

           foreach($result['homeCategories'] as $list)
        {
            $result['homeCategories_product_featured'][$list->id]=DB::table('products')
            ->where(['is_featured'=>1])
            ->where(['status'=>1])
            ->get();

            foreach($result['homeCategories_product_featured'][$list->id] as $list1)
            {
                $result['homeProduct_attr'][$list1->id]=DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            }

        }

        foreach($result['homeCategories'] as $list)
        {
            $result['homeCategories_product_promo'][$list->id]=DB::table('products')
            ->where(['is_promo'=>1])
            ->where(['status'=>1])
            ->get();

            foreach($result['homeCategories_product_promo'][$list->id] as $list1)
            {
                $result['homeProduct_attr'][$list1->id]=DB::table('products_attr')
                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                ->where(['products_attr.products_id'=>$list1->id])
                ->get();
            }

        }

        return view('index',$result);
    }

    public function product_detail(Request $request, $slug="")
    {
        $result['product']=DB::table('products')
            ->where(['is_featured'=>1])
            ->where(['product_slug'=>$slug])
            ->get();

            if(!empty($result['product'])){
                $result['category']=DB::table('categories')
                    ->where(['status'=>1])
                    ->where(['id'=>$result['product'][0]->category_id])
                    ->get();

                    foreach($result['product'] as $list)
                    {
                        $result['product_attr']=DB::table('products_attr')
                            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                            ->where(['products_attr.products_id'=>$list->id])
                            ->get();
                    }
            }
            else{
                return view('404');
            }
                // prx($result);
            return view('product', $result);
        }
    }
