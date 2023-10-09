<?php

namespace App\Http\Controllers;

use App\Services\FrontService;
use App\Services\UserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{

    public function index(){

        return view('app.front.app');

    }

    // user auth

    public function register(Request $request){
        $rv = UserService::register($request);
        return response()->json($rv, 200);
    }
    public function login(Request $request){
        $rv = UserService::login($request);
        return response()->json($rv, 200);
    }
    public function forgot(Request $request)
    {
        $rv = UserService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = UserService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = UserService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = UserService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = UserService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = UserService::profile_logout($request);
        return response()->json($rv, 200);
    }

    public function category_list(Request $request){
        $rv = FrontService::category_list($request);
        return response()->json($rv, 200);
    }

    public function blog_list(Request $request){
        $rv = FrontService::blog_list($request);
        return response()->json($rv, 200);
    }

    public function company_details(Request $request){
        $rv = FrontService::company_details($request);
        return response()->json($rv, 200);
    }

    public function social_media_details(Request $request){
        $rv = FrontService::social_media_details($request);
        return response()->json($rv, 200);
    }

}
