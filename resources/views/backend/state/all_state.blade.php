@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.state') }}" class="btn btn-inverse-info">Add State</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All State</h6>
                
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>State name</th>
                        <th>State Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($state as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->state_name }}</td>
                            <td><img src="{{ (!empty($item->state_imag)) ? url('/'.$item->state_imag) : url('upload/no_image.jpg') }}" alt="" style="width: 70px; height:40px;"></td>
                            
                            <td>
                                <a href="{{ route('edit.state',$item->id) }}" class="btn btn-inverse-warning"> Edit</a>
                                <a href="{{ route('delete.state',$item->id) }}"  class="btn btn-inverse-danger" id="delete">Delete</a>
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