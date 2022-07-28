<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 2) {
                
                // $group = new Group();
                // $group->nama = $row[1];
                // $group->kota = " ";
                // $group->save();

                $group = Group::create([
                    "nama" => $row[1],
                    "kota" => " "
                ]);

                $groupId = $group->id;
                User::create([
                    "id" => $row[0],
                    "group_id" => $groupId,
                    "name" => $row[2],
                    "role" => "user",
                    "email" => $row[5],
                    "noHp" => $row[4],
                    "alamat" => $row[3],
                    "profilePic" => "default.jpg",
                    "password" => bcrypt("12345")
                ]);
            }
        }

        return redirect("/user")->with("success", "Data Berhasil Diimport");
        // dd($collection);
    }
}
