<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiChoi;
use Illuminate\Support\Facades\Mail;
use App\Mail\getMail;
use Illuminate\Support\Str;

class SendMailController extends Controller
{
    public function sendMail()
    {
    	$object = new NguoiChoi;
    	$mail = new \stdClass();
    	$mail->xinchao = Str::random(9);
    	Mail::to("hminh50999@gmail.com")->send(new getMail($mail));
    }
}
