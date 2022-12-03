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
        // dd($attend->count());
        return view('dashboard', [
            'attend' => $attend
        ]);
    }
    public function Attendance(Request $request)
    {
        $data = new Attendance;
        $data->user_id = Auth::id();
        $data->attend = $request->attend;
        $data->save();
        return back()->with('Attendance', 'Attendance Successfully');
    }
}
