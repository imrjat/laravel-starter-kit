<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GeneralHelpers;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->authorizeResource(Setting::class);
    }


    public function index()
    {
        $settings = Setting::all();

        return view('admin.settings.edit',compact('settings'));

        // return view('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.settings.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //

        return view('admin.settings.edit',compact('setting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
    
    }

    public function update_records(Request $request)
    {
        $requestData = $request->except('_token');
        foreach ($requestData as $name => $value) {
           $setting =  Setting::where('name', $name)->first();
           if($setting){
                if ($request->hasFile($name)) {
                    $file =  $request->file($name);
                    $path = 'images/system_images/';                    
                    $file_name = time();
                    $data['value'] = GeneralHelpers::crop_upload_file($file, $path, $file_name);
                    $setting->update($data);

                } else {
                    $data['value']=$value;
                    $setting->update($data);
                }
           }
        }
        return redirect()->route('settings.index')
        ->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
