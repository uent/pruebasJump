<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;

class ApiController extends Controller
{

  public function accessToken(Request $request)

  {

     $validate = $this->validations($request,"login");

     if($validate["error"]){

         return $this->prepareResult(false, [], $validate['errors'],"Error while validating user");

     }

     $user = User::where("email",$request->email)->first();

     if($user){

         if (Hash::check($request->password,$user->password)) {

             return $this->prepareResult(true, ["accessToken" => $user->createToken('Todo App')->accessToken], [],"User Verified");

         }else{

             return $this->prepareResult(false, [], ["password" => "Wrong passowrd"],"Password not matched");

         }

     }else{

         return $this->prepareResult(false, [], ["email" => "Unable to find user"],"User not found");

     }
   }

   private function prepareResult($status, $data, $errors,$msg)

   {

    return ['status' => $status,'data'=> $data,'message' => $msg,'errors' => $errors];

  }

   public function validations($request,$type){

       $errors = [ ];

       $error = false;

       if($type == "login"){

           $validator = Validator::make($request->all(),[

           'email' => 'required|email|max:255',

           'password' => 'required',

           ]);

           if($validator->fails()){

               $error = true;

               $errors = $validator->errors();

           }
       }elseif($type == "create todo"){

           $validator = Validator::make($request->all(),[

               'todo' => 'required',

               'description' => 'required',

               'category' => 'required'

           ]);

           if($validator->fails()){

               $error = true;

               $errors = $validator->errors();

           }

       }elseif($type == "update todo"){

           $validator = Validator::make($request->all(),[

               'todo' => 'filled',

               'description' => 'filled',

               'category' => 'filled'

           ]);

           if($validator->fails()){

               $error = true;

               $errors = $validator->errors();

           }

       }

       return ["error" => $error,"errors"=>$errors];

   }


}
