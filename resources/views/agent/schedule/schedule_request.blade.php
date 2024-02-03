@extends('agent.agent_dashboard') @section('agent')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
           
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">Schedule Request</h6>
                
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Property</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($userScheduleData as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->user->name??'' }}</td>
                            <td>{{ $item->property->property_name??'' }}</td>
                            <td>{{ $item->tour_date }}</td>
                            <td>{{ $item->tour_time }}</td>
                            <td>@if ($item->status==1)
                                <span class="badge rounded-pill bg-success">Confirm</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('details.agent.property',$item->id) }}" class="btn btn-inverse-info" title="details"> <i data-feather="eye"></i></a>
                                <a href="{{ route('edit.agent.property',$item->id) }}" class="btn btn-inverse-warning"> Edit</a>
                            </td>
    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
@endsection