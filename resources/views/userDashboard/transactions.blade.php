@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Transactions</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
	<h3 class="title">Transactions</h3>
	<ul class="breadcrumb">
		<li>
			<a href="{{url('/user/dashboard')}}">Dashboard</a>
		</li>
  
		<li>Transactions</li>
	</ul>
</div>

<div class="dashboard--content-item">
	  <div class="table-responsive table--mobile-lg">
		  <table class="table bg--body">
			  <thead>
				  <tr>
					<th>No</th>
					<th>Type</th>
					<th>Sender</th>
					<th>Bank Name</th>
					<th>Amount</th>
					<th>Alert</th>
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
		 <td data-label="Txnid">
		   @if($all_transaction->type == 'INVEST' || $all_transaction->type == 'WITHDRAW')
		       <div>Main Wallet</div>
			@else
		       <div>{{$all_transaction->bank_name}}</div>
			@endif
				</td>
		 <td data-label="Amount">
		          @if($all_transaction->status == 'APPROVED' )
		           <div><p style="color:green">
		             @if($all_transaction->type == 'MEMBERSHIP FEE')
		               Rs.{{$all_transaction->amount}}
		             @elseif($all_transaction->type == 'INVEST')
		             {{$all_transaction->plan->coins}} Coins
		             @else
		               Rs.{{$all_transaction->amount}}
		             @endif
		           </p></div>
		          @endif
		          @if($all_transaction->status == 'REJECTED' )
		           <div><p style="color:red">
		             @if($all_transaction->type == 'MEMBERSHIP FEE')
		               Rs.{{$all_transaction->amount}}
		             @elseif($all_transaction->type == 'INVEST')
		              {{$all_transaction->plan->coins}} Coins
		             @else
		               Rs.{{$all_transaction->amount}}
		             @endif
		           </p></div>
		          @endif
		          @if($all_transaction->status == 'EXPIRED' )
		           <div><p style="color:black">
		             @if($all_transaction->type == 'MEMBERSHIP FEE')
		               Rs.{{$all_transaction->amount}}
		             @elseif($all_transaction->type == 'INVEST')
		              {{$all_transaction->plan->coins}} Coins
		             @else
		               Rs.{{$all_transaction->amount}}
		             @endif
		           </p></div>
		          @endif
		          @if($all_transaction->status == 'PENDING' )
		           <div><p style="color:orange">
		             @if($all_transaction->type == 'MEMBERSHIP FEE')
		               Rs.{{$all_transaction->amount}}
		             @elseif($all_transaction->type == 'INVEST')
		              {{$all_transaction->plan->coins}} Coins
		             @else
		               Rs.{{$all_transaction->amount}}
		             @endif
		           </p></div>
		          @endif
		          
		          
		  
				 </td>
		         <td data-label="Date">
				  @if($all_transaction->status === 'REJECTED')
				   
				  
				  <!-- Button trigger modal -->
				  <button type="button" style="border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button" data-bs-toggle="modal" data-bs-target="#invest-modal{{$loop->index}}">Message</button>
                <!-- Modal -->
				<div class="modal fade" id="invest-modal{{$loop->index}}">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-body p-4">
                            <h4 class="modal-title text-center plan-title">Rejection Message</h4>
                            
                            <div class="d-flex mt-2 p-4" style="border:2px solid blue;border-left:none;border-right:none;" >
                               {{$all_transaction->message}}
                            </div>
                         </div>
                </div>
            </div>
        </div>
		@else
		N/A 
		@endif
				 </td>
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
		{{ $all_transactions->links('pagination::bootstrap-4') }}
	</div>
@endsection