@extends('adminDashboard.layout.main')
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
<div class="dashboard--content-item">
      <div class="dashboard--wrapper">
        <div class="dashboard--width">
          <div class="dashboard-card h-100">

              <div class="dashboard-card__header">
                  <div class="dashboard-card__header__icon">
					<img src="{{url('/c1.png')}}" alt="wallet">
                  </div>
                  <div class="dashboard-card__header__cont">
                      <h6 class="name">Total Members</h6>
                      <div class="balance">{{$all_users}}</div>
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
                        <h6 class="name">Active&nbsp;Members</h6>
                        <div class="balance">{{$active_users}}</div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="dashboard--width">
            <div class="dashboard-card h-100">

                <div class="dashboard-card__header">
                    <div class="dashboard-card__header__icon">
                        <img src="{{url('/c3.png')}}" alt="wallet">
                    </div>
                    <div class="dashboard-card__header__cont">
                        <h6 class="name">Total Coins Invested(<img src="{{url('/coin.png')}}" style="width:25px" />)</h6>
                        <div class="balance">{{$coins_invest}} (Coins)</div>
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
                        <h6 class="name">Membership Request's</h6>
                        <div class="balance">{{$join_req}}</div>
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
                        <h6 class="name">Membership Request's(Rs.)</h6>
                        <div class="balance">Rs.{{$total_join_req}}</div>
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
                        <h6 class="name">Total Membership Income</h6>
                        <div class="balance">Rs.{{$total_join_inc}}</div>
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
                        <h6 class="name">Withdraw Request's
						</h6>
                        <div class="balance">{{$withdraw_req}}</div>
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
                        <h6 class="name">Withdraw Request's(Rs.)</h6>
                        <div class="balance">Rs.{{$total_withdraw_req}}</div>
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
					<th>Wallet Address</th>
					<th>Amount</th>
					<th>Date</th>
				  </tr>
			  </thead>
			  <tbody>
             @foreach($all_trans as $all_tran) 
			  <tr>
						<td data-label="No">
							<div>
							<span class="text-muted">{{$loop->index}}</span>
							</div>
						</td>

						<td data-label="Type">
							<div>
							{{$all_tran->type}}
							</div>
						</td>

						<td data-label="Txnid">
							<div>
							{{$all_tran->wallet_address}}
							</div>
						</td>

						<td data-label="Amount">
							<div>
							@if($all_tran->type == 'INVEST' || $all_tran->type == 'MAIN ACCOUNT')
							<p class="text-success">{{$all_tran->plan->amount}} Coins</p>
							@else
							<p class="text-danger">Rs.{{$all_tran->amount}}</p>
						    @endif	
						</div>
						</td>

						<td data-label="Date">
							<div>
							{{$all_tran->created_at}}
							</div>
						</td>
					</tr>
			  	@endforeach				  				  	        
			  </tbody>
		  </table>
	  </div>
</div>
@endsection