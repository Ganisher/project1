@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Выплаты по рассрочкам</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th>Водитель</th>
                                    <th>Сумма</th>
                                    <th>Дата</th>
                                </tr>
                                <tr>
                                    <td>Иванов Иван</td>
                                    <td>4 796</td>
                                    <td>27.12.16</td>
                                </tr>
                                <tr>
                                    <td>Макар Сазанов</td>
                                    <td>45 366</td>
                                    <td>27.12.16</td>
                                </tr>
                                <tr>
                                    <td>Денис Щербаков</td>
                                    <td>5 465</td>
                                    <td>11.12.16</td>
                                </tr>
                                <tr>
                                    <td>Тимур Глазков</td>
                                    <td>67 235</td>
                                    <td>11.12.16</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection