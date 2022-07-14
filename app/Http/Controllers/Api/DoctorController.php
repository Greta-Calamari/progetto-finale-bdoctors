<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Specialization;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //    dd($request->query('specialization'));
        //$doctors = Doctor::with(['reviews'])->get();
        // if($request->query('specialization')){
        //     $doctors = Doctor::join('doctor_specialization', 'doctors.id', '=', 'doctor_specialization.doctor_id')->where('doctor_specialization.specialization_id', $request->query('specialization'))->get();

        // }else if($request->query('average')){
        //     $doctors = Doctor::all()->where('average_vote',$request->query('average'));
        // } else {
        //     $doctors = Doctor::with(['reviews','specializations'])->get();
        // }
        if($request->query('average')){
            $doctors = Doctor::all()->where('average_vote',$request->query('average'));
        }else if($request->query('reviews')){
            //$doctors = Doctor::withCount(['reviews'])->get();
            $doctors = Doctor::withCount(['reviews'])->where(['reviews_count', $request->query('reviews')])->get();
        }
        else{
            $doctors = Doctor::with(['reviews','specializations'])->get();
        }
        return response()->json($doctors);
    }
        

        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

