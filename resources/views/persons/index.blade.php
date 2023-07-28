@extends('persons.layout')
@section('content')
    <div>
        {{-- header --}}
        <div class="w-full mb-8 flex flex-row justify-between items-center">
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

        <form method="GET" action="/search">
            <div class="w-full flex flex-row justify-between">
                <div class="flex flex-row gap-2 items-end">
                    <div>
                        <label for="search" class="block mb-1 ml-1 text-xs font-bold text-secondary">
                            What are you looking for?
                        </label>
                        <input name="search" placeholder="Search ..." value="{{ isset($search) ? $search : '' }}"
                            class="bg-transparent shadow-sm  text-secondary border-[0.5px]
                            text-xs rounded-md focus:outline-primary focus:outline-[1px] focus:ring-blue-200  block w-full 
                            focus:border-none
                            py-2 pl-3 pr-4"
                            id="search" type="text">
                    </div>
                    <button type="submit"
                        class="py-2 px-2.5 shadow-md h-fit text-xs border border-primary rounded text-primary font-bold">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
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
