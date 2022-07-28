<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UserImport implements ToModel, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {
        $groupId;
        ini_set('max_execution_time', 600);
        $exist = Group::where("nama", $row[1])->get();
        if ( count($exist->all()) === 0 ) {
            $group = Group::create([
                "nama" => $row[1],
                "kota" => " "
            ]);
            $groupId = $group->id;
        }else{
            foreach ($exist->all() as $key => $value) {
                $groupId = $value->id;
            }
        }

        return new User([
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

     public function chunkSize(): int
    {
        return 1000;
    }
    
}
