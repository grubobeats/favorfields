<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 01/05/2017
 * Time: 09:45
 */
wp_enqueue_style( 'vp_wellghoritms_flipclock-css', 'https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css' );
wp_enqueue_script( 'vp_wellghoritms_flipclock_js', 'https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.js', array(), '20130115', true );
?>
<div class="countdown"></div>
