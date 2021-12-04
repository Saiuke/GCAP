<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeopleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personInfo = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'document' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $person = People::firstOrCreate($personInfo);
        $personCategory = $person->categoryLabel;

        if ($person->save()) {
            return redirect()->route($personCategory . "s.index")
                ->with('success', "New $personCategory registered successfully");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, People $person)
    {
        $personInfo = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'document' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $successMessage = Str::title("$person->category_label updated successfully");

        if ($person->fill($personInfo)->save()) {
            return redirect()->route($person->category_label . "s.index")
                ->with('success', $successMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $person)
    {
        if ($person->delete()) {
            return response()->json('Deleted successfully');
        }
    }

    public function autocomplete(Request $request): \Illuminate\Http\JsonResponse
    {
        $personName = $request->get("personName");
        $courseId = $request->get("courseId");

        $searchResult = People::select('name', 'id')->where("name", "LIKE", "%{$personName}%")->get();
        return response()->json($searchResult);
    }
}
