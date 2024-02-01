@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Invest History</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
    <h3 class="title">Invest History</h3>
    <ul class="breadcrumb">
        <li>
          <a href="{{url('/user/dashboard')}}">Dashboard</a>
        </li>
        <li>Invest History</li>
    </ul>
</div>

<div class="dashboard--content-item">
    <!-- <h5 class="dashboard-title">Invests</h5> -->
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                    <th>Transaction Id</th>
                    <th>Method</th>
                    <th>Package Name</th>
                    <th>Package Amount</th>
                    <th>duration</th>
                    <th>Status</th>
                    <th>Purchase Date</th>
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
        <div>{{$all_transaction->plan->title}}</div>
              </td>

       <td data-label="Date">
                <div>{{$all_transaction->plan->coins}} Coins</div>
               </td>
       <td data-label="Date">
                <div>{{$all_transaction->plan->duration}} Days</div>
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
                <td colspan="12">
                 <h4 class="text-center m-0 py-2">No Data Found</h4>
                </td>
               </tr>
              @endif    
            </tbody>
        </table>
    </div>
    {{$all_transactions->links('pagination::bootstrap-4')}}
</div>
@endsection