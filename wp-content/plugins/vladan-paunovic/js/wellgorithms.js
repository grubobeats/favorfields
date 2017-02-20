/**
 * Created by vladan on 13/02/2017.
 */
jQuery(document).ready(function($){

    /*
        Sticking progress-bar to the top after scrolling
     */
    var progressbar = $('.progressbar');
    $(window).scroll(function() {
        var top = $(window).scrollTop();
        if (top > 300) {
            $(progressbar).addClass('fixed');
        } else {
            $(progressbar).removeClass('fixed');
        }
    });

    /*
        Progressbar: changing values (percentage)
     */
    function changePercentage(step, all_steps, maximum_steps) {

        var percentage = (step / all_steps) * 100;

        if( step <= maximum_steps && percentage <= 100 ) {
            $('.outline .inside')
                .html(percentage + "%")
                .css('width', percentage + "%");
        }
    }

    /*
        Showing next question
     */
    var question = $('.wellghoritm'),
        input = $(question).find('input'),
        step = 1;

    $(input).click(function(){

        var wellghoritm = $(this).parent().parent().parent(),
            input_name = $(wellghoritm).find('input').attr('name'),
            inside_inputs = $('input[name="' + input_name + '"]'),
            input_layouts = $(wellghoritm).find('.check');

        // disabling inputs on clicked question
        inside_inputs.prop('disabled', true);
        input_layouts.css('opacity', '0.2');

        // TODO: on last remove this scroll
        $('html, body').animate(
            {
                scrollTop: $(wellghoritm).next().offset().top
            },
            1600);

        $(wellghoritm)
            .next()
            .next()
            .removeClass('hidden')
            .addClass('animated ' + question_animation);

        changePercentage(step, all_steps, maximum_steps);
        step++;
    });
});