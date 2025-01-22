@extends('layout.main-fluid')
@section('content')
    {{-- ! tabel nilai kriteria ! --}}
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">tabel nilai kriteria</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dataAset">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama alternatif</th>
                                <th>nama kriteria</th>
                                <th>nilai</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($alternatif as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_alternatif }}</td>
                                <td>
                                    <table class="table">
                                        @forelse ($kriteria as $item)
                                        <tr>
                                            <td>{{ $item->nama_kriteria }}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>10%</td>
                                        </tr>
                                        <tr>
                                            <td>1 tahun</td>
                                        </tr>
                                        <tr>
                                            <td>50 km</td>
                                        </tr>
                                        <tr>
                                            <td>Rp.1.000.000</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                        </tr>
                                    </table>
                                </td>
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