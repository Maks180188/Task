<?php

namespace App\Imports;

use App\Models\Person;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PersonsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Person::create([
                'number' => $row[0],
                'name' => $row[1],
                'last_name' => $row[2],
                'gender' => $row[3],
                'date_of_birth' => $row[4],
            ]);
        }
    }
}
