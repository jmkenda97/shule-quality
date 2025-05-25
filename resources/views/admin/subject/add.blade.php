@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Subject</h1>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            
              <!-- form start -->
              <form method="post" action="">
                @csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label>Subject name</label>
                    <input type="text" class="form-control"   name="subject_name" placeholder="Subject name">
                  </div> 

                   <div class="form-group">
                    <label> Subject Type</label>
                    <select class="form-control" name="subject_type" required>
                     <option value="">--Select Type--</option>
                     <option value="theory">Theory</option>
                     <option value="practical">Practical</option>
                    </select>
                </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                     <option value="">--Select Status--</option>
                     <option value="0">Active</option>
                     <option value="1">Inactive</option>
                    </select>
                </div>
                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

   
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
