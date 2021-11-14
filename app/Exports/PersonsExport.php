<?php

namespace App\Exports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Person::select('number', 'name', 'last_name', 'gender', 'date_of_birth')->get();
    }
}
