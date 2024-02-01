@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>Manage Plans</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Manage Users</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      </li>

      <li>Manage Users</li>
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
                  <th>User Name</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Ref By</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @if(isset($users))
              @foreach($users as $user)
              <tr>
               <td data-label="No"><div><span class="text-muted">{{$user->user_name}}</span></div></td>
               <td data-label="Txnid"><div>{{$user->full_name}}</div></td>
               <td data-label="Date"><div>{{$user->email}}</div></td>
               <td data-label="Date"><div>{{$user->ref_by}}</div></td>
               @if($user->is_blocked == 1)
               <td data-label="Date"><div>Blocked</div></td>
               @else
               <td data-label="Date"><div>Active</div></td>
               @endif
               @if($user->is_blocked == 1)
               <td data-label="Date"><form id="ublk-usr{{$user->user_id}}" action="{{url('/admin/unblock-user')}}" method="post" >@csrf<input type="hidden" name="user_id" value="{{$user->user_id}}" /><i onclick="document.getElementById('ublk-usr{{$user->user_id}}').submit();" class="fa fa-user-check" style="color: green;cursor: pointer;" ></i></form></td>
               @else
               <td data-label="Date"><form id="blk-usr{{$user->user_id}}" action="{{url('/admin/block-user')}}" method="post" >@csrf<input type="hidden" name="user_id" value="{{$user->user_id}}" /><i onclick="document.getElementById('blk-usr{{$user->user_id}}').submit();" class="fa fa-user-slash" style="color:red;cursor: pointer;"></i></form></td>
               @endif
               <td data-label="Date"><div>{{$user->created_at->format('j F,Y')}}</div></td>
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
    
</div>


<div class="modal fade confirm-modal" id="modal-success" aria-modal="true" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <form id="requestMoney" action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="vbuiDCo6JDo7SB6dnPp2DXk3WBLOLHYipSvqzzaL">          <div class="modal-body p-4">
            <h4 class="modal-title text-center" id="withdrawModalTitle">Receive Request Money</h4>
              <div class="modal-body text-center py-4">
                <p class="text-center">You are about to change the status.</p>
                <p class="text-center">Do you want to proceed?</p>
              </div>

              <div class="d-flex">
                  <button type="button" class="btn shadow-none btn--danger me-2 w-50" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn shadow-none btn--success w-50">Proceed</button>
              </div>
          </div>
        </form>
      </div>
  </div>
</div>
@endsection