@extends('layout.main-fluid')
@section('content')
<div class="container mt-2">
    <form action="{{ route('prediksi.hasilAkhir.store') }}" method="post">
        @csrf
        <button class="btn btn-primary">hitung hasil akhir</button>
    </form>
</div>
    <div class="container mt-2">
        <div class="card">
            <h5 class="card-header">Hasil Akhir</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <td>no</td>
                            <td>nama alternatif</td>
                            <td>skor akhir</td>
                            <td>predikat</td>
                        </thead>
                        <tbody>
                            @forelse ($alternatif as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_alternatif }}</td>
                                    @forelse ($hasilAkhir as $itemHasilAkhir)
                                        @if ($itemHasilAkhir->alternatif_id == $item->id)
                                        <td>{{ $itemHasilAkhir->skor_akhir }}</td>
                                        <td>{{ $itemHasilAkhir->keterangan }}</td>
                                        @endif
                                    @empty
                                        
                                    @endforelse
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection