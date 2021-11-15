<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class StudentController extends PeopleController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $allStudents = People::where("category", 2)->orderBy("id", "desc")->get();
        return view('students.index')->with('students', $allStudents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form-person')->with(['personCategoryId' => 2, 'personCategorylabel' => 'Student']);
    }


    public function edit(People $student)
    {
        return view('form-person')->with(['person' => $student]);
    }
}
