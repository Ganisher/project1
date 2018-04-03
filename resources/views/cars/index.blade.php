@extends('layouts/app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Список авто</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Марка авто</th>
                                    <th>Модель авто</th>
                                    <th>Регистрационный номер</th>
                                    <th></th>
                                </tr>
                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{ $car->id }}</td>
                                        <td>{{ $car->carManufacturer }}</td>
                                        <td>{{ $car->carModel }}</td>
                                        <td>{{ $car->regNumber }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
