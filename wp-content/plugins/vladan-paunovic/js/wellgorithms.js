/**
 * Created by vladan on 13/02/2017.
 */
console.log("I am here");

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
            inside_inputs = $('input[name="' + input_name + '"]');

        // disabling inputs in clicked question
        inside_inputs.prop('disabled', true);

        // TODO: Make this more accurate
        $('html, body').animate({scrollTop: '+=740px'}, 800);
        // TODO: on the last remove this scroll

        $(wellghoritm)
            .next()
            .next()
            .removeClass('hidden')
            .addClass('animated zoomInUp');

        changePercentage(step, all_steps, maximum_steps);
        step++;
    });
});