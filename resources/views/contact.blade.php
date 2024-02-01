@extends('layout.main')
@section('main')


    <!-- Contact Section -->
    <section class="contact-section overflow-hidden bg--gradient-light pb-100 pt-100 border-bottom">
        <div class="container">
            <div class="row gy-5 flex-wrap-reverse">
                <div class="col-lg-6">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <!--<iframe width="600" height="400" id="gmap_canvas"-->
                            <!--    src="https://maps.google.com/maps?q=23.8759,90.3795&t=&z=13&ie=UTF8&iwloc=&output=embed"-->
                            <!--    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">-->
                            <!--</iframe>-->
                            <iframe width="600" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Islamabad&t=&z=7&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ms-xl-4 ms-xxl-5">
                        <div class="section-header">
                            <h6 class="section-header__subtitle mt-0">Contact US</h6>
                            <h2 class="section-header__title">Get in Touch with US</h2>
                        
                        </div>
                        <div class="contact-area">
                            <div class="contact__item">
                                <div class="contact__item-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact__item-cont">
                                    <h6 class="contact__item-cont-title">Office</h6>
                                    <span class="text--base">
                                        Islamabad,Pakistan
                                    </span>
                                </div>
                            </div>
                            <div class="contact__item">
                                <div class="contact__item-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact__item-cont">
                                    <h6 class="contact__item-cont-title">Call US</h6>
                                    <a href="+0123456789" class="text--base">+923465702324</a>
                                </div>
                            </div>
                            <div class="contact__item">
                                <div class="contact__item-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact__item-cont">
                                    <h6 class="contact__item-cont-title">Email US</h6>
                                    <a href="mailto:admin@geniusocean.com" class="text--base">admin@imeasycash.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->


@endsection