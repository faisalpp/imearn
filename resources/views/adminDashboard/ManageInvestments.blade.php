@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>Manage Investments</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Manage Users</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      </li>

      <li>Manage Investments</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                  <th>Transaction Id</th>
                  <th>Type</th>
                  <th>UserName</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @if(isset($investments))
              @foreach($investments as $investment)
              <tr>
               <td data-label="Date"><div>{{$investment->user_name}}</div></td>
               <td data-label="Date"><div>{{$investment->plan->coins}}</div></td>
               <td data-label="Date"><div>{{$investment->status}}</div></td>
               @if($investment->status == 'PENDING')
               <td data-label="Date" class="d-flex justify-content-center">
                <a href="{{url('/admin/approve-investment')}}/{{$investment->transaction_id}}" ><span style="display:flex;justify-content:center;align-items:center;width:25px;height:25px;background-color:rgb(164, 247, 164);border-radius:100%;" class="mx-2">
                  <i class="fa fa-check" style="color: green;cursor: pointer;" ></i>
                </span></a>
                <a href="{{url('/admin/reject-investment')}}/{{$investment->transaction_id}}" ><span style="display:flex;justify-content:center;align-items:center;width:25px;height:25px;background-color:rgb(250, 148, 148);border-radius:100%;" class="mx-2">
                  <i class="fa fa-ban" style="color: red;cursor: pointer;" ></i>
                </span></a>
               </td>
               @else
               <td data-label="Date">N/A</td>
               @endif
               <td data-label="Date"><div>{{$investment->created_at->format('j F,Y')}}</div></td>
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
    {{$investments->links('pagination::bootstrap-4')}}    
</div>



@endsection