<?php

namespace App\Http\Controllers;
use App\Models\Attendance;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vtiful\Kernel\Format;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $attend = Attendance::where('user_id', $user)->where('date', date('Y-m-d'))->get();
        return view('dashboard', [
            'attend' => $attend
        ]);
    }
}
