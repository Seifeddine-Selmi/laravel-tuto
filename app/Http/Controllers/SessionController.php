<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Get Session value
    public function accessSessionData(Request $request){
        if($request->session()->has('my_name'))
            echo $request->session()->get('my_name');
        else
            echo 'No data in the session';
    }

    // Save Session value
    public function storeSessionData(Request $request){
        $request->session()->put('my_name','Selmi Seif');
        echo "Data has been added to session";
    }

    // Delete Session value
    public function deleteSessionData(Request $request){
        $request->session()->forget('my_name');
        echo "Data has been removed from session.";
    }
}
