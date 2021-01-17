<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Mail\Mailable;
use App\Post;
use App\User;
class SendEmailController extends Controller
{
    public function index()
    {
        return view('properties.index');
    }
    
    function send(Request $request, Post $post)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message,
        );

        $mail = $post->user->email;
        Mail::to($mail)->send(new SendMail($data));

        return back()->with('success', 'Message sent successfully.');

    }
}
