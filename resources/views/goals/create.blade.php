@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts._flash')
                <div class="card mt-3">
                    <div class="card-header mb-3">Buat Jabatan Baru</div>
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('goals.store') }}" method="post">
                            @csrf
                            <div class="mb-3 col-12" style="float">
                                <label for="">Pilih Data Lembur</label>
                                <select class="form-select" name="lembur" id="" required>
                                    @foreach ($lem as $data)
                                        <option value="{{ $data->id }}">{{ $hari = Carbon\Carbon::parse($data->tgl)->isoFormat('dddd, D MMM Y'); }}</option>
                                    @endforeach
                                </select>
                                @error('urai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12" style="float">
                                <label for="">Uraian</label>
                                <textarea class="form-control" name="jepe" id="" cols="100" rows="auto"></textarea>
                                @error('urai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-4 container">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" id="tombol" onclick="Swal('Data Ditambahkan', 'Data Telah Di Tambahkan', 'success')">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
