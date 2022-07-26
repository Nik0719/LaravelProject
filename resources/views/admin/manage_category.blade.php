@extends('admin/layout');
@section('category_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 offset-md-1">
                                    <a href="{{url('admin/category')}}">
                                        <button type="button" class="btn btn-danger mb-15">
                                            <i class="fa fa-arrow-left"></i>&nbsp; Back</button>
                                        </a>
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Add New Category</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-lg-9 offset-md-1">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="category_name" class="control-label mb-1">Category Name</label>
                                                        <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                                                        <select id="parent_category_id" name="parent_category_id" class="form-control" required>
                                                        <option value="0">Select Categories</option>
                                                        @foreach($category as $list)
                                                        @if($parent_category_id==$list->id)
                                                        <option selected value="{{$list->id}}">
                                                            @else
                                                        <option value="{{$list->id}}">
                                                            @endif
                                                            {{$list->category_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                                        <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                        @error('category_slug')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="category_image" class="control-label mb-1"> Image</label>
                                                <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                                @error('category_image')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror

                                                @if($category_image!='')
                                                        <a href="{{asset('storage/media/category/'.$category_image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/category/'.$category_image)}}"/></a>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="is_home" class="control-label mb-1"> Show in Home Page</label>
                                                <input id="is_home" name="is_home" type="checkbox" {{$is_home_selected}}>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- END OF MAIN DASHBOARD CONTENT-->
@endsection
