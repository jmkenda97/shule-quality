<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function list(){
        $data['getRecord']=User::getStudent();
        $data['header_title']="Student List ";
        return view('admin.student.list',$data);
    }

    public function add(){
        $data['getClass']= ClassModel::getClass();
        $data['header_title']="Add New Student ";
        return view('admin.student.add',$data);
    }

    public function insert(Request $request){
       request()->validate([
         'email'=>'required|email|unique:users',
         'mobile_number'=>'max:15|min:8',
         'admission_number'=>'max:50',
       ]);
       $student =new User();
       $student->name = trim($request->name);
       $student->last_name = trim($request->last_name);
       $student->admission_number = trim($request->admission_number);
       $student->roll_number = trim($request->roll_number);
       $student->class_id = trim($request->class_id);
       $student->gender = trim($request->gender);
       if(!empty($request->date_of_birth))
       {
           $student->date_of_birth = trim($request->date_of_birth);
       }

       if(!empty($request->file('profile_pic')))
       {
          $ext= $request->file('profile_pic')->getClientOriginalExtension();
          $file = $request->file('profile_pic');
          $randomStr = Str::random(20);
          $filename = strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/',$filename);
          

          $student->profile_pic = $filename;

       }
    
       $student->admission_date = trim($request->admission_date);
       $student->religion = trim($request->religion);
       $student->mobile_number = trim($request->mobile_number);
       if(!empty($request->admission_date))
       {
           $student->admission_date = trim( $request->admission_date);
       }
       $student->blood_group = trim($request->blood_group);
       $student-> height= trim($request->height);
       $student->weight = trim($request->weight);
       $student->status = trim($request->status);
       $student->email = trim($request->email);
       $student->password = Hash::make($request->password);
       $student->user_type = 3;
       $student->save();

       return redirect('admin/student/list')->with('success','student successfuly created');

    }

    public function edit($id){
        $data['getRecord']= User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass']= ClassModel::getClass();
            $data['header_title']="Add New Student ";
            return view('admin.student.edit',$data);  
        }
        else
        {
          abort(404);
        }
    }

   public function update($id,Request $request){
     request()->validate([
         'email'=>'required|email|unique:users,email,' . $id,
         'mobile_number'=>'max:15|min:8',
         'admission_number'=>'max:50',
       ]);
       $student = User::getSingle($id);
       $student->name = trim($request->name);
       $student->last_name = trim($request->last_name);
       $student->admission_number = trim($request->admission_number);
       $student->roll_number = trim($request->roll_number);
       $student->class_id = trim($request->class_id);
       $student->gender = trim($request->gender);
       if(!empty($request->date_of_birth))
       {
           $student->date_of_birth = trim($request->date_of_birth);
       }

       if(!empty($request->file('profile_pic')))
       {
          $ext= $request->file('profile_pic')->getClientOriginalExtension();
          $file = $request->file('profile_pic');
          $randomStr = Str::random(20);
          $filename = strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/',$filename);
          

          $student->profile_pic = $filename;

       }
    
       $student->admission_date = trim($request->admission_date);
       $student->religion = trim($request->religion);
       $student->mobile_number = trim($request->mobile_number);
       if(!empty($request->admission_date))
       {
           $student->admission_date = trim( $request->admission_date);
       }
       $student->blood_group = trim($request->blood_group);
       $student-> height= trim($request->height);
       $student->weight = trim($request->weight);
       $student->status = trim($request->status);
       $student->email = trim($request->email);
       if(!empty($request->password))
       {
        $student->password = Hash::make($request->password);
       }
       $student->save();

       return redirect('admin/student/list')->with('success','student successfuly updated');
   }


   public function delete($id){
    $getRecord = User::getSingle($id);
    if(!empty($getRecord))
    {
        $getRecord->is_deleted   = 1;
        $getRecord->save();

    return redirect()->back()->with('success','student successfuly deleted');

    }
    else
    {
        abort(404);
    }
   }

}
