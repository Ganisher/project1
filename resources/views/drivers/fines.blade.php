@extends('layouts/app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Штрафы водителей</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        @if(count($penalties))
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Штраф</th>
                                    <th>Дата</th>
                                    <th>Время</th>
                                    <th>Место</th>
                                    <th>Сумма</th>
                                </tr>
                                @foreach($penalties as $penalty)
                                <tr>
                                    <td>{{ $penalty->id }}</td>
                                    <td>{{ $penalty->firstName }}</td>
                                    <td>{{ $penalty->lastName }}</td>
                                    <td width="20%">{{ $penalty->violationName }}</td>
                                    <td>{{ \Carbon\Carbon::parse($penalty->violationDate)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($penalty->violationTime)->format('H:i') }}</td>
                                    <td>{{ $penalty->violationPlace }}</td>
                                    <td>{{ $penalty->amount }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center">Нет сохраненных штрафов.</div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
