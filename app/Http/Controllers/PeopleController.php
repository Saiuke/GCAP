<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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

        if($person->save()){
            return redirect()->route($personCategory . "s.index")
                ->with('success', "New $personCategory registered successfully");
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
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

        if($person->fill($personInfo)->save()) {
            return redirect()->route($person->category_label . "s.index")
                ->with('success', $successMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     */
    public function destroy(People $people)
    {
    }
}
