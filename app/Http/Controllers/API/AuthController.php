<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        // validation
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $authUser = Auth::user();
            if(auth('sanctum')->check()){
                $success['name'] =  $authUser->name;

                $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
                return $this->sendResponse($success, 'User signed in');

            }
            else {
                return $this->sendError('Unauthorised.', ['error'=>'Unauthorized']);

            }
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $updateUser = User::find($user->id);
        // dd($updateUser);

        $success['name'] =  $user->name;

        $updateUser->remember_token = $success['token'];
        $updateUser->save();

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function logout(Request $request)
    {
        auth()->user()->currentAccessToken()->delete();

        return [
            "message"=>"Logged Out"
        ];
    }
}
