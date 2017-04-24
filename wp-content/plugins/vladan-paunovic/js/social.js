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

        var wellghoritm = $(this).parent().parent().parent().parent().parent(),
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
                    scrollTop: eval($(wellghoritm).offset().top - 70) + 744
                },
                1000);

            $(wellghoritm)
                .next()
                .removeClass('hidden')
                .addClass('animated ' + question_animation);

            changePercentage(step, all_steps, maximum_steps);
            step++;

        } else {
            // Check if user changed more than 10 letters
            /*
            if( keypress_counter > 10 ) {
                $(prompt_save)
                    .delay(2000)
                    .show()
                    .addClass('animated fadeIn');
            }
            */
        }
    });


    /*
        Ajax saving to DB
     */
    /*
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
    */

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
    /*
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
    */

    /*
        Limiting maximum number of characters in questions
     */
    /*
    var maximumNumberOfCharacters = 333;
    $('.fake-input').keyup(function(){
       if( $(this).html().length >= maximumNumberOfCharacters ) {
           alert("To many characters.");
       }
    });
    */

    // Extra menu opening
    $('.popup-extra-menu').click(function(e){
        e.stopPropagation();
    })

    // Extra menu opening: left
    $('.extra-menu .first').click(function(e){
        e.stopPropagation();
        $(this).parent().next().fadeIn('slow');
    });

    // Extra menu opening: middle
    $('.extra-menu .second').click(function(e){
        e.stopPropagation();
        $(this).parent().next().next().fadeIn('slow');
    });

    // Extra menu opening: right
    $('.extra-menu .third').click(function(e){
        e.stopPropagation();
        $(this).parent().next().next().next().fadeIn('slow');
    });


    /**
     * Reading user answers from DB - Ajax
     */

    $('body').on('click', '.user-avatar', function () {

        var $this = $(this),
            post_id = $(this).data('post-id'),
            user_id = $(this).data('user-id'),
            image_src = $(this).attr('src'),
            step_count = $(this).data('step'),
            step_container = $(this).parent().parent().parent(),
            first_answer = $(step_container).find('.fake-input').first(),
            second_answer = $(step_container).find('.fake-input').last();

        // Fading out text div
        first_answer.toggleClass('animate-text');
        second_answer.toggleClass('animate-text');

        $.ajax({
            url: ajaxurl,
            type: "POST",
            dataType: "json",
            data: {
                action: "read_social_answers",
                post_id: post_id,
                step: step_count
            },
            success: function( response ) {

                first_answer.find('.avatar')
                    .attr('data-user-id', user_id)
                    .html( "<img src='" + image_src + "'><p>Favor</p>" )
                    .addClass('favor-trigger');

                first_answer.find('span').html( response.first_answer );

                // second_answer.find('.avatar').html("<img src='" + image_src + "'><p>Favor</p>" );
                // second_answer.find('.avatar').addClass('favor-trigger');
                second_answer.find('span').html( response.second_answer );


                // fading in text div after retrieving the results
                first_answer.toggleClass('animate-text');
                second_answer.toggleClass('animate-text');
            },
            error: function( error ) {
                console.log( "Error " + error );
            }
        });
    });


    /**
     * Sending emails in Favors section
     */

    $('body').on('click', '.favor-subitem', function () {

        var message_first = $(this).parent().parent().find('span').text(),
            message_second = $(this).text(),
            current_user_id = user_id,
            selected_user_id = $(this).parent().parent().parent().parent().parent().find('.avatar').data('user-id'),
            $this = $(this),
            favor_menu = $(this).parent().parent().parent().parent().parent().find('.favor-menu');

        $this.html('<i class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i>');

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'send_favor',
                current_user: current_user_id,
                selected_user: selected_user_id,
                message_first: message_first,
                message_second: message_second,
                title: title
            },
            success: function( response ) {
                if ( response == true ) {
                    $this.html("Sent!");
                    setTimeout(function () {
                        $('.favor-menu').hide('fast');
                        favor_menu.empty();
                    }, 1500)
                } else {
                    $this.html("Error with sending message to the user!");
                }
                
            },
            error: function( response ) {
                console.log( response )
            }
        });



    });






    /**
     * Refreshing users
     */

    $('body').on( 'click', '.reload_users', function () {

        var avatar_box = $(this).parent().parent(),
            step = $(this).parent().data('step');

        avatar_box.empty();

        $.ajax({
            url: ajaxurl,
            type: "POST",
            dataType: "html",
            data: {
                action: "refresh_users",
                step: step,
                related_wellgo: post_id
            },
            success: function( response ) {
                avatar_box.html(response)
            },
            error: function( error ) {
                console.log( "Error " + error );
            }
        });
    })


    /**
     * Triggering favor menus
     */

    $('body').on( 'hover', '.favor-trigger', function(){
        var $this = $(this),
            favor_menu = $this.parent().next();

        favor_menu.show("fast");

    });

    $('body').on( 'mouseleave', '.favor-menu', function(){
        $(this).hide("fast");
    })


});