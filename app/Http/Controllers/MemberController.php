<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('surname', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('profession', 'like', "%{$search}%")
                    ->orWhere('group', 'like', "%{$search}%");
            });
        }

        if ($request->filled('group')) {
            $query->where('group', $request->input('group'));
        }

        if ($request->input('age') === 'below60') {
            $query->whereDate('dob', '>', now()->subYears(60));
        } elseif ($request->input('age') === 'above60') {
            $query->whereDate('dob', '<=', now()->subYears(60));
        }

        // ✅ Must use paginate() before withQueryString()
        $members = $query->latest()->paginate(10)->appends(request()->query());
        $members = $query->latest()->paginate(10);

        $groups = Member::select('group')->distinct()->pluck('group');

        return view('members.index', compact('members', 'groups'));
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
