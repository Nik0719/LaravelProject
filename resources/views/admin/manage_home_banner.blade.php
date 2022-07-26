@extends('admin/layout');
@section('home_banner_select','active')
@section('content')
    <!-- MAIN DASHBOARD CONTENT-->
        <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 offset-md-1">
                                    <a href="{{url('admin/home_banner')}}">
                                        <button type="button" class="btn btn-danger mb-15">
                                            <i class="fa fa-arrow-left"></i>&nbsp; Back</button>
                                        </a>
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Add New Banner</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                            <div class="col-lg-9 offset-md-1">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="title" class="control-label mb-1">Title</label>
                                                        <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="btn_txt" class="control-label mb-1">Button Text</label>
                                                        <input id="btn_txt" value="{{$btn_txt}}" name="btn_txt" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="btn_link" class="control-label mb-1">Button Link</label>
                                                        <input id="btn_link" value="{{$btn_link}}" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1"> Image</label>
                                                <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                                @error('image')
                                                <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                                </div>
                                                @enderror

                                                @if($image!='')
                                                        <a href="{{asset('storage/media/banner/'.$image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/banner/'.$image)}}"/></a>
                                                    @endif
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
