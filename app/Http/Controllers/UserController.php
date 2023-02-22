<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $users= User::all();
        return view('user.Users',compact('users'));
    }
    public function delete($id)
    {
        $users= User::find($id)->delete();
        return redirect('/user')->with('message','User Deleted Successfully');
    }
}
