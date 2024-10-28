<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialization;

class FetchFromDataBase extends Controller
{
    public function specializationData()
    {
        $specializationData = Specialization::all();
        return view('generate-quiz', compact('specializationData'));
    }
}
