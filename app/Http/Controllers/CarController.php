<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    public function index(){
        $title = 'Daftar Mobil';

        $cars = Car::all();
        return view('cars.index', compact('cars', 'title'));
    }

    public function create(){
        $title = 'Tambah Data Mobil';

        return view('cars.create', compact('title'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'plat' => 'required',
            'tarif' => 'required'
        ]);

        Car::create($validatedData);

        return redirect('/car')->with('success', 'New data has been added');
    }
}
