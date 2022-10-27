<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail as JobsSendMail;
use Illuminate\Http\Request;

use Mail;

use App\Mail\SendMail;

class SendEmailController extends Controller
{

    public function index()
    {

        // Mail::to('kigeh17614@abudat.com')->send(new SendMail());
        dispatch(new JobsSendMail());
        //   if (Mail::failures()) {
        //        return response()->Fail('Sorry! Please try again latter');
        //   }else{
        return response('Great! Successfully send in your mail');
        //  }
    }
}
