var maschinaNotify;

var Maschina = {
    showNotify: function (text, type, delay, timer) {
        maschinaNotify = $.notify({
            message: text
        }, {
            newest_on_top: true,
            delay: delay,
            timer: timer,
            type: type,
            animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutDown'
            }
        });
    },
    showPreloaderNotify: function () {
        Maschina.showNotify('<i class="fa fa-spinner fa-spin"></i> Пожалуйста, подождите, идет обработка запроса!', 'warning');
    }
}