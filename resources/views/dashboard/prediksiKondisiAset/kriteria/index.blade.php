@extends('layout.main-fluid')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kriteria Aset Kategori Elektronik</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dataAset">
                        <thead>
                            <tr>
                                <th>nama</th>
                                <th>jenis kriteria</th>
                                <th>bobot kriteria</th>
                                <th>simbol kriteria</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($kriteria as $item)
                                @if ($item->kriteria_kategori_aset == 'e')
                                    <tr>
                                        <td>{{ $item->nama_kriteria }}</td>
                                        <td>@if ($item->jenis_kriteria == 'c')
                                            Cost
                                        @else
                                            Benefit
                                        @endif</td>
                                        <td>{{ $item->bobot_kriteria }}</td>
                                        <td class="text-uppercase">{{ $item->simbol_kriteria }}</td>
                                    </tr>
                                @else
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kriteria Aset Kategori Kendaraan</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dataAset">
                        <thead>
                            <tr>
                                <th>nama</th>
                                <th>jenis kriteria</th>
                                <th>bobot kriteria</th>
                                <th>simbol kriteria</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($kriteria as $item)
                            @if ($item->kriteria_kategori_aset == 'k')
                            <tr>
                                <td>{{ $item->nama_kriteria }}</td>
                                <td>@if ($item->jenis_kriteria == 'c')
                                    Cost
                                    @else
                                    Benefit
                                    @endif</td>
                                <td>{{ $item->bobot_kriteria }}</td>
                                <td class="text-uppercase">{{ $item->simbol_kriteria }}</td>
                            </tr>
                            @else
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection