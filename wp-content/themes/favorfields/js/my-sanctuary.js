/**
 * Created by vladan on 30/03/2017.
 */

jQuery(document).ready(function($){

    /**
     * Triggering favor menus
     */

    $('body').on( 'hover', '.favor-trigger', function(){
        var $this = $(this),
            favor_menu = $this.next();

        favor_menu.show("fast");
    });

    $('body').on( 'mouseleave', '.favor-menu', function(){
        $(this).hide("fast");
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
});