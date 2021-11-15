<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class TeacherController extends PeopleController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $allTeachers = People::where("category", 1)->orderBy("id", "desc")->get();
        return view('teachers.index')->with('teachers', $allTeachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form-person')->with(['personCategoryId' => 1, 'personCategorylabel' => 'Teacher']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(People $teacher)
    {
        return view('form-person')->with(['person' => $teacher]);
    }
}
