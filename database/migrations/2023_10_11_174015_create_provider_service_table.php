<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('provider_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Provider::class, 'provider_id');
            $table->foreignIdFor(\App\Models\Service::class, 'service_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provider_service');
    }
};
