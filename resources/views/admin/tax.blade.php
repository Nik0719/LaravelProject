@extends('admin/layout');
@section('tax_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Tax</h2>
                                        <a href="{{ url('admin/tax/manage_tax') }}">
                                        <button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Add Tax</button>
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
                                                <th>Tax Desc</th>
                                                <th>Tax Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $list)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$list->tax_desc}}</td>
                                                <td>{{$list->tax_value}}</td>
                                                <td>
                                                    <a href="{{url('admin/tax/manage_tax')}}/{{$list->id}}">
                                                        <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{url('admin/tax/delete')}}/{{$list->id}}">
                                                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                    @if($list->status==1)
                                                    <a href="{{url('admin/tax/status/0')}}/{{$list->id}}">
                                                        <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Status: Active">
                                                        <i class="fa fa-power-off"></i>
                                                        </button>
                                                    </a>
                                                    @elseif($list->status==0)
                                                    <a href="{{url('admin/tax/status/1')}}/{{$list->id}}">
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
