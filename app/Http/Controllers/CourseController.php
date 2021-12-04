<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\People;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCourses = Course::orderBy("id", "desc")->get();
        return view('courses.index')->with('courses', $allCourses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courseInfo = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $course = Course::firstOrCreate($courseInfo);

        if ($course->save()) {
            return redirect()->route("courses.index")->with('success', "New course registered successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $students = $course->people()->where("category", 2)->orderBy("name", "asc")->get();
        $teachers = $course->people()->where("category", 1)->orderBy("name", "asc")->get();

        return view("courses.details")->with(["course" => $course, "students" => $students, "teachers" => $teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('form-course')->with(['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $courseInfo = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($course->fill($courseInfo)->save()) {
            return redirect()->route("courses.index")
                ->with('success', "Course updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if ($course->delete()) {
            return response()->json('Deleted successfully');
        }
    }

    public function deletePerson(int $courseId, int $personId): \Illuminate\Http\RedirectResponse
    {
        $course = Course::findOrFail($courseId);
        if ($course->people()->detach($personId)) {
            return redirect()->route("courses.show", $courseId)
                ->with('success', "The person was removed from this course successfully.");
        } else {
            return redirect()->route("courses.show", $courseId)
                ->with('error', "There was an error trying to remove this person from this course.");
        }
        return response()->json();
    }

    public function addPerson(Request $request)
    {
        $course = Course::find($request->post("course-id"));
        $person = People::find($request->post("person-id"));

        $result = $course->people()->sync([$person->id], false);

        if($result["attached"]){
            return redirect()->route("courses.show", $course->id)
                ->with('success', "{$person->name} was added to this course successfully.");
        }else{
            return redirect()->route("courses.show", $course->id)
                ->with('error', "Seems like \"{$person->name}\" was already on this course.");
        }
    }
}
