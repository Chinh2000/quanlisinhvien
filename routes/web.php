
<?php

use Illuminate\Support\Facades\Route;

route::get("login","LoginController@login")->name("login");

// login students
route::get("login_student","LoginController@login_student")->name("login_student");
route::post("process_login_student","LoginController@process_login_student")->name("process_login_student");
// login admin
route::get("login_admin","LoginController@login_admin")->name("login_admin");
route::post("process_login_admin","LoginController@process_login_admin")->name("process_login_admin");
// login teacher
route::get("login_teacher","LoginController@login_teacher")->name("login_teacher");
route::post("process_login_teacher","LoginController@process_login_teacher")->name("process_login_teacher");


// middleware
route::group(['middleware' => 'CheckLogin'],function(){
	route::get("","Controller@index")->name("index");

	// logout
	$controller="LoginController";
	route::group(["prefix"=> "login" , "as" => "login."],function() use ($controller){
		route::get("logout","$controller@logout")->name("logout");
	});

	//hoc sinh
	$controller="StudentsController";
	route::group(["prefix"=> "students" , "as" => "students."],function() use ($controller){

		route::get("","$controller@show_students")->name("show_students");
		route::get("view_insert_students","$controller@view_insert_students")->name("view_insert_students");
		route::post("process_insert_students","$controller@process_insert_students")->name("process_insert_students");
		route::get("delete/{id}","$controller@delete")->name("delete");
		route::get("view_update_students/{id}","$controller@view_update_students")->name("view_update_students");
		route::post("process_update_students/{id}","$controller@process_update_students")->name("process_update_students");

	});

	// giao vien
	$controller="TeacherController";
	route::group(["prefix"=> "teacher" , "as" => "teacher."],function() use ($controller){

		route::get("","$controller@show_teacher")->name("show_teacher");
		route::get("view_insert_teacher","$controller@view_insert_teacher")->name("view_insert_teacher");
		route::post("process_insert_teacher","$controller@process_insert_teacher")->name("process_insert_teacher");
		route::get("delete/{id}","$controller@delete")->name("delete");
		route::get("view_update_teacher/{id}","$controller@view_update_teacher")->name("view_update_teacher");
		route::post("process_update_teacher/{id}","$controller@process_update_teacher")->name("process_update_teacher");

	});

	// khoa hoc
	$controller="CourseController"; 
	route::group(["prefix"=> "course" , "as" => "course."],function() use ($controller){

		route::get("","$controller@show_course")->name("show_course");
		route::get("view_insert_course","$controller@view_insert_course")->name("view_insert_course");
		route::post("process_insert_course","$controller@process_insert_course")->name("process_insert_course");
		route::get("delete/{id}","$controller@delete")->name("delete");
		route::get("view_update_course/{id}","$controller@view_update_course")->name("view_update_course");
		route::post("process_update_course/{id}","$controller@process_update_course")->name("process_update_course");

	});

	// nganh hoc
	$controller="DisciplineController"; 
	route::group(["prefix"=> "discipline" , "as" => "discipline."],function() use ($controller){

		route::get("","$controller@show_discipline")->name("show_discipline");
		route::get("view_insert_discipline","$controller@view_insert_discipline")->name("view_insert_discipline");
		route::post("process_insert_discipline","$controller@process_insert_discipline")->name("process_insert_discipline");
		route::get("delete/{id}","$controller@delete")->name("delete");
		route::get("view_update_discipline/{id}","$controller@view_update_discipline")->name("view_update_discipline");
		route::post("process_update_discipline/{id}","$controller@process_update_discipline")->name("process_update_discipline");

	});

	//mon hoc
	
	$controller="SubjectController"; 
	route::group(["prefix"=> "subject" , "as" => "subject."],function() use ($controller){

		route::get("","$controller@show_subject")->name("show_subject");
		route::get("view_insert_subject","$controller@view_insert_subject")->name("view_insert_subject");
		// route::post("process_insert_discipline","$controller@process_insert_discipline")->name("process_insert_discipline");
		// route::get("delete/{id}","$controller@delete")->name("delete");
		// route::get("view_update_discipline/{id}","$controller@view_update_discipline")->name("view_update_discipline");
		// route::post("process_update_discipline/{id}","$controller@process_update_discipline")->name("process_update_discipline");

	});
});
	
