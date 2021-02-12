<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

use Session;

class PageController extends Controller
{
    public function splashScreen(Request $request){
        $agent = new Agent();

        if($agent->isPhone())
            return view('splash-screen/splash-screen-page-1');

        return redirect("/intro");
    }

    public function introductionScreen(){
        return view('introduction-screen/introduction-screen');
    }

    public function bookingScreen(){
        return view('booking/booking');
    }
}
