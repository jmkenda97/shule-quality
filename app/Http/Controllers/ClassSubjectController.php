<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list(Request $request){
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title']='Subject Assign List';
        return view('admin.assign_subject.list',$data);
    }

    public function add(Request $request){
      $data['getClass'] = ClassModel::getClass();
      $data['getSubject'] = SubjectModel::getSubject();
      $data['header_title']='Assign Subject Add';
        return view('admin.assign_subject.add',$data);
    }

    public function insert(Request $request){
       if(!empty($request->subject_id))
       {
           foreach($request->subject_id as $subject_id)
           {
              $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
              if(!empty($getAlreadyFirst))
              {
                 $getAlreadyFirst->status = $request->status;
                 $getAlreadyFirst->save();
              }else
              {
                  
                  $save = new ClassSubjectModel;
                  $save->class_id = $request->class_id;
                  $save->subject_id = $subject_id;
                  $save->status = $request->status;
                  $save->created_by = Auth::user()->id;
                  $save->save();
    
              }
            }
            return redirect('admin/assign_subject/list')->with('success','subject successfull assign to class');
       }
       else
       {
         return redirect()->back()->with('error','due to some error please try again');
       }

    }

    public function edit($id, Request $request){
      $getRecord= ClassSubjectModel::getSingle($id);
       if(!empty($getRecord))
       {
           $data['getRecord']=$getRecord;
           $data['getAssignSubjectID']=ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
           $data['getClass'] = ClassModel::getClass();
           $data['getSubject'] = SubjectModel::getSubject();
           $data['header_title']='Edit assign Subject';
             return view('admin.assign_subject.edit',$data);

       }else
       {
            abort(404);
       }
    }

    public function update(Request $request){
      ClassSubjectModel::deleteSubject($request->class_id);
      if(!empty($request->subject_id))
       {
           foreach($request->subject_id as $subject_id)
           {
              $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
              if(!empty($getAlreadyFirst))
              {
                 $getAlreadyFirst->status = $request->status;
                 $getAlreadyFirst->save();
              }else
              {
                  
                  $save = new ClassSubjectModel;
                  $save->class_id = $request->class_id;
                  $save->subject_id = $subject_id;
                  $save->status = $request->status;
                  $save->created_by = Auth::user()->id;
                  $save->save();
    
              }
            }
          }
          return redirect('admin/assign_subject/list')->with('success','subject successfull Edited to class');
    }
    public function delete($id){
        $save=ClassSubjectModel::getSingle($id);
        $save->is_delete=1;
        $save->save();

        return redirect()->back()->with('success','Record successfully deleted');

    }

    public function edit_single($id){
      $getRecord= ClassSubjectModel::getSingle($id);
       if(!empty($getRecord))
       {
           $data['getRecord']=$getRecord;
           $data['getClass'] = ClassModel::getClass();
           $data['getSubject'] = SubjectModel::getSubject();
           $data['header_title']='Edit assign Subject';
             return view('admin.assign_subject.edit_single',$data);

       }else
       {
            abort(404);
       }
    }


    public function update_single($id ,Request $request){        
           
              $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
              if(!empty($getAlreadyFirst))
              {
                 $getAlreadyFirst->status = $request->status;
                 $getAlreadyFirst->save();

              return redirect('admin/assign_subject/list')->with('success','status succesfully updated');

              }else
              {
                  
                  $save = ClassSubjectModel::getSingle($id);
                  $save->class_id = $request->class_id;
                  $save->subject_id = $request->subject_id;
                  $save->status = $request->status;
                  $save->save();
    
                  return redirect('admin/assign_subject/list')->with('success','subject successfull Edited to class');
              }
       }      
          
    
}
