@extends('layouts.app')

@section('content')
    <style>
        #myProgress {
            width: 100%;
            background-color: grey;
        }
        #myBar {
            width: 1%;
            height: 30px;
            background-color: green;
            display: none;
        }
    </style>
    <div class="container">
        <section class="content-header">
            <h1>Загрузка рассрочки</h1>
        </section>
        <section class="content">
            <form action="">
                <div class="form-group">
                    <input type="file" class="form-control">
                </div>
                <a href="#" class="btn btn-primary" onclick="move();">Загрузить Excel</a>
            </form>
            <div id="myProgress">
                <div id="myBar"></div>
            </div>
        </section>
    </div>
    <script>
        function move() {
            $('#myBar').css('display', 'block');
            var elem = document.getElementById("myBar");
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
            }
        }
    </script>
@endsection