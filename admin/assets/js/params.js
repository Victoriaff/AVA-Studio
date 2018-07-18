
jQuery(document).ready(function($){

    $('body').on('click', '.ava-tabs .item:not(.ava-tab-active)', function() {
        $this = $(this);
        $group = $this.data('group');
        $ref = $this.data('ref');

        $('.ava-tabs .item[data-group='+$group+']').removeClass('ava-tab-active');
        $this.addClass('ava-tab-active');
        $('.'+$group).hide();
        $('.'+$group+'.'+$ref).show();

        //console.log('input[name='+$ref+'].vc_color-control');
        //var bgcolor = $('input[name="'+$ref+'"]').val();
        //console.log(bgcolor);
        //$this.find('.color').css('background-color', bgcolor);
    });

    $('body').on('change', 'input.vc_color-control', function() {
        var ref = $(this).attr('name');
        console.log(ref);

        var bgcolor = $(this).val();
        console.log(bgcolor);
        $('div[data-ref="'+ref+'"]').find('.color').css('background-color', bgcolor);

    });

    $('body').on('click keyup', '.wp-picker-clear', function() {
        console.log(this);
        val = $(this).prev().find('input.vc_color-control').val();
        console.log(val);
    });

});