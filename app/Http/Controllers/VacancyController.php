<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\StudentProfile;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.vacancy.index', [
            'title' => 'daftar lowongan',
            'vacancies' =>  Vacancy::latest()->where('company_profile_id', auth()->user()->companyProfile->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vacancy.create', [
            'title' => 'buat lowongan',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset(auth()->user()->companyProfile->sector)) {
            return back()->with('fail', 'Harap perbarui profile anda sebelum membuat lowongan baru');
        }

        $validatedData = $request->validate([
            'category_id' => 'required',
            'status' => 'required',
            'title' => 'required|max:255',
            'position' => 'required|max:255',
            'vacancy_type' => 'required|max:255',
            'experience' => 'required|max:255',
            'qualification_degree' => 'required|max:255',
            'description' => 'required',
            'responsibilities' => 'nullable',
            'qualifications' => 'nullable',
            'skills' => 'nullable',
        ]);

        $validatedData['company_profile_id'] = auth()->user()->companyProfile->id;

        Vacancy::create($validatedData);

        return redirect(route('vacancy.index'))->with('success', 'Berhasil mempublish lowongan baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        if($vacancy->company_profile_id != auth()->user()->companyProfile->id) {
            return abort(403);
        }
        
        return view('dashboard.vacancy.edit', [
            'title' => 'edit lowongan',
            'vacancy' => $vacancy,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        if($vacancy->company_profile_id != auth()->user()->companyProfile->id) {
            return abort(403);
        }

        $validatedData = $request->validate([
            'category_id' => 'required',
            'status' => 'required',
            'title' => 'required|max:255',
            'position' => 'required|max:255',
            'vacancy_type' => 'required|max:255',
            'experience' => 'required|max:255',
            'qualification_degree' => 'required|max:255',
            'description' => 'required',
            'responsibilities' => 'nullable',
            'qualifications' => 'nullable',
            'skills' => 'nullable',
        ]);

        Vacancy::where('id', $vacancy->id)
            ->update($validatedData);

        return redirect(route('vacancy.index'))->with('success', 'Berhasil mengedit data artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        if($vacancy->company_profile_id != auth()->user()->companyProfile->id) {
            return abort(403);
        }

        Vacancy::destroy($vacancy->id);
        return back()->with('success', 'Berhasil menghapus lowongan');
    }


    public function application(Vacancy $vacancy) {
        return view('dashboard.vacancy.application', [
            'title' => 'lamaran',
            'vacancy' => $vacancy
        ]);
    }


    public function declineApplication(Vacancy $vacancy, StudentProfile $studentProfile) {
        $vacancy->studentProfiles()->updateExistingPivot($studentProfile->id, [
            'status' => 1,
        ]);

        return back()->with('success', 'Berhasil menolak lamaran');
    }

    public function acceptApplication(Vacancy $vacancy, StudentProfile $studentProfile) {
        $vacancy->studentProfiles()->updateExistingPivot($studentProfile->id, [
            'status' => 2,
        ]);

        return back()->with('success', 'Berhasil menerima lamaran');
    }
}
