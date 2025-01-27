@extends('layout.main-fluid')
@section('content')
<div class="container mt-2">
    <form action="{{ route('prediksi.normalisasi.store') }}" method="post">
        @csrf
        <button class="btn btn-primary">Generate tabel normalisasi</button>
    </form>
</div>
<div class="container mt-2">
    <div class="card">
        <h5 class="card-header">tabel normalisasi nilai kriteria aset elektronik</h5>
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
                            @forelse ($normalisasi as $itemNilaiKriteria)
                            @if ($itemNilaiKriteria->alternatif_id == $item->id)
                            <td>{{ $itemNilaiKriteria->nilai_normalisasi }}</td>
                            @endif
                            @empty
                            @endforelse
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
{{-- ! aset kendaraan ! --}}
<div class="container mt-2">
    <div class="card">
        <h5 class="card-header">tabel normalisasi nilai kriteria aset kendaraan</h5>
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
                            @forelse ($normalisasi as $itemNilaiKriteria)
                            @if ($itemNilaiKriteria->alternatif_id == $item->id)
                            <td>{{ $itemNilaiKriteria->nilai_normalisasi }}</td>
                            @endif
                            @empty
                            @endforelse
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