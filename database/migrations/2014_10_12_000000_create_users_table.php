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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable()->comment('student,employe,admin');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->string('image')->default('default_image.png');
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->date('d_o_b')->nullable();
            $table->string('code')->nullable();
            $table->string('role')->nullable()->comment('admin=head of software,oparetor=computer oparetor,employe=user');
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->double('salary')->nullable();
            $table->integer('status')->nullable(1)->comment('0=inactive,1=active');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
