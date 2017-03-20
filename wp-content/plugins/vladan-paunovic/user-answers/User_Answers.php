<?php

/**
 * @description: Creating meta_box for steps in admin
 * @author: Vladan Paunovic
 * @contact: https://givemejobtoday.com
 * @date: 15/02/2017
 */
class User_Answers
{
    private $screens = array(
        'my_wellgorithms',
    );

    public function __construct()
    {
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );
    }

    /**
     * Hooks into WordPress' add_meta_boxes function.
     * Goes through screens (post types) and adds the meta box.
     */
    public function add_meta_boxes() {
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
    public function add_meta_box_callback( $post ) {
        wp_nonce_field( 'basic_settings_data', 'basic_settings_nonce' );
        $this->generate_fields( $post );
    }

    /**
     * Generates the field's HTML for the meta box.
     */
    public function generate_fields( $post ) {
        $stored_data = get_post_meta($post->ID);

        $question_values = unserialize($stored_data['user_questions'][0]);
        $first_answers_values = unserialize($stored_data['user_first_answers'][0]);
        $second_answers_values = unserialize($stored_data['user_second_answers'][0]);

        global $favorfields;

        $number_of_steps = $favorfields['number-of-steps'] - 1;

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

                </table>
                <br>
            <? endfor; ?>
        </div>
        <?
    }

    /**
     * Hooks into WordPress' save_post function
     */
    public function save_post( $post_id ) {
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
        update_post_meta($post_id, 'user_questions', $questions );
        update_post_meta($post_id, 'user_first_answers', $first_answers );
        update_post_meta($post_id, 'user_second_answers', $second_answers );
    }
}

new User_Answers;
