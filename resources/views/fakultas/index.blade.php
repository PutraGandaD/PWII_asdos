@extends('layout.main')
@section('title', 'Fakultas')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fakultas</h4>
                    <p class="card-description">
                        Daftar fakultas di Universitas MDP
                    </p>
                    <a href="{{ route('fakultas.create') }}" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fakultas as $item)
                                    <tr>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>

                                            <form method="post" action="{{ route('fakultas.destroy', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('fakultas.edit', $item->id) }}"
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
