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
        $number_of_steps = $favorfields['number-of-steps'] - 1;
        $user_answers = $this->getUserAnswers();
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
                            <label for="first_answer">First Answer</label>
                            <textarea name="first_answers[]" class="first_answer" cols="30" rows="5" placeholder="First answer..."><?php if($first_answers_values[$i]) : echo $first_answers_values[$i]; endif;?></textarea>
                        </td>
                        <td>
                            <label for="second_answer">Second Answer</label>
                            <textarea name="second_answers[]" class="second_answer" cols="30" rows="5" placeholder="Second answer..."><?php if($second_answers_values[$i]) : echo $second_answers_values[$i]; endif;?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="choose-question">Selected question</label>
                            <select name="choose-question" id="choose-question">
                                <option value="admin">Main admin question</option>
                                <? for($q = 0; $q < (count($user_answers) - 1); $q++ ) : ?>
                                    <option value="<?= $user_answers[$q]['user_answers_id'] ?>"><?= ($q + 1) . ". " . $user_answers[$q]['user_questions'][$i] ?></option>
                                <? endfor; ?>
                            </select>
                        </td>
                        <td>
                            <label for="choose-first-answer">Selected answer #1</label>
                            <select name="choose-first-answer" id="choose-first-answer">
                                <option value="admin">Main admin answer</option>
                                <? for($q = 0; $q < (count($user_answers) - 1); $q++ ) : ?>
                                    <option value="<?= $user_answers[$q]['user_answers_id'] ?>"><?= ($q + 1) . ". " . $user_answers[$q]['user_first_answers'][$i] ?></option>
                                <? endfor; ?>
                            </select>
                        </td>
                        <td>
                            <label for="choose-second-answer">Selected answer #2</label>
                            <select name="choose-second-answer" id="choose-second-answer">
                                <option value="0">Main admin answer</option>
                                <? for($q = 0; $q < (count($user_answers) - 1); $q++ ) : ?>
                                    <option value="<?= $user_answers[$q]['user_answers_id'] ?>"><?= ($q + 1) . ". " . $user_answers[$q]['user_second_answers'][$i] ?></option>
                                <? endfor; ?>
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
        }

        return $answers;
    }

    /**
     * Hooks into WordPress' save_post function
     */
    public function save_post( $post_id )
    {
        // Preparing values from steps
        $questions = array();
        $first_answers = array();
        $second_answers = array();

        foreach ($_POST['questions'] as $question ) {
            $questions[] = $question;
        }

        foreach ($_POST['first_answers'] as $first_answer) {
            $first_answers[] = $first_answer;
        }

        foreach ($_POST['second_answers'] as $second_answer) {
            $second_answers[] = $second_answer;
        }

        // Saving steps
        update_post_meta($post_id, 'questions', $questions );
        update_post_meta($post_id, 'first_answers', $first_answers );
        update_post_meta($post_id, 'second_answers', $second_answers );
    }
}

new Wellgorithms_Steps;
