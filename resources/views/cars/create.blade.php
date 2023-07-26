@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Mobil</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/car" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="merek" class="form-label">Merek</label>
          <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" name="merek" required autofocus value="{{ old('merek') }}">
          @error('merek')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" required autofocus value="{{ old('model') }}">
            @error('model')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="plat" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control @error('plat') is-invalid @enderror" id="plat" name="plat" required autofocus value="{{ old('plat') }}">
            @error('plat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tarif" class="form-label">Tarif Sewa</label>
            <input type="text" class="form-control @error('tarif') is-invalid @enderror" id="tarif" name="tarif" required autofocus value="{{ old('tarif') }}">
            @error('tarif')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection