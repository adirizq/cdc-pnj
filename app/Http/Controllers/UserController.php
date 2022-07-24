<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.user.index')->with([
            'users' => User::all()->sortBy('role'),
            'title' => 'daftar user'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'role' => 'required',
            'name' => 'required|max:255',
            'email' =>  'required|email:dns|max:255|unique:users',
            'password' =>  'required|min:6|max:255|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        if($validatedData['role'] == 2) {
            $companyProfile = CompanyProfile::create(['user_id' => $user->id]);
            $user->companyProfile()->save($companyProfile);
        }

        if($validatedData['role'] == 3) {
            $studentProfile = StudentProfile::create(['user_id' => $user->id]);
            $user->studentProfile()->save($studentProfile);
        }
        
        return back()->with('success', 'User baru berhasil dibuat');
    }

    public function changePass(Request $request) {
        
        $validatedData = $request->validate([
            'user_id' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if($validatedData['user_id'] != 1) {
            User::where('id', $validatedData['user_id'])->update([
                'password' => bcrypt($validatedData['new_password'])
            ]);

            return back()->with('success', 'Password berhasil diubah');
        } else {
            return back()->with('fail', 'Super admin password cannot be changed!');
        }
    }

    public function destroy(User $user){

        if($user->id != 1) {
            if($user->role == 2) {
                CompanyProfile::destroy($user->companyProfile->id);
            }
            User::destroy($user->id);
        return back()->with('success', 'User berhasil dihapus');
        } else {
            return back()->with('fail', 'Super admin cannot be deleted!');
        }
    
    }

    public function reg(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' =>  'required|email:dns|max:255|unique:users',
            'password' =>  'required|min:6|max:255|confirmed'
        ]);

        $validatedData['role'] = 3;

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $studentProfile = StudentProfile::create(['user_id' => $user->id]);
            $user->studentProfile()->save($studentProfile);

        return redirect(route('login'))->with('success', 'Berhasil daftar silahkan masuk');
    }
}
