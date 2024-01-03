@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
           
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Package History</h6>
                
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Package</th>
                        <th>Invoice</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($package_info as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ (!empty($item->user->photo)) ? url('upload/agent_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt="" style="width: 70px; height:40px;"></td>
                            <td>{{ $item->user->name??'' }}</td>
                            <td>{{ $item->package_name??'' }}</td>
                            <td>{{ $item->invoice??'' }}</td>
                            <td>{{ $item->package_amount??'' }}</td>
                            <td>
                                <a href="{{ route('package.invoice',$item->id) }}" class="btn btn-inverse-info" title="download"> <i data-feather="download"></i></a>
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