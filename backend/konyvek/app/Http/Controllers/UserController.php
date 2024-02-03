<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $Users = response()->json(User::all());
        return $Users;
    }

    public function show($id){
        $User = response()->json(User::find($id));
        return $User;
    }

    public function store(Request $request){
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->permission = $request->permission;
        $User->save();
    }

    public function update(Request $request, $id){
        $User = User::find($id);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->permission = $request->permission;
        $User->save();
    }

    public function destroy($id){
        User::find($id)
        ->delete();
    }
}
