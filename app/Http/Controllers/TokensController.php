<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function login(Request $request)
    {
       $credentials = $request->only('email','password');
       $validator = Validator::make($credentials,[
           'email' => 'required|email',
           'password' => 'required'
       ]);
       if($validator -> fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong validation',
                'errors' =>   $validator->errors()
            ], 422);
       }
       $token = JWTAuth::attempt($credentials);
       if($token) {
           return response()->json([
               'success' => true,
               'message' => 'OK',
               'token' => $token,
               'user' => User::where('email', $credentials['email'])->get()->first(),
           ], 200);
       }else {
           return response()->json([
               'success' => false,
               'message' => 'Wrong credentials',
               'errors' =>   $validator->errors()
           ], 401);
       }
    }

    public function refreshToken() {
        $token = JWTAuth::getToken();
        try {
            $token = JWTAuth::refresh($token);
            return response()->json([
                'success' => true,
                'message' => 'OK',
                'token' => $token,
            ], 200);
        } catch (TokenExpiredException $ex){
            return response()->json([
                'success' => false,
                'message' => 'Token expirado',
            ], 422);
        } catch (TokenBlacklistedException $ex){
            return response()->json([
                'success' => false,
                'message' => 'Need to login again please (black listed
                )',
            ], 422);
        }
    }

    public function logout()
    {
        //54.06 sec
        $token = JWTAuth::getToken();

        try {
            $token = JWTAuth::invalidate($token);
            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ],200);
        }catch (JWTException $ex){
            return response()->json([
                'success' => false,
                'message' => 'Failed Logout,please try again'
            ],422);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
