<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailVerificationController extends Controller
{

    public function index(Request $request)
    {
        $email = $request->input('email');
        $request->session()->put('email', $email);
        $code = rand(100000, 999999);

        $request->session()->put('email_verification_code', $code);


        Mail::raw("Tasdiqlash kodi: $code", function ($message) use ($request) {
            $message->to($request->input('email'))
                ->subject('Tasdiqlash kodi');
        });

        return view('createuseremail');

    }

    public function create(Request $request)
    {
//        return view('getthecode');
    }



    public function store(Request $request){
        $userCode     = $request->get('userCode');
        $email        = $request->session()->get('email');

        if($userCode == $request->session()->get('email_verification_code')){
            dd($userCode,$email);
        }
    }

}
