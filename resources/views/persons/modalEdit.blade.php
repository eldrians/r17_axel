<div class="modal fade" id="editPerson{{ $person->id }}" tabindex="-1" aria-labelledby="addnewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="addnewModalLabel">Edit data {{ $person->nama }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('person/' . $person->id) }}" method="post" class="flex flex-col gap-3">
                    {!! csrf_field() !!}
                    @method('PATCH')
                    <input type="hidden" name="id" id="id" value="{{ $person->id }}" id="id" />
                    <div>
                        <label for="nama" class="block mb-1 ml-1 text-xs font-bold text-secondary">
                            Nama
                        </label>
                        <input type="text" name="nama" id="nama" placeholder="nama"
                            value="{{ $person->nama }}"
                            class="bg-transparent shadow-sm  text-secondary border-[0.5px]
                            text-xs rounded-md focus:outline-primary focus:outline-[1px] focus:ring-blue-200  block w-full 
                            focus:border-none
                            py-2 pl-3 pr-4">
                    </div>
                    <div>
                        <label for="jabatan" class="block mb-1 ml-1 text-xs font-bold text-secondary">
                            Jabatan
                        </label>
                        <input type="text" name="jabatan" id="jabatan" placeholder="jabatan"
                            value="{{ $person->jabatan }}"
                            class="bg-transparent shadow-sm  text-secondary border-[0.5px]
                            text-xs rounded-md focus:outline-primary focus:outline-[1px] focus:ring-blue-200  block w-full 
                            focus:border-none
                            py-2 pl-3 pr-4">
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block mb-1 ml-1 text-xs font-bold text-secondary">
                            Jenis Kelamin
                        </label>
                        <div class="flex items-center ml-2 mb-1">
                            <input id="male" type="radio" value="Laki-laki" name="jenis_kelamin"
                                class="w-2 h-2 bg-light border-secondary"
                                @if ($person->jenis_kelamin === 'Laki-laki') checked @endif>
                            <label for="male" class="ml-2 text-xs text-secondary ">Laki-laki</label>
                        </div>
                        <div class="flex items-center ml-2">
                            <input id="female" type="radio" value="Perempuan" name="jenis_kelamin"
                                class="w-2 h-2 bg-light border-secondary"
                                @if ($person->jenis_kelamin === 'Perempuan') checked @endif>
                            <label for="female" class="ml-2 text-xs text-secondary ">Perempuan</label>
                        </div>
                    </div>
                    <div>
                        <label for="alamat" class="block mb-1 ml-1 text-xs font-bold text-secondary">
                            Alamat
                        </label>
                        <input type="text" name="alamat" id="alamat" placeholder="alamat"
                            value="{{ $person->alamat }}"
                            class="bg-transparent shadow-sm  text-secondary border-[0.5px]
                            text-xs rounded-md focus:outline-primary focus:outline-[1px] focus:ring-blue-200  block w-full 
                            focus:border-none
                            py-2 pl-3 pr-4">
                    </div>
            </div>
            <div class="modal-footer">
                <div class="flex flex-row gap-2">
                    <button type="button" title="close" data-bs-dismiss="modal"
                        class="bg-red-500 py-2 px-3 rounded text-xs shadow-md cursor-pointer">
                        <span class="text-light capitalize font-semibold">close</span>
                    </button>
                    <button type="submit" title="submit"
                        class="bg-primary py-2 px-3 rounded text-xs shadow-md cursor-pointer">
                        <span class="text-light capitalize font-semibold">Simpan</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
