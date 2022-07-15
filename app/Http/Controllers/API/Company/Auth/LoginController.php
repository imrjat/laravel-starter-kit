<?php 
namespace App\Http\Controllers\API\Company\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'email' => 'required|email|exists:companies,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Authentication Failed', $validator->errors()->all(),);
        }

        $user = Company::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                try {
                    $token =  $user->createToken('company', ['company'])->accessToken;
                } catch (\Throwable $th) {
                    return $this->sendError($th->getMessage(), $validator->errors());
                }

                $response = ['token' => $token];
                $response['name'] =  $user->name;

                return $this->sendResponse($response, 'You are logged in successfully.');
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