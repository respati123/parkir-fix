<?php

namespace App\Http\Controllers\Api\v1;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Trail\DataUser;


class LoginController extends Controller
{
    use DataUser;
    public function login(Request $request){

        $user = new User();
        $credential = $request->only('email','password');
        $attempt = $this->attempt($credential);
        if($attempt == false){
            return response()->json([], Response::HTTP_NOT_FOUND);
        } else {
            $userData = $attempt['user'];
            $token = $attempt['token'];
            if(!empty($userData)){
                $idUser= $userData['id'];
                $allDataUser = $this->getAllDataUser($idUser);
                $userData['relation'] = $allDataUser;
                $userData['token'] = $token;
                $userData['isLogin'] = 'login';
                $userData['userID'] = Crypt::encryptString($userData['id']); 
                return response()->json([
                    'status' => 'success',
                    'user'  => $userData,
                
                ], 200);
            } else {
                return response()->json([
                    'status' => 'email or password invalid'
                ], Response::HTTP_BAD_REQUEST);
            }
        }
        
    }

    private function attempt($params){
    
        $user = User::where('email','=',$params['email'])->first();
        $hash = $user['password'];
        $userArray = array();
        if(Hash::check($params['password'], $hash)){
            $token = $user->createToken("myApp")->accessToken;
            $userArray['user'] = $user;
            $userArray['token'] = $token;
            return $userArray;
        } else {
            return false;
        }
    }

   
}
