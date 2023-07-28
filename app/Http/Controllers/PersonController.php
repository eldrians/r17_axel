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
        $students = Person::all();
        return view('students.index')->with('students', $students);
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Person::create($input);
        return redirect('student')->with('flash_message', 'Student Addedd!');
    }
    public function show(string $id): View
    {
        $student = Person::find($id);
        return view('students.show')->with('students', $student);
    }
    public function edit(string $id): View
    {
        $student = Person::find($id);
        return view('students.edit')->with('students', $student);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $student = Person::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('student')->with('flash_message', 'student Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Person::destroy($id);
        return redirect('student')->with('flash_message', 'Student deleted!');
    }
}
