@extends('layout.main')
@section('title', 'Program Studi')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Program Studi</h4>
                    <p class="card-description">
                        Daftar program studi di Universitas MDP
                    </p>
                    <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Prodi</th>
                                    <th>Nama Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodi as $item)
                                    <tr>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item['fakultas']['nama'] }}</td>
                                        <td>
                                            <form method="post" action="{{ route('prodi.destroy', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('prodi.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    data-toggle="tooltip" title='Delete'
                                                    data-nama='{{ $item->nama }}'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @if (Session::get('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
@endsection
