<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        // Step 1: Validate the inputs
        $validated = $request->validate([
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email|unique:members,email',
            'home_address' => 'required|string',
            'profession' => 'required|string',
            'dob_day' => 'nullable|integer|min:1|max:31',
            'dob_month' => 'nullable|string|in:January,February,March,April,May,June,July,August,September,October,November,December',
            'dob_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'group' => 'nullable|string',
            'department' => 'nullable|string',
            'class' => 'nullable|string',
            'remark' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female',
        ]);

        // Step 2: Get the numeric value for the month
        $month = $this->getMonthNumericValue($request->dob_month);

        // Handle invalid month or return an error
        if ($month === null) {
            return back()->withErrors(['dob_month' => 'Invalid month selected.']);
        }

        // Step 3: Build the full DOB in YYYY-MM-DD format
        $dob = $this->formatDob($request);

        // Step 4: Create the member with the DOB and individual date components
        Member::create(array_merge($validated, [
            'dob' => $dob,  // Full date
            'dob_day' => $request->dob_day,
            'dob_month' => $month,  // Store numeric month
            'dob_year' => $request->dob_year ?: 1900,
        ]));

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    // Helper function to convert month name to numeric value
    private function getMonthNumericValue($monthName)
    {
        // Mapping month names to numbers
        $monthNames = [
            'January' => 1,
            'February' => 2,
            'March' => 3,
            'April' => 4,
            'May' => 5,
            'June' => 6,
            'July' => 7,
            'August' => 8,
            'September' => 9,
            'October' => 10,
            'November' => 11,
            'December' => 12,
        ];

        // Return the numeric value for the given month name
        return $monthNames[$monthName] ?? null;  // Returns null if the month name is invalid
    }

    // Helper function to format the DOB
    private function formatDob(Request $request)
    {
        $month = $this->getMonthNumericValue($request->dob_month);
        $year = $request->dob_year ?: 1900;

        // If month is invalid, return null or handle the error as needed
        if ($month === null) {
            return null;  // Or handle it in another way (e.g., throw an error)
        }

        // Format the DOB as YYYY-MM-DD
        return "{$year}-{$month}-{$request->dob_day}";
    }



    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        // Step 1: Validate the inputs
        $validated = $request->validate([
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email|unique:members,email,' . $member->id,
            'home_address' => 'nullable|string',
            'profession' => 'nullable|string',
            'dob_day' => 'nullable|integer|min:1|max:31',
            'dob_month' => 'nullable|string|in:January,February,March,April,May,June,July,August,September,October,November,December',
            'dob_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'group' => 'nullable|string',
            'department' => 'nullable|string',
            'class' => 'nullable|string',
            'remark' => 'nullable|string',
            'gender' => 'nullable|string|in:Male,Female',
        ]);

        // Step 2: Build the full DOB and individual date components
        $dob = $this->formatDob($request);

        // Step 3: Update the member
        $member->update(array_merge($validated, [
            'dob' => $dob,  // Full date
            'dob_day' => $request->dob_day,
            'dob_month' => $request->dob_month,
            'dob_year' => $request->dob_year,
        ]));

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }



    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted.');
    }
}
