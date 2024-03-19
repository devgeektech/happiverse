<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mstuser', function (Blueprint $table) {
            $table->id();
            $table->string('userId', 50)->nullable();
            $table->string('userName', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->date('DOB', 50)->nullable();
            $table->string('martialStatus', 50)->nullable();
            $table->text('profileImageUrl')->nullable();
            $table->string('gender', 30)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('postCode', 30)->nullable();
            $table->string('phoneNo', 30)->nullable();
            $table->string('country', 50)->nullable();
            $table->double('lat', 8, 2)->default(0);
            $table->double('long', 8, 2)->default(0);
            $table->text('address')->nullable();
            $table->integer('following')->default(0);
            $table->integer('follower')->default(0);
            $table->integer('totalPosts')->default(0);
            $table->integer('userTypeId')->default(0);
            $table->integer('avatarType')->default(0);
            $table->integer('flatColor')->default(0);
            $table->integer('profileImageText')->default(0);
            $table->integer('isShuffleEnable')->default(0);
            $table->string('isActive', 30)->default(b'1');
            $table->integer('isPrivate')->default('0');
            $table->integer('groupNotification')->default('0');
            $table->integer('postNotification')->default('0');
            $table->integer('allNotification')->default('0');
            $table->timestamp('stealthtime')->nullable();
            $table->integer('isStealth')->default('0');
            $table->string('stealthDuration')->default('0');
            $table->dateTime('addDate');
            $table->dateTime('editDate')->nullable();
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
        Schema::dropIfExists('mstuser');
    }
};
