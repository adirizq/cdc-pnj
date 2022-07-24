<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\StudentProfile;
use App\Models\Vacancy;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('cdc.home', [
            'titleNav' => 'home',
            'articles' => Article::latest()->take(3)->get(),
            'newJobs' => Vacancy::with(['category', 'companyProfile', 'companyProfile.user'])->latest()->where('vacancy_type', 'Kerja')->where('status', true)->take(4)->get(),
            'newInterns' => Vacancy::with(['category', 'companyProfile', 'companyProfile.user'])->latest()->where('vacancy_type', 'Magang')->where('status', true)->take(4)->get(),
        ]);
    }


    public function articleDetail(Article $article) {
        return view('cdc.article-detail', [
            'titleNav' => 'articles',
            'article' => $article,
            'newArticles' => Article::latest()->take(4)->get(),
        ]);
    }

    public function article() {
        return view('cdc.articles', [
            'titleNav' => 'articles',
            'articles' => Article::latest()->paginate(8),
            'randArticles' => Article::inRandomOrder()->take(4)->get()
        ]);
    }


    public function companyDetail(CompanyProfile $companyProfile) {
        return view('cdc.company-detail', [
            'titleNav' => 'company',
            'profile' => $companyProfile,
            'profileUser' => User::findOrFail($companyProfile->user_id)
        ]);
    }


    public function vacancyDetail(Vacancy $vacancy) {
        return view('cdc.vacancy-detail', [
            'titleNav' => 'vacancies',
            'vacancy' => $vacancy,
            'company' => $vacancy->companyProfile,
            'companyUser' => $vacancy->companyProfile->user,
        ]);
    }

    public function vacancy() {
        return view('cdc.vacancies', [
            'titleNav' => 'vacancies',
            'vacancies' => Vacancy::latest()->where('status', true)->paginate(8),
            'categories' => Category::all()
        ]);
    }


    public function studentDetail(StudentProfile $studentProfile) {
        return view('cdc.student-detail', [
            'titleNav' => 'student',
            'profile' => $studentProfile,
            'profileUser' => User::findOrFail($studentProfile->user_id)
        ]);
    }


    public function contact() {
        return view('cdc.contact', [
            'titleNav' => 'contact',
        ]);
    }


    public function apply(Vacancy $vacancy, StudentProfile $studentProfile) {
        if(isset($studentProfile->cv)){
            $vacancy->studentProfiles()->attach($studentProfile);
            return back()->with('success', 'Berhasil apply lowongan! Harap pantau status lamaran pada dashboard anda.');
        } else {
            return back()->with('fail', 'Harap lengkapi profil anda terlebih dahulu melalui dashboard anda.');
        }  
    }

    public function application() {
        return view('dashboard.student.application', [
            'title' => 'lamaran',
            'profile' => auth()->user()->studentProfile
        ]);
    }
}
