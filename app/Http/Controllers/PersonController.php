<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::get()->all();
        return view('home',compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $route = "store";
        return view('add',compact('route'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->only(['name','phone_nr']);
        $request['phone_nr'] = preg_replace('/\s+/','',$request['phone_nr']);
        $validator = Validator::make($request, [
            'name'=>'required',
            'phone_nr'=>'required|numeric|regex:/(07)[0-9]{8}/',
        ]);
        $errors = $validator->errors();

        if ($validator->fails()) {
            return redirect()->back()->with('success', false)
                            ->withErrors($validator)
                            ->withInput();
        }

        $person = new Person;
        $person->name = $request['name'];
        $person->phone_nr = $request['phone_nr'];
        $person-> save(); 
        $persons = Person::get()->all();
        return view('home',compact('persons'))->with('success', true)->with('message', 'Person added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $person = Person::find($id);
        if(!$person)
            return abort(404, 'Person not found!');

        $route = "update";

        return view('add',compact('route','person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
       
        $request = $request->only(['name','phone_nr','id']);
        $request['phone_nr'] = preg_replace('/\s+/','',$request['phone_nr']);
        $validator = Validator::make($request, [
            'name'=>'required',
            'phone_nr'=>'required|numeric|regex:/(07)[0-9]{8}/',
        ]);
        $errors = $validator->errors();

        if ($validator->fails()) {
            return redirect()->back()->with('success', false)
                            ->withErrors($validator)
                            ->withInput();
        }
        
        $person = Person::find($request['id']);
        $person->name = $request['name'];
        $person->phone_nr = $request['phone_nr'];
        $person-> save(); 

        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $person = Person::find($id);
        if(!$person)
            return abort(404, 'Person not found!');

        $person->delete();
        
        return redirect()->route('home');
    }
}
