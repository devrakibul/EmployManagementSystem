<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ProfileController extends Controller
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
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function Show(Request $request)
    {
        return view('employee_profile', [
            'user' => $request->user(),
        ]);
    }
    public function ProfileEdit($id)
    {
        $profile_edit = User::findOrfail($id);
        return view('profile_edit', [
            'profile_edit' => $profile_edit,
        ]);
    }
    public function ProfileUpdate(Request $request)
    {
        $Update = User::findOrfail($request->id);
        if ($request->file('image') && $request->file('cv')) {
            $image = $request->file('image');
            $cv = $request->file('cv');
            $ext_img = Str::random(5).'.'. $image->getClientOriginalExtension();
            $ext_cv = Str::random(5).'.'. $cv->getClientOriginalExtension();

            $old_img = public_path('images/users/'.$Update->image);
            if (!file_exists($old_img)) {
                unlink($old_img);
            }

            $old_cv = public_path('files/users/'.$Update->cv);
            if (file_exists($old_cv)) {
                Storage::delete($old_cv);
            }

            Image::make($image)->save(public_path('images/users/'. $ext_img));
            $cv->move(public_path('\files/users'),$ext_cv);

            $Update->phone = $request->phone;
            $Update->designation = $request->designation;
            $Update->present_address = $request->present_address;
            $Update->date_of_birth = $request->date_of_birth;
            $Update->facebook = $request->facebook;
            $Update->twitter = $request->twitter;
            $Update->linkdin = $request->linkdin;
            $Update->github = $request->github;
            $Update->website = $request->website;
            $Update->image = $ext_img;
            $Update->cv = $ext_cv;
            $Update->save();
        } else {
            $Update->phone = $request->phone;
            $Update->designation = $request->designation;
            $Update->present_address = $request->present_address;
            $Update->date_of_birth = $request->date_of_birth;
            $Update->facebook = $request->facebook;
            $Update->twitter = $request->twitter;
            $Update->linkdin = $request->linkdin;
            $Update->github = $request->github;
            $Update->website = $request->website;
            $Update->save();
        }

        return redirect('employee_profile')->with('ProfileEdit', 'Profile Edit Successfully');
    }
    public function OtherProfileEdit($id)
    {
        $other_profile_edit = User::findOrfail($id);
        return view('other_profile_edit', [
            'other_profile_edit' => $other_profile_edit,
        ]);
    }
    public function OtherProfileUpdate(Request $request)
    {
        $Update = User::findOrfail($request->id);
        $Update->father_name = $request->father_name;
        $Update->mother_name = $request->mother_name;
        $Update->permanent_address = $request->permanent_address;
        $Update->gender = $request->gender;
        $Update->maritial_status = $request->maritial_status;
        $Update->nationality = $request->nationality;
        $Update->nationalid = $request->nationalid;
        $Update->bank = $request->bank;
        $Update->bank_ac = $request->bank_ac;
        $Update->save();

        return redirect('employee_profile')->with('OtherProfileEdit', 'Profile Edit Successfully');
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
    public function Attendance(Request $request)
    {
        $data = new Attendance;
        $data->user_id = Auth::id();
        $data->attend = $request->attend;
        $data->save();
        return back()->with('Attendance', 'Attendance Successfully');
    }
}
