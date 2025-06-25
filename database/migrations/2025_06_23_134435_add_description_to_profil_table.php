<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('profil', function (Blueprint $table) {
            $table->string('description')->after('name')->nullable()->comment('Description of the profile');
        });
    }

    public function down()
    {
        Schema::table('profil', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
