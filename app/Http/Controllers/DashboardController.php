<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function index()
    {
        return Inertia::render('Dashboard/Index');
    }

    /**
     * Show the settings page.
     */
    public function settings()
    {
        return Inertia::render('Dashboard/Settings');
    }
}
