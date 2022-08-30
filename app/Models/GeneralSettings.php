<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public bool $site_active;
    public string $logo;
    public string $twitter_link;
    public string $facebook_link;
    public string $instagram_link;
    public string $google_link;
    public string $email;
    public string $phone;
    public string $about_us;
    public string $address;
    
    public static function group(): string
    {
        return 'general';
    }
}
?>