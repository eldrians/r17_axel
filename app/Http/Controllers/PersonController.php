<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class PersonController extends Controller
{
    public function index(): View
    {
        $persons = Person::paginate(5);
        return view('persons.index')->with('persons', $persons);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $personsx = Person::where(function ($query) use ($search) {
            $query->where('nama', 'like', "%$search%")
                ->orWhere('jabatan', 'like', "%$search%")
                ->orWhere('jenis_kelamin', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%");
        });

        $persons = $personsx->paginate(5);

        return view('persons.index', compact('persons', 'search'));
    }

    public function fetchData(Request $request)
    {

        $res = Http::get($request->url);

        $persons = json_decode($res->body());
        foreach ($persons as $p) {
            $person = new Person();
            $person->id = $p->id;
            $person->nama = $p->nama;
            $person->jabatan = $p->jabatan;
            $person->jenis_kelamin = $p->jenis_kelamin;
            $person->alamat = $p->alamat;
            $person->save();
        }

        $persons_data = Person::paginate(5);
        Alert::success('Congrats', 'Data berhasil diambil');
        return redirect('person')->with('persons', $persons_data);
    }

    public function create(): View
    {
        return view('persons.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Person::create($input);
        Alert::success('Congrats', 'Data berhasil masuk');
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
        Alert::success('Congrats', 'Data berhasil dirubah');
        return redirect('person')->with('flash_message', 'person Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Person::destroy($id);
        Alert::success('Congrats', 'Data Dihapus');
        return redirect('person')->with('flash_message', 'Person deleted!');
    }
}
