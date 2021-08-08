<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\users as UsersResource;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsersController extends BaseController
{
    public function index()
    {
        $user = User::all();
        return $this->sendResponse(UsersResource::collection($user),
          'All users sent');
    }
    public function show($id)
    {
        $user = User::find($id);
        if ( is_null($user) ) {
            return $this->sendError('User not found'  );
              }
              return $this->sendResponse(new UsersResource($user) ,'User found successfully' );
    }
    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'password' =>'required',
            'c_password' =>'required|same:password',
            'image' =>'image|mimes:jpeg,png,jpg,gif,svg',

        ]  );
        if ($image = $request->file('image')) {

          $path = $request->file('image')->store('user');
       }
      if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
          $input['password'] = Hash::make($input['password']);
          $user->name = $input['name'];
          $user->email = $input['email'];
          $user->password = $input['password'];
          $user->phone= $input['phone'];
          $user->ville= $input['ville'];
          $user->quartier= $input['quartier'];
          $user->code_postale= $input['code_postale'];
          $user->image= $input['image'];
          $user->update();
    return $this->sendResponse(new UsersResource($user) ,'User updated successfully' );

   }
   public function destroy(User $user)
   {
       $user->delete();
       return $this->sendResponse(new UsersResource($user) ,'User deleted successfully' );

   }
}


