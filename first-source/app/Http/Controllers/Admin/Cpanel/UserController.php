<?php

namespace App\Http\Controllers\Admin\Cpanel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        // retrieve all users from the database
        $users = User::all();

        // pass the users to the view
        return view('admin.users.index', ['users' => $users]);
    }

    public function delete($id)
    {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('users');
       
    }
           

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.index');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            // add any other validation rules as needed
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // update any other fields as needed
        $user->save();

        return redirect()->route('admin.users.index');
    }

}
