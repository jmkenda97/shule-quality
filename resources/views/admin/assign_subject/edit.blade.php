@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Edit Assign Subject</h1>
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
                    <label>Class name</label>
                    <select class="form-control" name="class_id" required>
                        <option value="">--select Class--</option>
                     @foreach($getClass as $class)
                     <option {{ ($getRecord->class_id ==$class->id) ? 'selected' :'' }} value="{{$class->id}}">{{$class->class_name}}</option>
                     @endforeach
                    </select> 
                  </div> 

                   <div class="form-group">
                    <label>Subject name</label>
                     @foreach($getSubject as $subject)
                           @php
                            $checked = "";
                           @endphp
                           @foreach($getAssignSubjectID as $subjectAssign)
                           @if($subjectAssign->subject_id == $subject->id)
                            @php
                            $checked = "checked";
                           @endphp
                          @endif
                           @endforeach
                     <div>
                     <label style="font-weight: normal">
                        <input {{$checked}} type="checkbox" value="{{ $subject->id }}"  name="subject_id[]" >{{$subject->subject_name}}
                     </label>
                    </div>
                     @endforeach
                  </div> 

                  
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                     <option value="">--Select Status--</option>
                     <option {{($getRecord->status==0) ? 'selected':''}} value="0">Active</option>
                     <option {{($getRecord->status==1) ? 'selected':''}} value="1">Inactive</option>
                    </select>
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
