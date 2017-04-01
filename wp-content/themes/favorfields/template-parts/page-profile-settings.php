<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FavorFields
 *
 * Template name: Profile settings
 */

get_header();



if ( is_user_logged_in() ) :

    require_once get_template_directory() . '/classes/profile_page/My_Sanctaury.php';
    $profile_page = new My_Sanctaury();

    global $favorfields;

    $user = wp_get_current_user();
    $avatar = get_wp_user_avatar($user->ID, 96);
    $favor_points = ( get_user_meta( $user->ID, 'favor_points', true ) ) ? get_user_meta( $user->ID, 'favor_points', true ) : 0 ;

    if ( isset($_POST['submit']) ) {
        saveUserChanges();
    }
?>
<script>
    var ajaxurl = "<?= admin_url( 'admin-ajax.php' ) ?>";
    var permalink = "<?= get_permalink(); ?>";
    var user_id = "<?= get_current_user_id(); ?>";
    var title = "<?= get_the_title(); ?>";
</script>
<div class="separator" style="height: 150px; width: 100%"></div>
<!-- Main -->

<div id="main">

    <div class="my-journey">

        <h1><?= get_the_title() ?></h1>
        <div class="row">
            <div class="user-avatar"><img class="user-logo" src="<?= $avatar; ?>" alt=""></div>
            <div class="username"><?= $user->user_login ?></div>
        </div>
        <div class="row">
            <form action="<?= get_permalink() ?>" method="post">
                <ul>
                    <li>
                        <textarea name="user_bio" id="user_bio" cols="30" rows="10" placeholder="Enter short bio..."><?= get_user_meta( $user->ID, 'description', true );?></textarea>
                    </li>
                    <li>
                        <input type="password" name="user_new_password" placeholder="Enter new password">
                    </li>
                    <li>
                        <select name="user_gender" id="user_gender">
                            <?
                                $genders = array('Other', 'Male', 'Female');
                                foreach ( $genders as $gender ) :
                                    $db_value_gender = get_user_meta( $user->ID, 'user_gender', true );
                                    ?>
                                <option value="<?= strtolower($gender) ?>" <? if (strtolower($gender) == $db_value_gender ) :?> selected<? endif; ?>><?= $gender ?></option>
                            <? endforeach; ?>
                        </select>
                    </li>
                    <li><input type="text" name="headline" placeholder="Headline" value="<?= get_user_meta( $user->ID, 'headline', true );?>"></li>
                    <li><input type="text" name="subhead" placeholder="Subhead" value="<?= get_user_meta( $user->ID, 'subhead', true );?>"></li>
                    <li><button type="submit" name="submit">Submit</button></li>
                </ul>
            </form>
        </div>

    </div>
</div>



<? else : ?>
    <h2>You need to be logged in to view this page</h2>
<? endif; ?>

<?php get_footer(); ?>
