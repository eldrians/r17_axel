<div class="modal fade" id="editPerson{{ $person->id }}" tabindex="-1" aria-labelledby="addnewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addnewModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('person/' . $person->id) }}" method="post">
                    {!! csrf_field() !!}
                    @method('PATCH')
                    <input type="hidden" name="id" id="id" value="{{ $person->id }}" id="id" />
                    <label>Nama</label></br>
                    <input type="text" name="nama" id="nama" value="{{ $person->nama }}"
                        class="form-control"></br>
                    <label>Jabatan</label></br>
                    <input type="text" name="jabatan" id="jabatan" value="{{ $person->jabatan }}"
                        class="form-control"></br>
                    <label>Jenis Kelamin</label></br>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{ $person->jenis_kelamin }}"
                        class="form-control"></br>
                    <label>Alamat</label></br>
                    <input type="text" name="alamat" id="alamat" value="{{ $person->alamat }}"
                        class="form-control"></br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Save Changes" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>
