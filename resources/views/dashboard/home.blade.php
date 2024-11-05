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
@elseif (Auth()->user()->hasRole('kepala bagian'))
<div class="card bg-primary text-white shadow">
    <h5 class="card-header text-white">Halo kepala bagian, selamat datang di Sistem Manajemen Aset !</h5>
    <div class="card-body">
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque cupiditate provident ut,
            reprehenderit quasi quisquam aspernatur consequatur impedit ipsum, itaque rerum sunt perspiciatis possimus,
            molestias magnam expedita voluptatum ipsam iusto repellat. Provident dolore vel sapiente maiores inventore?
            Dicta accusantium exercitationem amet aliquam tenetur eveniet illo saepe libero, maiores id recusandae!</p>
    </div>
</div>
@endif
@endsection