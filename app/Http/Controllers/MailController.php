<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function basic_email(){
        $data = array('name'=>"Selmi Seif");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Selmi Seif');
        });
        echo "Basic Email Sent. Check your inbox.";
    }

    public function html_email(){
        $data = array('name'=>"Selmi Seif");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
            $message->from('xyz@gmail.com','Selmi Seif');
        });
        echo "HTML Email Sent. Check your inbox.";
    }

    public function attachment_email(){
        $data = array('name'=>"Selmi Seif");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('xyz@gmail.com','Selmi Seif');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
