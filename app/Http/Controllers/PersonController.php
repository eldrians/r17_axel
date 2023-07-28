<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    public function index(): View
    {
        $persons = Person::all();
        return view('persons.index')->with('persons', $persons);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $persons = Person::where(function ($query) use ($search) {
            $query->where('nama', 'like', "%$search%")
                ->orWhere('jabatan', 'like', "%$search%")
                ->orWhere('jenis_kelamin', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%");
        })->get();

        return view('persons.index', compact('persons', 'search'));
    }

    public function fetchData()
    {
        $res = Http::get("https://r17group.id/test-candidate/");

        $persons = json_decode($res->body());
        $person = new Person();
        // foreach ($persons as $p) {
        $person->id = $persons[0]->id;
        $person->nama = $persons[0]->nama;
        $person->jabatan = $persons[0]->jabatan;
        $person->jenis_kelamin = $persons[0]->jenis_kelamin;
        $person->alamat = $persons[0]->alamat;
        $person->save();
        // }

        return "Data Masuk";
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
        return redirect('person')->with('flash_message', 'Person deleted!');
    }
}
