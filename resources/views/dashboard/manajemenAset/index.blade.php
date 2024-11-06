@extends('layout.main-fluid')
@section('content')
<div class="card shadow">
    <div class="card-header row">
        <h5 class="card-title col-9 mt-3">
            Halo, selamat pagi di Sistem Manajemen Aset !
        </h5>
        <button type="button" class="btn btn-primary col" data-bs-toggle="modal" data-bs-target="#modalCreate">
            <i class="tf-icons bx bx-plus-circle"></i>
            Tambah
        </button>
    </div>
    <div class="card-body">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo modi voluptatibus assumenda vero, totam et!
    </div>
</div>
<div class="container mt-2">
    <div class="row">
        @forelse ($aset as $item)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">jumlah item : {{ $item->jumlah }}</p>
                    <img src="{{ asset($item->foto) }}" alt="" class="mx-auto img-thumbnail">
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
</div>
<!-- Modal untuk create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Tambah Data Aset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" class="form-control" name="namaAset"
                            placeholder="masukan nama aset" autofocus required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="jumlah" class="form-label">jumlah aset</label>
                        <input type="number" id="jumlah" class="form-control" name="jumlahAset"
                            placeholder="masukan jumlah aset yang akan diinput (angka)" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="fotoaset" class="form-label">foto aset</label>
                        <input type="file" id="fotoaset" class="form-control" name="fotoaset" required />
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col mb-3">
                        <label for="jenkel" class="form-label">Kategori Aset</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="0" hidden> pilih jenis Kategori aset</option>
                            <option value="laki laki">elektronik</option>
                            <option value="perempuan">alat tulis</option>
                            <option value="perempuan">alat tulis</option>
                            <option value="perempuan">alat tulis</option>
                            <option value="perempuan">alat tulis</option>
                        </select>
                    </div>
                </div> --}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection