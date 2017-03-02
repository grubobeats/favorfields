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
                .html( Math.floor( percentage ) + "%" )
                .css('width', percentage + "%");
        }
    }


    /*
        Check if input fields are changed or not
     */
    var keypress_counter = 0,
        all_inputs = $('div[contenteditable="true"]');

    $(all_inputs).keyup(function(){
        keypress_counter++;
    });

    /*
        Close popups
     */

    $('.save-question-no').click(function(){
        $('.prompt-save').fadeOut();
    });


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
            input_layouts = $(wellghoritm).find('.check'),
            prompt_save = $('.prompt-save');

        // disabling inputs on clicked question
        inside_inputs.prop('disabled', true);
        input_layouts.css('opacity', '0.2');

        // scrolling on all questions except on last
        if(maximum_steps > step) {
            $('html, body').animate(
                {
                    scrollTop: $(wellghoritm).next().offset().top - 70
                },
                1000);
        } else {
            // Check if user changed more than 10 letters
            if( keypress_counter > 10 ) {
                $(prompt_save)
                    .delay(2000)
                    .show()
                    .addClass('animated fadeIn');
            }
        }

        $(wellghoritm)
            .next()
            .next()
            .removeClass('hidden')
            .addClass('animated ' + question_animation);

        changePercentage(step, all_steps, maximum_steps);
        step++;
    });


    /*
        Ajax saving to DB
     */

    $('.save-question-yes').click(function(){

        $('.prompt-save').html("<h3>Saving...</h3>");

        var questionsArray = [];

        $('.question span').each(function(){
            var question = $.trim($(this).text());
            questionsArray.push(question);
        });

        var firstAnswersArray = [];

        $('.first div[contenteditable="true"]').each(function(){
            var firstAnswer = $.trim($(this).text());
            firstAnswersArray.push(firstAnswer);
        });

        var secondAnswersArray = [];

        $('.second div[contenteditable="true"]').each(function(){
            var secondAnswer = $.trim($(this).text());
            secondAnswersArray.push(secondAnswer);
        });


        $.ajax({
            url: ajaxurl,
            type: "POST",
            dataType: "json",
            data: {
                action: "save_wellgo",
                user_id: user_id,
                permalink: permalink,
                related: post_id,
                title: title,
                questions: questionsArray,
                first_answers: firstAnswersArray,
                second_answers: secondAnswersArray,
                icon: icon,
                steps: steps,
                color_template: color_template,
                mood: mood,
                level: level,
                confidence: confidence,
                recommended: recommended
            },
            success: function( response ) {
                $('.prompt-save')
                    .html("<h3>Saved!</h3>")
                    .addClass("animated fadeOut")
                    .delay(2000)
                    .fadeOut();

            },
            error: function( error ) {
                console.log( "You have an error regarding your ajax request." );
                console.log( error );
            }

        });

    });

    /*
        Edit question popup (heart)
     */
    $('.popup-suggest-question').click(function(e){
        e.stopPropagation();
    });

    $('.question__like').click(function(e){
        e.stopPropagation();
        $(this).next().show().addClass('animated fadeIn');
    });

    $('#main').click(function(){
        $('.question__like')
            .next()
            .removeClass('fadeIn')
            .addClass('fadeOut')
            .delay(1000)
            .removeClass('animated fadeOut')
            .hide()

        $('.popup-extra-menu')
            .removeClass('fadeIn')
            .addClass('fadeOut')
            .delay(1000)
            .removeClass('animated fadeOut')
            .hide()
    });

    /*
        Emptying divs that are acting as input fields on click
     */
    var inputText;
    $('.fake-input').focus(function(){
        inputText = $(this).html();
        $(this).html("");
    });

    $('.fake-input').blur(function(){
        if ( $(this).html() === "" ) {
            $(this).html(inputText);
        }
    });

    /*
        Changing question texts
     */
    $('.question_sugestion').keyup(function () {
        var questionText = $(this).val(),
            thisQuestion = $(this).parent().parent().parent().parent().parent().find('span'),
            maximumCharacters = 333;

        if( $(this).val().length <= maximumCharacters ) {
            $(thisQuestion).html(questionText);
        } else {
            alert("To many characters.");
        }

    });

    /*
        Limiting maximum number of characters in questions
     */
    var maximumNumberOfCharacters = 333;
    $('.fake-input').keyup(function(){
       if( $(this).html().length >= maximumNumberOfCharacters ) {
           alert("To many characters.");
       }
    });

    // Extra menu opening
    $('.popup-extra-menu').click(function(e){
        e.stopPropagation();
    })

    // Extra menu opening: left
    $('.extra-menu li').eq('0').click(function(e){
        e.stopPropagation();
        $(this).parent().next().fadeIn('slow');
    });

    // Extra menu opening: middle
    $('.extra-menu li').eq('1').click(function(e){
        e.stopPropagation();
        $(this).parent().next().next().fadeIn('slow');
    });

    // Extra menu opening: right
    $('.extra-menu li').eq('2').click(function(e){
        e.stopPropagation();
        $(this).parent().next().next().next().fadeIn('slow');
    });
});