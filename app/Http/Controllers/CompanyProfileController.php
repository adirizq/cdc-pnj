<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.company.profile', [
            'profile' => auth()->user()->companyProfile,
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
     * @param  \App\Models\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:5120',
            'sector'=> 'required|max:255',
            'location'=> 'required|max:255',
            'website'=> 'required|max:255',
            'established'=> 'required|max:255',
            'description'=> 'required',
        ]);

        if($request->file('image')){
            if(isset($request->oldImage)) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('company-logos', 'public');
        } else {
            $validatedData['image'] = $request->oldImage;
        }

        CompanyProfile::where('id', $companyProfile->id)
            ->update($validatedData);

            return back()->with('success', 'Berhasil memperbarui data profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyProfile  $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}
