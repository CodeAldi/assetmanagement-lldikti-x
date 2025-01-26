@extends('layout.main-fluid')
@section('content')
    {{-- ! tabel alternatif ! --}}
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $asetCount }} aset yang belum memiliki data tabel alternatif !</p>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header row">
                <h5 class="card-title col-8">tabel alternatif</h5>
                <button class="btn btn-primary rounded-pill col" data-bs-toggle="modal" data-bs-target="#modalCreate"><i class="tf-icons bx bx-plus-circle"></i>tambah</button>
            </div>
            <div class="table-responsive text-nowrap card-body">
                <table class="table" id="dataAset">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama aset</th>
                            <th>kategori aset</th>
                            <th>nama alternatif</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($alternatif as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->aset->nama }}</td>
                            <td>{{ $item->aset->kategori }}</td>
                            <td>{{ $item->nama_alternatif }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal create --}}
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" action="{{ route('prediksi.alternatif.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateTitle">Tambah Data tabel alternatif</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="aset_id" class="form-label">pilih aset</label>
                            <select name="aset_id" class="form-select" id="aset_id">
                                <option value="0">pilih aset</option>
                                @forelse ($aset as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @empty
                    
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nama" class="form-label">Nama alternatif</label>
                            <input type="text" id="nama" class="form-control" name="nama"
                                placeholder="masukan nama alternatif untuk aset" autofocus required />
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection