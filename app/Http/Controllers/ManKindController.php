<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class ManKindController extends Controller
{
    public function getPersons(Request $request)
    {
        if ($request->ajax()) {
            $data = Person::all();
            return response()->json(['data' => $data]);
        }
        return view('welcome');
    }
}
