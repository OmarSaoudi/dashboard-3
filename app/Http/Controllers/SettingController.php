<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use AttachFilesTrait;


    public function index()
    {
        $settings = Setting::all();
        return view('pages.settings.index', compact('settings'));
    }


    public function update(Request $request)
    {
        try{
            $settings = Setting::findorfail($request->id);
            $settings->title = $request->title;
            $settings->name = $request->name;
            $settings->email = $request->email;
            $settings->address = $request->address;
            $settings->phone = $request->phone;
            if($request->hasfile('settings_images')){
                $this->deleteFile($settings->settings_images);
                $this->uploadFile($request,'settings_images','settings_images');
                $settings_images_new = $request->file('settings_images')->getClientOriginalName();
                $settings->settings_images = $settings->settings_images !== $settings_images_new ? $settings_images_new : $settings->settings_images;
            }
            $settings->save();
            return redirect()->route('settings.index');
        }

        catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/settings_images/'.$name);
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/settings_images/'.$name);
        }
    }

}
