@extends('layouts.main')

@section('container')
    <h2>Daftar Mobil</h2>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <a href="/car/create" class="btn btn-primary btn-sm">Tambah data</a>

    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Merek</th>
              <th scope="col">Model</th>
              <th scope="col">Plat Nomor</th>
              <th scope="col">Tarif</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cars as $car)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $car->merek }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->plat }}</td>
                <td>{{ $car->tarif }}</td>
                <td>
                    <a href="/car/{{ $car->id }}/edit" class="btn btn-success btn-sm">Edit</a>
                    <form action="/car/{{ $car->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin akan menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
    </table>
@endsection