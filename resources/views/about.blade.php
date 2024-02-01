
@extends('layout.main')
@section('main')


    <!-- About -->
    <section class="about-section overflow-hidden pt-100 pb-100 position-relative">
        <div class="container">
            <div class="row gy-4 gy-sm-5 flex-wrap-reverse align-items-center">
                <div class="col-lg-6">
                    <div class="about--img">
                        <img src="{{url('who.png')}}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about--content">
                        <div class="section-header mb-4">
                            <h6 class="section-header__subtitle">Who We are</h6>
                            <h2 class="section-header__title">Know About Us</h2>
                        </div>
                        <p class="about-txt m-0 mb-4">Welcome to IM Easycash, a trusted platform for investment opportunities that generate daily profits. Our team of experienced financial professionals and software engineers has created a user-friendly and secure system that allows individuals to invest their money in a hassle-free manner. With our advanced technology and investment strategies, we aim to provide our clients with a reliable and profitable investment experience.</p>
<p>At IM Easycash, we prioritize transparency and integrity, which is why we keep our clients informed about the progress of their investments. Our customer support team is available around the clock to answer any questions or concerns that you may have. We take pride in our commitment to excellence and are constantly working to improve our services and features to meet the evolving needs of our clients. Join us today and start your journey towards financial success with IM Easycash.</p>
                        <a href="{{url('/about')}}" class="cmn--btn">Read More <span class="round-effect">
                                <i class="fa fa-arrow"></i>
                            </span></a>
                    </div>
                    <div class="border-top mt-4">
                        <div class="counter-area">
                              
                                <div class="counter-item">
                                    <div class="counter-thumb">
                                        <img src="{{url('a1.png')}}" alt="about">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-header">
                                            <h4 class="title odometer" data-odometer-final="1">1</h4>
                                            <h4 class="title">k</h4>
                                        </div>
                                        <h6 class="text--base">Happy Users</h6>
                                    </div>
                                </div>
                              
                                <div class="counter-item">
                                    <div class="counter-thumb">
                                        <img src="{{url('a2.png')}}" alt="about">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-header">
                                            <h4 class="title odometer" data-odometer-final="30">1100</h4>
                                            <h4 class="title">+</h4>
                                        </div>
                                        <h6 class="text--base">Total Wallet</h6>
                                    </div>
                                </div>
                              
                                <div class="counter-item">
                                    <div class="counter-thumb">
                                        <img src="{{url('a3.png')}}" alt="about">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-header">
                                            <h4 class="title odometer" data-odometer-final="1">1</h4>
                                            <h4 class="title">k</h4>
                                        </div>
                                        <h6 class="text--base">Deposit</h6>
                                    </div>
                                </div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->

    <!-- Choose -->
    <section class="choose-section pt-100 pb-50 border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="section-header mb-lg-0">
                    <h6 class="section-header__subtitle">Features</h6>
                    <h2 class="section-header__title">Why Choose US</h2>
                    <p>
                        Deserunt hic consequatur ex placeat! atque repellendus inventore                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="choose-area bg--section border">
                    <div class="choose-inner">
                                                    <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Limitless Investment</h5>
                                    <p>
                                       INVESTING WITHOUT BORDERS. You can invest in our company from anywhere in the world.                                    </p>
                                </div>
                            </div>
                                                    <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Extreme Support</h5>
                                    <p>
                                       Our specialists are available around the clock to help you. Please let us know your questions.                                    </p>
                                </div>
                            </div>
                                                    <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Special Security</h5>
                                    <p>
                                       Your deposits are insured by our Special Trust Fund. Your deposits are safe.                                    </p>
                                </div>
                            </div>
                                                    <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Daily Profit</h5>
                                    <p>
                                       DAILY PROFIT. You can make profit every day with our investment proposals!                                    </p>
                                </div>
                            </div>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</section>    <!-- Choose -->

@endsection