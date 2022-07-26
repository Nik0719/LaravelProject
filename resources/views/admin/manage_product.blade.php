@extends('admin/layout');
@section('product_select','active')
@section('content')
@if($id>0)
@php
$image_required="";
@endphp
@else
@php
$image_required="required";
@endphp
@endif
<h1 class="mb10">Manage Product</h1>
@if(session()->has('sku_error'))
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   {{session('sku_error')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@endif
@error('attr_image.*')
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   {{$message}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@enderror
@error('images.*')
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   {{$message}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@enderror
  <!-- MAIN PRODUCT PAGE CONTENT-->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<div class="main-content">
<div class="section__content section__content--p30">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 offset-md-1">
            <a href="{{url('admin/product')}}">
            <button type="button" class="btn btn-danger mb-15">
            <i class="fa fa-arrow-left"></i>&nbsp; Back</button>
            </a>
            <div class="overview-wrap">
               <h2 class="title-1">Add New Product</h2>
            </div>
         </div>
      </div>
      <form action="{{route('product.manage_product_process')}}" method="post" enctype="multipart/form-data">
      <div class="row m-t-30">
         <div class="col-lg-9 offset-md-1">
            <div class="card">
               <div class="card-body">
                  @csrf
                  <div class="form-group">
                     <label for="product_name" class="control-label mb-1">Product Name</label>
                     <input id="product_name" name="product_name" value="{{$product_name}}" type="text" class="form-control" aria-invalid="false" required>
                     @error('product_name')
                     <div class="alert alert-danger">
                        {{$message}}
                     </div>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label for="product_slug" class="control-label mb-1">Product Slug</label>
                     <input id="product_slug" name="product_slug" value="{{$product_slug}}" type="text" class="form-control" aria-invalid="false" required>
                     @error('product_slug')
                     <div class="alert alert-danger">
                        {{$message}}
                     </div>
                     @enderror
                  </div>
                  <div class="form-group">
                     <label for="product_image" class="control-label mb-1">Product Image</label>
                     <input id="product_image" name="product_image" type="file" class="form-control" aria-invalid="false" {{$image_required}}>
                     @if ($product_image!='')
                     <img width="100px" src="{{asset('storage/media/products/'.$product_image)}}"
                     alt="{{$product_name}}">
                    @endif
                  </div>
                  <div class="form-group">
                     <label for="category_id" class="control-label mb-1">Category</label>
                     <select name="category_id" id="category_id" class="form-control" aria-invalid="false" required>
                        <option value=""><b>Select Categories</b></option>
                        @foreach ($category as $list)
                        @if($category_id == $list->id)
                        <option selected value="{{$list->id}}">
                           @else
                        <option value="{{$list->id}}">
                           @endif
                           {{$list->category_name}}
                        </option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="model" class="control-label mb-1">Model</label>
                     <input id="model" name="model" value="{{$model}}" type="text" class="form-control" aria-invalid="false" required>
                  </div>
                  <div class="form-group">
                     <label for="short_desc" class="control-label mb-1">Short Description</label>
                     <textarea id="short_desc" name="short_desc" class="form-control" aria-invalid="false" required>{{$short_desc}}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="desc" class="control-label mb-1">Description</label>
                     <textarea id="desc" name="desc" class="form-control" aria-invalid="false" required>{{$desc}}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="keywords" class="control-label mb-1">Keywords</label>
                     <textarea id="keywords" name="keywords" class="form-control" aria-invalid="false" required>{{$keywords}}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                     <textarea id="technical_specification" name="technical_specification" class="form-control" aria-invalid="false" required>{{$technical_specification}}</textarea>
                  </div>
                  <div class="form-group">
                     <label for="warranty" class="control-label mb-1">Warranty</label>
                     <textarea id="warranty" name="warranty" class="form-control" aria-invalid="false" required>{{$warranty}}</textarea>
                  </div>
                  <div class="form-group">
                    <div class="row">
                       <div class="col-md-7">
                          <label for="model" class="control-label mb-1"> Lead Time</label>
                          <input id="lead_time" value="{{$lead_time}}" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false">
                       </div>
                       <div class="col-md-5">
                          <label for="model" class="control-label mb-1"> Tax</label>
                          <select id="tax_id" name="tax_id" class="form-control" required>
                             <option value="">Select Tax</option>
                             @foreach($taxes as $list)
                             @if($tax_id==$list->id)
                             <option selected value="{{$list->id}}">
                                @else
                             <option value="{{$list->id}}">
                                @endif
                                {{$list->tax_desc}}
                             </option>
                             @endforeach
                          </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <div class="row">
                       <div class="col-md-3">
                          <label for="model" class="control-label mb-1"> Is Promo	</label>
                          <select id="is_promo" name="is_promo" class="form-control" required>
                             @if($is_promo=='1')
                             <option value="1" selected>Yes</option>
                             <option value="0">No</option>
                             @else
                             <option value="1">Yes</option>
                             <option value="0" selected>No</option>
                             @endif
                          </select>
                       </div>
                       <div class="col-md-3">
                          <label for="model" class="control-label mb-1"> Is Featured	</label>
                          <select id="is_featured" name="is_featured" class="form-control" required>
                             @if($is_featured=='1')
                             <option value="1" selected>Yes</option>
                             <option value="0">No</option>
                             @else
                             <option value="1">Yes</option>
                             <option value="0" selected>No</option>
                             @endif
                          </select>
                       </div>
                       <div class="col-md-3">
                          <label for="model" class="control-label mb-1"> Is Trending	</label>
                          <select id="is_trending" name="is_trending" class="form-control" required>
                             @if($is_trending=='1')
                             <option value="1" selected>Yes</option>
                             <option value="0">No</option>
                             @else
                             <option value="1">Yes</option>
                             <option value="0" selected>No</option>
                             @endif
                          </select>
                       </div>
                       <div class="col-md-3">
                          <label for="model" class="control-label mb-1"> Is Discounted	</label>
                          <select id="is_discounted" name="is_discounted" class="form-control" required>
                             @if($is_discounted=='1')
                             <option value="1" selected>Yes</option>
                             <option value="0">No</option>
                             @else
                             <option value="1">Yes</option>
                             <option value="0" selected>No</option>
                             @endif
                          </select>
                       </div>
                    </div>
                 </div>
               </div>
            </div>
         </div>
         <div class="col-lg-9 offset-md-1">
            <div class="overview-wrap">
                <h2 class="title-1">Product Images</h2>
            </div>
            <div class="card m-t-30">
               <div class="card-body">
                  <div class="form-group">
                     <div class="row" id="product_images_box">
                        @php
                        $loop_count_num=1;
                        @endphp
                        @foreach($productImagesArr as $key=>$val)
                        @php
                        $loop_count_prev=$loop_count_num;
                        $pIArr=(array)$val;
                        @endphp
                        <input id="piid" type="hidden" name="piid[]" value="{{$pIArr['id']}}">
                        <div class="col-md-4 product_images_{{$loop_count_num++}}"  >
                           <label for="images" class="control-label mb-1"> Image</label>
                           <input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                           @if($pIArr['images']!='')
                           <a href="{{asset('storage/media/products/'.$pIArr['images'])}}" target="_blank"><img width="100px" src="{{asset('storage/media/products/'.$pIArr['images'])}}"/></a>
                           @endif
                        </div>
                        <div class="col-md-2">
                           <label for="images" class="control-label mb-1">
                           &nbsp;&nbsp;&nbsp;</label>
                           @if($loop_count_num==2)
                           <button type="button" class="btn btn-success " onclick="add_image_more()">
                           <i class="fa fa-plus"></i>&nbsp; Add</button>
                           @else
                           <a href="{{url('admin/product/product_images_delete/')}}/{{$pIArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger ">
                           <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                           @endif
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-9 offset-md-1" id="product_attr_box">
            <div class="overview-wrap">
                <h2 class="title-1">Product Attributes</h2>
            </div>
            @php
            $loop_count_num=1;
            @endphp
            @foreach($productAttrArr as $key=>$val)
            @php
            $loop_count_prev=$loop_count_num;
            $pAArr=(array)$val;
            @endphp
            <input id="paid" type="hidden" name="paid[]" value="{{$pAArr['id']}}">
            <div class="card m-t-30" id="product_attr_{{$loop_count_num++}}">
               <div class="card-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-2">
                           <label for="sku" class="control-label mb-1"> SKU</label>
                           <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['sku']}}" required>
                        </div>
                        <div class="col-md-2">
                           <label for="mrp" class="control-label mb-1"> MRP</label>
                           <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['mrp']}}" required>
                        </div>
                        <div class="col-md-2">
                           <label for="price" class="control-label mb-1"> Price</label>
                           <input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['price']}}" required>
                        </div>
                        <div class="col-md-3">
                           <label for="size_id" class="control-label mb-1"> Size</label>
                           <select id="size_id" name="size_id[]" class="form-control">
                              <option value="">Select</option>
                              @foreach($sizes as $list)
                              @if($pAArr['size_id']==$list->id)
                              <option value="{{$list->id}}" selected>{{$list->size}}</option>
                              @else
                              <option value="{{$list->id}}">{{$list->size}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label for="qty" class="control-label mb-1"> Qty</label>
                           <input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$pAArr['qty']}}" required>
                        </div>
                        <div class="col-md-4">
                           <label for="attr_image" class="control-label mb-1"> Image</label>
                           <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                           @if($pAArr['attr_image']!='')
                           <img width="100px" src="{{asset('storage/media/products/'.$pAArr['attr_image'])}}"/>
                           @endif
                        </div>
                        <div class="col-md-1 offset-md-1">
                           <label for="attr_image" class="control-label mb-1">
                           &nbsp;&nbsp;&nbsp;</label>
                           @if($loop_count_num==2)
                           <button type="button" class="btn btn-success " onclick="add_more()">
                           <i class="fa fa-plus"></i>&nbsp; Add</button>
                           @else
                           <a href="{{url('admin/product/product_attr_delete/')}}/{{$pAArr['id']}}/{{$id}}"><button type="button" class="btn btn-danger ">
                           <i class="fa fa-minus"></i>&nbsp; Remove</button></a>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
        <div class="col-lg-9 offset-md-1">
            <button id="payment-button" type="submit" class="btn  btn-info btn-block">
            Submit
            </button>
        </div>
        </div>
      <input type="hidden" name="id" value="{{$id}}"/>
    </form>
   </div>
</div>
</div>
</div>
</div>
<script>
   var loop_count=1;
   function add_more(){
       loop_count++;
       var html='<input id="paid" type="hidden" name="paid[]" ><div class="card" id="product_attr_'+loop_count+'"><div class="card-body"><div class="form-group"><div class="row">';

       html+='<div class="col-md-2"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

       html+='<div class="col-md-2"><label for="mrp" class="control-label mb-1"> MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

       html+='<div class="col-md-2"><label for="price" class="control-label mb-1"> Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

       var size_id_html=jQuery('#size_id').html();
       size_id_html = size_id_html.replace("selected", "");

       html+='<div class="col-md-3"><label for="size_id" class="control-label mb-1"> Size</label><select id="size_id" name="size_id[]" class="form-control">'+size_id_html+'</select></div>';

       html+='<div class="col-md-2"><label for="qty" class="control-label mb-1"> Qty</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';

       html+='<div class="col-md-4"><label for="attr_image" class="control-label mb-1"> Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false" ></div>';

       html+='<div class="col-md-2"><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger " onclick=remove_more("'+loop_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';

       html+='</div></div></div></div>';

       jQuery('#product_attr_box').append(html)
   }
   function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
   }

   var loop_image_count=1;
   function add_image_more(){
      loop_image_count++;
      var html='<input id="piid" type="hidden" name="piid[]" value=""><div class="col-md-4 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-1"> Image</label><input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" ></div>';
      //product_images_box
       html+='<div class="col-md-2 product_images_'+loop_image_count+'""><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger " onclick=remove_image_more("'+loop_image_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';
       jQuery('#product_images_box').append(html)
   }

   function remove_image_more(loop_image_count){
        jQuery('.product_images_'+loop_image_count).remove();
   }
   CKEDITOR.replace('short_desc');
   CKEDITOR.replace('desc');
   CKEDITOR.replace('technical_specification');
</script>
@endsection
