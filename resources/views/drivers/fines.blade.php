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
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Штраф</th>
                                    <th>Сумма</th>
                                    <th>Дата</th>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>Тимур</td>
                                    <td>Глазков</td>
                                    <td>Превышение скорости на 10-20 км/ч</td>
                                    <td>19 820</td>
                                    <td>01.01.17</td>
                                </tr>
                                <tr>
                                    <td>56</td>
                                    <td>Николай</td>
                                    <td>Козлов</td>
                                    <td>Не уступил дорого пещеходу</td>
                                    <td>19 820</td>
                                    <td>21.01.17</td>
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
