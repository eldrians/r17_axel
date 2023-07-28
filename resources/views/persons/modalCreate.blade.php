<div class="modal fade" id="createPerson" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addnewModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
