<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(): View
    {
        $persons = Person::all();
        return view('persons.index')->with('persons', $persons);
    }

    public function create(): View
    {
        return view('persons.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Person::create($input);
        return redirect('person')->with('flash_message', 'person Addedd!');
    }
    public function show(string $id): View
    {
        $person = Person::find($id);
        return view('persons.show')->with('persons', $person);
    }
    public function edit(string $id): View
    {
        $person = Person::find($id);
        return view('persons.edit')->with('persons', $person);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $person = Person::find($id);
        $input = $request->all();
        $person->update($input);
        return redirect('person')->with('flash_message', 'person Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Person::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');
    }
}
