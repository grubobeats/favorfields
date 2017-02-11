<?php
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function vp_callback_settings( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    ?>

    <table class="settings">
        <tr>
            <td>Color Template:</td>
            <td>
                <select name="color-template" id="color-template">
                    <option value="">Choose...</option>
                    <option value="">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Icon</td>
            <td></td>
        </tr>
        <tr>
            <td>Mood</td>
            <td>
                <select name="color-template" id="color-template">
                    <option value="">Choose..</option>
                    <option value="">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Level</td>
            <td>
                <select name="color-template" id="color-template">
                    <option value="">Choose...</option>
                    <option value="">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Stuck/Free</td>
            <td>
                <select name="color-template" id="color-template">
                    <option value="">Choose...</option>
                    <option value="">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Recommended</td>
            <td>
                <select name="color-template" id="color-template">
                    <option value="">Choose...</option>
                    <option value="">2</option>
                </select>
            </td>
        </tr>
    </table>

    <?php
}