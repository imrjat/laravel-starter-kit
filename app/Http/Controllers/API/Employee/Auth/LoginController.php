<?php

namespace App\Http\Controllers\API\Employee\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Employee;

use Illuminate\Support\Facades\Hash;
use Validator;

class LoginController extends BaseController
{

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:employees,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Authentication Failed', $validator->errors()->all(),);
        }

        $user = Employee::where('email', $request->email)->first();
        // verified
        // dd($user->hasVerifiedEmail());
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                try {
                    //code...
                    $token = $user->createToken('employee', ['employee'])->accessToken;

                    $response = ['token' => $token];

                    return $this->sendResponse($response, 'You are logged in successfully.');

                } catch (\Throwable $th) {
                    //throw $th;
                    $response = ["message" => $th->getMessage()];
                    return $this->sendError('Authentication Failed', ['Password mismatch']);
                }
               


            } else {
                $response = ["message" => ""];
                return $this->sendError('Authentication Failed', ['Password mismatch']);

            }
        } else {
            $response = ["message" => 'User does not exist'];
            return $this->sendError('Authentication Failed', ['User does not exist']);

        }
    }
}
