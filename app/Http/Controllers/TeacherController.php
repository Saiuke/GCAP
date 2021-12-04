<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\People;
use Illuminate\Database\Eloquent\Collection;
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


    public function autocomplete(Request $request): \Illuminate\Http\JsonResponse
    {
        $personName = $request->get("personName");
        $searchResult = People::select('name', 'id')->where("category", 1)->where("name", "LIKE", "%{$personName}%")->get();
        return response()->json($searchResult);
    }

    public function generateReport(Request $request)
    {
        $teacher = People::find($request->post("person-id"));
        $courses = $teacher->courses()->get();
        $students = new Collection();

        foreach ($courses as $course){
            $students = $students->merge($course->people()->get());
        }

        return view("reports.teacher-students")->with(["courses" => $courses, "students" => $students, "teacher" => $teacher]);
    }
}
