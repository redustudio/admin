<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function($tabel) {
                if (! Schema::hasColumn('users', 'name')) {
                    $table->string('name');
                }

                if (! Schema::hasColumn('users', 'email')) {
                    $table->string('email')->unique();
                }

                if (! Schema::hasColumn('users', 'password')) {
                    $table->string('password');
                }

                if (! Schema::hasColumn('users', 'remember_token')) {
                    $table->rememberToken();
                }
            });
        } else {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
            });
        }
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
}
