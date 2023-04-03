<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $applications = Application::latest()->paginate(2);
        return view('dashboard',compact('applications'));
    }
    public function main()
    {
        return redirect('dashboard');
    }
}
