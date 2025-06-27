<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $members = Member::latest()->get();
        return view('dashboard.index', compact('members'));
    }

}
