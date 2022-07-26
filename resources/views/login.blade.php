@include('header')
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
                                    <li class="active" aria-current="page">Please Login to explore shopping like never before.</li>
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
                        <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                            <h3>login</h3>
                            <form action="/login" method="POST">
                                @csrf
                                <div class="default-form-box">
                                    <label>Username or email <span>*</span></label>
                                    <input type="text" name="email">
                                </div>
                                <div class="default-form-box">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password">
                                </div>
                                <div class="login_submit">
                                    <button class="btn btn-md btn-black-default-hover mb-4" type="submit">login</button>
                                    <label class="checkbox-default mb-4" for="offer">
                                        <input type="checkbox" id="offer">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="/register">Not a member? Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        <h3>Register</h3>
                        <form action="#">
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
                </div> -->
                <!--register area end-->
            </div>
        </div>
    </div>
<!-- ...:::: End Customer Login Section :::... -->
@include('footer') 
