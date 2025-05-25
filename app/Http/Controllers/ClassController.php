<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ClassController extends Controller
{
    public function list(){
        $data['getRecord']=ClassModel::getRecord();
        $data['header_title']='Class List ';
        return view('admin.class.list',$data);

    }

    public function add(){
        $data['header_title']='Add New Class ';
        return view('admin/class/add',$data);
    }

    public function insert(Request $request){
        $save= new ClassModel;
        $save->class_name=$request->class_name;
        $save->status=$request->status;
        $save->created_by= Auth::user()->id;
        $save->save();
        
    return redirect("admin/class/list")->with('success',"class successfully created");
    }

    public function edit($id){
        $data['getRecord']=ClassModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']="Edit Class ";
            return view('admin.class.edit',$data);
        }
        else{
            abort(404);
        }
    }

    public function update($id,Request $request){
        $save=ClassModel::getSingle($id);
        $save->class_name=$request->class_name;
        $save->status=$request->status;
        $save->save();

        return redirect('admin/class/list')->with('ssuccess','class successfully created');
    }

    public function delete($id){
        $save = ClassModel::getSingle($id);
        $save->is_deleted = 1;
        $save->save();

        return redirect()->back()->with('success','class successfully deleted');

    }
}
