<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function show_teacher(Request $rq){
        $search = $rq->search;
    	$array_list = Teacher::where('name','like',"%$search%")->paginate(4);
        return view('teacher.show_teacher',[
         'array_list'=> $array_list,
         'search'=> $search
        ]);

    }
    public function view_insert_teacher(){
    	return view('teacher.insert');
    }
    public function process_insert_teacher(Request $rq){
    	
        
        Teacher::create($rq->all()); 

    	return redirect()->route('teacher.show_teacher');

    }
    public function delete($id)
    {


        Teacher::find($id)->delete();
    	return redirect()->route('teacher.show_teacher');

    }
    public function view_update_teacher($id){
    	
        $teacher= Teacher::find($id);
    	return view('teacher.edit',[
    		'teacher'=> $teacher,
    	]);

    }
    public function process_update_teacher(Request $rq,$id){
        $name    = $rq->name;
        $date    = $rq->date;
        $address = $rq->address;
        $gender  = $rq->gender;
        // $email   = $rq->email;
        $phone   = $rq->phone;
        
        $password = $rq->password;
    	DB::table('teacher')->where('id',$id)->update([
    		'name'=> $name,
    		'date'=> $date,
    		'address'=> $address,
    		'gender'=> $gender,
            // 'email' => $email,
            'phone' => $phone,
           
            'password' => $password,
    	]);
        // SinhVienLop::find($id)->update($rq->all());
       
    	return redirect()->route('teacher.show_teacher');
    }
}