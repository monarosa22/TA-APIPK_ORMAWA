@extends('layouts.main')

@section("css")

<link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">

@endsection

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 20px">
            {{-- <button href="{{url('/super_admin/pengguna/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus">Tambah</i>
            </button> --}}
            <a href="{{url('/super_admin/pengguna/create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus">Tambah Pengguna</i>
            </a>
            <br><br>
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Pengguna</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Role</th>
                                <th>Deskripsi</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["nama"] }}</td>
                                <td>{{ $item["email"] }}</td>
                                <td class="text-center">
                                    @if ($item["status"] == 0)
                                    <form action="{{ url('/super_admin/pengguna/aktifkan/' .$item->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Aktifkan
                                        </button>
                                    </form>
                                    @elseif ($item["status"] == 1)
                                    @if (Auth::user()->id == $item["id"])
                                        -
                                    @else
                                    <form action="{{ url('/super_admin/pengguna/non_aktifkan/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Non-Aktifkan
                                        </button>
                                    </form>
                                    @endif
                                    @endif
                                </td>
                                <td class="text-center">{{ $item["role"] }}</td>
                                <td>{{ $item["deskripsi"] }}</td>
                                <td class="text-center">
                                    @if ($item["id"] == Auth::user()->id)
                                    -
                                    @else
                                    <a href="{{ url('/super_admin/pengguna/edit/' .$item["id"]) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit">Edit</i>
                                    </a>
                                    <form action="{{ url('/super_admin/pengguna/destroy/' . $item["id"]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash">Hapus</i>
                                        </button>
                                    </form>
                                    @endif
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

@section("javascript")

<script src="{{ url('/javascript/dataTables.min.js') }}"></script>
<script src="{{ url('/javascript/bootstrap.min.js') }}"></script>
<script>
    $('#example').DataTable();
</script>

@endsection
