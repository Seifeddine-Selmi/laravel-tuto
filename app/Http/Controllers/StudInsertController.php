<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class StudInsertController extends Controller
{
    public function insertform(){
        return view('students.stud_create');
    }

    public function insert(Request $request){
        $name = $request->input('stud_name');
        DB::insert('insert into students (name) values(?)',[$name]);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
        return redirect()->action('StudInsertController@insertform');
    }
}
