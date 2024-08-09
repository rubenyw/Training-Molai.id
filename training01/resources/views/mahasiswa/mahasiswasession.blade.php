@extends('mahasiswa.layout')

@section('title')
    Page Mahasiswa
@endsection

@section('container-fluid')
    <div class="row">
        <div class="col-12">
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>NRP</td>
                        <td>Nama</td>
                        <td>Jurusan</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Session::get("mahasiswa") as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item["mahasiswa_nrp"] }}</td>
                            <td>{{ $item["mahasiswa_nama"] }}</td>
                            <td>{{ $item["mahasiswa_jurusan"] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <form action="/mahasiswa/insertSessionMahasiswa" method="post">
            @csrf
            <div class="row">
                <div class="col-3">
                    <input type="text" name="mahasiswa_nrp" id="mahasiswa_nrp" class="form-control" placeholder="NRP">
                </div>
                <div class="col-3">
                    <input type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control" placeholder="Nama">
                </div>
                <div class="col-3">
                    <select name="mahasiswa_jurusan" id="mahasiswa_jurusan" class="form-select">
                        <option value="Informatika">Informatika</option>
                        <option value="SIB">SIB</option>
                        <option value="Elektro">Elektro</option>
                    </select>
                </div>
                <div class="col-3">
                    <button class="btn btn-success" id="btn-submit-mahasiswa" type="submit">Insert Data</button>
                </div>
                {{-- <input type="hidden" name="data" id="data" value="{{json_encode($data)}}"> --}}
            </div>
        </form>
    </div>
@endsection