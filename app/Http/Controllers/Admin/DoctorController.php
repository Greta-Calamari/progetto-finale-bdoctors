<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Doctor;

class DoctorController extends Controller
{
    protected $validationRule = [
        "name" => "required|string|max:50",
        "surname" => "required|string|max:50",
        "address" => "required|string",
        "photo" => "mimes:jpeg,bmp,png,svg,jpg,webp",
        "curriculum_vitae" => "mimes:pdf",
        "cell_number" => "required|string|max:20",
        "services" => "text",
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
        return view('admin.doctors.create');
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
            $newDoctor->photo = $path_file;
        }
        $newDoctor->curriculum_vitae = $data['curriculum_vitae'];
        $newDoctor->cell_number = $data['cell_number'];
        $newDoctor->services = $data['services'];
        //id user
        $currentUser = Auth::user();
        $newDoctor->user_id = $currentUser->id;

        $newDoctor->save();

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
        return view('admin.doctors.edit', compact('doctor'));
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

        $doctor->update();

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
