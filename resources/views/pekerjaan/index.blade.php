@extends('layouts.admin')
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UIN PTIPD | SPK</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}">
    <style>

    </style>
</head>


@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pekerjaan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success_message'))
                    <div class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif
                @include('sweetalert::alert')
                <div class="card">
                    <div class="card-header m-0 font-weight-bold text-primary">Daftar Pekerjaan
                        @if (auth()->user()->level == 'User')
                            <a href="{{ route('pekerjaan.create') }}" class="btn btn-sm btn-primary" style="float: right;">
                                Tambah Data
                            </a>
                        @endif
                    </div>
                    @php $no = 1; @endphp
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-md" id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>Pekerjaan</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </thead>
                                @foreach ($peker as $data)
                                    <tbody>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->des }}</td>
                                        <td>
                                            <form action="{{ route('pekerjaan.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('pekerjaan.edit', $data->id) }}"
                                                    class="btn btn-outline-warning">
                                                    <span class="text">Edit</span>
                                                </a> |
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <span class="text">Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
