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
                                    <a href="{{url('admin/customer')}}">
                                    <button type="button" class="btn btn-danger mb-15">
                                    <i class="fa fa-arrow-left"></i>&nbsp; Back</button>
                                    </a>
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Customer Detail</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-md-8 offset-md-1">
                                <!-- DATA TABLE-->
                                <div class="table-responsive">
                                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                        <div class="au-card-inner">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td class="text-right">{{$customer_list->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td class="text-right">{{$customer_list->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td class="text-right">{{$customer_list->mobile}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td class="text-right">{{$customer_list->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="text-right">{{$customer_list->city}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td class="text-right">{{$customer_list->state}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zip</td>
                                                        <td class="text-right">{{$customer_list->zip}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company</td>
                                                        <td class="text-right">{{$customer_list->company}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GST Number</td>
                                                        <td class="text-right">{{$customer_list->gstin}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Created On</td>
                                                        <td class="text-right">{{\Carbon\Carbon::parse($customer_list->created_at)->format('d-m-Y h:i A')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Updated On</td>
                                                        <td class="text-right">{{\Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-Y h:i A')}}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- END OF MAIN DASHBOARD CONTENT-->
@endsection
