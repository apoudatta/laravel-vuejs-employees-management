<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request)
    {
        $states = State::all();
        if($request->has('search')) {
            $states = State::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('states.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());

        return redirect()->route('states.index')->with('message', 'State Created Successfully');
    }

    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', compact('state','countries'));
    }

    public function update(StateStoreRequest $request, State $state)
    {
        $state->update($request->validated());

        return redirect()->route('states.index')->with('message', 'State Updated Successfully');
    }

    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')->with('message', 'State Deleted Successfully');
    }
}
