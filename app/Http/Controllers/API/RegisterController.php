<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BaseController
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|email',
            'password' =>'required',
            'c_password' =>'required|same:password',
            'phone' =>'required',
            'ville' =>'required',
            'quartier' =>'required',
            'code_postale' =>'required',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        if ($image = $request->file('image')) {

            $path = $request->file('image')->store('user');
         }
        if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
        }
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['image'] =$path;
            $user = User::create($input);
            $user->role = 'client';
            $success['token'] = $user->createToken('walid')->accessToken;
            $success['name'] = $user->name;
        return $this->sendResponse($success ,'User registered successfully' );
    }
    
    public function login(Request $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            // $success['token'] = $user->createToken('walid')->accessToken;
            if ($user->role == 'admin') {
                $success['token'] = $user->createToken('walid', ['do_any'])->accessToken;
            }else {
                $success['token'] = $user->createToken('walid', ['can_shop'])->accessToken;
            }
            $success['name'] = $user->name;
            return $this->sendResponse($success ,'User login successfully' );
        }
        else{
            return $this->sendError('Please check your Auth' ,['error'=> 'Unauthorised'] );
        }


    }
    public function logout(Request $request)
    {
    $user = Auth::user();
    $success['token'] = $user->token();
    $success['token']->revoke();
    // $request->user()->token()->revoke();
    return $this->sendResponse($success ,'User logout successfully' );

    }
}


