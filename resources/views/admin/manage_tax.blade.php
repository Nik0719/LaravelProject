@extends('admin/layout');
@section('tax_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 offset-md-1">
                                    <a href="{{url('admin/tax')}}">
                                        <button type="button" class="btn btn-danger mb-15">
                                            <i class="fa fa-arrow-left"></i>&nbsp; Back</button>
                                        </a>
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Add New Tax</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-lg-9 offset-md-1">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('tax.manage_tax_process')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="tax_value" class="control-label mb-1">Tax Value</label>
                                                <input id="tax_value" value="{{$tax_value}}" name="tax_value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('tax_value')
                                                <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tax_desc" class="control-label mb-1">Tax Desc </label>
                                                <input id="tax_desc" value="{{$tax_desc}}" name="tax_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
