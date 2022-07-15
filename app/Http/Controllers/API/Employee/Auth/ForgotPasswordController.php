<?php

namespace App\Http\Controllers\API\Employee\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends BaseController
{

    public function sendResetLink(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:employees,email',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Authentication Failed', $validator->errors()->all(),);
        }

        $token = Str::random(64);
        DB::table('password_resets')->where([
            'email' => $request->email,
            'auth_type' => 'employee'
        ])->delete();

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'auth_type' => 'employee'
        ]);

        Mail::send('emails.employee.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject(env('APP_NAME') . ' Account Reset Password');
        });

        return $this->sendResponse([], 'We have e-mailed your password reset link!');
    }


    public function reset_password(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email|exists:employees,email',
            'token' => 'required|string|exists:password_resets',
            'password' => 'required|string|same:c_password'
        ], [
            'token.exists' => 'Given otp has been expired'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Authentication Failed', $validator->errors()->all(),);
        }

        $password_reset = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
            'auth_type' => 'employee'
        ])->first();

        if (isset($password_reset)) {

            Employee::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email,
                'auth_type' => 'employee'
            ])->delete();
        } else {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }
        return $this->sendResponse([], 'Password has been successfully changed!');
    }
}
