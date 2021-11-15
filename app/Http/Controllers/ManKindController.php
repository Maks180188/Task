<?php

namespace App\Http\Controllers;

use App\Imports\PersonsImport;
use App\Models\Person;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManKindController extends AppBaseController
{
    //remove possibility create more than one class instance
    private static $instance;
    public static function getInstance(): ManKindController
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone() {}
    private function __wakeup() {}

    //get persons list for persons table
    public function getPersons(Request $request)
    {
        if ($request->ajax()) {
            $data = Person::select('number', 'name', 'last_name', 'gender', 'date_of_birth')->get();
            return response()->json(['data' => $data]);
        }
        return view('welcome');
    }

    //import data to DB from file
    public function importPersons(Request $request)
    {
        $request->validate([
            'files' => 'required'
        ]);

        try {
            Excel::import(new PersonsImport, $request->file('files'));
            return $this->sendResponse([], 'successfully');
        } catch (\Exception $e) {
            return $this->sendResponse([], 'Something went wrong');
        }
    }

    //get male percent from all persons
    public function getMalePercent()
    {
        $percent = Person::where('gender', 'm')->count()/Person::count()*100;
        return response()->json(['data' => round($percent, 2, PHP_ROUND_HALF_UP)]);
    }
}
