<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'id_karyawan' => 'required',
        ]);

        $member = Member::where('email', $credentials['email'])
                       ->where('id_karyawan', $credentials['id_karyawan'])
                       ->first();

        if ($member) {
            Auth::guard('member')->login($member);
            return redirect()->route('user.home');
        }

        return back()->withErrors(['email' => 'Data tidak valid']);
    }

    public function home()
    {
        $member = Auth::guard('member')->user();
        if (!$member) {
            return redirect()->route('user.login.form')
                   ->withErrors(['email' => 'Silakan login terlebih dahulu.']);
        }

        return view('user.home', compact('member'));
    }

    public function showCard($id)
    {
        try {
            $member = Member::findOrFail($id);
            return view('user.home', compact('member'));
        } catch (\Exception $e) {
            Log::error('Error in showCard: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menampilkan kartu');
        }
    }

    public function logout(Request $request) 
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login.form');
    }
}