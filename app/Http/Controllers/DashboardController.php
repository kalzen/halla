<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Schedule;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
}
