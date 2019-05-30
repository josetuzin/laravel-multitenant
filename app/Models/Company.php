<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Company extends Model
{
    protected $fillable = ['name', 'domain', 'bd_database', 
    'bd_hostname', 'bd_username', 'bd_password'];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }


}
