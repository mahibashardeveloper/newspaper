<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserService extends BaseController
{

    public static function register($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'full_name' => 'required',
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:6|confirmed',
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->avatar = $request->avatar ?? null;
            $user->save();
            return ['status' => 200, 'msg' => 'Registration Complete.']; } catch (\Exception $e) {

            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];

        }

    }

    public static function login($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|min:6'
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $credential = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard('users')->attempt($credential, $request->remember)) {
                return ['status' => 200, 'data' => Auth::guard('users')->user()];
            } else {
                return ['status' => 500, 'errors' => ['error' => 'Invalid Credentials! Please try again']];
            }
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function forgot($request)
    {
        try {
            $input = $request->input();
            $validator = Validator::make($input, [
                'email' => 'required|email'
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }
            $userInfo = User::where('email', $input['email'])->first();
            if ($userInfo == null) {
                return ['status' => 500, 'error' => ['email' => ['Email not found.']]];

            }
            $reset_code = rand(100000, 999999);
            $userInfo->reset_code = $reset_code;
            $userInfo->save();
            Mail::send('emails.forgot', ['userInfo' => $userInfo], function ($message) use ($userInfo) {
                $message->to($userInfo['email'], $userInfo['name'])->subject(env('MAIL_FROM_NAME') . ': Password reset code');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
            return ['status' => 200, 'msg' => 'A reset code has been sent to your email.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public static function reset($request)
    {
        try {
            $input = $request->input();
            $validator = Validator::make($input, [
                'email' => 'required|email',
                'code' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);
            if ($validator->fails()) {
                return ['status' => 500, 'error' => $validator->errors()];
            }
            $userInfo = User::where(['email' => $input['email'], 'reset_code' => $input['code']])->first();
            if ($userInfo == null) {
                return ['status' => 500, 'error' => ['code' => ['Invalid request. Kindly check your reset code please.']]];
            }
            if (Hash::check($input['password'], $userInfo['password'])) {
                return ['status' => 500, 'error' => ['password' => ['Password repetition is not allowed. Please try another password']]];
            }
            $userInfo->password = bcrypt($input['password']);
            $userInfo->reset_code = null;
            $userInfo->save();
            return ['status' => 200, 'msg' => 'The password has been reset successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'error' => $e->getMessage()];
        }
    }

    public static function profile_details($request)
    {
        try {
            $user_id = Auth::guard('users')->id();
            $user = User::with('media')->where('id', $user_id)->first();
            return ['status' => 200, 'data' => $user];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function profile_update($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'full_name' => 'required',
                    'email' => 'required|email',
                    'avatar' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = User::where('id', Auth::guard('users')->id())->first();
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->avatar = $request->avatar ?? null;
            $user->save();
            return ['status' => 200,];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function profile_password($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'password' => 'required|min:6|confirmed',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = User::where('id', Auth::guard('users')->id())->first();
            $user->password = bcrypt($request->password);
            $user->save();
            return ['status' => 200,];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function profile_logout($request)
    {
        try {
            Auth::guard('users')->logout();
            return ['status' => 200 ];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function userList($request)
    {
        try {
            $limit = $request->limit ?? 10000;
            $keyword = $request->q ?? '';
            $results = User::orderBy('id', 'desc');
            if (isset($keyword) && !empty($keyword)) {
                $results->where(function ($q) use ($keyword) {
                    $q->orWhere('full_name', 'LIKE', '%' . $keyword . '%');
                    $q->orWhere('email', 'LIKE', '%' . $keyword . '%');
                });
            }
            $paginatedData = $results->paginate($limit);
            return ['status' => 200, 'data' => $paginatedData];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function userSingle($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'id' => 'required',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = User::where('id', $request->id)->first();
            if($user == null){
                return ['status' => 500, 'errors' => 'data not found'];
            }
            return ['status' => 200, 'data' => $user];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function userDelete($request)
    {
        try {
            User::whereIn('id', $request->ids)->delete();
            return ['status' => 200, 'msg' => 'data has been deleted successfully'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

}
