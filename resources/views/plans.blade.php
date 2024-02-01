
@extends('layout.main')
@section('main')
    <!-- Investment Plan -->
    <section class="investment-plan-section overflow-hidden bg--gradient-light pb-100 pt-100">
        <div class="container">
            <div class="pricing--wrapper row g-3 g-md-4 g-lg-3 g-xxl-4 justify-content-center">
            <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="plan__item">
                            <div class="plan__item-header">
                                <div class="left">
                                    <h5 class="title">{{ $mplan->title }}</h5>
                                    <span>{{ $mplan->join_text }}</span>
                                </div>
                            </div>
                            <div class="plan__item-body">
                                <ul>
                                    <li>
                                        <span class="name">Profit</span>
                                        <span class="info">
                                            Daily
                                        </span>
                                    </li>
                                    
                                    <li>
                                        <span class="name ">Daily Income</span>
                                        <span class="info">
                                            Rs.{{ $mplan->daily_income }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Duration</span>
                                        <span class="info">
                                            {{ $mplan->duration }} Days
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Monthly Income</span>
                                        <span class="info">
                                            Rs.{{ number_format($mplan->daily_income * 30,0,',',',') }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Total Income</span>
                                        <span class="info">
                                            Rs.{{ number_format($mplan->daily_income * $mplan->duration,0,',',',') }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name">Unlock Fee</span>
                                        <span class="info">
                                         Rs.{{ $mplan->investment }}
                                        </span>
                                    </li>
                                </ul>

                                <a class="cmn--btn w-100 invest-plan" type="button" href="{{ url('/register') }}">
                                    BUY NOW
                                </a>
                            </div>
                        </div>
                    </div>

            
            
            @foreach($plans as $plan) 
            <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="plan__item">
                            <div class="plan__item-header">
                                <div class="left">
                                    <h5 class="title">{{ $plan->title }}</h5>
                                    <span>{{ $plan->slogan }}</span>
                                </div>
                                <div class="right">
                                    <img src="{{url('/')}}/plans/{{$plan->image}}" />
                                </div>
                            </div>
                            <div class="plan__item-body">
                                <ul>
                                    <li>
                                        <span class="name">Profit</span>
                                        <span class="info">
                                            Daily
                                        </span>
                                    </li>
                                    
                                    <li>
                                        <span class="name ">Daily Income</span>
                                        <span class="info">
                                            Rs.{{ $plan->profit_amount }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Duration</span>
                                        <span class="info">
                                            {{ $plan->duration }} Days
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Total Income</span>
                                        <span class="info">
                                            Rs.{{ number_format($plan->profit_amount * $plan->duration,0,',',',') }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name">Plan Amount</span>
                                        <span class="info">
                                        {{ $plan->coins }} (Coins)
                                        </span>
                                    </li>
                                </ul>
                                <a class="cmn--btn w-100 invest-plan" type="button" href="{{ url('/register') }}">
                                    BUY NOW
                                </a>
                            </div>
                        </div>
                    </div>
                        @endforeach                                                 
            </div>
        </div>
    </section>
    <!-- Investment Plan -->

    <!-- Choose -->
    <section class="choose-section pt-100 pb-50 border-top">
    <div class="container">
        <div class="row align-items-center">
        
            <div class="col-lg-12">
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

    <!-- Payment Gateways -->
    <section class="payment-gateway-section pt-50 pb-100">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h6 class="section-header__subtitle">Payment Gateway</h6>
                        <h2 class="section-header__title">Our Payment Gateway</h2>
                        <p>
                            Deserunt hic consequatur ex placeat! atque repellendus inventore quisquam, perferendis, eum reiciendis quia nesciunt fuga magni </p>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="payement-gateway-thumb">
                        <img src="{{ url('/jazz.jfif') }}" alt="partner">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="payement-gateway-thumb">
                        <img src="{{ url('/easy.jpg') }}" alt="partner">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="payement-gateway-thumb">
                        <img src="{{ url('/bank.jfif') }}" alt="partner">
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- Payment Gateways -->

@endsection