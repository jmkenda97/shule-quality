@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Admin</h1>
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
                    <label>Name</label>
                    <input type="text" class="form-control" required name="name" value="{{old('name', $getRecord->name)}}" placeholder="Name">
                  </div> 

                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" required name="email"  value="{{old('email',$getRecord->email)}}" placeholder="email">
                    <div style="color: lightcoral">{{$errors->first('email')}}</div>

                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" required  name="password"  value="{{old('password', $getRecord->password)}}" placeholder="Password">
                    <p>Do you want to change password so please add new password </p>
                  </div>
                  
                    
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
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
