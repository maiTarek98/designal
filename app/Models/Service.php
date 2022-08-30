<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = ['admin_id', 'title' ,'description','status'];
}