@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Водитель</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Форма редактирования</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('drivers.submit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="driverId" value="{{ isset($driver->id) ? $driver->id : '' }}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="firstName">Имя:</label>
                                    <input type="text" name="firstName" class="form-control" value="{{ isset($driver->firstName) ? $driver->firstName : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Фамилия:</label>
                                    <input type="text" name="lastName" class="form-control" value="{{ isset($driver->lastName) ? $driver->lastName : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="idCard">Номер удостоверения:</label>
                                    <input type="text" name="idCard" class="form-control" value="{{ isset($driver->idCard) ? $driver->idCard : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="carManufacturer">Марка авто:</label>
                                    <input type="text" name="carManufacturer" class="form-control" value="{{ isset($driver->carManufacturer) ? $driver->carManufacturer : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="carModel">Модель авто:</label>
                                    <input type="text" name="carModel" class="form-control" value="{{ isset($driver->carModel) ? $driver->carModel : '' }}">
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection