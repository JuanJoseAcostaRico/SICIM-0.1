<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departaments;
use App\Models\Supplies;
use App\Models\Instruments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $role = $user->roles->first()->name;

        $totalUsers = User::count();
        $totalDepartaments = Departaments::count();
        $totalSupplies = Supplies::count();
        $totalInstruments =Instruments::count();

        return view('home', compact('role', 'totalUsers', 'totalDepartaments',
         'totalSupplies', 'totalInstruments'));
    }
}
