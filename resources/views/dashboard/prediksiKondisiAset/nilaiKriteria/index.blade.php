@extends('layout.main-fluid')
@section('content')
<div class="container mt-2">
    <button class="btn btn-primary">Generate tabel nilai alternatif</button>
</div>
<div class="container mt-2">
    <div class="card h-50">
        <div class="card-body">generate tabel nilai alternatif</div>
    </div>
</div>
{{-- ! elektronik ! --}}
<div class="container mt-2">
    <div class="card">
        <h5 class="card-header">tabel nilai alternatif aset elektronik</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">alternatif</th>
                            <th colspan="5" class="text-center">kriteria</th>
                        </tr>
                        <tr>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatif as $item)
                            @if ($item->aset->kategori == 'elektronik')
                            <tr>
                                <td>{{ $item->nama_alternatif }}</td>
                            </tr>
                            @endif
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- ! kendaraan ! --}}
<div class="container mt-2">
    <div class="card">
        <h5 class="card-header">tabel nilai alternatif aset kendaraan</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">alternatif</th>
                            <th colspan="5" class="text-center">kriteria</th>
                        </tr>
                        <tr>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatif as $item)
                            @if ($item->aset->kategori == 'kendaraan')
                            <tr>
                                <td>{{ $item->nama_alternatif }}</td>
                            </tr>
                            @endif
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection