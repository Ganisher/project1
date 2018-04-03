var maschinaNotify;

var Maschina = {
    showNotify: function (text, type) {
        maschinaNotify = $.notify({
            message: text
        }, {
            type: type,
            animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutDown'
            },
        });
    }
}