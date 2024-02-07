@extends('admin.admin_dashboard') @section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('export') }}" class="btn btn-inverse-danger">Download Excell</a>
        </ol>
    </nav>

    <div class="row profile-body">

        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Import Permission</h6>

                        <form id="myForm" method="post" action="{{ route('import') }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="import_file" class="form-label">XCELL File Import</label>
                                <input type="file" class="form-control" id="import_file" name="import_file" autocomplete="off"/>
                            </div>
                            
                            <button type="submit" class="btn btn-inverse-warning me-2">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->
    </div>
</div>

@endsection
