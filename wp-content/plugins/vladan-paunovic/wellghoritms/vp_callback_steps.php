<?php
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function vp_callback_steps( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    $settings_question = array(
        'media_buttons' => false,
        'textarea_name' => 'questions[]',
        'editor_class'  => 'question',
        'teeny'         => true,
        'editor_height' => 100,
    );

    $settings_first_answer = array(
        'media_buttons' => false,
        'textarea_name' => 'first_answers[]',
        'editor_class'  => 'first_answer',
        'teeny'         => true,
        'editor_height' => 30,
    );

    $settings_second_answer = array(
        'media_buttons' => false,
        'textarea_name' => 'second_answers[]',
        'editor_class'  => 'second_answer',
        'teeny'         => true,
        'editor_height' => 30,
    );

    ?>



    <table class="steps">
        <tr>
            <td colspan="2">
                <h4>Step #1</h4>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h4 for="question_1">Question:</h4>
                <?php wp_editor( '', 'question_1', $settings_question ); ?>
            </td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li>
                        <h4 for="answer_1">First Answer</h4>
                        <?php wp_editor( '', 'answer_1', $settings_first_answer ); ?>
                    </li>
                    <li>
                        <label for="choose-ffirst-answer">First Answer</label>
                        <select name="choose-first-answer" id="choose-first-answer">
                            <option value="0">Main admin answer</option>
                            <option value="">2</option>
                        </select>
                    </li>
                </ul>
            </td>
            <td>
                <ul>
                    <li>
                        <h4 for="answer_2">Second Answer</h4>
                        <?php wp_editor( '', 'answer_2', $settings_second_answer ); ?>
                    </li>
                    <li>
                        <label for="choose-second-answer">Second Answer</label>
                        <select name="choose-second-answer" id="choose-second-answer">
                            <option value="0">Main admin answer</option>
                            <option value="">2</option>
                        </select>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
    <hr>

        <button name="publish" id="add-step" class="button button-primary button-large">Add Step</button>


    <?
}
