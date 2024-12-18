@extends('layout.main-fluid')
@push('page-css')
<script src="https://code.jquery.com/jquery-3.7.1.slim.js"
    integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.css" rel="stylesheet">

<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.1.8/datatables.min.js"></script>
@endpush
@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header row">
            <h5 class="card-title col-8 mt-3">
                Halo, selamat datang di Peminjaman Manajemen Aset !
            </h5>
            <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#modalCreate">
                <i class="tf-icons bx bx-plus-circle"></i>
                Ajukan Peminjaman Aset
            </button>
        </div>
        {{-- <div class="card-body">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo modi voluptatibus assumenda vero, totam
            et!
        </div> --}}
    </div>
</div>
<div class="container mt-2">

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Tabel list pengajuan peminjaman aset</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="dataAset">
                <thead>
                    <tr>
                        <th>nama</th>
                        <th>jumlah</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($datapeminjaman as $item)
                        <tr>
                            <td>{{ $item->aset->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $item->status }}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalShow{{ $item->index }}" data-><i class="bx bx-show-alt me-1"></i>
                                            Lihat</button>
                                        <a class="dropdown-item btn btn-warning text-white"><i class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item btn btn-danger text-white"><i class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="bg-warning text-white text-center">data masih kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    {{-- <div class="row">
        @forelse ($aset as $item)
        <div class="col-3">
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
    </div> --}}
</div>
<!-- Modal untuk create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('ajukan.peminjaman.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Peminjaman aset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="pilihaset" class="form-label">Pilih Aset</label>
                        <select name="pilihaset" id="pilihaset" class="form-select">
                            <option value="#">Pilih aset</option>
                            @forelse ($aset as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} (tersedia : {{ $item->jumlah }})</option>
                            @empty
                                <option value="#">tidak ada aset yang tersedia</option>
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="jumlah" class="form-label">jumlah aset yang akan dipinjam</label>
                        <input type="number" id="jumlah" class="form-control" name="jumlah"
                            placeholder="masukan jumlah aset yang akan dipinjam (angka)" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="alasanpinjam" class="form-label">Alasan peminjaman</label>
                        <input type="text" id="alasanpinjam" class="form-control" name="alasanpinjam"
                            placeholder="masukan alasan peminjaman aset" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="tanggal_mulai" class="form-label">tanggal mulai peminjaman</label>
                        <input type="date" id="tanggal_mulai" class="form-control" name="tanggal_mulai" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="lamapinjam" class="form-label">Lama peminjaman aset (Hari)</label>
                        <input type="number" id="lamapinjam" class="form-control" name="lamapinjam"
                            placeholder="masukan Lama peminjaman aset (hari)" required />
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
{{-- modal untuk show --}}
@forelse ($aset as $item)
<div class="modal fade" id="modalShow{{ $item->index }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateTitle">Detail Data Aset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="namashow" class="form-control" name="namaAset"
                            placeholder="{{ $item->nama }}" readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="jumlah" class="form-label">jumlah aset</label>
                        <input type="number" id="jumlahshow" class="form-control" name="jumlahAset"
                            placeholder="{{ $item->jumlah }}" readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="fotoaset" class="form-label">foto aset</label>
                        <img src="{{ asset($item->foto) }}" alt="" class="img-thumbnail">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@empty

@endforelse
{{-- modal untuk edit --}}

@endsection
@if (count($datapeminjaman))
@push('page-js')
<script>
    let table = new DataTable('#dataAset', {
        // options
        });
</script>
@endpush

@endif