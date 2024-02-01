@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>Manage Plans</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Manage Plans</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      </li>

      <li>Manage Plans</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
<div class="col-sm-12 mb-2">
  <div class="text-end">
      <button type="submit" type="button" data-bs-toggle="modal" data-bs-target="#invest-modal" class="cmn--btn">Create New Plan</button>
  </div>

           <!-- Invest Modal -->
           <div class="modal fade" id="invest-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="investForm" action="{{url('/admin/create-plan')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-body p-4">
                            <h4 class="modal-title text-center plan-title">Create New Plan</h4>
                            <div class="pt-3 pb-4">
                                <div id="payment-wallet" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Title</label>
                                    @error('title')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="title" type="text" id="payment-wallet" >
                                </div>
                                <div class="d-flex justify-content-between" >
                                
                                <div id="payment-wallet" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Sub Title</label>
                                    @error('sub-title')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="sub-title" type="text" id="payment-wallet" >
                                </div>
                                <div id="payment-wallet" class="mb-3 mx-2">
                                    <label for="formFile" class="form-label" style="color:black">Coins Amount</label>
                                    @error('coins')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="coins" type="text" id="payment-wallet" >
                                </div>
                                </div>
                                <div class="d-flex justify-content-between" >
                                <div id="payment-wallet2" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Daily Incom</label>
                                    @error('profit_amount')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="profit_amount" type="text" id="payment-wallet2">
                                </div>
                                <div id="payment-wallet2" class="mb-3 mx-2">
                                    <label for="formFile" class="form-label" style="color:black">Duration (Days)</label>
                                    @error('duration')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="duration" type="text" id="payment-wallet2">
                                </div>
                                </div>
                                <div id="payment-wallet2" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Plan Icon</label>
                                    @error('image')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="image" type="file" id="payment-wallet2">
                                </div>
                            </div>
                            <div class="d-flex">
                                <button type="button" class="btn shadow-none btn--danger me-2 w-50"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn shadow-none btn--success w-50">Proceed</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                  <th>Title</th>
                  <th>Sub Title</th>
                  <th>Coins</th>
                  <th>Profit</th>
                  <th>Duration(Days)</th>
                  <th>Actions
                  </th>
                  <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @if(isset($plans))
              @foreach($plans as $plan)
              <form action="{{url('/admin/update-plan')}}" method="post" >
                @csrf
              <input type="hidden" name="plan_id" value="{{$plan->plan_id}}" />
              <tr>
               <td data-label="Txnid"><input name="title" value="{{$plan->title}}" style="width:100px" /> </div></td>
               <td data-label="Txnid"><input name="sub-title" value="{{$plan->slogan}}" style="width:100px" /> </div></td>
               <td data-label="Date"><input name="coins" value="{{$plan->coins}}" style="width:100px" /></div></td>
               <td data-label="Date">Rs.<input name="profit_amount" value="{{$plan->profit_amount}}" style="width:100px" /></div></td>
               <td data-label="Date"><input name="duration" value="{{$plan->duration}}" style="width:100px" /></div></td>
               <td data-label="Date">
               <div class="text-end">
                <button type="submit" type="button" class="cmn--btn" style="height:35px">Save</button>
               </div></td>
               <td data-label="Date"><div>{{$plan->created_at->format('j F,Y')}}</div></td>
             </tr>
             </form>
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


@endsection