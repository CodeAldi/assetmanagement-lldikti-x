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
                            <th>kategori</th>
                            <th>kondisi</th>
                            {{-- <th>aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($aset as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                @if (count($item->hasilAkhir) > 0)
                                    {{ $item->hasilAkhir[0]->keterangan }}
                                @endif
                            </td>
                            {{-- <td><button class="btn btn-primary">Lihat</button></td> --}}
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