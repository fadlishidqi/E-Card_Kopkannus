<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function home()
    {
        $member = Auth::guard('member')->user();
        if (!$member) {
            return redirect()->route('user.login.form')->withErrors(['email' => 'Please login first.']);
        }
        $qrCode = $this->generateQrCode($member->id, $member->id_karyawan);
        return view('user.home', compact('member', 'qrCode'));
    }

    public function showCard($id)
    {
        $member = Member::findOrFail($id);
        $qrCode = $this->generateQrCode($member->id, $member->id_karyawan);
        return view('user.home', compact('member', 'qrCode'));
    }

    private function generateQrCode($id, $id_karyawan)
    {
        $url = route('user.card', ['id' => $id]) . "?id_karyawan={$id_karyawan}";
        return QrCode::size(200)->generate($url);
    }
}