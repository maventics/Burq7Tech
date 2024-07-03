<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Exception;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $settings = SettingModel::all();

        return view('Settings.setting',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    protected $res;
    public function update_setting(Request $request)
    {
        try {
            $data = $request->validate([
                'key' => "required|exists:settings,key",
                'value' => "required",

            ]);

            if ($data['key'] == 'brand_logo') {
                if ($request->hasFile('brand_logo')) {
                    $image = $request->file('brand_logo');
                    $imageName = time().'.'.$image->getClientOriginalExtension();
                    $path = public_path('/images');
                    $image->move($path, $imageName);
                } else {
                    throw new Exception("Image not provided.");
                }


                SettingModel::where('key',$request->key)->update(['value' => $imageName]);
            }else{

                SettingModel::where('key',$request->key)->update(['value'=>$request->value]);
            }

            return back()->with('success', 'Settings updated successfully');
        } catch (Exception $ex) {
            return back()->withErrors(['danger' => $ex->getMessage()])->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
