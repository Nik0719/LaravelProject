@extends('layout')
@section('content')
<!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">WELCOME TO APNASTORE !</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="active" aria-current="page">Please register to become our memeber.</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
<!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
               <div class="col-lg-12 col-md-12">
                    <div class="col-lg-6 col-md-6 offset-md-3">
                        <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                            <h3>Register</h3>
                            <form action="#">
                                <div class="default-form-box">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="default-form-box">
                                    <label>Email address <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="default-form-box">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password">
                                </div>
                                <div class="login_submit">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Register</button>
                                </div>
                                </form>
                            </div>
                        </div>
                </div>
                <!--login area start-->

                <!--register area start-->

                <!--register area end-->
            </div>
        </div>
    </div>
<!-- ...:::: End Customer Login Section :::... -->
@endsection
