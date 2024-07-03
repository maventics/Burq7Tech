<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('dashboard',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'email'   => 'email',
            'password' => 'nullable|min:6' // Use nullable to allow empty password
        ]);

        $email = $request->email;
        $password = $request->password;

        $adminRecord = Auth::guard('admin')->user();

        $admin = AdminModel::find($adminRecord->id); // Retrieve the admin record

        if (!$admin) {
            return back()->with('error', 'Admin not found.');
        }

        if ($password) {
            $admin->password = Hash::make($password);
        }

        $admin->email = $email;
        $admin->save();

        return back()->with('message', 'Profile Updated Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profile_update_view()
    {
        return view('Settings.profile_update');
    }


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
