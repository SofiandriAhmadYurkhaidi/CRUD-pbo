@extends('Layout')
@section('Content')


<a href="#" onclick="ModalTambahKontak()"  class="btn btn-success mb-2"> + Add New Data</a>


<table class="table table-bordered">
    <tr>
        <th>Kode Kontak</th>
        <th>Nama Kontak</th>
        <th>Opsi</th>
    </tr>
    @foreach($kontak as $Get)
    <tr>
        <td>{{ $Get->kd_kontak }}</td>
        <td>{{ $Get->nama_kontak }}</td>
        <td>
            <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#updateModal" data-url="{{ route('kontak.update',['id'=>$Get->kd_kontak]) }}" data-nama_kontak="{{ $Get->nama_kontak }}">Update</button>
            |
            <a href="{{ route('kontak.delete', ['id'=>$Get->kd_kontak]) }}" class="btn btn-danger">Delete</a></td>
        </td>
    </tr>
    @endforeach
</table>



<!-- Form Modal Tambah Berita -->
<form action="kontak/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahKontak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Kode Kontak</label>
                <input type="text" class="form-control" name="kd_kontak" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Kontak</label>
                <textarea name="nama_kontak" class="form-control" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>


<!--Modal Update-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Kontak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kontak.update', ['id'=>1]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Kontak</label>
                            <input type="text" name="nama_kontak" class="form-control" id="exampleFormControlInput1"
                                placeholder="contact@example.com">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>


<script>
    // Modal Tambah Kontak
    function ModalTambahKontak () {
           $('#ModalTambahKontak').modal('show');
       }            
</script>


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $('#updateModal').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Kontak</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="${$(e.relatedTarget).data('url')}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Kontak</label>
                <input type="text" name="nama_kontak" value="${$(e.relatedTarget).data('nama_kontak')}" class="form-control" id="exampleFormControlInput1"
                    placeholder="contact@example.com">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
`;
            $('#modal-content').html(html);
        });
    </script>
    

@endsection

