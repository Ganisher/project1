@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Проверить наличие штрафов</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="">
                        <div class="form-group">
                            <label for="carNumber">Номер машины:</label>
                            <input type="text" class="form-control" name="carNumber">
                        </div>
                        <div class="form-group">
                            <label for="carPassportNumber">Номер техпаспорта:</label>
                            <input type="text" class="form-control" name="carPassportNumber">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" onclick="Penalty.submitForm(); return false;">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="penalties">
                        <div class="box">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-bordered penaltyInfoTable">
                                    <tr>
                                        <th>Имя</th>
                                        <th>Фамилия</th>
                                        <th>Нарушение</th>
                                        <th>Дата</th>
                                        <th>Время</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script>
    var Penalty = {
        submitForm: function () {
            if(!($("input[name='carNumber']").val()) || !($("input[name='carPassportNumber']").val()))
            {
                Maschina.showNotify('Пожалуйста, заполните все поля формы!', 'danger');
                return false;
            }
            $.ajax({
                url: '{{ route('drivers.penaltiesCheck') }}',
                data: 'carNumber=' + $("input[name='carNumber']").val() + '&carPassportNumber=' + $("input[name='carPassportNumber']").val(),
                beforeSend: function () {$('.penaltyInfoTableIncut').empty(); Maschina.showNotify('<i class="fa fa-spinner fa-spin"></i> Пожалуйста, подождите, идет обработка запроса!', 'warning');},
                complete: function () {},
                success: function (response) {
                    if(response.status == 'success' && response.data.checkState == 'ACCEPTED')
                    {
                        maschinaNotify.close();
                        Maschina.showNotify('Запрос успешно обработан!', 'success');
                        data = $.parseJSON(response.data.info);
                        data = data.penalties;
                        data.forEach(function (item, i, data) {
                            console.log(item.firstName);
                            console.log(item.lastName);
                            $('.penaltyInfoTable').append('<tr class="penaltyInfoTableIncut">' +
                                '<td>'+item.firstName+'</td>'+
                                '<td>'+item.lastName+'</td>'+
                                '<td>'+item.violationName+'</td>'+
                                '<td>'+item.violationDate+'</td>'+
                                '<td>'+item.violationTime+'</td>'+
                                '</tr>');
                        });
                    }
                    else if(response.status == 'success' && response.data.checkState == 'ERROR')
                    {
                        maschinaNotify.close();
                        Maschina.showNotify('По данному запросу данных не найдено!', 'success');
                    }
                },
                error: function () {alert('Возникла ошибка на сервере.. Пожалуйста, попробуйте позднее')}
            })
        }
    }
</script>
@endsection