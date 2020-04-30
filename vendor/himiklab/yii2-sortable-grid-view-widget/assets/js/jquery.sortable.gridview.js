(function ($) {
    var fixHelper = function (e, ui) {
        ui.children().each(function () {
            $(this).width($(this).width());
        });
        return ui;
    };

    $.fn.SortableGridView = function (action) {
        var widget = this;
        var grid = $('tbody', this);

        grid.sortable({
            items: 'tr',
            update: function () {
                var data = [];
                $('tr',grid).each(function() {
                    data.push(JSON.stringify($(this).data('key')));
                });

                $.ajax({
                    'url': action,
                    'type': 'post',
                    'data': {
                        "items[]": data,
                    },
                    'success': function () {
                        widget.trigger('sortableSuccess');
                    },
                    'error': function (request, status, error) {
                        alert(status + ' ' + error);
                    }
                });
            },
            helper: fixHelper
        }).disableSelection();
    };
})(jQuery);
