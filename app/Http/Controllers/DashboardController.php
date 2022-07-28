<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard/index");
    }

    public function deleteAll()
    {
        User::truncate();
        Group::truncate();
        return redirect("/user")->with("success", "Semua Data Berhasil Dihapus");
    }
}
