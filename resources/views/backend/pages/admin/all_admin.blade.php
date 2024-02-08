@extends('admin.admin_dashboard') @section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.admin.user') }}" class="btn btn-inverse-info">Add Admin</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Admin</h6>
                
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.jpg') }}" alt="" style="width: 70px; height:40px;"></td>
                            <td>{{ $item->name??'' }}</td>
                            <td>{{ $item->email??'' }}</td>
                            <td>{{ $item->phone??''}}</td>
                            <td>
                            @foreach ($item->roles as $role)
                                <span class="badge badge-pill bg-danger"> {{ $role->name??'' }}</span>
                            @endforeach
                            </td>
                            <td>
                                <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-inverse-warning"> Edit</a>
                                <a href="{{ route('delete.admin.user',$item->id) }}"  class="btn btn-inverse-danger" id="delete">Delete</a>
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