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
    public function update(Request  $request,$id)
    {
        $input = $request->all();
        $validator = Validator::make($input , [
            'name' =>'required',
            // 'c_password' =>'required|same:password',
            // 'image' =>'image|mimes:jpeg,png,jpg,gif,svg',

        ]  );
        if ($image = $request->file('image')) {

          $path = $request->file('image')->store('user');
          $input['image'] =$path;
       }
      if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
          }
      
          $user = User::find($id);
         
          $user->update([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'ville' => $input['ville'],
            'quartier' => $input['quartier'],
            'code_postale' => $input['code_postale'],
            'image' => $input['image'],
          ]);
    return $this->sendResponse(new UsersResource($user) ,'User updated successfully' );

   }
   public function destroy(User $user)
   {
       $user->delete();
       return $this->sendResponse(new UsersResource($user) ,'User deleted successfully' );

   }
}


