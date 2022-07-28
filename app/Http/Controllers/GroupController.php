<?php

namespace App\Http\Controllers;

// use ;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Imports\GroupImport;
use Maatwebsite\Excel\Facades\Excel;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::latest()->get();
        return view("group.index", compact(["groups"]));
    }

    public function create()
    {
        return view("group.tambah");
    }
    
    public function store(Request $request)
    {
        
        $validated = $this->validate($request, [
            "nama" => "min:3|max:100|unique:groups,nama",
            "kota" => "min:3|max:100|unique:groups,kota",
        ]);

        Group::create([
            "nama" => $request->nama,
            "kota" => $request->kota,
        ]);
        return redirect("/group")->with("success", "Data Berhasil Ditambahkan");
    }
    
    public function show(Group $group)
    {
        //
    }
    
    public function edit(Group $group)
    {
        return view("group.ubah", compact(["group"]));
    }

    
    public function update(Request $request, Group $group)
    {
        $validated = $this->validate($request, [
            "nama" => "min:3|max:100|".Rule::unique('groups')->ignore($group->id),
            "kota" => "min:3|max:100|".Rule::unique('groups')->ignore($group->id),
        ]);

        $group->update([
            "nama" => $request->nama,
            "kota" => $request->kota,
        ]);
        return redirect("/group")->with("success", "Data Berhasil Diubah");
    }
    
    public function destroy(Group $group)
    {
        
        $group->delete();
        return redirect("/group")->with("success", "Data Berhasil Dihapus");
    }
    public function import(Request $request)
    {
        Excel::import(new GroupImport, $request->data_group);
    }
}
