<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Doctor;
use App\Specialization;
use App\Sponsor;


class DoctorController extends Controller
{
    protected $validationRule = [
        "name" => "required|string|max:50",
        "surname" => "required|string|max:50",
        "address" => "required|string|max:255",
        "photo" => "mimes:jpeg,bmp,png,svg,jpg,webp",
        "curriculum_vitae" => "mimes:pdf",
        "cell_number" => "required|string|max:20",
        "services" => "max:1500",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();
        $sponsors = Sponsor::all();
        return view('admin.doctors.create', compact('specializations', 'sponsors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRule);
        $data = $request->all();

        $newDoctor = new Doctor();
        $newDoctor->name = $data['name'];
        $newDoctor->surname = $data['surname'];
        $newDoctor->address = $data['address'];
        //upload photo
        if(isset($data['photo'])){
            $path_image = Storage::put('uploads', $data['photo']);
            $newDoctor->photo = $path_image;
        }
        //upload curriculum
        if(isset($data['curriculum_vitae'])){
            $path_file = Storage::put('uploads', $data['curriculum_vitae']);
            $newDoctor->curriculum_vitae = $path_file;
        }
        $newDoctor->cell_number = $data['cell_number'];
        if(isset($data['services'])){
            $newDoctor->services = $data['services'];
        }
        //id user
        $currentUser = Auth::user();
        $newDoctor->user_id = $currentUser->id;

        $newDoctor->save();

        //specializations
        if(isset($data['specializations'])){
            $newDoctor->specializations()->sync($data['specializations']);        
        }
        // sponsors
        if(isset($data['sponsors'])){
            $newDoctor->sponsors()->sync($data['sponsors']);        
        }
        return redirect()->route('admin.doctors.show', $newDoctor->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $currentUser = Auth::user();
        if($currentUser->id != $doctor->user_id) {
            abort(404);
        }

        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Specialization::all();
        return view('admin.doctors.edit', compact('doctor'), compact('specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate($this->validationRule);
        $data = $request->all();

        $doctor->name = $data['name'];
        $doctor->surname = $data['surname'];
        $doctor->address = $data['address'];
        //upload photo
        if(isset($data['photo'])){
            Storage::delete('uploads', $doctor->photo);
            $path_image = Storage::put('uploads', $data['photo']);
            $doctor->photo = $path_image;
        }
        //upload curriculum
        if(isset($data['curriculum_vitae'])){
            Storage::delete('uploads', $doctor->curriculum_vitae);
            $path_file = Storage::put('uploads', $data['curriculum_vitae']);
            $doctor->curriculum_vitae = $path_file;
        }
        $doctor->cell_number = $data['cell_number'];

        if(isset($data['services'])){
            $doctor->services = $data['services'];
        }

        $doctor->save();

        //specializations
        if(isset($data['specializations'])){
            $doctor->specializations()->sync($data['specializations']);        
        }else{
            $doctor->specializations()->sync([]);        
        }
        return redirect()->route('admin.doctors.show', $doctor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with("message", "doctor with id: {$doctor->id} successfully deleted !");
    }
}
