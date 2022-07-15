<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $guarded = [];

    public function doctors(){
        return $this->belongsToMany('App\Doctor');
    }
}




// <?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateSponsorDoctor extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('doctor_sponsor', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
//             $table->foreignId('sponsor_id')->constrained()->onDelete('cascade');
//             $table->dateTime('date_start');
//             $table->dateTime('date_end');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('sponsor_doctor');
//     }
// }




