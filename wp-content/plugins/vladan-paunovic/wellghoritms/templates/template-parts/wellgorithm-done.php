<?php
/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 26/04/2017
 * Time: 10:03
 */
?>
<div class="popups background-color-2">
	<div class="prompt-save border-color-1" style="display: none;">
		<p class="greetings_msg">Great job, <span><?= $username ?>!</span></p>
		<div class="is-saved"></div>
		<p class="join-community">Join these wonderful community members who have created a
			<br/> <span><?= get_the_title() ?></span> pledge group:
		</p>
		<div class="wellgo-avatars"></div>

		<? if ( $logic->checkPladged()['permission'] == "true" ) : ?>
			<p for="pladge">Pledge to do the <span><?= get_the_title() ?></span> for</p>
			<select name="pladge" id="pladge">
				<option value="null"></option>
				<? for ($i=3; $i <= 30; $i++) : ?>
					<option value="<?= $i ?>"><?= $i ?> days</option>
				<? endfor; ?>
			</select>
		<? else : ?>
			<p for="pladge" class="already-pladged">You already pladged to do this wellgorithm</p>
		<? endif; ?>

		<p class="people-who-did">People who did the <span><?= get_the_title() ?></span> also did the:</p>
		<div class="related_wellgorithms"></div>
	</div>
</div>
