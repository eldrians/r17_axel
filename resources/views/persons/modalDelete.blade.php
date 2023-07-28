<div class="modal fade" id="modalDelete{{ $person->id }}" tabindex="-1" aria-labelledby="addnewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="addnewModalLabel">Konfirmasi Hapus Data</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="font-bold text-lg mb-2">Anda akan menghapus data:</p>
                <p><span class="font-semibold capitalize">nama: </span>{{ $person->nama }}</p>
                <p><span class="font-semibold capitalize">jabatan: </span>{{ $person->jabatan }}</p>
                <p><span class="font-semibold capitalize">jenis kelamin: </span>{{ $person->jenis_kelamin }}</p>
                <p><span class="font-semibold capitalize">alamat: </span>{{ $person->alamat }}</p>
                <form method="POST" action="{{ url('/person' . '/' . $person->id) }}" accept-charset="UTF-8">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                <div class="flex flex-row gap-2">
                    <button type="button" title="close" data-bs-dismiss="modal"
                        class="bg-red-500 py-2 px-3 rounded text-xs shadow-md cursor-pointer">
                        <span class="text-light capitalize font-semibold">close</span>
                    </button>
                    <button type="submit" title="submit"
                        class="bg-red-900 py-2 px-3 rounded text-xs shadow-md cursor-pointer">
                        <span class="text-light capitalize font-semibold">Hapus Data</span>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('sweetalert::alert')