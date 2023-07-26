<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    //
    public function index(){
        $title = 'Transaksi Penyewaan';
        $cars = Car::all();
        return view('transaction.index', compact('title', 'cars'));
    }

    public function stores(Request $request){
        $validatedData = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'plat' => 'required',
            'tarif' => 'required'
        ]);

        Car::create($validatedData);

        return redirect('/car')->with('success', 'New data has been added');
    }

    public function store(Request $request){
        $akhir = Carbon::parse($request->date_end);
        $awal = Carbon::parse($request->date_start);

        $jumlah = $akhir->diffInDays($awal);;

        $data = Car::find($request->car_id);

        $tarif = $data->tarif * $jumlah;

        Transaction::create([
            'car_id' => $request->car_id,
            'user_id' => $request->user_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'total' => $tarif,
        ]);

        $invoice = Transaction::latest()->first();

        $title = 'Invoice';

        return view('transaction.invoice', compact('invoice', 'title'));
    }

    public function history(){
        $title = 'History';

        $transactions = Transaction::all();

        return view('transaction.history', compact('title', 'transactions'));

    }


}
