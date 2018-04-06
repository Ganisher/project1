@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header">
            <h1>Проверить наличие штрафов</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <form action="" class="penaltyCheckForm">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><img src="{{ asset('img/icons/kazakhstan-flag-waving-icon-128.png') }}" height="14"><b class="carNumberCountryTitle">KZ</b></div>
                                <input type="text" class="form-control" name="carNumber" placeholder="Номер машины (050CCC12 или A012ABC)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                <input type="text" class="form-control" name="carPassportNumber" placeholder="Номер техпаспорта (AB00012345)">
                            </div>
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
                                        <th>Место</th>
                                        <th>Сумма</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-primary penaltyInfoSaveButton" onclick="Penalty.savePenaltyInDB(); return false;" style="display: none;">Сохранить данные в базу</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script>
    var Penalty = {
        penaltiesInfo: {},
        submitForm: function () {
            if(!($("input[name='carNumber']").val()) || !($("input[name='carPassportNumber']").val()))
            {
                Maschina.showNotify('Пожалуйста, заполните все поля формы!', 'danger');
                return false;
            }
            $.ajax({
                url: '{{ route('drivers.penaltiesCheck') }}',
                data: 'carNumber=' + $("input[name='carNumber']").val() + '&carPassportNumber=' + $("input[name='carPassportNumber']").val(),
                beforeSend: function () { /*maschinaNotify.close();*/ $('.penaltyInfoSaveButton').hide(); $('.penaltyInfoTableIncut').empty(); Maschina.showPreloaderNotify();},
                complete: function () {},
                success: function (response) {
                    if(response.status == 'success' && response.data.checkState == 'ACCEPTED')
                    {
//                        maschinaNotify.close();
                        Maschina.showNotify('Запрос успешно обработан!', 'success');
                        data = $.parseJSON(response.data.info);
                        if(data.message)
                        {
//                            maschinaNotify.close();
                            Maschina.showNotify(''+data.message+'', 'success', 0, 0);
                        }
                        else
                        {
                            data = data.penalties;
                            data.forEach(function (item, i, data) {
                                $('.penaltyInfoTable').append('<tr class="penaltyInfoTableIncut">' +
                                    '<td>'+item.firstName+'</td>'+
                                    '<td>'+item.lastName+'</td>'+
                                    '<td>'+item.violationName+'</td>'+
                                    '<td>'+item.violationDate+'</td>'+
                                    '<td>'+item.violationTime+'</td>'+
                                    '<td>'+item.violationPlace+'</td>'+
                                    '<td>'+item.amount+'</td>'+
                                    '</tr>');
                            });
                            Penalty.penaltiesInfo = data;
                            $('.penaltyInfoSaveButton').show();
                        }
                    }
                    else if(response.status == 'success' && response.data.checkState == 'ERROR')
                    {
//                        maschinaNotify.close();
                        Maschina.showNotify('По данному запросу данных не найдено!', 'success', 0, 0);
                    }
                },
                error: function () {alert('Возникла ошибка на сервере.. Пожалуйста, попробуйте позднее')}
            })
        },
        savePenaltyInDB: function () {
            if(!(window.confirm('Вы действительно хотите сохранить данные к базу?')))
                return false;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('drivers.penaltiesSave') }}',
                type: 'post',
                data: {penaltiesInfo: Penalty.penaltiesInfo},
                beforeSend: function () {Maschina.showPreloaderNotify();},
                complete: function () {},
                success: function (response) {
                    if(response.data)
                        Maschina.showNotify(''+response.data+'', 'success');
                },
                error: function () {alert('Возникла ошибка на сервере.. Пожалуйста, попробуйте позднее')}
            });
        }
    }
</script>
@endsection