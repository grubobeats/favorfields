<?php

/**
 * @description: Creating meta_box for steps in admin
 * @author: Vladan Paunovic
 * @contact: https://givemejobtoday.com
 * @date: 15/02/2017
 */
class Wellgorithms_Steps
{
    private $screens = array(
        'wellgorithms',
    );

    protected $answers;
    protected $post_id;

    public function __construct()
    {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'admin_footer', array( $this, 'admin_footer' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );
    }

    /**
     * Hooks into WordPress' add_meta_boxes function.
     * Goes through screens (post types) and adds the meta box.
     */
    public function add_meta_boxes()
    {
        foreach ( $this->screens as $screen ) {
            add_meta_box(
                'vp-wellghoritm-steps',
                __( 'Steps', 'rational-metabox' ),
                array( $this, 'add_meta_box_callback' ),
                $screen
            );
        }
    }

    /**
     * Generates the HTML for the meta box
     *
     * @param object $post WordPress post object
     */
    public function add_meta_box_callback( $post )
    {
         wp_nonce_field( 'basic_settings_data', 'basic_settings_nonce' );
        $this->generate_fields( $post );
    }

    public function admin_footer()
    {
        ?><script>
        jQuery(document).ready(function($){
            // Coping values from eaxh question to it's select as a first option
           $('.questions').keyup(function(){
               var selectBox = $(this)
                   .parent()
                   .parent()
                   .next()
                   .find('select')
                   .first()
                   .children()
                   .first();

               $(selectBox).val( $(this).val() );
           });

           $('.first_answer').keyup(function(){
               var selectBoxAnswerOne = $(this)
                   .parent()
                   .parent()
                   .next()
                   .find('select')
                   .eq(1)
                   .children()
                   .first();

               $(selectBoxAnswerOne).val( $(this).val() )
           });

            $('.second_answer').keyup(function(){
                var selectBoxAnswerOne = $(this)
                    .parent()
                    .parent()
                    .next()
                    .find('select')
                    .eq(2)
                    .children()
                    .first();

                $(selectBoxAnswerOne).val( $(this).val() )
            });


        });
    </script>
        <?php
    }

    /**
     * Generates the field's HTML for the meta box.
     */
    public function generate_fields( $post )
    {
        global $favorfields;

        $this->post_id = $post->ID;

        $stored_data = get_post_meta($this->post_id);
        $question_values = unserialize($stored_data['questions'][0]);
        $first_answers_values = unserialize($stored_data['first_answers'][0]);
        $second_answers_values = unserialize($stored_data['second_answers'][0]);
        $chosen_questions = unserialize($stored_data['chosen_question'][0]);
        $chosen_first_answers = unserialize($stored_data['chosen_first_answer'][0]);
        $chosen_second_answers = unserialize($stored_data['chosen_second_answer'][0]);

        $number_of_steps = $favorfields['number-of-steps'] - 1;
        $user_answers = $this->getUserAnswers();

        $clicks = unserialize( get_post_meta($post->ID, 'answer_clicks')[0] );

        ?>
        <div class="inside_steps">

            <?php for ($i=0; $i <= $number_of_steps; $i++) : ?>
                <!-- Step #<?php print(1 + $i); ?> -->


                <table class="steps">
                    <tr>
                        <td colspan="3">
                            <h4 class="step_text">Step #<?php print(1 + $i); ?></h4>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <label for="questions">Question:</label>
                            <textarea name="questions[]" class="questions" cols="30" rows="5" placeholder="Question..."><?php if($question_values[$i]) : echo $question_values[$i]; endif;?></textarea>
                        </td>
                        <td>
                            <label for="first_answer">First Answer (<strong style="font-size: 15px;color: blue;"><?= $clicks[$i][0] ?></strong>)</label>
                            <textarea name="first_answers[]" class="first_answer" cols="30" rows="5" placeholder="First answer..."><?php if($first_answers_values[$i]) : echo $first_answers_values[$i]; endif;?></textarea>
                        </td>
                        <td>
                            <label for="second_answer">Second Answer (<strong style="font-size: 15px;color: blue;"><?= $clicks[$i][1] ?></strong>)</label>
                            <textarea name="second_answers[]" class="second_answer" cols="30" rows="5" placeholder="Second answer..."><?php if($second_answers_values[$i]) : echo $second_answers_values[$i]; endif;?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="chosen_question[]" id="choose-question" style="display: none;">
                                <option value="<?= $question_values[$i] ? $question_values[$i] : "0" ?>">Main admin question</option>
                                <?  for($q = 0; $q < (count($user_answers) - 1); $q++ ) : ?>
                                            <option answered="<?= $user_answers[ $q ][ 'user_answers_object' ][ $i ] ?>"
                                                    value="<?= $user_answers[ $q ][ 'user_questions' ][ $i ] ?>" <? if ( $user_answers[ $q ][ 'user_questions' ][ $i ] == $chosen_questions[ $i ] ) : ?> selected <? endif; ?>><?= ( $q + 1 ) . ". " . $user_answers[ $q ][ 'user_questions' ][ $i ] ?></option>
                                <? endfor; ?>
                            </select>
                        </td>
                        <td>
                            <label for="choose-first-answer">Selected answer #1</label>
                            <select name="chosen_first_answer[]" id="choose-first-answer">
                                <option value="<?= $first_answers_values[$i] ? $first_answers_values[$i] : "0" ?>">Main admin answer</option>
                                <?  for($q = 0; $q < (count($user_answers) - 1); $q++ ) :
//                                        if ( $user_answers[$q]['user_answers_object'][$i] == 1 || $user_answers[$q]['user_answers_object'][$i] == 3 ) {
                                            ?>
                                            <option answered="<?= $user_answers[$q]['user_answers_object'][$i] ?>" value="<?= $user_answers[$q]['user_first_answers'][$i] ?>" <? if($user_answers[$q]['user_first_answers'][$i] == $chosen_first_answers[$i]) : ?> selected <? endif; ?> ><?= ($q + 1) . ". " . $user_answers[$q]['user_first_answers'][$i] ?></option>
                                        <?
//                                        }
                                    endfor;
                                ?>
                            </select>
                        </td>
                        <td>
                            <label for="choose-second-answer">Selected answer #2</label>
                            <select name="chosen_second_answer[]" id="choose-second-answer">
                                <option value="<?= $second_answers_values[$i] ? $second_answers_values[$i] : "0" ?>">Main admin answer</option>
                                <?  for($q = 0; $q < (count($user_answers) - 1); $q++ ) :
//                                        if ( $user_answers[$q]['user_answers_object'][$i] == 2 || $user_answers[$q]['user_answers_object'][$i] == 3 ) {
										?>
                                            <option value="<?= $user_answers[$q]['user_second_answers'][$i] ?>" <? if($user_answers[$q]['user_second_answers'][$i] == $chosen_second_answers[$i]) : ?> selected <? endif; ?>  ><?= ($q + 1) . ". " . $user_answers[$q]['user_second_answers'][$i] ?></option>
                                        <? //}
                                    endfor; ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <br>
            <? endfor; ?>
        </div>
        <?
    }

    public function getUserAnswers()
    {
        global $wpdb;

        // Get the Wellgorithm ID
        $wellgo_id = $_GET['post'];

        // Get the User answers ID's
        $user_answer_id_result = $wpdb->get_results( "SELECT `post_id` FROM `wp_postmeta` WHERE `meta_key` = 'user_basic_settings_related_wellgo' AND `meta_value` = '$wellgo_id' ", OBJECT );

        $answers = array();

        for ($i = 0; $i <= count($user_answer_id_result); $i++) {
            $user_answer_meta = get_post_meta( $user_answer_id_result[$i]->post_id );

            $answers[$i] = $user_answer_meta;

            $answers[$i]['user_answers_id'] = $user_answer_id_result[$i]->post_id;

            // Unserializing data and filtering (removing empty keys from arrays)
            $answers[$i]['user_questions'] =
                array_filter( unserialize( $user_answer_meta['user_questions'][0] ) );

            $answers[$i]['user_first_answers'] =
                array_filter( unserialize( $user_answer_meta['user_first_answers'][0] ) );

            $answers[$i]['user_second_answers'] =
                array_filter( unserialize( $user_answer_meta['user_second_answers'][0] ) );

			$answers[$i]['user_answers_object'] = unserialize( unserialize( $user_answer_meta['user_answers_object'][0] ) );
        }

        return $answers;
    }

    /**
     * Hooks into WordPress' save_post function
     */
    public function save_post( $post_id )
    {
        // Saving steps
        update_post_meta($post_id, 'questions', $_POST['questions'] );
        update_post_meta($post_id, 'first_answers', $_POST['first_answers'] );
        update_post_meta($post_id, 'second_answers', $_POST['second_answers'] );

        // Saving chosen questions and answers
        update_post_meta($post_id, 'chosen_question', $_POST['chosen_question'] );
        update_post_meta($post_id, 'chosen_first_answer', $_POST['chosen_first_answer'] );
        update_post_meta($post_id, 'chosen_second_answer', $_POST['chosen_second_answer'] );
    }
}

new Wellgorithms_Steps;
