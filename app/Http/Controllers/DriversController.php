<?php

namespace App\Http\Controllers;

use App\Car;
use App\Driver;
use Curl\Curl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

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
        $driver = [];
        $driverId = Input::get('driverId');
        if($driverId)
            $driver = Driver::find($driverId);

        return view('drivers.form', [
            'driver' => $driver,
        ]);
    }

    # сохранения данных водителя в бд
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'idCard' => 'required',
            'carManufacturer' => 'required',
            'carModel' => 'required',
        ]);

        if($validatedData)
        {
            if($driverId = Input::get('driverId'))
            {
                $driver = Driver::find($driverId);
                $driver->update($request->all());

                $message = 'Водитель изменен!';
            }
            else
            {
                $driver = Driver::create($request->all());
                $message = 'Водитель добавлен!';
            }

            if($driver)
                return redirect()->route('drivers')->with('status', $message);
        }
    }

    # удаление водителя
    public function delete()
    {
        $driverId = Input::get('driverId');

        $driver = Driver::find($driverId);

        if($driver->delete())
        {
            $message = 'Водитель удален!';
            return redirect()->route('drivers')->with('status', $message);
        }
    }

    # штрафы
    public function driversPenalties()
    {
        return view('drivers.fines');
    }

    # страница со списком автомобилей
    public function carsIndex()
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    public function penaltiesCheckFormPage()
    {
        return view('cars.penaltiesCheckForm');
    }

    public function penaltiesCheck()
    {
        $carNumber = Input::get('carNumber');
        $carPassportNumber = Input::get('carPassportNumber');
        if($carNumber && $carPassportNumber)
        {
            $curl = new Curl();
            $curl->get('https://24.bankastana.kz/api/penalties', array(
                'car_no' => $carNumber,
                'car_passport_no' => $carPassportNumber
            ));
            $response = $curl->response;
            return Response::json($response);
        }
        else
            return 'Переданы неправильные данные';
    }
}
