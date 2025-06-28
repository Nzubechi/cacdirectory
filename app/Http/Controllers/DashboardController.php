<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();

        // Search across multiple fields
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

        // Filter by group if provided
        if ($request->filled('group')) {
            $query->where('group', $request->input('group'));
        }

        if ($request->input('age') === 'below60') {
            $query->whereDate('dob', '>', now()->subYears(60));
        } elseif ($request->input('age') === 'above60') {
            $query->whereDate('dob', '<=', now()->subYears(60));
        }

        $members = $query->latest()->paginate(10)->appends(request()->query());

        // Get all unique groups for filter dropdown
        $groups = Member::select('group')->distinct()->pluck('group');

        return view('members.index', compact('members', 'groups'));
    }

}
