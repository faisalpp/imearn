@extends('layout.main')
@section('main')
    <!-- Banner -->
    <section class="banner-section bg--gradient overflow-hidden">
        <div class="particle"></div>
        <div class="particle2"></div>
        <div class="particle3"></div>
        <div class="particle4"></div>
        <div class="banner-bg bg_img">
            <div class="container">
                <div class="banner-wrapper">
                    <div class="banner-cont text--light">
                        <h1 class="title text--base">Boost Your Earnings: Team Up and Win with IM Easycash</h1>
                        <p>
                            Elevate your status and earnings with IM Easycash. Expand your network, upgrade your rank, and unlock exciting bonuses as you invite others to join. Join us today and witness the power of collective growth.
                        </p>
                        <div class="btn__grp">
                            <a class="cmn--btn" href="{{ url('/register') }}">Get Started <span class="round-effect">
                                    <i class="fa fa-long-arrow-alt-right"></i>
                                </span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner -->

    <!-- About -->
    <section class="about-section overflow-hidden pt-100 pb-100 position-relative">
        <div class="container">
            <div class="row gy-4 gy-sm-5 flex-wrap-reverse align-items-center">
                <div class="col-lg-6">
                    <div class="about--img">
                        <img src="{{ url('/who.jpeg') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about--content">
                        <div class="section-header mb-4">
                            <h6 class="section-header__subtitle">Who We are</h6>
                            <h2 class="section-header__title">Know About Us</h2>

                        </div>
                        <p class="about-txt m-0 mb-4">Welcome to IM Easycash, a trusted platform for investment opportunities that generate daily profits. Our team of experienced financial professionals and software engineers has created a user-friendly and secure system that allows individuals to invest their money in a hassle-free manner. With our advanced technology and investment strategies, we aim to provide our clients with a reliable and profitable investment experience.</p>
                        <p>At IM Easycash, we prioritize transparency and integrity, which is why we keep our clients informed about the progress of their investments. Our customer support team is available around the clock to answer any questions or concerns that you may have. We take pride in our commitment to excellence and are constantly working to improve our services and features to meet the evolving needs of our clients.

                            Join us today and start your journey towards financial success with IM Easycash.</p>
                        <a class="cmn--btn" href="{{ url('/about') }}">Read More
                            <span class="round-effect">
                                <i class="fa fa-long-arrow-alt-right"></i>
                            </span>
                        </a>
                    </div>
                    <div class="border-top mt-4">
                        <div class="counter-area">

                            <div class="counter-item">
                                <div class="counter-thumb">
                                    <img src="{{ url('/a1.png') }}" alt="about">
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
                                    <img src="{{ url('/a2.png') }}" alt="about">
                                </div>
                                <div class="counter-content">
                                    <div class="counter-header">
                                        <h4 class="title odometer" data-odometer-final="1100">1100</h4>
                                        <h4 class="title">+</h4>
                                    </div>
                                    <h6 class="text--base">Total Wallet</h6>
                                </div>
                            </div>

                            <div class="counter-item">
                                <div class="counter-thumb">
                                    <img src="{{ url('/a3.png') }}" alt="about">
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

    <!-- Profit Calculator -->
    <section class="profit-calculator pt-100 pb-100 bg--shapes overflow-hidden">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="profit-thumb">
                        <img src="{{ url('/q1.jpeg') }}" alt="profit">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="profit-calculator-area">
                        <div class="section-header text-lg-start">
                            <h6 class="section-header__subtitle">Profit Calculator</h6>
                            <h2 class="section-header__title">Quick Profit Calculate</h2>
                            <p>IM Easycash Create this User Friendly Calculator for Our Investors.Use This Calculator to get know about your plan profit.</p>
                        </div>
                        <div class="row gy-4" id="profitCalculate">
                            <div class="alert alert-success alert-dismissible fade show" style="display: none;">
                                <p class="m-0 text-success"></p>
                            </div>


                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                                <p class="m-0 text-danger"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="select-plan">Select Plan</label>
                                <select class="form-control form--control bg--section" id="select-plan" name="plan">
                                    @if (isset($plans))
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->title }}">{{ $plan->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="profit-amount">Profit Amount</label>
                                <input class="form-control form--control bg--section profitCalBoxAmount" id="profit-calculate-amount" type="text" value="" readonly>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="cmn--btn" type="submit" onclick="calc()">Calculate Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profit Calculator -->


    <!-- Investment Plan -->
    <section class="investment-plan-section overflow-hidden bg--gradient-light pb-50 pt-100 border-top">
        <div class="container">
            <div class="section-header text-center">
                <h6 class="section-header__subtitle">Pricing Plan</h6>
                <h2 class="section-header__title">Best Investment Packages</h2>
                <p>
                    Deserunt hic consequatur ex placeat! atque repellendus inventore quisquam, perferendis, eum reiciendis quia nesciunt fuga magni. </p>
            </div>
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
                                        Rs.{{ number_format($mplan->daily_income * 30, 0, ',', ',') }}
                                    </span>
                                </li>
                                <li>
                                    <span class="name ">Total Income</span>
                                    <span class="info">
                                        Rs.{{ number_format($mplan->daily_income * $mplan->duration, 0, ',', ',') }}
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
                @foreach ($plans as $plan)
                    <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="plan__item">
                            <div class="plan__item-header">
                                <div class="left">
                                    <h5 class="title">{{ $plan->title }}</h5>
                                    <span>{{ $plan->slogan }}</span>
                                </div>
                                <div class="right">
                                    <img src="{{ url('/') }}/plans/{{ $plan->image }}" />
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
                                            Rs.{{ number_format($plan->profit_amount * $plan->duration, 0, ',', ',') }}
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
                <div class="text-center mt-5">
                    <a class="cmn--btn btn-outline" href="{{ url('/plan') }}">All Packages</a>
                </div>
            </div>
    </section>
    <!-- Investment Plan -->

    <!-- Transactions -->
    <!-- <section class="transactions-section pt-50 pb-100 bg--gradient-light">
                            <div class="container">
                                <ul class="nav nav-tabs nav--tabs justify-content-center mb-4">
                                    <li>
                                        <a class="cmn--btn active" data-bs-toggle="tab" href="#deposit-log">Deposit Log</a>
                                    </li>
                                    <li>
                                        <a class="cmn--btn" data-bs-toggle="tab" href="#withdraw-log">Withdraw Log</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="deposit-log">
                                        <div class="table-responsive table--mobile-lg">
                                            <table class="table table-mobile-lg bg--body">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Transaction Number</th>
                                                        <th>Method</th>
                                                        <th>Account Name</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td data-label="Date">May 07, 2023</td>
                                                        <td data-label="Transaction Number">S6TXYISWNTDL</td>
                                                        <td data-label="Method">Flutterwave</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">6577712₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 07, 2023</td>
                                                        <td data-label="Transaction Number">NJO8RKLYOWON</td>
                                                        <td data-label="Method">Manual</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">250₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 07, 2023</td>
                                                        <td data-label="Transaction Number">TA0YCUQLRLBI</td>
                                                        <td data-label="Method">Flutterwave</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">7400₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 06, 2023</td>
                                                        <td data-label="Transaction Number">LI7VWHOT29JI</td>
                                                        <td data-label="Method">Paytm</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">11₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 06, 2023</td>
                                                        <td data-label="Transaction Number">R7MHJQUDW7JP</td>
                                                        <td data-label="Method">Flutterwave</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">518000₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 06, 2023</td>
                                                        <td data-label="Transaction Number">JSHXASNUQKYF</td>
                                                        <td data-label="Method">Flutterwave</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">493284₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 06, 2023</td>
                                                        <td data-label="Transaction Number">DLW3LD4B1U4B</td>
                                                        <td data-label="Method">Flutterwave</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">7400₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 05, 2023</td>
                                                        <td data-label="Transaction Number">B6VDEOIXYYPN</td>
                                                        <td data-label="Method">Flutterwave</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">148000₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 05, 2023</td>
                                                        <td data-label="Transaction Number">WFUSKUYRCNHO</td>
                                                        <td data-label="Method">Paypal</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">1480₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-label="Date">May 05, 2023</td>
                                                        <td data-label="Transaction Number">ILBKFIBHSVLQ</td>
                                                        <td data-label="Method">Manual</td>
                                                        <td data-label="Account Name">Jenifer</td>
                                                        <td data-label="Amount">892.36₹</td>
                                                        <td data-label="Status">
                                                            <span class="badge badge--warning">Pending</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="withdraw-log">
                                        <div class="table-responsive table--mobile-lg">
                                            <table class="table table-mobile-lg bg--body">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Transaction no</th>
                                                        <th>Method</th>
                                                        <th>Account Name</th>
                                                        <th>Amount</th>
                                                        <th>Fee</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        Transactions -->


    <!-- How To Start -->
    <section class="how-to-start-section pt-100 border-top border-bottom overflow-hidden">
        <div class="container">
            <div class="row align-items-center flex-wrap gy-5">
                <div class="col-lg-6">
                    <div class="pe-xl-4 pe-xxl-5">
                        <div class="section-header text-lg-end">
                            <h6 class="section-header__subtitle">How To Get Started</h6>
                            <h2 class="section-header__title">We have some easy steps!</h2>
                            <p>Creating an Account on IM Easycash is very Easy, Just Follow Below Steps.</p>
                        </div>
                        <div class="how-wrapper">
                            <div class="how__item">
                                <div class="how__item-thumb">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <div class="how__item-content">
                                    <h5 class="how__item-title text--base">
                                        Create Account
                                    </h5>
                                    <p>Creating account is easy just enter your details and Payment Information for Investment.</p>
                                </div>
                            </div>
                            <div class="how__item">
                                <div class="how__item-thumb">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="how__item-content">
                                    <h5 class="how__item-title text--base">
                                        Purchase Investment Plan
                                    </h5>
                                    <p>Purchase Plan Option is available on your dashboard and during registration process.
                                    </p>
                                </div>
                            </div>
                            <div class="how__item">
                                <div class="how__item-thumb">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="how__item-content">
                                    <h5 class="how__item-title text--base">
                                        Get Profit
                                    </h5>
                                    <p>Get daily Profit according to your plan package.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="how-thumb">
                        <img src="{{ url('/s111.jpeg') }}" alt="about" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How To Start -->


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
                                        INVESTING WITHOUT BORDERS. You can invest in our company from anywhere in the world. </p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Extreme Support</h5>
                                    <p>
                                        Our specialists are available around the clock to help you. Please let us know your questions. </p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Special Security</h5>
                                    <p>
                                        Your deposits are insured by our Special Trust Fund. Your deposits are safe. </p>
                                </div>
                            </div>
                            <div class="choose-item">
                                <div class="choose-thumb">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="choose-content">
                                    <h5 class="choose-content-title">Daily Profit</h5>
                                    <p>
                                        DAILY PROFIT. You can make profit every day with our investment proposals! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- Choose -->



    <!-- Referral -->
    <section class="referral-section pt-50 pb-100">
        <div class="container">
            <div class="row align-items-center justify-content-between flex-wrap-reverse">
                <div class="col-lg-6 col-xl-5">
                    <div class="referral-thumb">
                        <img src="{{ url('/r1.png') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header mb-lg-0">
                        <h6 class="section-header__subtitle">Referral Comission</h6>
                        <h2 class="section-header__title">Refer your friend and earn money</h2>
                        <p>
                            Our referral program was created as an additional way for our investors to make money. By attracting new investors to join us, our members are getting an additional source of income. The referral program has Five levels of participation,First level 50 coins, Second level 40 coins, Third level 30 coins, Fourth level 20 coins and Fifth level 10 coins will meet. </p>
                        <div class="comission-area">
                            <div class="comission-item">
                                <div class="thumb">
                                    {{ $mplan->ref_com1 }}<img src="{{ url('/coin.png') }}" style="width:30px" />
                                </div>
                            </div>
                            <div class="comission-item">
                                <div class="thumb">
                                    {{ $mplan->ref_com2 }}<img src="{{ url('/coin.png') }}" style="width:30px" />
                                </div>
                            </div>
                            <div class="comission-item">
                                <div class="thumb">
                                    {{ $mplan->ref_com3 }}<img src="{{ url('/coin.png') }}" style="width:30px" />
                                </div>
                            </div>
                            <div class="comission-item">
                                <div class="thumb">
                                    <span>{{ $mplan->ref_com4 }}<img src="{{ url('/coin.png') }}" style="width:30px" /></span>
                                </div>
                            </div>
                            <div class="comission-item">
                                <div class="thumb">
                                    {{ $mplan->ref_com5 }}<img src="{{ url('/coin.png') }}" style="width:30px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Referral -->


    <!-- Team Members -->
    <!-- <section class="team-section pt-100 bg--section pb-100 border-top">
                            <div class="container">
                                <div class="section-header text-center">
                                    <h6 class="section-header__subtitle">Team</h6>
                                    <h2 class="section-header__title">Our Expert Members</h2>
                                    <p>
                                        Deserunt hic consequatur ex placeat! atque repellendus inventore quisquam, perferendis, eum reiciendis quia nesciunt fuga magni. </p>
                                </div>
                                <div class="row g-md-3 g-4 g-xl-4 justify-content-center">

                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="team__card bg--section">
                                            <div class="team__card-img">
                                                <img src="{{ url('/t1.jpg') }}" alt="team">
                                            </div>
                                            <div class="team__card-cont">
                                                <h6 class="team__card-cont-title">Emerrik Aubameyang</h6>
                                                <ul class="social-icons py-1 py-md-0 me-md-auto">
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-youtube"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="team__card bg--section">
                                            <div class="team__card-img">
                                                <img src="{{ url('/t2.jpg') }}" alt="team">
                                            </div>
                                            <div class="team__card-cont">
                                                <h6 class="team__card-cont-title">Erling Haland</h6>
                                                <ul class="social-icons py-1 py-md-0 me-md-auto">
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-youtube"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="team__card bg--section">
                                            <div class="team__card-img">
                                                <img src="{{ url('/t3.jpg') }}" alt="team">
                                            </div>
                                            <div class="team__card-cont">
                                                <h6 class="team__card-cont-title">Robot Smith</h6>
                                                <ul class="social-icons py-1 py-md-0 me-md-auto">
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.google.com/"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href=""><i class="fa fa-youtube"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
    <!-- Team Members -->


    <!-- CTAs -->
    <section class="ctas-section bg--gradient position-relative overflow-hidden" style="background: #343435">
        <div class="particle"></div>
        <div class="particle2"></div>
        <div class="particle3"></div>
        <div class="particle4"></div>
        <div class="container">
            <div class="section-header text-center text-white mb-0">
                <h6 class="section-header__subtitle">Are You Convenced?</h6>
                <h2 class="section-header__title">Let&#039;s Get started with us</h2>
                <a class="cmn--btn" href="{{ url('/register') }}">
                    Get Started <span class="round-effect"><i class="fa fa-long-arrow-alt-right"></i></span>
                </a>
            </div>
        </div>
    </section>
    <!-- CTAs -->


    <!-- Payment Gateways -->
    <section class="payment-gateway-section pt-50 pb-100">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h6 class="section-header__subtitle">Payment Gateway</h6>
                        <h2 class="section-header__title">Our Payment Gateway</h2>
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
    </section> <!-- Payment Gateways -->

@endsection
