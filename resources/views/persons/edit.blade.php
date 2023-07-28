@extends('persons.layout')
@section('content')

    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('person/' . $persons->id) }}" method="post">
                {!! csrf_field() !!}
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $persons->id }}" id="id" />
                <label>Nama</label></br>
                <input type="text" name="nama" id="nama" value="{{ $persons->nama }}" class="form-control"></br>
                <label>Jabatan</label></br>
                <input type="text" name="jabatan" id="jabatan" value="{{ $persons->jabatan }}"
                    class="form-control"></br>
                <label>Jenis Kelamin</label></br>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{ $persons->jenis_kelamin }}"
                    class="form-control"></br>
                <label>Alamat</label></br>
                <input type="text" name="alamat" id="alamat" value="{{ $persons->alamat }}"
                    class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
