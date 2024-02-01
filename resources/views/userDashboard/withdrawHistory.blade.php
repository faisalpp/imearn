@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Withdraw History</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Withdraw History</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/user/dashboard')}}">Dashboard</a>
      </li>

      <li>Withdraw History</li>
  </ul>
</div>

<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                  <th>Transaction Id</th>
                  <th>Wallet Address</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Message</th>
                  <th>Date</th>
                </tr>
            </thead>
            <tbody>
              @if(isset($withdraws_history))
              @foreach($withdraws_history as $withdraw_history)
              <tr>
               <td data-label="No"><div><span class="text-muted">{{$loop->index}}</span></div></td>
               <td data-label="Txnid"><div>{{$withdraw_history->wallet_address}}</div></td>
               <td data-label="Date"><div>Rs.{{$withdraw_history->amount}}</div></td>
               <td data-label="Date">
                @if($withdraw_history->status == "APPROVED")
                <div class="text-success" >{{$withdraw_history->status}}</div>
                @elseif($withdraw_history->status == "REJECTED")
                <div class="text-alert" >{{$withdraw_history->status}}</div>
                @else
                <div style="color:blue" >{{$withdraw_history->status}}</div>
                @endif 
              </td>
               <td data-label="Date">
               @if($withdraw_history->message === '')
				   N/A 
				  @else
				  
				  <!-- Button trigger modal -->
				  <button type="button" style="border:none;background-color:#9A2441 !important;" class="btn btn-danger proof-button" data-bs-toggle="modal" data-bs-target="#invest-modal{{$loop->index}}">Message</button>
                <!-- Modal -->
				<div class="modal fade" id="invest-modal{{$loop->index}}">
            <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-body p-4">
                            <h4 class="modal-title text-center plan-title">Rejection Message</h4>
                            
                            <div class="d-flex mt-2 p-4" style="border:2px solid blue;border-left:none;border-right:none;" >
                               {{$withdraw_history->message}}
                            </div>
                         </div>
                </div>
            </div>
        </div>
		@endif
               </td>
               <td data-label="Date"><div>{{$withdraw_history->created_at->format('j F,Y')}}</div></td>
             </tr>
              @endforeach
              @else
              <tr>
                <td colspan="12">
                 <h4 class="text-center m-0 py-2">No Data Found</h4>
                </td>
               </tr>
              @endif    
            </tbody>
          </table>
          {{$withdraws_history->links('pagination::bootstrap-4')}}
    </div>
</div>
@endsection