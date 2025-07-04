<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Services\MemberSearchService;

class DashboardController extends Controller
{
    public function index(Request $request, MemberSearchService $searchService)
    {
        $members = $searchService->apply($request);
        $groups = Member::select('group')->distinct()->pluck('group');

        return view('members.index', compact('members', 'groups'));
    }

}
