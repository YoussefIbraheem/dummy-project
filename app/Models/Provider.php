<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Provider extends Model
{
    use HasFactory;




    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'title' => 'array',
    ];



    public function services()
    {
        return $this->belongsToMany(Service::class, 'provider_service', 'provider_id', 'service_id');
    }
}
