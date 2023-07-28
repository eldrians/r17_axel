@extends('persons.layout')
@section('content')

    <div class="card">
        <div class="card-header">Person Page</div>
        <div class="card-body">

            <form action="{{ url('person') }}" method="post">
                {!! csrf_field() !!}
                <label>Nama</label></br>
                <input type="text" name="nama" id="nama" class="form-control"></br>
                <label>Jabatan</label></br>
                <input type="text" name="jabatan" id="jabatan" class="form-control"></br>
                <label>Jenis Kelamin</label></br>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control"></br>
                <label>Alamat</label></br>
                <input type="text" name="alamat" id="alamat" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
