<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Http\Traits\UploadImageTrait;
class SettingsController extends Controller
{
    use UploadImageTrait;
    public function index(GeneralSettings $settings){
        return view('admin.settings', compact('settings'));
    }

    public function update(GeneralSettings $settings, Request $request){
        $settings->site_name = $request->input('site_name');
        $settings->email = $request->input('email');
        $settings->phone = $request->input('phone');
        $settings->twitter_link = $request->input('twitter_link');
        $settings->facebook_link = $request->input('facebook_link');
        $settings->instagram_link = $request->input('instagram_link');
        $settings->google_link = $request->input('google_link');
        $settings->address = $request->input('address');
        $settings->about_us = $request->input('about_us');

        if( $file = $request->file('logo') ) {
            $path = 'settings';
            $url = $this->uploadImg($file,$path,300,400);
            $settings->logo= $url;
        }
        $settings->save();
        
        return redirect()->back()
                        ->with('success',trans('main.updated successfully'));
    }
}