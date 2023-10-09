<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use App\Services\CategoryService;
use App\Services\BlogService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

    public function index(){
        return view('app.admin.app');
    }

    // admin auth

    public function login(Request $request){
        $rv = AdminService::login($request);
        return response()->json($rv, 200);
    }

    public function forgot(Request $request)
    {
        $rv = AdminService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = AdminService::reset($request);
        return response()->json($rv, 200);
    }

    public function profile_details(Request $request)
    {
        $rv = AdminService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = AdminService::profile_update($request);
        return response()->json($rv, 200);
    }

    public function profile_password(Request $request)
    {
        $rv = AdminService::profile_password($request);
        return response()->json($rv, 200);
    }

    public function profile_logout(Request $request)
    {
        $rv = AdminService::profile_logout($request);
        return response()->json($rv, 200);
    }

    public function settings_details(Request $request)
    {
        $rv = AdminService::settings_details($request);
        return response()->json($rv, 200);
    }

    public function settings_update(Request $request)
    {
        $rv = AdminService::settings_update($request);
        return response()->json($rv, 200);
    }

    public function company_details(Request $request)
    {
        $rv = AdminService::company_details($request);
        return response()->json($rv, 200);
    }

    public function company_update(Request $request)
    {
        $rv = AdminService::company_update($request);
        return response()->json($rv, 200);
    }

    // category

    public function categoryCreate(Request $request){
        $rv = CategoryService::categoryCreate($request);
        return response()->json($rv, 200);
    }

    public function categoryList(Request $request){
        $rv = CategoryService::categoryList($request);
        return response()->json($rv, 200);
    }

    public function categorySingle(Request $request){
        $rv = CategoryService::categorySingle($request);
        return response()->json($rv, 200);
    }

    public function categoryUpdate(Request $request){
        $rv = CategoryService::categoryUpdate($request);
        return response()->json($rv, 200);
    }

    public function categoryDelete(Request $request){
        $rv = CategoryService::categoryDelete($request);
        return response()->json($rv, 200);
    }

    // blog

    public function blogCreate(Request $request){
        $rv = BlogService::blogCreate($request);
        return response()->json($rv, 200);
    }

    public function blogList(Request $request){
        $rv = BlogService::blogList($request);
        return response()->json($rv, 200);
    }

    public function blogSingle(Request $request){
        $rv = BlogService::blogSingle($request);
        return response()->json($rv, 200);
    }

    public function blogUpdate(Request $request){
        $rv = BlogService::blogUpdate($request);
        return response()->json($rv, 200);
    }

    public function blogDelete(Request $request){
        $rv = BlogService::blogDelete($request);
        return response()->json($rv, 200);
    }

    public function user_list(Request $request){
        $rv = UserService::user_list($request);
        return response()->json($rv, 200);
    }

}
