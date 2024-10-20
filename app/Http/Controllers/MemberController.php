<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        return view('members.show', Compact('member'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_karyawan' => 'required|unique:members',
            'nama' => 'required',
            'departemen' => 'required',
            'email' => 'required|email|unique:members',
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'id_karyawan' => 'required|unique:members,id_karyawan,' . $member->id,
            'nama' => 'required',
            'departemen' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus.');
    }
}