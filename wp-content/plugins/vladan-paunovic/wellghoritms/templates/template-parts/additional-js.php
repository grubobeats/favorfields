<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 26/04/2017
 * Time: 09:53
 */
?>
<script>
    var all_steps = <?= $welgorithm[ $prefix . 'basic_settings_steps' ][0]; ?>,
        steps = <?= $number_of_questions; ?>,
        maximum_steps = <?= $maximum_questions ?>,
        question_animation = "<?= $favorfields[ $question_animations ] ?>",
        ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>",
        permalink = "<?= get_permalink(); ?>",
        user_id = "<?= get_current_user_id(); ?>",
        title = "<?= get_the_title(); ?>",
        icon = "<?= $welgorithm[ $prefix . 'basic_settings_icon' ][0] ?>",
        color_template = "<?= $color_scheme ?>",
        mood = "<?= $welgorithm[ $prefix . 'basic_settings_mood' ][0] ?>",
        level = "<?= $welgorithm[ $prefix . 'basic_settings_level' ][0] ?>",
        confidence = "<?= $welgorithm[ $prefix . 'basic_settings_confidence' ][0] ?>",
        recommended = "<?= $welgorithm[ $prefix . 'basic_settings_recommended' ][0] ?>",
        post_id = "<?= $logic->getWellgorithmPostID(); ?>",
        username = "<?= $username ?>",
        current_step = 1,
        isLoggedIn = "<?= $logged = ( is_user_logged_in() == true ) ? 1 : 0; ?>",
        current_post_id = "<?= get_the_ID() ?>",
        pladged = "<?= $logic->checkPladged()['permission'] ?>",
        days_left_to_pladge = "<?= $logic->checkPladged()['days_left'] ?>";
</script>
