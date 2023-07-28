@extends('persons.layout')
@section('content')
    <div>
        {{-- header --}}
        <div class="w-full mb-12 flex flex-row justify-between items-center">
            <div>
                <h1 class="text-3xl font-regular text-primary">R17 <span class="font-extrabold text-secondary">Group</span>
                </h1>
                <p class="uppercase text-xs text-secondary">bring the best together</p>
            </div>
            <div class="flex flex-row gap-2">
                <a title="Add New Person" data-bs-toggle="modal" data-bs-target="#createPerson"
                    class="bg-primary py-2 px-3 rounded text-xs shadow-md cursor-pointer">
                    <span class="text-light capitalize font-semibold">+ create new</span>
                </a>
                <a title="Import Data From URL" data-bs-toggle="modal" data-bs-target="#importData"
                    class="bg-green-600 py-2 px-3 rounded text-xs shadow-md cursor-pointer">
                    <span class="text-light capitalize font-semibold">import</span>
                </a>
            </div>
        </div>

        <div class="w-full border">
            <form method="GET" action="/search">
                <div>
                    <input name="search" placeholder="search..." value="{{ isset($search) ? $search : '' }}">
                    <button type="submit">Search</button>
                </div>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                        name</label>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="John" required>
                </div>
            </form>
        </div>


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
                                    data-bs-target="#editPerson{{ $item->id }}" data-item-id="{{ $item }}">
                                    edit
                                </a>
                                @include('persons.modalEdit', ['person' => $item])


                                <form method="POST" action="{{ url('/person' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Person"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
