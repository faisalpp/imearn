@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Referrals</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
    <h3 class="title">My Referrals</h3>
    <ul class="breadcrumb">
        <li>
            <a href="{{url('/user/dashboard')}}">Dashboard</a>
        </li>
        <li>My Referrals</li>
    </ul>
</div>

<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                    <tr>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Joined At</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                @if($ref_users)
                @foreach($ref_users as $ref_user)
                <tr>
                <td data-label="No"><div><span class="text-muted">{{$ref_user->user_name}}</span></div></td>
               <td data-label="Typ"><div>{{$ref_user->user_name}}</div></td>
               <td data-label="Txnid"><div>{{$ref_user->email}}</div></td>
               <td data-label="Txnid"><div>{{$ref_user->profile->phone}}</div></td>
            
               <td data-label="Date">
                   <div>{{$ref_user->created_at->format('j F,Y')}}</div>
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
    {{$ref_users->links('pagination::bootstrap-4')}}
</div>
@endsection