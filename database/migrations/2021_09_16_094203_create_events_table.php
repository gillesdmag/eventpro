<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('event_description');
            $table->string('zone');
            $table->string("status");  // publié=1; en attente=0; supprimé:2
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string("tag");
            $table->json('cats');
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("agence_id")->constrained('agences');
            $table->dateTime("publish_date")->nullable();
            $table->json('tikets')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
