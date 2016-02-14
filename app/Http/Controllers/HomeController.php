<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Organisation;
use App\User;
use App\UsersOrganisationRoles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'root']);
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


    public function root()
    {
        /*UsersOrganisationRoles::create([
            'user_id' => 40,
            'organisation_id' => 51,
            'role_id' => 52
        ]);

        dump(session('hasOwner'));
        dd(session('userHasOneRowInOrganisation'));*/
        return view('welcome');
    }
}
