<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view("user.index", compact(["users"]));
    }

    public function create()
    {
        $groups = Group::all();
        return view("user.tambah", compact(["groups"]));
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "name" => "min:3|max:100",
            'email' => 'email:rfc,dns|unique:users,email',
        ]);

        User::create([
            "group_id" => $request->group_id,
            "role" => "user",
            "email" => $request->email,
            "name" => $request->name,
            "noHp" => "",
            "alamat" => "",
            "profilePic" => "default.jpg",
            "password" => bcrypt("12345"),
        ]);
        return redirect("/user")->with("success", "Data Berhasil Ditambahkan");
    }

    public function show(User $user)
    {
        return view("user.detail", compact(["user"]));
    }

    public function edit(User $user)
    {
        $groups = Group::all();
        return view("user.ubah", compact(["user", "groups"]));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            "name" => "min:3|max:100",
            "email" => "email:rfc,dns|".Rule::unique('users')->ignore($user->id),
            "group_id" => "required", 
        ]);

        if ($request->profilePic) {
            $request->validate([
                "profilePic" => "mimes:jpg,jpeg,png,img", 
            ]);
            unlink("img/".$user->profilePic);
            $imgName = Str::random(40) . "-" . time() . "." . $request->profilePic->extension();
            $request->profilePic->move("img/", $imgName);
            $user->profilePic = $imgName;
            $user->save();
        }

        if ($request->alamat) {
            $request->validate([
                "alamat" => ["min:3", "max:200"], 
            ]);
            $user->alamat = $request->alamat;
            $user->save();            
        }

        if ($request->noHp) {
            $user->noHp = $request->noHp;
            $user->save();
        }

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "group_id" => $request->group_id, 
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(User $user)
    {
        unlink("img/".$user->profilePic);
        $user->delete();
        return redirect("/user")->with("success", "Data Berhasil Dihapus");
    }


    public function getUser()
    {
        return view("user.getUser");
    }

    public function getApiUser(Request $request)
    {
        $user = User::where("id", $request->id)->get();
        $dataUser = response()->json([
            "data" => $user
        ]);
        $idUser = $request->id;
        return view("user.getUser", compact(["dataUser", "idUser"]));
    }

    public function import(Request $request)
    {
        Excel::queueImport(new UserImport, $request->data_user);
    }

}
