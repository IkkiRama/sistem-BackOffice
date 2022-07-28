<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);
        return response()->json([
            "data" => $user
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            "group_id" => $request->group_id,
            "name" => $request->name,
            "role" => "user",
            "email" => $request->email,
            "noHp" => $request->noHp,
            "alamat" => $request->alamat,
            "profilePic" => $request->profilePic,
            "password" => bcrypt($request->password),
        ]);

        return response()->json([
            "data" => $user
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            "data" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->group_id = $request->group_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->noHp = $request->noHp;
        $user->alamat = $request->alamat;
        $user->profilePic = $request->profilePic;
        $user->save();

        return response()->json([
            "data" => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            "message" => "Custumer Deleted"
        ], 204);

    }
}
