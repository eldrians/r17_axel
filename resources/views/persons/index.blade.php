@extends('persons.layout')
@section('content')
    <div class="h-full">
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

        {{-- search bar --}}
        <form method="GET" action="/search" class="mb-2">
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

        <div class="flex flex-col h-[250px]">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-xs">
                            <thead class="border-b-2 border-secondary">
                                <tr>
                                    <th scope="col" class="px-6 py-2">No.</th>
                                    <th scope="col" class="px-6 py-2">Nama</th>
                                    <th scope="col" class="px-6 py-2">Jabatan</th>
                                    <th scope="col" class="px-6 py-2">Jenis Kelamin</th>
                                    <th scope="col" class="px-6 py-2">Alamat</th>
                                    <th scope="col" class="px-6 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persons as $person)
                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-primary/10">
                                        <td class="whitespace-nowrap px-6 py-2 font-medium">{{ $loop->iteration }}</td>
                                        <td class="whitespace-nowrap px-6 py-2">{{ $person->nama }}</td>
                                        <td class="whitespace-nowrap px-6 py-2">{{ $person->jabatan }}</td>
                                        <td class="whitespace-nowrap px-6 py-2">{{ $person->jenis_kelamin }}</td>
                                        <td class="whitespace-nowrap px-6 py-2">{{ $person->alamat }}</td>
                                        <td class="whitespace-nowrap px-6 py-2">
                                            <div class="flex flex-row gap-1 justify-center items-center">
                                                <a title="edit" data-bs-toggle="modal"
                                                    data-bs-target="#editPerson{{ $person->id }}"
                                                    data-item-id="{{ $person }}"
                                                    class="bg-secondary rounded text-xs shadow-md py-1 px-1.5 h-fit cursor-pointer">
                                                    <span class="text-light">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                                @include('persons.modalEdit', ['person' => $person])

                                                <form method="POST" action="{{ url('/person' . '/' . $person->id) }}"
                                                    accept-charset="UTF-8">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit"
                                                        class="bg-red-500 rounded text-xs shadow-md py-1 px-2 h-fit cursor-pointer"
                                                        title="delete"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                        <span class="text-light"><i class="fa fa-trash-o"
                                                                aria-hidden="true"></i></span></button>
                                                </form>
                                            </div>
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
@endsection
