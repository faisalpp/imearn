@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Dashboard</title>
@endpush

<div class="dashborad--content">
				
<div class="breadcrumb-area">
  <h3 class="title">Dashboard</h3>
  <ul class="breadcrumb">
      <li>
          <a href="{{url('/user/dashboard')}}">Dashboard</a>
      </li>
      <li>Dashboard</li>
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
@if(isset($membership))
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $membership->expiration_date; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>


@endif

@if(isset($membership))
<div class="col-10 my-3 mx-auto" >
 <div class="d-flex flex-column col-12 px-3 pt-2 pb-3" style="background:white;border:1px solid #e5e5e5;;" > 
  <h4 class="text-center" style="color:#00A2FE" >MEMBERSHIP INFORMATION</h4>
  <div class="d-flex flex-lg-row flex-column col-12" >
   <div class="d-flex flex-lg-row flex-column col-lg-7 col-12" >
    <span style="color:black my-2" >Expirtation Status:</span> 
    <p class="mx-2 my-2" style="color:red" id="demo"></p>
   </div>
   <div class="d-flex justify-content-end mt-2" >
    <a href="{{url('/user/extend-days')}}" ><button type="button" style="background-color:orange !important" data-bs-toggle="modal" data-bs-target="#invest-modal35" class="cmn--btn2">Extend Memberhsip (Rs.100 Per Day)</button></a>
   </div>
</div>
 </div>
</div>
@endif

<div class="dashboard--content-item">
      <div class="dashboard--wrapper">
        <div class="dashboard--width">
          <div class="dashboard-card h-100">
           <div class="dashboard-card__header">
            <div class="dashboard-card__header__icon">
	   	     <img src="{{url('/c1.png')}}" alt="wallet">
            </div>
            <div class="dashboard-card__header__cont">
             <h6 class="name">Main Balance</h6>
             <div class="balance">Rs.{{$userAcc->balance}}</div>
            </div>
           </div>
          </div>
       </div>

        <div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c2.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Total Coins</h6>
                        <div class="balance">{{$userAcc->coins}}</div>
                    </div>
                </div>
            </div>
        </div>

		<div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c4.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Coins&nbsp;Invested</h6>
                        <div class="balance">{{$approved_deposit_amount}}</div>
                    </div>
                </div>
            </div>
        </div>

      
        <div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c5.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Latest Withdraw</h6>
                        @if(isset($latest_withdraw))
                         <div class="balance">Rs.{{$latest_withdraw->amount}}</div>
                        @else
                         <div class="balance">Rs.0</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

		<div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c5.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Pending Withdraw</h6>
                        <div class="balance">Rs.{{$pending_withdraw_amount}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c7.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Last Transaction</h6>
                        @if(isset($last_deposit))
						 @if($last_deposit->type == 'INVEST')
                          <div class="balance">{{$last_deposit->plan->coins}} Coins</div>
                         @else
						  <div class="balance">Rs.{{$last_deposit->amount}}</div>
                          @endif
                          @else
						  <div class="balance">Rs.0</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c8.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Total Referrals</h6>
						<div class="balance">{{$total_referrals}}</div>
                    </div>
                </div>
            </div>
        </div>

		<div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c8.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Active Referrals</h6>
                        <div class="balance">{{$active_referrals}}</div>
                    </div>
                </div>
            </div>
        </div>

		<div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c6.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Total Refferal Bonus</h6>
                        @if(isset($total_ref_bonus))
                         <div class="balance">Rs.{{$total_ref_bonus}}</div>
                        @else
                         <div class="balance">Rs.0</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

		<div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c6.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Latest Refferal</h6>
                        @if(isset($latest_ref))
                        <div class="balance">{{$latest_ref->user_name}}</div>
                        @else
                        <div class="balance">N/A</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

  </div>
</div>

<div class="dashboard--content-item">
  <div class="row gy-4">
      <div class="col-md-12">
          <div class="dashboard--content-item">
              <h5 class="dashboard-title">Referral URL</h5>
              <div class="dashboard-refer">
                  <div class="input-group input--group">
                      <input type="text" class="form-control form--control" readonly
                          value="{{url('/register/ref')}}/{{session()->get('user')['userName']}}" id="cronjobURL">
                      <button class="input-group-text px-3 btn--primary border-0" type="button" id="copyBoard" onclick="myFunction()">
                          <i class="far fa-copy"></i>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="dashboard--content-item">
	  <div class="table-responsive table--mobile-lg">
		  <table class="table bg--body">
			  <thead>
				  <tr>
					<th>No</th>
					<th>Type</th>
					<th>Account Number</th>
					<th>Amount</th>
					<th>Status</th>
					<th>Date</th>
				  </tr>
			  </thead>
			  <tbody>
                @if(isset($all_transactions))
                @foreach($all_transactions as $all_transaction)
                <tr>
                 <td data-label="No">
				  <div><span class="text-muted">{{$loop->index}}</span></div>
				 </td>
                 <td data-label="Typ">
				  <div>{{$all_transaction->type}}</div>
                </td>
				 <td data-label="Txnid">
				  @if($all_transaction->type == 'INVEST')
				  <div>N/A</div>
				  @else
				  <div>{{$all_transaction->wallet_address}}</div>
				  @endif
                </td>
				 <td data-label="Amount">
                  @if($all_transaction->type == 'INVEST' )
				  <div><p class="text-danger">{{$all_transaction->plan->coins}} Coins</p></div>
                  @else
                  @if($all_transaction->type == 'REFERRAL BONUS')
				   <div><p class="text-success">Rs.{{$all_transaction->amount}}</p></div>
                  @else
				   <div><p class="text-danger">Rs.{{$all_transaction->amount}}</p></div>
                  @endif
				  @endif
                 </td>
				 <td data-label="Date">
                  <div>{{$all_transaction->status}}</div>
                 </td>
				 <td data-label="Date">
                  <div>{{$all_transaction->created_at->format('j F,Y')}}</div>
                 </td>
				</tr>
                @endforeach
                @else
                 <tr>
                   <td>No Record Found!</td> 
                 </tr>
                @endif
			  </tbody>
		  </table>
	  </div>
</div>
@endsection