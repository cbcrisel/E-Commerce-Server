<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cart;
use Carbon\Carbon;

class UserController extends Controller
{
    public function login(Request $request){
        try{
        $user=User::where('email',$request->email)->first();
        $password= $request->password;
        
        if($user==null){
            return response()->json('BAD USR',500);
        }
        $credentials = request(['email', 'password']);
        
            if (!Auth::attempt($credentials)) {
                return response()->json('BAD PWD', 401);
            }
           $tokenResult = $user->createToken('Personal Access Token');
            $token=$tokenResult->token;
            $token->save();
            return response()->json([
                'id'   =>$user->id,
                'access_token'=>$tokenResult->accessToken,
                'token_type'=>'Bearer',
                'expires_at'=>'Session closed'
            ],200);
        
        
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    public function setNew(Request $request){
        $user=User::where('email',$request->email)->first();
        try{
            if($user!=null){
                return response()->json('Correo Ya Registrado',500);
            }   
            $user=new User();
            $user->email=$request->email;
            $user->name=$request->name;
            $user->lastname=$request->lastname;
            $user->location=$request->location;
            $user->password=bcrypt($request->password);
            $user->created_at=Carbon::now();
            $user->save();
            $cart= new Cart();
            $cart->status='Vacio';
            $cart->user_id=$user->id;
            $cart->save();
            return response()->json('Creado Correctamente',200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        
    }
    public function user(Request $r){
        return response()->json($r->user(),200);
    }
    public function logout(Request $request){
        return $request;
        $accessToken = Auth::user()->token();
        $token= $request->user()->tokens->find($accessToken);
        $token->revoke();
        return response()->json('Logout Exitoso',200);
    }
}
