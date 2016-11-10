<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudUpdateController extends Controller
{
    public function index(){
        $users = DB::select('select * from students');
        return view('students.stud_edit_view',['users'=>$users]);
    }
    public function show($id) {
        $users = DB::select('select * from students where id = ?',[$id]);
        return view('students.stud_update',['users'=>$users]);
    }
    public function edit(Request $request,$id) {
        $name = $request->input('stud_name');
        DB::update('update students set name = ? where id = ?',[$name,$id]);
      //  echo "Record updated successfully.<br/>";
       // echo '<a href = "/edit-records">Click Here</a> to go back.';
        return redirect()->action('StudUpdateController@index');

    }
}
