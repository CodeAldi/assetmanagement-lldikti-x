@extends('layout.main-fluid')
@section('content')
    {{-- ! tabel alternatif ! --}}
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">tabel alternatif</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="dataAset">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama aset</th>
                                <th>nama alternatif</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($alternatif as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->aset->nama }}</td>
                                <td>{{ $item->nama_alternatif }}</td>
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