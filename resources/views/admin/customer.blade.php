@extends('admin/layout');
@section('customer_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            @if(session()->has('message'))
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                {{session('message')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">List of Customers</h2>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $list)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->mobile}}</td>
                                                <td>{{$list->city}}</td>
                                                <td>
                                                    <a href="{{url('admin/customer/show_customer/')}}/{{$list->id}}">
                                                        <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                                        <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                    </a>
                                                    @if($list->status==1)
                                                    <a href="{{url('admin/customer/status/0')}}/{{$list->id}}">
                                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Status: Active">
                                                        <i class="fa fa-power-off"></i>
                                                        </button>
                                                    </a>
                                                    @elseif($list->status==0)
                                                    <a href="{{url('admin/customer/status/1')}}/{{$list->id}}">
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
