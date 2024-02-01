<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="image/x-icon" href="{{ url('/imearn-logo.png') }}" rel="icon">
    <meta property="og:image" content="{{ url('/imearn-logo2.png') }}" />
    @stack('title')
    @vite(['resources/css/bootstrap.min.css', 'resources/css/animate.css', 'resources/css/lightbox.min.css', 'resources/css/odometer.css', 'resources/css/owl.min.css', 'resources/css/main.css', 'resources/css/toastr.min.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include toastr CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
    </script>

</head>

<body>
    <!-- Overlayer -->
    <span class="toTopBtn">
        <i class="fa fa-angle-up"></i>
    </span>
    <div class="overlayer"></div>
    <!-- <div class="loader"></div> -->
    <!-- Overlayer -->

    <!-- User Dashboard -->
    <main class="dashboard-section user--dashboard">
        <aside class="dashboard-sidebar">
            {{-- <div>&nbsp;</div> --}}
            <div class="dashboard-sidebar-inner bg-primaryColor">
                <div class="user-sidebar-header">
                    <a href="{{ url('/') }}">
                        <img src="{{ url('/imearn-logo.png') }}" alt="logo">
                    </a>
                    <div class="sidebar-close">
                        <span class="close">&nbsp;</span>
                    </div>
                </div>
                <div class="user-sidebar-body">
                    <ul class="user-sidbar-link">
                        <li>
                            <span class="subtitle">General Information</span>
                        </li>
                        <li>
                            <a class="active" href="{{ url('/user/dashboard') }}">
                                <span class="icon"><i class="fas fa-chart-line"></i></span>
                                Dashboard</a>
                        </li>

                        <li>
                            <a class="" href="{{ url('/user/transactions') }}">
                                <span class="icon"><i class="fas fa-briefcase"></i></span>
                                Transactions</a>
                        </li>


                        <li>
                            <span class="subtitle">Invest</span>
                        </li>
                        <li>
                            <a class="" href="{{ url('/user/plans') }}">
                                <span class="icon"><i class="fas fa-coins"></i></span>
                                Plans</a>
                        </li>
                        <li>
                            <a class="" href="{{ url('/user/invest-history') }}">
                                <span class="icon"><i class="fas fa-chart-bar"></i></span>
                                Invest History</a>
                        </li>

                        <li>
                            <span class="subtitle">Transfer & Request</span>
                        </li>
                        <li>
                            <a class="" href="{{ url('/user/withdraw') }}">
                                <span class="icon"><i class="fas fa-credit-card"></i></span>
                                Withdraw</a>
                        </li>
                        <li>
                            <a class="" href="{{ url('/user/withdraw-history') }}">
                                <span class="icon"><i class="fas fa-money-check"></i></span>
                                Withdraw History</a>
                        </li>
                        <li>
                            <span class="subtitle">Referral</span>
                        </li>
                        <li>
                            <a class="" href="{{ url('/user/referrals') }}">
                                <span class="icon"><i class="fas fa-address-card"></i></span>
                                Referred Users</a>
                        </li>
                        <!--<li>-->
                        <!--    <a class="" href="{{ url('/user/referrals-commission') }}">-->
                        <!--        <span class="icon"><i class="fas fa-history"></i></span>-->
                        <!--        Referral Commissions</a>-->
                        <!--</li>-->

                        <li>
                            <span class="subtitle">Account Information</span>
                        </li>
                        <li>
                            <a class="" href="{{ url('/user/profile') }}">
                                <span class="icon"><i class="fas fa-user-circle"></i></span>
                                Profile</a>
                        </li>

                        <li>
                            <a class="" href="{{ url('/user/change-password') }}">
                                <span class="icon"><i class="fas fa-question-circle"></i></span>
                                Change Password</a>
                        </li>

                        <li>
                            <a href="{{ url('/logout') }}">
                                <span class="icon"><i class="fas fa-exchange-alt"></i></span>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <article class="main--content">

            <nav class="navbar navbar-expand-lg py-2 bg-primaryColor">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="#"><img src="{{ url('/imearn-logo.png') }}" style="width: 120px;margin-left:10px;" /></a>
                    
                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarGeneral" type="button" aria-controls="navbarGeneral" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars" style="color:#00A2FE"></i></span>
                    </button>
                    <style>
                        .nav-link {
                            color: white;
                        }

                        .nav-link:hover {
                            color: #00A2FE;
                        }
                    </style>
                    <div class="collapse navbar-collapse" id="navbarGeneral">

                        <ul class="d-flex d-lg-none nav navbar-nav mx-auto mb-2 mb-lg-0" style="border-top:1px solid white">

                            <!--Mobile Nav Links-->

                            <li class="d-flex flex-column align-items-center mt-3 mb-3">
                                @if (session()->get('user')['image'] != '')
                                    <img src="{{ url('/profile-images') }}/{{ session()->get('user')['image'] }}" alt="clients" style="width:100px;height:100px;border-radius:10%">
                                @else
                                    <img src="{{ url('/profile-images/alt-img.png') }}" alt="clients" style="width:100px">
                                @endif
                                <span style="color:#00A2FE;font-size:1.8rem;text-transform:capitalize">{{ session()->get('user')['userName'] }}</span>
                            </li>
                            <li>
                                <span class="subtitle" style="color:#00A2FE;font-size:1.5rem">General Information</span>
                            </li>
                            <li>
                                <a class="active px-4" href="{{ url('/user/dashboard') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-chart-line" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Dashboard</a>
                            </li>

                            <li>
                                <a class="px-4" href="{{ url('/user/transactions') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-briefcase" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Transactions</a>
                            </li>


                            <li>
                                <span class="subtitle" style="color:#00A2FE;font-size:1.5rem">Invest</span>
                            </li>
                            <li>
                                <a class="px-4" href="{{ url('/user/plans') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-coins" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Plans</a>
                            </li>
                            <li>
                                <a class="px-4" href="{{ url('/user/invest-history') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-chart-bar" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Invest History</a>
                            </li>

                            <li>
                                <span class="subtitle" style="color:#00A2FE;font-size:1.5rem">Transfer & Request</span>
                            </li>
                            <li>
                                <a class="px-4" href="{{ url('/user/withdraw') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-credit-card" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Withdraw</a>
                            </li>
                            <li>
                                <a class="px-4" href="{{ url('/user/withdraw-history') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-money-check" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Withdraw History</a>
                            </li>
                            <li>
                                <span class="subtitle" style="color:#00A2FE;font-size:1.5rem">Referral</span>
                            </li>
                            <li>
                                <a class="px-4" href="{{ url('/user/referrals') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-address-card" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Referred Users</a>
                            </li>
                            <!--<li>-->
                            <!--    <a class="px-4" href="{{ url('/user/referrals-commission') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">-->
                            <!--        <span class="icon"><i class="fas fa-history" style="color:#00A2FE;margin-right:5px"></i></span>-->
                            <!--        Referral Commissions</a>-->
                            <!--</li>-->
                            <li>
                                <span class="subtitle" style="color:#00A2FE;font-size:1.5rem">Account Information</span>
                            </li>
                            <li>
                                <a class="px-4" href="{{ url('/user/profile') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-user-circle" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Profile</a>
                            </li>

                            <li>
                                <a class="px-4" href="{{ url('/user/change-password') }}" style="text-decoration:none;color:white;margin-bottom:5px;margin-top:5px;font-size:1.2rem">
                                    <span class="icon"><i class="fas fa-question-circle" style="color:#00A2FE;margin-right:5px"></i></span>
                                    Change Password</a>
                            </li>

                            <div class="d-flex d-lg-none justify-content-center flex-row">
                                <li class="nav-item">
                                    <a class="btn px-4 py-2 me-3 mt-2 nav-btn1" href="{{ url('/user/dashboard') }}">Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn px-4 py-2 me-3 mt-2 nav-btn2" href="{{ url('/logout') }}">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
                <style>
                    .nav-btn1 {
                        background-color: #00A2FE;
                        color: white;
                        width: fit-content;
                    }

                    .nav-btn1:hover {
                        background-color: transparent;
                        border: 1px solid #00A2FE;
                        color: #00A2FE;
                    }

                    .nav-btn2 {
                        border: 1px solid #00A2FE;
                        color: #00A2FE;
                    }
                    .noti {
                        border: 1px solid #00A2FE;
                        color: #00A2FE;
                        font-size:12px
                    }

                    .noti:hover {
                        background-color: #00A2FE;
                        color: white;
                    }
                    .nav-btn2:hover {
                        background-color: #00A2FE;
                        color: white;
                    }
                </style>
                <form class="d-none d-lg-flex flex-lg-row w-25">
                    <a class="btn px-4 py-2 me-3 nav-btn1" href="{{ url('/user/dashboard') }}">Account</a>
                    <a class="btn px-4 py-2 me-3 nav-btn2" href="{{ url('/logout') }}">Logout</a>
                </form>
            </nav>
            <style>
                .whatsaap{
position: fixed;
width: 80px;
bottom:40px;
right:20px;
}
.whatsapp-img{
width: fit-content;
height: fit-content;
position: fixed;
padding-left: 12px;
padding-right: 12px;
padding-top: 10px;
padding-bottom: 10px;
bottom: 30px;
right: 20px;
border-radius:50px;
z-index: 10000;
color: white;
background-color: black;
box-shadow: 2px 1px 15px 2px black;
}
            </style>
            @php
            use App\Models\MasterPlan;
             $mplan = MasterPlan::first();
            @endphp
            <div class="whatsapp">
    <a href="https://wa.me/{{$mplan->whatsapp}}" target="_blank">
      <i class="fa-brands fa-whatsapp whatsapp-img text-center" style="font-size: 2.3rem;" ></i>
    </a>
</div>
            @yield('main')
        </article>
    </main>


    <!-- User Dashboard -->

    @vite(['resources/js/jquery-3.6.0.min.js', 'resources/js/bootstrap.min.js', 'resources/js/viewport.jquery.js', 'resources/js/odometer.min.js', 'resources/js/lightbox.min.js', 'resources/js/owl.min.js', 'resources/js/notify.js', 'resources/js/main.js', 'resources/js/toastr.min.js', 'resources/js/custom.js'])
    <script>
        'use strict';

        function myFunction() {
            var copyText = document.getElementById("cronjobURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            toastr.success("Referral Url Copied!", 'Success', {
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000 // Time in milliseconds (3 seconds)
        });
            // window.notify("Referral url copied", "info");
        }
    </script>
    <script>
        'use strict';

        function copy(no) {
            let id = 'acc' + no
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
             toastr.success("Accoun Number Copied!", 'Success', {
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000 // Time in milliseconds (3 seconds)
            });
            // window.notify("Referral url copied", "info");
        }
    </script>
    <script>
        'use strict';
    </script>
</body>

</html>
