<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function UserList()
    {
        $user_list = User::all();
        return view('user_list', [
            'user_list' => $user_list,
        ]);
    }
    public function UserView($id)
    {
        $user = User::findOrfail($id);
        return view('user_view', [
            'user' => $user,
        ]);
    }
    public function MakeAdmin(Request $request)
    {
        $update = User::findOrfail($request->id);
        $update->status = 1;
        $update->save();

        return redirect('user_list')->with('MakeAdmin', 'Admin Make Successfully');
    }
    public function MakeMember(Request $request)
    {
        $update = User::findOrfail($request->id);
        $update->status = 2;
        $update->save();

        return redirect('user_list')->with('MakeMember', 'Employee Make Successfully');
    }
    public function UserDelete($id)
    {
        User::findOrFail($id)->forceDelete();
        return back()->with('UserDelete', 'User Delete Successfully');
    }
    public function AttendList()
    {
        $attendance = Attendance::orderBy('date', 'DESC')->get();
        return view('attendList', [
            'attendance' => $attendance
        ]);
    }
}
