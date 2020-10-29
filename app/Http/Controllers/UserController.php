<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\wallet;
class UserController extends Controller
{
    //Register -> User
    public function register(Request $request) {
        // Fetch input
        $user_input = $request->all();

        // Create user
        $user = User::create([
        'name' => $user_input['name'],
        'phone' => $user_input['phone'],
        'password' => bcrypt($user_input['password'])
        ]);

        // Create Token
        $token = $user->createToken('auth')-> accessToken;

        // Fetch User
        $user_data = User::where('id',$user->id)->first();


        $wallet = wallet::create([
            'user_id' => $user_data->id,
            'amount' => 0,
            'full' => 0,
        ]);

        // Return data
        return response()->json([
        'token' => $token,
        'user' => $user_data
        ]);
    } /** End Register */
// Login -> User
    public function login(Request $request) {
        // Fetch Input
        $input = $request->all();
        // IF Right Values
        if(Auth::attempt(['phone' => $input['phone'],'password' => $input['password']])) {
        // Auth User
        $user = Auth::User();
        $token = $user->createToken('auth')-> accessToken; #Fetch Token

        //return data
        return response()->json([
        'token' => $token,
        'user' => $user
        ],200);
        }
        // if not correct
        return response()->json(['error' => 'Unauthorised'],401);
    }

    // Auth -> Get User
    public function auth() {
        $user = Auth::User();

        return response()->json([
        'user' => $user
        ]);
    }
}
