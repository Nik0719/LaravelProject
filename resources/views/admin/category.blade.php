@extends('admin/layout');
@section('category_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('message') }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Category</h2>
                                        <a href="category/manage_category">
                                        <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Add Category</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Category Name</th>
                                                <th>Category Slug</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $list)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$list->category_name}}</td>
                                                <td>{{$list->category_slug}}</td>
                                                <td>
                                                    @if ($list->category_image!='')
                                                        <img width="100px" src="{{asset('storage/media/category/'.$list->category_image)}}"
                                                        alt="{{$list->category_name}}">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/category/manage_category')}}/{{$list->id}}">
                                                        <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{url('admin/category/delete')}}/{{$list->id}}">
                                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                    @if($list->status==1)
                                                    <a href="{{url('admin/category/status/0')}}/{{$list->id}}">
                                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Status: Active">
                                                        <i class="fa fa-power-off"></i>
                                                        </button>
                                                    </a>
                                                    @elseif($list->status==0)
                                                    <a href="{{url('admin/category/status/1')}}/{{$list->id}}">
                                                        <button class="btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Status: Deactive">
                                                        <i class="fa fa-power-off"></i>
                                                        </button>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- END OF MAIN DASHBOARD CONTENT-->
@endsection
