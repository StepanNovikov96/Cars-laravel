<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $car = "Cars shop";
        return view('welcome', compact('car','cars'));
    }

//    public function saveCar(Request $request)
//    {
//        $car = new Car();
//        $data = $request->all();
//        $car->create($data);
//        dd($request->all());
//    }

    public function edit($id)
    {
        $model = Car::find($id);
        return view('edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $model = Car::find($id);
        $data = $request->all();
        $model->update($data);
        return redirect()->route('main');
    }

    public function delete($id)
    {
        $model = Car::find($id);
        $model->delete();
//        Car::destroy($id);
        return redirect()->route('main');
    }

}
