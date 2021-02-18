<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

use Session;

class PageController extends Controller
{
    public function splashScreen(){
        $agent = new Agent();

        // if($agent->isPhone())
            return view('splash-screen/splash-screen-page-1');

        // return redirect("/intro");
    }

    public function introductionScreen(){
        if(Session::get('customer_phone') != null){
            return redirect('/booking');
        }

        return view('introduction-screen/introduction-screen');
    }

    public function authenticateScreen(){
        return view('otp/otp');
    }

    public function bookingScreen(){
        if(Session::get('customer_phone') === null){
            return redirect('/authenticate');
        }

        return view('booking/booking');
    }
}
