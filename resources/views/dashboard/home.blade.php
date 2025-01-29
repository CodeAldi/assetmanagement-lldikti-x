@extends('layout.main-fluid')
@section('content')
@if (Auth()->user()->hasRole('pegawai tu'))
<div class="card bg-primary text-white shadow">
    <h5 class="card-header text-white">Halo pegawai TU, selamat datang di Sistem Manajemen Aset !</h5>
    <div class="card-body">
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque cupiditate provident ut,
            reprehenderit quasi quisquam aspernatur consequatur impedit ipsum, itaque rerum sunt perspiciatis possimus,
            molestias magnam expedita voluptatum ipsam iusto repellat. Provident dolore vel sapiente maiores inventore?
            Dicta accusantium exercitationem amet aliquam tenetur eveniet illo saepe libero, maiores id recusandae!</p>
    </div>
</div>
@elseif (Auth()->user()->hasRole('peminjam'))
<div class="card bg-primary text-white shadow">
    <h5 class="card-header text-white">Halo peminjam, selamat datang di Sistem Manajemen Aset !</h5>
    <div class="card-body">
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque cupiditate provident ut,
            reprehenderit quasi quisquam aspernatur consequatur impedit ipsum, itaque rerum sunt perspiciatis possimus,
            molestias magnam expedita voluptatum ipsam iusto repellat. Provident dolore vel sapiente maiores inventore?
            Dicta accusantium exercitationem amet aliquam tenetur eveniet illo saepe libero, maiores id recusandae!</p>
    </div>
</div>
<div class="card mt-2 col-12 shadow">
    <div class="card-body">
        <h5 class="card-title">List Aset yang tersedia :</h5>
    </div>
</div>

<div class="row justify-content-between mt-2 g-2">
    @forelse ($aset as $item)
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $item->nama }}</h5>
                <p class="card-text">jumlah item : {{ $item->jumlah }}</p>
                <p class="card-text">kondisi : {{ $item->hasilAkhir[0]->keterangan }}</p>
                <img src="{{ asset($item->foto) }}" alt="" class="mx-auto img-thumbnail">
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>
@elseif (Auth()->user()->hasRole('kepala bagian'))
<div class="container">

    <div class="card bg-primary text-white">
        <h5 class="card-header text-white">Halo kepala bagian, selamat datang di Sistem Manajemen Aset !</h5>
        <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque cupiditate provident ut,
                reprehenderit quasi quisquam aspernatur consequatur impedit ipsum, itaque rerum sunt perspiciatis possimus,
                molestias magnam expedita voluptatum ipsam iusto repellat. Provident dolore vel sapiente maiores inventore?
                Dicta accusantium exercitationem amet aliquam tenetur eveniet illo saepe libero, maiores id recusandae!</p>
        </div>
    </div>
    <div class="row mt-2">
        <div class="card bg-success text-white col mx-2">
            <div class="card-body">
                peminjaman aset menunggu persetujuan Kabag : {{ count($menungguKabag) }}
            </div>
        </div>
        <div class="card bg-warning text-white col mx-2">
            <div class="card-body">
                menunggu validasi data oleh TU : {{ count($menungguTu) }}
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="card bg-primary text-white col mx-2">
            <div class="card-body">
                peminjaman aset Disetujui Kabag : {{ count($kabagsetuju) }}
            </div>
        </div>
        <div class="card bg-danger text-white col mx-2">
            <div class="card-body">
                peminjaman ditolak : {{ count($ditolak) }}
            </div>
        </div>
    </div>
</div>
@endif
@endsection