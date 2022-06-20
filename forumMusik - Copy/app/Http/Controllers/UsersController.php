<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\Users\UpdateprofileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Profile;


class UsersController extends Controller
{

    //Rute Admin
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function showUser()
    {
        $user = auth()->user();
        return view('users.viewuser', [
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('message', 'User deleted successfully');
    }




    //Rute User


    public function show()
    {
        return view('users.show', [
            'user' => auth()->user()
        ]);
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateprofileRequest $request)
    {

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->nama . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);

            $user = auth()->user();
            $user->update([
                'image' => $newImageName,
                'nama' => $request->nama,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'home_address' => $request->home_address,
                'gender' => $request->gender,
                'genre_fav1' => $request->genre_fav1,
                'genre_fav2' => $request->genre_fav2,
            ]);

            return redirect()->route('users.show')->with('message', 'Profile updated!');
        } else {
            $user = auth()->user();
            $user->update([

                'nama' => $request->nama,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'home_address' => $request->home_address,
                'gender' => $request->gender,
                'genre_fav1' => $request->genre_fav1,
                'genre_fav2' => $request->genre_fav2,
            ]);

            return redirect()->route('users.show')->with('message', 'Profile updated!');
        }
    }


    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('login')->with('message', 'Account deleted successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
