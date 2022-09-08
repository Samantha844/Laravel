<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('changeLang','changeLangGet');
        //$this->middleware('guest')->only('changeLang','changeLangGet');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function changeLang(Request $request){

        $session_old = Session::all();
        Session::put('applocale', $request->get('newLocale'));
        $session_new = Session::all();
        //dd($session_old, $session_new);
        //dd($request->get('newLocale'), 'TEST POST');

        $locale_1 = \App::getLocale();;
        \App::setLocale($request->get('newLocale'));
        $locale_2 = \App::getLocale();

        return json_encode(['success' => true, 'locale_1' => $locale_1, 'locale_2' => $locale_2]);

    }

    public function changeLangGet($newLocale){
//dd($newLocale);
        Session::put('applocale', $newLocale);
        \App::setLocale($newLocale);
        //dd($newLocale);
        return json_encode(['success' => true]);

    }
}
