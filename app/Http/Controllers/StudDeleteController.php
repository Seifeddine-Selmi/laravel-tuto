<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudDeleteController extends Controller
{
    public function index(){
        $users = DB::select('select * from students');
        return view('students.stud_delete_view',['users'=>$users]);
    }
    public function destroy($id) {
        DB::delete('delete from students where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href="/delete-records">Click Here</a> to go back.';
        return redirect()->action('StudDeleteController@index');
    }
}
