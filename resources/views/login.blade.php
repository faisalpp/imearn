    @extends('layout.main')
    @section('main')
    <!-- Account Section -->
    <section class="accounts-section">
        <div class="accounts-inner">
            <div class="accounts-inner__wrapper bg--section">
                <div class="accounts-left">
                    <div class="accounts-left-content">
                        
                        <div class="section-header">
                            <h6 class="section-header__subtitle"></h6>
                            <h3 class="section-header__title">Sign in to IM EasyCash</h3>
                            <p>
                                Turn Your ideas into Reality
                            </p>
                        </div>
                        <form class="row gy-4" id="loginfor" action="{{url('/login')}}" method="post">
                            <div class="alert alert-success alert-dismissible fade show" style="display: none;">
                             <p class="m-0 text-success"></p>
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" style="display: none;" role="alert">
                             <p class="m-0 text-danger"></p>
                            </div>
                            @if(session()->has('success'))
                            <span class="text--base text-center" >
                                 {{session()->get('success')}}
                             </span>
                            @endif
                            @if(session()->has('error'))
                            <span class="text--base text-center" >
                                 {{session()->get('error')}}
                             </span>
                            @endif
                            @csrf
                            <div class="col-sm-12">
                                <label for="email" class="form-label">Your Email</label>
                                @error('email')
                                     <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="col-sm-12">
                                <label for="password" class="form-label">Your Password</label>
                                @error('password')
                                     <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-12 mt-2">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <a href="{{url('/forgot-password')}}" class="text--base">Forget Password</a>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="cmn--btn">Sign In <div class="spinner-borde"></div></button>
                                {{-- <button type="submit" >Login</button> --}}
                            </div>
                            <div class="col-sm-12">
                                Not Registered Yet ? <a href="{{url('/register')}}" class="text--base">Create an Account</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="accounts-right bg--blue">
                    <img src="{{url('/login-img.jpeg')}}" alt="images">
                    <div class="section-header text-center text-white mb-0">
                        <h6 class="section-header__subtitle"></h6>
                        <h3 class="section-header__title">Turn Your ideas into Reality</h3>
                        <p>
                            Change your lifestyle signing up here. Invest and easily earn money for much better life                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection