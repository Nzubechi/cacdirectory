<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\MemberSearchService;

class DashboardController extends Controller
{
    public function index(Request $request, MemberSearchService $searchService)
    {
        $departments = DB::table('department_selection')->get();
        $members = $searchService->apply($request);
        $groups = Member::select('group')->distinct()->pluck('group');

        return view('members.index', compact('members', 'groups', 'departments'));
    }

}
