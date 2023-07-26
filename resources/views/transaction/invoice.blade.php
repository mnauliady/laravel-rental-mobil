@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <main class="form-signin w-100 m-auto">
                    <h1 class="text-center">Invoice</h1>
                    
                    <ul class="list-group">
                        <li class="list-group-item">Penyewa : {{ $invoice->user_id }}</li>
                        <li class="list-group-item">Merek :</li>
                        <li class="list-group-item">Model :</li>
                        <li class="list-group-item">Nomor Plat Mobil : {{ $invoice->car_id }}</li>
                        <li class="list-group-item">Tanggal Mulai Sewa : {{ $invoice->date_start }}</li>
                        <li class="list-group-item">Tanggal Akhir Sewa : {{ $invoice->date_end }}</li>
                        <li class="list-group-item">Total Harga Sewa : Rp{{ $invoice->total }}</li>
                    </ul>
                    <br>
                    <div class="text-center">

                        <a href="/" class="btn btn-primary">Oke</a>
                    </div>
            </main>
        </div>
    </div>
@endsection