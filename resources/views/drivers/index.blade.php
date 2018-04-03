@extends('layouts/app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Список водителей</h1>
        </section>
        <section class="content">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Удостоверение</th>
                                    <th>Марка авто</th>
                                    <th>Модель авто</th>
                                    <th></th>
                                </tr>
                                @foreach($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->id }}</td>
                                    <td>{{ $driver->firstName }}</td>
                                    <td>{{ $driver->lastName }}</td>
                                    <td>{{ $driver->idCard }}</td>
                                    <td style="text-transform: capitalize;">{{ $driver->carManufacturer }}</td>
                                    <td>{{ $driver->carModel }}</td>
                                    <td><a href="{{ route('drivers.form', ['driverId' => $driver->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a> <a href="{{ route('drivers.delete', ['driverId' => $driver->id]) }}" class="btn btn-danger" onclick="if(!confirm('Хотите удалить?')) return false;"><i class="fa fa-trash"></i></a></td>
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