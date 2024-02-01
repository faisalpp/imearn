@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Investment Plans</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
    <h3 class="title">Investment Plans</h3>
    <ul class="breadcrumb">
        <li>
            <a href="{{url('/user/dashboard')}}">Dashboard</a>
        </li>
        <li>Investment Plans</li>
    </ul>
</div>
@if(session()->has('error'))
<div>
    <h5 class="text-danger text-center mb-2" >{{session()->get('error')}}</h5>
</div>
@endif
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif

<script>
        // Wrap your JavaScript code in a DOMContentLoaded event handler
        document.addEventListener("DOMContentLoaded", function() {
            var items = <?php echo json_encode($active_plans); ?>;
            function updateCountdowns() {
                var noww = new Date() ;
                console.log(noww)
                
                items.forEach(function(item) {
                    console.log(item.expiration_date)
                    var targetDate = new Date(item.expiration_date);
                    var timeRemaining =  targetDate - noww;
                
                    if(timeRemaining  > 0){
                    var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                    
                    var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                    document.getElementById(`countdown-${item.title}`).innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                    }else{
                      fetch(`{{url('/transaction/update')}}/${item.id}`)
                      .then(response => response.json())
                      .then(data => {
                          
                          if(data.message === "OK"){
                              location.reload();
                          }
                      })
                      .catch(error => {
                          // Handle errors here
                          console.error('Error:', error);
                      });
                    }
                });
            }

            setInterval(updateCountdowns, 1000);
            updateCountdowns(); // Initial call to avoid delay
        });
    </script>

<div class="dashboard--content-item">
    <div class="pricing--wrapper row g-3 g-md-4 g-lg-3 g-xxl-4">
        @if(isset($membership) && $membership->status === 'APPROVED')
        @if(isset($active_plans))
        @foreach($active_plans as $active_plan)
        <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="plan__item">
                            <div class="plan__item-header">
                                <div class="left">
                                    <h5 class="title">{{ $active_plan['title'] }}</h5>
                                    <span>{{ $active_plan['slogan'] }}</span>
                                </div>
                                <div class="right">
                                    <img src="{{url('/')}}/plans/{{$active_plan['image']}}" />
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
                                            Rs.{{ $active_plan['profit_amount'] }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Duration</span>
                                        <span class="info">
                                            {{ $active_plan['duration'] }} Days
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Total Income</span>
                                        <span class="info">
                                            Rs.{{ number_format($active_plan['profit_amount'] * $active_plan['duration'],0,',',',') }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name">Price</span>
                                        <span class="info">
                                        {{ $active_plan['coins'] }} <img src="{{url('/coin.png')}}" style="width:30px" />
                                        </span>
                                    </li>
                                </ul>
                                
                                <a class="cmn--btn w-100 invest-plan" id="countdown-{{$active_plan['title']}}" style="background-color:red !important">
                                <!-- {{ $active_plan['expiration_date']->format('j F,Y') }} -->
                                <!--<p class="my-2" style="color:white" id="countdown-{{$active_plan['title']}}"></p>-->
                                </a>
                            </div>
                </div>
      </div>
     @endforeach
     @endif        
        
        @if(isset($gnp))
        @foreach($gnp as $nplan)
        <div class="col-lg-3 col-sm-6 col-md-6">
                        <div class="plan__item">
                            <div class="plan__item-header">
                                <div class="left">
                                    <h5 class="title">{{ $nplan->title }}</h5>
                                    <span>{{ $nplan->slogan }}</span>
                                </div>
                                <div class="right">
                                    <img src="{{url('/')}}/plans/{{$nplan->image}}" />
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
                                            Rs.{{ $nplan->profit_amount }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Duration</span>
                                        <span class="info">
                                            {{ $nplan->duration }} Days
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name ">Total Income</span>
                                        <span class="info">
                                            Rs.{{ number_format($nplan->profit_amount * $nplan->duration,0,',',',') }}
                                        </span>
                                    </li>
                                    <li>
                                        <span class="name">Price</span>
                                        <span class="info">
                                        {{ $nplan->coins }} <img src="{{url('/coin.png')}}" style="width:30px" />
                                        </span>
                                    </li>
                                </ul>
                                
                                <a class="cmn--btn w-100 invest-plan" type="button" data-bs-toggle="modal" data-bs-target="#invest-modal{{$loop->index}}" data-title="Orbit" data-id="9" data-type="1" data-fixAmount="37000">
                                    BUY NOW
                                </a>
                            </div>
                        <!-- </div> -->
                    <!-- </div> -->
         
         <!-- Invest Modal -->
    <div class="modal fade" id="invest-modal{{$loop->index}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="investForm" action="{{url('/user/invest-request')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-body p-4">
                        <h4 class="modal-title text-center plan-title">{{$nplan->title}} Plan</h4>
                        <div class="pt-3 pb-4">
                            <label for="amount" class="form-label" style="color:black" >Plan Amount</label>
                            <div class="input-group input--group">
                             <input type="hidden" name="plan_id" class="form-group-input form-control form--control bg--section" value="{{$nplan->plan_id}}" id="modalAmount">
                             <input type="number" readonly name="coins" class="form-group-input form-control form--control bg--section" value="{{$nplan->coins}}" id="modalAmount">
                                <button type="button" class="input-group-text"><img src="{{url('/coin.png')}}" style="width:30px" /></button>
                            </div>
                        </div>
                        
                        <div class="pt-3 pb-4">
                            <label for="amount" class="form-label" style="color:black" >Plan Information</label>
                            <div class="flex flex-column input-group input--group">
                            <div><span style="color:red" >Daily Earning: Rs.{{$nplan->profit_amount}} </span></div> 
                            <div><span style="color:red" >Total Earning: Rs.{{$nplan->profit_amount * $nplan->duration}} </span></div> 
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="button" class="btn text-white shadow-none btn--danger me-2 w-50"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn shadow-none text-white btn--success w-50">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

       </div>
      </div>
     @endforeach    
     @endif
    @endif
     
     @if(isset($membership) && $membership->status === 'PENDING')
       <div style="display:flex;justify-content:center;align-items:center;height:50vh;width:100%" >
           <h1>You'r Membership Request is in Processing...</h1>
       </div>
     @endif
     
    @if(empty($membership))
      
      
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

                                <a class="cmn--btn w-100 invest-plan" href="{{url('/user/unlock-plans')}}" >
                                    BUY NOW
                                </a>
                            </div>
                        </div>
                    </div>

     @endif
  </div>
</div>
@endsection