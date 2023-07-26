@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <h2 class="text-center">Selamat Datang Di Website Penyewaan Mobil</h2>
            <hr>
            <div class="text-center">
                <a href="/car" class="btn btn-outline-primary">Lihat Daftar Mobil</a>
                <a href="/transaction" class="btn btn-outline-primary">Sewa Mobil</a>
            </div>
        </div>
    </div>
@endsection