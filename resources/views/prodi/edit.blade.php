@extends('layout.main')
@section('title', 'Ubah Program Studi')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah Program Studi</h4>
                    <p class="card-description">
                        Formulir ubah program studi
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('prodi.update', $prodi->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Program Studi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Program Studi"
                                value="{{ $prodi->nama }}">
                            @error('nama')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Nama Fakultas</label>
                            <select name="fakultas_id" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($fakultas as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $prodi->fakultas_id ? 'selected' : null }}> {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                        <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
