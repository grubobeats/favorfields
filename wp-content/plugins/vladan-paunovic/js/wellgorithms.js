/**
 * Created by vladan on 13/02/2017.
 */

jQuery(document).ready(function($){


    /* ------------------------------------
     * FUNCTIONS
    ------------------------------------ */

    function recommendedPosts( target, recommend ) {

        $(target).html('<i class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i>');

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                action: 'recommend_posts',
                post_id: post_id,
                marked_as: recommend
            },
            success: function( response ) {
                // console.log( "success: " + response )
                $(target).html( response );
            },
            error: function( response ) {
                console.log( "error: " + error )
            }
        });
    }

    function listPladges( target ) {

        $(target).html('<i class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i>');

        $.ajax({
            url: ajaxurl,
            type: "POST",
            dataType: "json",
            data: {
                action: 'list_pledges',
                post_id: post_id,
                user: user_id,
            },
            success: function( response ) {
                $(target).html( response.html );

                $('.wellgo-user').each(function(){
                    var $this = $(this);

                    if ( response.isDoneByUser === true ) {
                        $('#pladge').prop('disabled', true);
                        $('#pladge option:first').text('You already pledged for this welgorithm')
                    }
                });
            },
            error: function( response ) {
                console.log( "error: " + error )
            }
        });
    }



    $('#pladge').change(function(){
        var $this = $(this),
            value = $this.val();

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: {
                action: 'save_pledge',
                post_id: post_id,
                days: value,
                user: user_id
            },
            success: function( response ) {
                // console.log( "Success: " + response );
                $this.prop('disabled', true);
                $('#pladge option:first').text('Thank you!')
            },
            error: function( response ) {
                console.log( "error: " + error )
            }
        });
    });


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
    var question = $('.wellgo-questionnaire-container'),
        input = $(question).find('input'); // TODO: Make this more specific

    $(input).click(function(){

        var wellghoritm = $(this).parent().parent().parent().parent().parent(),
            input_name = $(wellghoritm).find('input').attr('name'),
            inside_inputs = $('input[name="' + input_name + '"]'),
            input_layouts = $(wellghoritm).find('.check'),
            prompt_save = $('.prompt-save');

        // disabling inputs on clicked question
        inside_inputs.prop('disabled', true);
        input_layouts.css('opacity', '0.2');

        sendClicks();

        // scrolling on all questions except on last
        if(maximum_steps > current_step ) {
            $('html, body').animate(
                {
                    // scrollTop: $(wellghoritm).offset().top - 70
                    scrollTop: eval( $(wellghoritm).offset().top + $(wellghoritm).height() ) - 37
                },
                1000);

            $(wellghoritm)
                .next()
                // .next() // If there is a separator this will be useful
                .removeClass('hidden')
                .addClass('animated ' + question_animation);

            // changePercentage(current_step, all_steps, maximum_steps);
            current_step++;

        } else {
            // Check if user changed more than 10 letters
            var made_custom = "No";

            if ( !isLoggedIn || isLoggedIn === "" || isLoggedIn === "0" ) {
                $(prompt_save).html("<h3>You must be logged in to continue.</h3>")
            } else {
                if( keypress_counter > 10 && isLoggedIn === "1" ) {

                    /*
                     Ajax saving to DB
                     */

                    var savedBox = $('.is-saved'),
                        questionsArray = [],
                        firstAnswersArray = [],
                        secondAnswersArray = [];

                    savedBox.html('<h3><i class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i></h3>');

                    $('.question span').each(function(){
                        var question = $.trim($(this).text());
                        questionsArray.push(question);
                    });

                    $('.first div[contenteditable="true"]').each(function(){
                        var firstAnswer = $.trim($(this).text());
                        firstAnswersArray.push(firstAnswer);
                    });

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
                            security: secure_site,
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
                            savedBox
                                .html("<p></p>")

                        },
                        error: function( error ) {
                            console.log( "You have an error regarding your ajax request." );
                            console.log( error );
                        }

                    });

                    made_custom = "Yes";
                }
            }

            $('.popups').css('height', '744px');

            $(prompt_save)
                .delay(2000)
                .show()
                .addClass('animated fadeIn');

            $('html, body').animate(
                {
                    scrollTop: $(prompt_save).parent().offset().top - 70
                },
                1000);

            if ( isLoggedIn === "1" ) {
                current_step + 2;
                // changePercentage(current_step, all_steps, maximum_steps);
            }


            var last_answer_num = $('.wellgo-questionnaire-container').length - 1,
                radioButtons = $('input:radio[name="answered_question_' + last_answer_num + '"]'),
                selectedIndex = radioButtons.index(radioButtons.filter(':checked'));

            recommendedPosts( ".related_wellgorithms", selectedIndex );
            listPladges( ".wellgo-avatars" );
            saveToPassedWellgorithms();

            // Send event to Google Tag Manager
            dataLayer.push({
                'event':'finished_wellgorithm',
                'attributes': {
                    'user': username,
                    'made_custom': made_custom,
                    'steps': current_step,
                    'wellgorithm_name': title,
                    'wellgorithm_url': permalink
                }
            });
        }
    });

    $(window).unload(function(){

        if(all_steps != current_step) {
            // Send event to Google analytics if user exited before finishing wellgorithm
            dataLayer.push({
                'event': 'unfinished_wellgorithm',
                'attributes': {
                    'user': username,
                    'steps': current_step,
                    'wellgorithm_name': title,
                    'wellgorithm_url': permalink
                }
            });
        }
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
    var maximumNumberOfCharacters = 300;
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

    // Opening mini popups ( toolbars )
    $('.open-info-popup').hover(function () {
        $(this).next().show('fast');
    });

    $('.open-info-popup').mouseout(function () {
        $('.info-popup').delay('500').hide('fast');
    });

    $('.popup-extra-menu div:not(.first)').click(function() {
        var type = $(this).parent().find('.first').text(),
            text = $(this).text(),
            extra_menu = $('.popup-extra-menu');

        saveBreaktroughts(type, text, extra_menu);
    })

    /**
     * Saves answers clicks to database so they can be used for analytics
     */
    function sendClicks() {
        var step = current_step - 1,
            radioButton = $("input:radio[name='answered_question_" + step + "']"),
            selected = radioButton.index(radioButton.filter(':checked') );

        var data_holder = {
            action: 'send_clicks',
            security: secure_site,
            step: step,
            selected: selected,
            post_id: post_id,
            user_id: user_id
        }

        $.post(ajaxurl, data_holder, function( response ){})
    }

    /**
     * Adds +1 to passed wellgorithm in database
     */
    function saveToPassedWellgorithms() {

        var data = {
            action: "count_passed_wellgorithm",
            security: secure_site,
            post_id: post_id,
            user_id: user_id
        };

        $.post(ajaxurl, data, function(response){

        })
    }

    /**
     * Saving blocks, breaktroughts and pladges to database
     */
    function saveBreaktroughts(type, text, target) {

        var data = {
            action: "save_breaktroughts",
            security: secure_site,
            post_id: post_id,
            user_id: user_id,
            type: type,
            text: text
        };

        $.post(ajaxurl, data, function( response ){
            target.hide();
        })
    }


});