<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::latest()->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {

        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:members',
            'address' => 'required',
            'home_address' => 'required',
            'profession' => 'required',
            'age' => 'required|integer',
            'group' => 'nullable',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'address' => 'required',
            'home_address' => 'required',
            'profession' => 'required',
            'age' => 'required|integer',
            'group' => 'nullable',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted.');
    }
}
