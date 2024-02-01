@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>User Profile</title>
@endpush
<div class="dashborad--content">
				
<div class="breadcrumb-area">
  <h3 class="title">User Profile</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/user/dashboard')}}">Dashboard</a>
      </li>
      <li>User Profile</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
<div class="dashboard--content-item">
    <div id="request-form">
    @csrf
    <div class="profile--card">
      <div class="user--profile mb-5">
          <div class="thumb">
             @if($user->profile->image != '')
             <img src="{{url('/profile-images')}}/{{$user->profile->image}}" style="height: 160px;width:160px;border-radius:20%" alt="clients">
             @else
             <img src="{{url('/profile-images')}}/alt-img.png" style="height: 160px;width:160px;border-radius:100%" alt="clients">
            @endif
            </div>
          <div class="remove-thumb">
              <i class="fas fa-times"></i>
          </div>
          <div class="content">
              <div>
                  <h3 class="title">
                      {{$user->user_name}}
                  </h3>
                  <a href="#0" class="text--base">
                      {{$user->email}}
                  </a>
              </div>
              <form id="img-frm" class="mt-4" action="{{url('/admin/profile-image/update')}}" method="post" enctype="multipart/form-data" >
                @csrf  
                <label class="btn btn-sm btn--base text--dark">
                      Select Image <input type="file" id="profile-image-upload" name="image" hidden>
                  </label>
                  <button type="submit" class="btn btn-primary" style="background-color: white !important;border:2px solid #D5A953;color:#D5A953" >Upload</button>
                </form>
          </div>
      </div>

          <form class="row gy-4" action="{{url('/admin/profile-update')}}" method="post">
            @csrf
              <div class="col-sm-6 col-xxl-4">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" id="name" name="full_name" autocomplete="full_name" class="form-control" value="{{$user->full_name}}">
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="email" class="form-label">Email Address</label>
                  <input type="email" id="email" autocomplete="email" class="form-control"
                      value="{{$user->email}}" readonly>
              </div>

              <div class="col-sm-6 col-xxl-4">
                  <label for="phone" class="form-label">Phone Number</label>
                  <div class="input-group">
                      <input type="text" autocomplete="phone" name="phone" id="phone" class="form-control" value="{{$user->profile->phone}}">
                  </div>
              </div>



              <div class="col-sm-6 col-xxl-4">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" autocomplete="city" value="{{$user->profile->city}}">
              </div>

              <div class="col-sm-6 col-xxl-4">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address"  name="address" class="form-control" autocomplete="address" value="{{$user->profile->address}}">
              </div>

              <div class="col-sm-12">
                  <div class="text-end">
                      <button type="submit" class="cmn--btn">Update Profile</button>
                  </div>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection