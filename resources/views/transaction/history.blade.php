@extends('layouts.main')

@section('container')
    <h2>Daftar History Penyewaan Mobil</h2>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User</th>
              <th scope="col">Mobil</th>
              <th scope="col">Tanggal Mulai</th>
              <th scope="col">Tanggal Akhir</th>
              <th scope="col">Total Tarif</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->car_id }}</td>
                <td>{{ $transaction->user_id }}</td>
                <td>{{ $transaction->date_start }}</td>
                <td>{{ $transaction->date_end }}</td>
                <td>{{ $transaction->total }}</td>
                <td>
                    <a href="/transaction/{{ $transaction->id }}" class="btn btn-success btn-sm">Detail</a>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
    </table>
@endsection