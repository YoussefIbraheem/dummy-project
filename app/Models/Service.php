<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title'];

    protected $casts = [
        'title' => 'array',
    ];

    public $translatable = ['title'];

    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'provider_service', 'service_id', 'provider_id');
    }

}
