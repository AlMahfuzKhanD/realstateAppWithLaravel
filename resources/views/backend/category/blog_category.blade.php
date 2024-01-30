@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Category
              </button>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h6 class="card-title">Category</h6>
                
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog_category as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category_name??'' }}</td>
                            <td>{{ $item->category_slug??'' }}</td>
                            <td>
                                <button type="button" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#catagoryEdit" id="{{ $item->id }}" onclick="categoryEdit(this.id)">
                                    Edit
                                </button>
                                <a href="{{ route('delete.blog.category',$item->id) }}"  class="btn btn-inverse-danger" id="delete">Delete</a>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form id="myForm" method="post" action="{{ route('store.blog.category') }}" class="forms-sample">
         @csrf
        <div class="modal-body">
            
                
                <div class="form-group mb-3">
                    <label for="category_name" class="form-label">Blog Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name"  autofocus>
                </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-inverse-info">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!--Edit Modal -->
<div class="modal fade" id="catagoryEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form id="myForm" method="post" action="{{ route('update.blog.category') }}" class="forms-sample">
            
         @csrf
        <div class="modal-body">
            
                
                <div class="form-group mb-3">
                    <label for="category_name_edit" class="form-label">Blog Category Name</label>
                    <input type="text" class="form-control" id="category_name_edit" name="category_name_edit"  autofocus>
                    <input type="hidden" class="form-control" id="cat_id" name="cat_id"  >
                </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-inverse-info">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <script>
$(document).ready(function () {
    $('.modal').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus();
    });
    $('.modal').on('show.bs.modal', function(e) {
        var activeElement = document.activeElement;
        $(this).on('hidden.bs.modal', function () {
            activeElement.focus();
            $(this).off('hidden.bs.modal');    
        });
    });
});

function categoryEdit(id){
    $.ajax({
        type: 'GET',
        url: '/blog/category/'+id,
        dataType: 'json',

        success:function(data){
            $('#category_name_edit').val(data.category_name);
            $('#cat_id').val(data.id);
        }
    });
}
  </script>
@endsection