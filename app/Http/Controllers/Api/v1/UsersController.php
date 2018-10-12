<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Api\Trail\DataUser;


class UsersController extends Controller
{

    use DataUser;

    public function index(){

        $user = User::paginate(15);
        $user->load('Role');
        return response()->json([
            $user
        ], Response::HTTP_OK);
    }

    public function show($id){

        $user = User::findOrFail($id);
        $user->load('Role');

        return response()->json($user, Response::HTTP_OK);
    }

    public function store(Request $request){

    	$users = $request->input('user');
        $role = $request->input('role');

    	$roleArray = array();
    	foreach($role as $key => $r){
    		$roleArray[$key] = $r['value'];
    	}
        $user = new User();
    	$user->create([
    		'name' => $users['name'],
    		'username' => $users['username'],
    		'email'	=> $users['email'],
    		'password' => bcrypt($users['password']),
    		'created_by' => 'respati',
    		'created_at' => '2018-08-19',
    		'modifier_by' => 'respati',
    		'modifier_at' => '2018-08-10'
    	])->role()->sync($roleArray);

    	$token['token'] = $user->createToken("myApp")->accessToken;

    	return response()->json([
    		'status' => 'success',
            'token' => $token
    	], Response::HTTP_OK);

    }

    public function update(Request $request, $id){

        $role = $request->input('role');
        $user = $request->input('user');

        $roleArray = array();
        foreach ($role as $key => $r){
            $roleArray[$key] = $r['value'];
        }

        $users = User::find($id);
        $users->update([
            'name' => $user['name'],
            'email' => $user['email'],
            'username' => $user['username'],
            'password' => $user['password']
        ]);

        $users->role()->sync($roleArray);

        return response()->json(
            'success', Response::HTTP_OK
        );
    }

    public function getDataUser(Request $request){
        $req = $request->all();
        $session = $req['data']['user']['user'];
        $token = $req['data']['token'];
        $id = Crypt::decryptString($session);
        $user = User::findOrFail($id)->get();
        $users = $user[0];
        $users['relation'] = $this->getAllDataUser($id);
        $users['token'] = $token;
        $users['isLogin'] = 'login';
        $users['user'] = Crypt::encryptString($id);
        
        return response()->json([
            'status'=> 'success',
            'request' => $users
        ]);
    }
}
