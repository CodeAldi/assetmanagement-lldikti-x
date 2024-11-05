@extends('layout.main-fluid')
@section('content')
<div class="card shadow">
    <div class="card-header d-flex">
        <h5 class="card-title flex-grow-1">
            Halo, selamat datang di Sistem Manajemen Aset !
        </h5>
        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalupload"><i
                class='bx bx-spreadsheet'></i> Tambah melalui file excel</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">Tambah
            Manual</button>
    </div>
    <div class="card-body">
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque cupiditate provident ut,
            reprehenderit quasi quisquam aspernatur consequatur impedit ipsum, itaque rerum sunt perspiciatis possimus,
            molestias magnam expedita voluptatum ipsam iusto repellat. Provident dolore vel sapiente maiores inventore?
            Dicta accusantium exercitationem amet aliquam tenetur eveniet illo saepe libero, maiores id recusandae!</p>
    </div>
</div>
@endsection