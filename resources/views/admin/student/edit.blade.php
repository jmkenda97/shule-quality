@extends('layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Student</h1>
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
              <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                
                    <div class="row">
                  <div class="form-group col-md-6">
                    <label>First Name <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('name',$getRecord->name)}}" required name="name" placeholder="First Name">
                    <div style="color: lightcoral">{{$errors->first('name')}}</div>
                  </div> 
                    <div class="form-group col-md-6">
                    <label>Last Name <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('last_name',$getRecord->last_name)}}" required name="last_name" placeholder="Last Name">
                    <div style="color: lightcoral">{{$errors->first('last_name')}}</div>
                  </div> 
            
  
                   <div class="form-group col-md-6">
                    <label>Admission Number <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('admission_number',$getRecord->admission_number)}}" required name="admission_number" placeholder="Admission Number">
                    <div style="color: lightcoral">{{$errors->first('admission_number')}}</div>
                  </div> 
                   <div class="form-group col-md-6">
                    <label>Roll Number <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('roll_number',$getRecord->roll_number)}}" required name="roll_number" placeholder="roll Number">
                    <div style="color: lightcoral">{{$errors->first('roll_number')}}</div>

                  </div> 
                
                  <div class="form-group col-md-6">
                    <label>Class <span style="color: lightcoral">*</span></label>
                    <select class="form-control"  required name="class_id">
                        <option value="">--Select Class--</option>
                        @foreach($getClass as $value)
                          <option {{(old('class_id',$getRecord->class_id)==$value->id) ? 'selected':''}} value="{{$value->id}}">{{$value->class_name}}</option>
                        @endforeach
                    </select>
                    <div style="color: lightcoral">{{$errors->first('class_id')}}</div>

                </div>

                 <div class="form-group col-md-6">
                    <label>Gender <span style="color: lightcoral">*</span></label>
                    <select class="form-control" required name="gender">
                        <option value="">--Select Gender--</option>
                        <option {{(old('gender',$getRecord->gender)=='male') ? 'selected':''}} value="male">male</option>
                        <option {{(old('gender',$getRecord->gender)=='female') ? 'selected':''}}value="female">female</option>
                        <option {{(old('gender',$getRecord->gender)=='other') ? 'selected':''}}value="other">others</option>
                    </select>
                    <div style="color: lightcoral">{{$errors->first('gender')}}</div>
                </div>
           
                  <div class="form-group col-md-6">
                    <label>Date of Birth <span style="color: lightcoral">*</span></label>
                    <input type="date" class="form-control" value="{{old('date_of_birth',$getRecord->date_of_birth)}}" required name="date_of_birth" placeholder="date_of_birth">
                    <div style="color: lightcoral">{{$errors->first('date_of_birth')}}</div>
                  </div> 

                    <div class="form-group col-md-6">
                    <label>Caste <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('caste',$getRecord->caste)}}"  name="caste" placeholder="caste">
                    <div style="color: lightcoral">{{$errors->first('caste')}}</div>
                  </div> 

                  <div class="form-group col-md-6">
                    <label>Religion <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('religion',$getRecord->religion)}}"  name="religion" placeholder="Religion">
                    <div style="color: lightcoral">{{$errors->first('religion')}}</div>
                     </div> 

                    <div class="form-group col-md-6">
                    <label>Mobile Number <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('mobile_number',$getRecord->mobile_number)}}" required name="mobile_number" placeholder="mobile_number">
                    <div style="color: lightcoral">{{$errors->first('mobile_number')}}</div>
                  </div> 
          
                   <div class="form-group col-md-6">
                    <label>Admission Date <span style="color: lightcoral">*</span></label>
                    <input type="date" class="form-control" value="{{old('admission_date',$getRecord->admission_date)}}" name="admission_date" placeholder="admission date">
                    <div style="color: lightcoral">{{$errors->first('admission_date')}}</div>
                  </div> 

                   <div class="form-group col-md-6">
                    <label>Profile Picture <span style="color: lightcoral">*</span></label>
                    <input type="file" class="form-control" name="profile_pic" placeholder="profile_pic">
                    <div style="color: lightcoral">{{$errors->first('profile_pic')}}</div>
                    @if(!empty($getRecord->getProfile()))
                    <img src="{{ $getRecord->getProfile() }}" style="width:auto;height:50px;">
                    @endif
                  </div> 

                  <div class="form-group col-md-6">
                    <label>Blood Group <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('blood_group',$getRecord->blood_group)}}"  name="blood_group" placeholder="blood_group">
                      <div style="color: lightcoral">{{$errors->first('blood_group')}}</div>
                  </div> 

                   <div class="form-group col-md-6">
                    <label>Weight <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('height',$getRecord->weight)}}" required name="weight" placeholder="weight">
                    <div style="color: lightcoral">{{$errors->first('weight')}}</div>
                  </div> 
                   <div class="form-group col-md-6">
                    <label>Height <span style="color: lightcoral">*</span></label>
                    <input type="text" class="form-control" value="{{old('height',$getRecord->height)}}" required name="height" placeholder="height">
                    <div style="color: lightcoral">{{$errors->first('height')}}</div>
                  </div> 
                   
                   <div class="form-group col-md-6">
                    <label>Status <span style="color: lightcoral">*</span></label>
                    <select class="form-control" required name="status">
                        <option value="">--Select Status--</option>
                        <option {{(old('status',$getRecord->status)=='0') ? 'selected':''}} value="0">active</option>
                        <option {{(old('status',$getRecord->status)=='1') ? 'selected':''}} value="1">inactive</option>
                    </select>
                    <div style="color: lightcoral">{{$errors->first('status')}}</div>
                </div>
            </div>
               <br/>
                  
                    <label >Email <span style="color: lightcoral">*</span></label>
                    <input type="email" class="form-control" value="{{old('email',$getRecord->email)}}" required name="email"  placeholder="email">
                    <div style="color: lightcoral">{{$errors->first('email')}}</div>
                  
                
                    <label>Password <span style="color: lightcoral"></span></label>
                    <input type="text" class="form-control"  name="password"  placeholder="Password">
                    <a>Do you want to change password.Add new password</a>
                
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
