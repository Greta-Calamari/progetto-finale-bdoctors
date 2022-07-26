<?php
namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Sponsor;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DoctorController extends Controller
{
    //chiamata tutti i dottori
    public function index()
    {
        $doctors = Doctor::with(["specializations", "reviews"])->paginate(10);
        return response()->json($doctors);
    }
    //chiamata singolo dottore
    public function show($slug)
    {
        $doctor = Doctor::where("slug", $slug)->with(["reviews", "messages", "specializations"])->first();
        if(empty($doctor)){
            return response()->json(['error'=>'doctor not found'], 404);
        }
        return response()->json($doctor);
    }

    //funzione per ottenere tutti i dottori
    public function getAllDoctors(Request $request)
    {
        $specializationId = $request->query('specialization');
        $doctors = Doctor::with(['specializations', 'reviews', 'sponsors', 'active_sponsor'])->get();
        // $doctors = $doctors->sortByDesc(function ($doctor, $key) {
        //     return $doctor['active_sponsor'];
        // });

        if(!isset($specializationId)){
            return response()->json($doctors);
        } else {
            $doctorsBySpecialization = $doctors->filter(function($doctor) use($specializationId){
                if($doctor->specializations->contains('id', $specializationId)){
                    return true;
                } else {
                    return false;
                }
            })->values()->all();

            return response()->json($doctorsBySpecialization);
        }
    }
    
    //per media voti
    public function doctorByAvg($specializationId, $average){
        $doctors = Doctor::with(['specializations', 'reviews', 'sponsors', 'active_sponsor'])->get();
        // $doctors = $doctors->sortByDesc(function ($doctor, $key) {
        //     return $doctor['active_sponsor'];
        // });
        //filtro per specializzazioni
        if(isset($specializationId)){
            $doctorsBySpecialization = $doctors->filter(function($doctor) use($specializationId){
                if($doctor->specializations->contains('id', $specializationId)){
                    return true;
                } else {
                    return false;
                }
            });
        }else{
            $doctorsBySpecialization = $doctors;
        }

        $filtered = $doctorsBySpecialization->filter(function ($doctor) use($average){
            $sum = 0;
            $reviewCounter = 0;
            $averageVote = 0;
            foreach ($doctor->reviews as $review){
                $reviewCounter++;
                $sum += intval($review->votes);
                }
            if($reviewCounter === 0){
                $averageVote = $sum;
            } else {
                $averageVote = $sum/$reviewCounter;
            }
            if($averageVote >= intval($average) && $averageVote < intval($average) + 1){
                return true;
            } else {
                return false;
            }
        })->values()->all();

        return response()->json($filtered);
    }

    //per numero di recensioni
    public function doctorByReviewsNumber($specializationId, $rangeMin)
    {
        $doctors = Doctor::with(['specializations', 'reviews', 'sponsors', 'active_sponsor'])->get();
        // $doctors = $doctors->sortByDesc(function ($doctor, $key) {
        //     return $doctor['active_sponsor'];
        // });      
        //filtro per specializzazioni
        if(isset($specializationId)){
            $doctorsBySpecialization = $doctors->filter(function($doctor) use($specializationId){
                if($doctor->specializations->contains('id', $specializationId)){
                    return true;
                } else {
                    return false;
                }
            });
        }else{
            $doctorsBySpecialization = $doctors;
        }
        //filtro per numero recensioni
        $filtered = $doctorsBySpecialization->filter(function ($doctor) use ($rangeMin) {
            $reviewCounter = 0;
            foreach ($doctor->reviews as $review) {
                $reviewCounter++;
            }
            if($rangeMin == 1){
                //var_dump(1);
                if ($reviewCounter <= 5) {
                    return true;
                } else {
                    return false;
                }
            }else if ($rangeMin == 5){
                //var_dump(5);
                if ($reviewCounter >= $rangeMin && $reviewCounter < $rangeMin + 5) {
                    return true;
                } else {
                    return false;
                }
            }else{
                //var_dump(10);
                if ($reviewCounter >= $rangeMin) {
                    return true;
                } else {
                    return false;
                }
            }
        })->values()->all();
        return response()->json($filtered);
    }

    // filtro per media e numero di recensioni 
    public function doctorByAll($specializationId, $average, $rangeMin){
        $doctors = Doctor::with(['specializations', 'reviews', 'sponsors', 'active_sponsor'])->get();
        // $doctors = $doctors->sortByDesc(function ($doctor, $key) {
        //     return $doctor['active_sponsor'];
        // });
        //filtro per specializzazioni
        if(isset($specializationId)){
            $doctorsBySpecialization = $doctors->filter(function($doctor) use($specializationId){
                if($doctor->specializations->contains('id', $specializationId)){
                    return true;
                } else {
                    return false;
                }
            });
        }else{
            $doctorsBySpecialization = $doctors;
        }
        //filtro per media voto e numero recensioni
        $filtered = $doctorsBySpecialization->filter(function($doctor) use($average, $rangeMin){
            $reviewCounter = 0;
            $sum = 0;
            $averageVote = 0;
            foreach ($doctor->reviews as $review){
                $reviewCounter++;
                $sum += intval($review->votes);
            }
            if($reviewCounter === 0){
                $averageVote = $sum;
            } else {
                $averageVote = $sum/$reviewCounter;
            }

            if($rangeMin == 1){
                //var_dump(1);
                if ($reviewCounter <= 5 && $averageVote >= intval($average) && $averageVote < intval($average) + 1) {
                    return true;
                } else {
                    return false;
                }
            }else if ($rangeMin == 5){
                //var_dump(5);
                if ($reviewCounter >= $rangeMin && $reviewCounter < $rangeMin + 5 && $averageVote >= intval($average) && $averageVote < intval($average) + 1) {
                    return true;
                } else {
                    return false;
                }
            }else{
                //var_dump(10);
                if ($reviewCounter >= $rangeMin && $averageVote >= intval($average) && $averageVote < intval($average) + 1) {
                    return true;
                } else {
                    return false;
                }
            }
        })->values()->all();

        return response()->json($filtered);
    }
    //filter
    public function filter(Request $request){

        $average = $request->query('average');
        $rMin = $request->query('rangeMin');
        $specializationId = $request->query('specialization');

        if(isset($average) && !isset($rMin)){
            if(isset($specializationId)){
                return $this->doctorByAvg($specializationId, $average);
            }else{
                return $this->doctorByAvg($specializationId = null, $average);
            }
        } elseif (!isset($average) && isset($rMin)){
            if(isset($specializationId)){
                return $this->doctorByReviewsNumber($specializationId, $rMin);
            }else{
                return $this->doctorByReviewsNumber($specializationId = null, $rMin);
            }
        } else {
            if(isset($specializationId)){
                return $this->doctorByAll($specializationId, $average, $rMin);
            }else{
                return $this->doctorByAll($specializationId = null, $average, $rMin);
            }
        }
    }

    //dottori sponsorizzati
    public function sponsorized(){
        //$todayDate = Carbon::now();
        $doctors = Doctor::with(['sponsors', 'specializations', 'reviews', 'active_sponsor'])->get();
        $doctors = $doctors->filter(function($doctor){
            if(count($doctor['active_sponsor']) > 0){
                return true;
            }else{
                return false;
            }
        });
        return response()->json($doctors);
        //chiamata
        //axios.get('/api/doctors-sponsorized')
    }
}