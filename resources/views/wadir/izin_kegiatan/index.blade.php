@extends('layouts.main')

@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid" style="padding-top: 10px">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Izin Kegiatan</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Nama ORMAWA</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">File Surat</th>
                                <th class="text-center">File Surat Balasan</th>
                                <th class="text-center">Tempat</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($izin_kegiatan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item["users"]["nama"]}}</td>
                                <td>{{ $item["nama_kegiatan"] }}</td>
                                <td class="text-center">
                                    <i class="fa fa-download"></i>
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-download"></i>
                                </td>
                                <td class="text-center">{{ $item["tempat"] }}</td>
                                <td class="text-center">
                                    -
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/wadir/izin_kegiatan/show/' .$item["id"]) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-search"></i> Detail
                                    </a>
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