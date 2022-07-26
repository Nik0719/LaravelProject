@extends('admin/layout');
@section('size_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 offset-md-1">
                                    <a href="{{url('admin/size')}}">
                                        <button type="button" class="btn btn-danger mb-15">
                                            <i class="fa fa-arrow-left"></i>&nbsp; Back</button>
                                        </a>
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Add New Size</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-lg-9 offset-md-1">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('size.manage_size_process')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="size" class="control-label mb-1">Size Name</label>
                                                <input id="size" name="size" value="{{$size}}" type="text" class="form-control" aria-invalid="false" required>
                                                @error('size')
                                                <div class="alert alert-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
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
