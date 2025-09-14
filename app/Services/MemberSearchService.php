<?php

namespace App\Services;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberSearchService
{
    public function apply(Request $request)
    {
        $query = Member::query();

        // General text search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('surname', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('profession', 'like', "%{$search}%")
                    ->orWhere('group', 'like', "%{$search}%")
                    ->orWhere('department', 'like', "%{$search}%")
                    ->orWhere('class', 'like', "%{$search}%");
            });
        }

        // Group filter
        if ($request->filled('department')) {
            $query->where('department', 'LIKE', '%' . $request->input('department') . '%');
        }

        // Group filter
        if ($request->filled('group')) {
            $query->where('group', $request->input('group'));
        }

        // Age filter
        if ($request->input('age') === 'below60') {
            $query->whereDate('dob', '>', now()->subYears(60));
        } elseif ($request->input('age') === 'above60') {
            $query->whereDate('dob', '<=', now()->subYears(60));
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        return $query->latest()->paginate(10)->appends(request()->query());
    }
}
