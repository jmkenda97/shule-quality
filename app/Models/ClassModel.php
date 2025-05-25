<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Request;


class ClassModel extends Model
{
    use HasFactory;
    protected $table='class';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
     $return =ClassModel::select('class.*','users.name as created_by_name')
                ->join('users','users.id','class.created_by');
                  
                if(!empty(Request::get('class_name'))){
                    $return = $return->where('class.class_name','like', '%'.Request::get('class_name').'%');
                }
                 if(!empty(Request::get('date')))
              {
                $return=$return->whereDate('class.created_at','=',Request::get('date'));
              }

     $return = $return->where('class.is_deleted','=',0)
                ->orderby('class.id','desc') 
                ->paginate(20);

     return $return;
    }
   
    static public function getClass()
    {
        $return =ClassModel::select('class.*',)
                ->join('users','users.id','class.created_by')
                ->where('class.is_deleted','=', 0)
                ->where('class.status','=', 0)
                ->orderby('class.class_name','asc')
                ->get();

     return $return;
    }
}
