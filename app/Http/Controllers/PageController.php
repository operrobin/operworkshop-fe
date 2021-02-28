<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

use Session;

use App\Model\NoSQL\BookingUri;

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

    public function bookingStatusScreen($booking_uri){
        $resultSet = BookingUri
                        ::where('booking_uri', $booking_uri)
                        ->get()
                        ->first();

        /**
         * If Booking Uri is not found, redirect to booking page.
         */
        if(empty($resultSet)){
            return redirect('/booking');
        }

        return view(
            'independent/customer-services-status',
            [
                "data" => $resultSet
            ]
        );
    }
}
