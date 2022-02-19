<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        $validator = \Validator::make($request->all(), [ // could mark an error of inteliphense, don't care about that whatever works
            'register' => 'required|exists:users',
            'password' => 'required',
        ]);  
        $responseArr=array();
        if ($validator->fails()) {
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = $validator->messages()->first();
            $responseArr['is_valid']=0;
            $responseArr['token'] = '';
            return response()->json($responseArr,Response::HTTP_BAD_REQUEST);
        }

        $user=User::where('register',$request->register)->get()->first();

        if (Hash::check($request->password, $user->password)){
            $responseArr['status']=true;
            $responseArr['data']=$user;
            $responseArr['message'] = '¡El usuario se ha logeado correctamente!';
            $responseArr['is_valid']=1;
            $responseArr['token'] = $user->createToken('myapptoken')->plainTextToken;
            return response()->json($responseArr,Response::HTTP_OK);
        }
        else{
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = '¡La credenciales es incorrectas!';
            $responseArr['is_valid']=0;
            $responseArr['token'] = '';
        } 
        return response()->json($responseArr,Response::HTTP_UNAUTHORIZED);
    }

    public function signup(Request $request){
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string',
            'register' => 'required|string|unique:users',
            'password' => 'required|min:3|same:password_confirm',
            'password_confirm'=>'required'   
        ]);
    
        $responseArr=array();
        if ($validator->fails()) {
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = $validator->messages()->first();
            $responseArr['is_valid']=0;
            $responseArr['token'] = '';
            return response()->json($responseArr,Response::HTTP_BAD_REQUEST);
        }

        $data=[
            'name'=>$request->name,
            'register'=>$request->register,
            'password'=>Hash::make($request->password)
        ];

        $user=User::create($data);

        $responseArr['status']=true;
        $responseArr['data']=$user;
        $responseArr['message'] = '¡El usuario se ha registrado correctamente!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = $user->createToken('myapptoken')->plainTextToken;
        return response()->json($responseArr,Response::HTTP_OK);
    }

    public function logout(Request $request){
        auth()->user()->currentAccessToken()->delete();

        $responseArr=array();
        $responseArr['status']=true;
        $responseArr['data']=[];
        $responseArr['message'] = '¡El usuario ha cerrado sesion correctamente!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }


    public function logoutAll(Request $request){
        auth()->user()->tokens()->delete();

        $responseArr=array();
        $responseArr['status']=true;
        $responseArr['data']=[];
        $responseArr['message'] = '¡El usuario ha cerrado sesion correctamente en todas sus cuentas!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }

    public function getUserLogged(){
        $responseArr=array();
        if(auth()->user() != null){
            $responseArr['status']=true;
            $responseArr['data']=auth()->user();
            $responseArr['message'] = '¡Este es el usuario!';
            $responseArr['is_valid']=1;
            $responseArr['token'] = '';
            return response()->json($responseArr,Response::HTTP_OK);
        }
        else{
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = '¡Error al finalizar!';
            $responseArr['is_valid']=0;
            $responseArr['token'] = '';
            return response()->json($responseArr,Response::HTTP_BAD_REQUEST);
        }
    }

}
