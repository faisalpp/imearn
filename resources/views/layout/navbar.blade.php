<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name='robots' content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="image/x-icon" href="{{ url('/imearn-logo.png') }}" rel="icon">
    <meta property="og:image" content="{{ url('/imearn-logo2.png') }}" />

    <meta name="keywords" content="elitclick,money investment,ElitClick">
    <meta name="author" content="ElitClick">
    <title>IM Easycash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @vite(['resources/css/bootstrap.min.css', 'resources/css/animate.css', 'resources/css/lightbox.min.css', 'resources/css/odometer.css', 'resources/css/owl.min.css', 'resources/css/main.css', 'resources/css/custom.css', 'resources/css/toastr.min.css'])
    <link href="https://fonts.googleapis.com/css?family=Manrope&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
        function calc() {
            let plan = document.getElementById('select-plan');
            let result = document.getElementById('profit-calculate-amount');
            switch (plan.value) {
                @if (isset($plans))
                    @foreach ($plans as $plan)
                        case <?php echo json_encode($plan->title); ?>:
                            result.value = 'Rs.' + (<?php echo json_encode($plan->profit_amount); ?> * <?php echo json_encode($plan->duration)?>);
                        break;
                    @endforeach
                @endif
            }
        }
    </script>
</head>

<body>
    <style>
        .navbar {
            z-index: 100;
        }
    </style>
    <nav class="navbar navbar-expand-lg py-2 bg-primaryColor position-sticky top-0 shadow-md">
        <div class="container">
            <div class="container-fluid px-0 pe-lg-3 px-xxl-0">
                <a class="navbar-brand" href="/"><img src="{{ url('/imearn-logo.png') }}" style="width: 120px;margin-left:10px;" /></a>
                <button class="navbar-toggler shadow-none" data-bs-toggle="collapse" data-bs-target="#navbarGeneral" type="button" aria-controls="navbarGeneral" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="icon icon-tabler icon-tabler-menu-2" xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg>
                </button>
                <style>
                    .nav-link {
                        color: white;
                    }

                    .nav-link:hover {
                        color: #00A2FE;
                    }
                </style>
                <div class="collapse navbar-collapse justify-content-center" id="navbarGeneral">

                    <ul class="d-flex sm-flex-column nav navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}" style="font-size: 1rem;font-weight: 600">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/about') }}" style="font-size: 1rem;font-weight: 600">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/plan') }}" style="font-size: 1rem;font-weight: 600">Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/privacy') }}" style="font-size: 1rem;font-weight: 600">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/terms') }}" style="font-size: 1rem;font-weight: 600">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}" style="font-size: 1rem;font-weight: 600">Contact</a>
                        </li>
                        <div class="d-lg-none flex-lg-row">
                            @if (session()->has('user'))
                                @if (session()->get('user')['isAdmin'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/admin/dashboard') }}" style="font-size: 1.2rem;font-weight: 600">Admin</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/user/dashboard') }}" style="font-size: 1.2rem;font-weight: 600">Account</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/logout') }}" style="font-size: 1.2rem;font-weight: 600">Logout</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}" style="font-size: 1.2rem;font-weight: 600">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/register') }}" style="font-size: 1.2rem;font-weight: 600">Register</a>
                                </li>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
            <style>
                .nav-btn1 {
                    background-color: #00A2FE;
                    color: white;
                    width: fit-content;
                    border: 1px solid #00A2FE;
                }

                .nav-btn1:hover {
                    background-color: transparent;
                    color: #00A2FE;
                }

                .nav-btn2 {
                    border: 1px solid #00A2FE;
                    color: #00A2FE;
                }

                .nav-btn2:hover {
                    border-color: #00A2FE;
                    background-color: #00A2FE;
                    color: white;
                }
            </style>
            <form class="d-none d-lg-flex flex-lg-row w-25 justify-content-lg-end">
                @if (session()->has('user'))
                    @if (session()->has('user') && session()->get('user')['isAdmin'] == 1)
                        <a class="btn px-4 py-2 me-3 nav-btn1" href="{{ url('/admin/dashboard') }}">Account</a>
                    @else
                        <a class="btn px-4 py-2 me-3 nav-btn1" href="{{ url('/user/dashboard') }}">Account</a>
                    @endif
                    <a class="btn px-4 py-2 me-3 nav-btn2" href="{{ url('/logout') }}">Logout</a>
                @else
                    <a class="btn px-4 py-2 me-3 nav-btn1" href="{{ url('/login') }}">Login</a>
                    <a class="btn px-4 py-2 me-3 nav-btn2" href="{{ url('/register') }}">Register</a>
                @endif
            </form>
        </div>
    </nav>

