@extends('admin.admin_dashboard') @section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.agent') }}" class="btn btn-inverse-info">Add Agent</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">All Agent</h6>
                
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Change</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_agent as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ (!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no_image.jpg') }}" alt="" style="width: 70px; height:40px;"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->role }}</td>
                            <td>@if ($item->status=='active')
                                <span class="badge rounded-pill bg-success">Active</span>
                                @else
                                <span class="badge rounded-pill bg-danger">In Active</span>
                                @endif
                            </td>
                            <td><input data-id="{{ $item->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $item->status=='inactive' ? 'checked' : '' }}></td>
                            <td>
                                <a href="{{ route('edit.agent',$item->id) }}" class="btn btn-inverse-warning"> Edit</a>
                                <a href="{{ route('delete.agent',$item->id) }}"  class="btn btn-inverse-danger" id="delete">Delete</a>
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
<script type="text/javascript">
    $(function() {
      $('.toggle-class').change(function() {
          var user_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'user_id': user_id},
              success: function(data){
                // console.log(data.success)
                  // Start Message 
              const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success', 
                    showConfirmButton: false,
                    timer: 3000 
              })
              if ($.isEmptyObject(data.error)) {
                      
                      Toast.fire({
                      type: 'success',
                      title: data.success, 
                      })
              }else{
                 
             Toast.fire({
                      type: 'error',
                      title: data.error, 
                      })
                  }
                // End Message   
              }
          });
      })
    })
  </script>
@endsection