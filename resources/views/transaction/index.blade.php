@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <main class="form-signin w-100 m-auto">
                <form action="/transaction" method="post">
                    @csrf 
                    <h2 class="text-center">Transaksi Sewa Mobil</h2>
                    
                    <input type="hidden" value={{ auth()->user()->id }} name='user_id'>

                    <div class="form-floating mb-2">
                        <input type="date" min="" name="date_start" class="form-control @error('date_start') is-invalid @enderror" id="date_start" required autofocus value="{{ old('date_start') }}">
                        <label for="date_start">Tanggal Mulai Sewa</label>
                        @error('date_start')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-2">
                        <input type="date" name="date_end" class="form-control @error('date_end') is-invalid @enderror" id="date_end" required autofocus value="{{ old('date_end') }}">
                        <label for="date_end">Tanggal Akhir Sewa</label>
                        @error('date_end')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-2">
                        <select name="car_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                          <option selected>-</option>
                          @foreach ($cars as $car)
                            <option value={{ $car->id }}>{{ $car->merek }} {{ $car->model }} -- {{ $car->plat }}</option>
                          @endforeach
                        </select>
                        <label for="floatingSelect">Pilih Mobil</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Lanjutkan</button>
                </form>
            </main>
        </div>
    </div>

    <script>
        // Ambil elemen input tanggal pertama dan tanggal kedua
        const date_startInput = document.getElementById('date_start');
        const date_endInput = document.getElementById('date_end');

        // Tambahkan event listener untuk memantau perubahan pada tanggal pertama
        date_startInput.addEventListener('change', () => {
            validateTanggal();
        });

        // Tambahkan event listener untuk memantau perubahan pada tanggal kedua
        date_endInput.addEventListener('change', () => {
            validateTanggal();
        });

        // Fungsi untuk memvalidasi tanggal
        function validateTanggal() {
            const date_start = new Date(date_startInput.value);
            const date_end = new Date(date_endInput.value);

            // Pastikan tanggal kedua lebih besar dari tanggal pertama
            if (date_end <= date_start) {
                // Tampilkan pesan error atau lakukan tindakan sesuai kebutuhan
                alert('Tanggal kedua harus lebih besar dari tanggal pertama.');
                // Atau bisa juga mengganti nilai tanggal kedua menjadi tanggal pertama + 1 hari
                date_endInput.value = new Date(date_start.getTime() + (24 * 60 * 60 * 1000)).toISOString().slice(0, 10);
            }
        }

    </script>
@endsection