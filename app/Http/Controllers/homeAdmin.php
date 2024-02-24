<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeAdmin extends Controller
{
    public function index(){
        $count1 = DB::table('users')->count();
        $count2 = DB::table('menu1')->count();
        $count3 = DB::table('chef')->count();
        $count4 = DB::table('reservasi')->count();
        return view('dashboard.dashboardAdmin', compact('count1', 'count2', 'count3', 'count4'));
    }
    
}
