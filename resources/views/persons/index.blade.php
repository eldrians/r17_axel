@extends('persons.layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success btn-sm" title="Add New Person" data-bs-toggle="modal"
                            data-bs-target="#createPerson">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>
                        <form method="GET" action="/search">
                            <div class="input-group">
                                <input class="form-control" name="search" 
                                placeholder="search..."
                                value="{{ isset($search) ? $search : ''}}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($persons as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->alamat }}</td>

                                            <td>

                                                <a class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editPerson{{ $item->id }}"
                                                    data-item-id="{{ $item }}">
                                                    edit
                                                </a>
                                                @include('persons.modalEdit', ['person' => $item])


                                                <form method="POST" action="{{ url('/person' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Person"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
