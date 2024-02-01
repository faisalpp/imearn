@extends('adminDashboard.layout.main')
@section('main')
@push('title')
<title>Withdraw Gateway</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
  <h3 class="title">Withdraw Gateway</h3>
  <ul class="breadcrumb">
      <li>
        <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      </li>

      <li>Withdraw Gateway</li>
  </ul>
</div>
@if(session()->has('success'))
<div>
 <h5 class="text-success text-center mb-2" >{{session()->get('success')}}</h5>
</div>
@endif
<div class="text-end">
      <button type="button" type="button" data-bs-toggle="modal" data-bs-target="#invest-modal" class="cmn--btn">Create Gateway</button>
</div>
<!-- Invest Modal -->
<div class="modal fade" id="invest-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="investForm" action="{{url('/admin/create-withdraw-gateway')}}" method="post">
                        @csrf
                        <div class="modal-body p-4">
                            <h4 class="modal-title text-center plan-title">Create Gateway</h4>
                            <div class="pt-3 pb-4">
                                <div id="payment-wallet" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Receiver Name</label>
                                    @error('acc_holder')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="acc_holder" type="text" id="payment-wallet" >
                                </div>
                                <div id="payment-wallet" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Bank Name</label>
                                    @error('bank_name')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="bank_name" type="text" id="payment-wallet" >
                                </div>
                                <div id="payment-wallet2" class="mb-3">
                                    <label for="formFile" class="form-label" style="color:black">Account Number</label>
                                    @error('acc_number')
                                        <label style="color:red;font-size:0.7rem" for="fullname-error" class="form-label text-sm ">{{$message}}</label>    
                                    @enderror
                                    <input class="form-control" name="acc_number" type="text" id="payment-wallet2">
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
    @if(isset($gateways))
        <table class="table bg--body mt-2">
            <thead>
                <tr>
                  <th>Receiver Name</th>
                  <th>Bank Name</th>
                  <th>Account Number</th>
                  <th>Action</th>
                  <th>Created At</th>
                </tr>
            </thead>
            <tbody>
              @foreach($gateways as $gateway)
              <form action="{{url('/admin/update-withdraw-gateway')}}" method="post" >
                @csrf
              <input type="hidden" name="id" value="{{$gateway->id}}" />
              <tr>
               <td data-label="No"><div><input name="acc_holder" value="{{$gateway->acc_holder}}" style="width:fit-content" /></div></td>
               <td data-label="Txnid"><input name="acc_number" value="{{$gateway->acc_number}}" style="width:fit-content" /></td>
               <td data-label="Date"><input name="bank_name" value="{{$gateway->bank_name}}" style="width:fit-content" /></div></td>
               <td data-label="Date">
                <button type="submit" class="cmn--btn" style="height:35px !important" >Update</button>
                <a href="{{url('/admin/delete-withdraw-gateway')}}/{{$gateway->id}}" ><button type="button" class="cmn--btn" style="background-color:red !important;height:35px !important" >Delete</button></a>
               </td>
               <td data-label="Date"><div>{{$gateway->created_at->format('j F,Y')}}</div></td>
             </tr>
             </form>
              @endforeach
            </tbody>
        </table>
            @else
            <tr>
              <td colspan="12">
               <h4 class="text-center m-0 py-2">No Data Found</h4>
              </td>
             </tr>
            @endif    
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