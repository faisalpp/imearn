
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
                            <h2 class="section-header__title">Terms and Conditions</h2>
                        </div>
                        <p class="about-txt m-0 mb-4">IM EasyCash does not guarantee the accuracy of any information provided on this Website. We reserve the right to make changes and alterations as necessary. When we make these changes, we will post the updated Terms, date of effectiveness, and other information on our Website. We will also contact interested third parties to inform them of these changes.

IM EasyCash will not notify you directly regarding these alterations. To stay current on our Terms, we advise you to check regularly for updates to our Terms and conditions. For more information about our Terms of Use, please contact us at any time.
</p>

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

    
@endsection