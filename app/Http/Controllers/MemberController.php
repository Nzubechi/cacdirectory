<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Services\MemberSearchService;


class MemberController extends Controller
{
    public function index(Request $request, MemberSearchService $searchService)
    {
        $members = $searchService->apply($request);
        $groups = Member::select('group')->distinct()->pluck('group');

        return view('members.index', compact('members', 'groups'));
    }

    public function create()
    {

        return view('members.create');
    }

    public function store(Request $request)
    {
        // Step 1: Validate inputs
        $validated = $request->validate([
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email|unique:members,email',
            'home_address' => 'required|string',
            'profession' => 'required|string',
            'dob' => 'nullable|date',
            'group' => 'nullable|string',
            'department' => 'nullable|string',
            'class' => 'nullable|string',
            'remark' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female',
        ]);
        // Step 3: Create member
        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }



    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        // Step 1: Validate inputs
        $validated = $request->validate([
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email|unique:members,email,' . $member->id,
            'home_address' => 'nullable|string',
            'profession' => 'nullable|string',
            'dob' => 'nullable|date',
            'group' => 'nullable|string',
            'department' => 'nullable|string',
            'class' => 'nullable|string',
            'remark' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female',
        ]);
        // Step 3: Update the member
        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }



    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted.');
    }
}
