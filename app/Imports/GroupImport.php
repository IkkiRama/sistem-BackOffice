<?php

namespace App\Imports;

use App\Models\Group;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GroupImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key >= 2) {
                $group = Group::find($row[1]);
                dump($group);
                if ($group == null) {
                    // Group::create([
                    //     "nama" => $row[1],
                    //     "kota" => " "
                    // ]);
                }
            }
            // return redirect("/group")->with("success", "Data Berhasil Diimport");
        }
    }
}
