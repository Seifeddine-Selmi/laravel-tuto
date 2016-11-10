<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class StudViewController extends Controller
{
    public function index(){
        $users = DB::select('select * from students');
        return view('students.stud_view',['users'=>$users]);
    }
}
