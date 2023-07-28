@extends('persons.layout')
@section('content')


    <div class="card">
        <div class="card-header">Persons Page</div>
        <div class="card-body">


            <div class="card-body">
                <h5 class="card-title">Nama : {{ $person->nama }}</h5>
                <p class="card-text">Jabatan : {{ $person->jabatan }}</p>
                <p class="card-text">Jenis Kelamin : {{ $person->jenis_kelamin }}</p>
                <p class="card-text">Alamat : {{ $person->alamat }}</p>
            </div>

            </hr>

        </div>
    </div>
