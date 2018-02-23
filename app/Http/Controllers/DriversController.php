<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    # список водителей
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', [
            'drivers' => $drivers
        ]);
    }

    # страница с формой добавления водителя
    public function form()
    {

    }

    # сохранения данных водителя в бд
    public function submit()
    {

    }

    # страница со списком автомобилей
    public function carsIndex()
    {

    }
}
