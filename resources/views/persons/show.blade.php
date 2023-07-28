@extends('persons.layout')
@section('content')


    <div class="card">
        <div class="card-header">Persons Page</div>
        <div class="card-body">


            <div class="card-body">
                <h5 class="card-title">Nama : {{ $persons->nama }}</h5>
                <p class="card-text">Jabatan : {{ $persons->jabatan }}</p>
                <p class="card-text">Jenis Kelamin : {{ $persons->jenis_kelamin }}</p>
                <p class="card-text">Alamat : {{ $persons->alamat }}</p>
            </div>

            </hr>

        </div>
    </div>
