<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.student.profile', [
            'profile' => auth()->user()->studentProfile,
            'title' => 'ubah profile'
        ]);
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
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function show(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentProfile $studentProfile)
    {
        $validatedData = $request->validate([
            'cv' => 'file|max:5120',
            'image' => 'image|file|max:5120',
            'title'=> 'required|max:255',
            'student_number'=> 'required|max:255',
            'major'=> 'required|max:255',
            'languages'=> 'required|max:255',
            'skills'=> 'required|max:255',
            'address'=> 'required|max:255',
            'phone'=> 'required|max:255',
            'about'=> 'required',
            'experience'=> 'required',
            'education'=> 'required',
        ]);

        if(!isset($studentProfile->cv)){
            $request->validate(['cv' => 'required']);
        }

        if(!isset($studentProfile->image)){
            $request->validate(['image' => 'required']);
        }

        if($request->file('cv')){
            if(isset($request->oldCV)) {
                Storage::delete($request->oldCV);
            }
            $validatedData['cv'] = $request->file('cv')->store('student-cv', 'public');
        } else {
            $validatedData['cv'] = $request->oldCV;
        }

        if($request->file('image')){
            if(isset($request->oldImage)) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('student-pictures', 'public');
        } else {
            $validatedData['image'] = $request->oldImage;
        }

        StudentProfile::where('id', $studentProfile->id)
            ->update($validatedData);

            return back()->with('success', 'Berhasil memperbarui data profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
}
