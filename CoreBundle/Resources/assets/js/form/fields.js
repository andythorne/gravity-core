(function () {
    define(['jquery', 'bootstrap'], function ($, bs) {
        var $toggleFields = $('.field-toggle');
        $toggleFields.each(function () {
            var oValue,
                $field = $(this),
                $switch = $field.find('.field-toggle-switch'),
                $value = $field.find('.field-toggle-value');
            $switch.on('change', function (e) {
                if(this.checked) {
                    $value.val(oValue);
                    oValue = null;
                    $value.attr('disabled', false);
                } else {
                    oValue = $value.val();
                    $value.val('');
                    $value.attr('disabled', true);
                }
            });
        });
    });
})();
