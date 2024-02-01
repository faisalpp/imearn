@extends('userDashboard.layout.main')
@section('main')
@push('title')
<title>Referrals Commission</title>
@endpush
<div class="dashborad--content">
				<div class="breadcrumb-area">
    <h3 class="title">Refferal Commissions</h3>
    <ul class="breadcrumb">
        <li>
            <a href="{{url('/user/dashboard')}}">Dashboard</a>
        </li>
        <li>Refferal Commissions</li>
    </ul>
</div>

<div class="dashboard--content-item">
    <div class="table-responsive table--mobile-lg">
        <table class="table bg--body">
            <thead>
                <tr>
                    <th>Referral Name</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($refTrans))
                @foreach($refTrans as $refTran)
                <tr>
                    <td data-label="Date">
                          <div>
                            {{$refTran->user->user_name}}
                          </div>
                      </td>

                      <td data-label="Type">
                          <div>
                            {{$refTran->type}}
                          </div>
                      </td>

                      <td data-label="From">
                          <div>
                            ${{$refTran->amount}}
                          </div>
                        </td>
                        
                        <td data-label="Amount">
                            <div>
                              {{$refTran->created_at->format('j F,Y')}}
                            </div>
                        </td>
                    </tr>
                 @endforeach    
                 @endif              
          </tbody>
        </table>
    </div>
    
</div>
@endsection