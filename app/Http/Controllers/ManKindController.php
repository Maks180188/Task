<?php

namespace App\Http\Controllers;

use App\Imports\PersonsImport;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Exports\PersonsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\Types\Float_;
use phpDocumentor\Reflection\Types\Integer;

class ManKindController extends AppBaseController
{
    public function getPersons(Request $request)
    {
        if ($request->ajax()) {
            $data = Person::select('number', 'name', 'last_name', 'gender', 'date_of_birth')->get();
            return response()->json(['data' => $data]);
        }
        return view('welcome');
    }

    public function importPersons(Request $request)
    {
        try {
            Excel::import(new PersonsImport, $request->file('files'));
            return $this->sendResponse([], 'successfully');
        } catch (\Exception $e) {
            return $this->sendResponse([], 'Something went wrong');
        }

    }

    public function getMalePercent()
    {
        $percent = Person::where('gender', 'm')->count()/Person::count()*100;
        return response()->json(['data' => round($percent, 2, PHP_ROUND_HALF_UP)]);
    }
}
