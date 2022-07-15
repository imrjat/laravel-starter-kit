<?php
namespace App\Http\Controllers\API\Employee\Auth;

use App\Http\Controllers\API\BaseController;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends BaseController {

    public function __construct() {
        $this->middleware('auth:api')->except(['employee.email.verification.verify']);
    }

    /**
     * Verify email
     *
     * @param $user_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function verify($user_id, Request $request) {
        if (! $request->hasValidSignature()) {
            return $this->sendError([], 'Account verified successfully.');
        }

        $user = Employee::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            $user->status =1;
            $user->save();
        }

        return $this->sendResponse([], 'Account verified successfully.');


    }


    public function resend() {

        $employee = Employee::findOrFail(Auth::Id());

        if ($employee->hasVerifiedEmail()) {
            return $this->sendError([], 'Your email is already verified');
        }

        $employee->sendEmailVerificationNotification();

        return $this->respondWithMessage("Email verification link sent on your email id");
    }

}