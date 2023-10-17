<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()  
    {
        $users = User::paginate(10);

        return view('backend.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if(!$user) return Redirect::route('admin.users')->with('error', 'Opps Something went wrong!!');
        
        $user->delete();
        return Redirect::route('admin.users')->with('success', 'Data Deleted Successfully');
    }
}
