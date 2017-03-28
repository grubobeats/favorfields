<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FavorFields
 */
global $favorfields;

if ($favorfields['enable-footer']) :
?><!-- Footer -->


<footer id="footer">
    <div class="inner">
        <section>
            <h2>Get in touch</h2>
            <form method="post" action="#">
                <div class="field half first">
                    <input type="text" name="name" id="name" placeholder="Name" />
                </div>
                <div class="field half">
                    <input type="email" name="email" id="email" placeholder="Email" />
                </div>
                <div class="field">
                    <textarea name="message" id="message" placeholder="Message"></textarea>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send" class="special" /></li>
                </ul>
            </form>
        </section>
        <section>
            <h2>Follow</h2>
            <ul class="icons">
                <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
                <li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
            </ul>
        </section>
        <ul class="copyright">
            <li>&copy; FavorField. All rights reserved</li>
        </ul>
    </div>
</footer>

<?php endif; ?>

</div>


<?php wp_footer(); ?>
<script>var secure_site = '<?= wp_create_nonce('secure-site') ?>';</script>
</body>
</html>