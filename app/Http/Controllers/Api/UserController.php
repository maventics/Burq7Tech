<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use stdClass;

class UserController extends Controller
{
    protected $res;
    function __construct()
    {
        $this->res = new stdClass;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $data = $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'password' => 'required'
            ]);
    
            $HashPass = Hash::make($request->password);
            $data['password'] = $HashPass;
            $user = User::create($data);
            $user->token = $user->createToken("API Token")->plainTextToken;

            return response()->json(['message' => 'User Created Successfully', 'data' => $user]);
        
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }     
    }
    

    /**
     * Store a newly created resource in storage.
     */
   


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
