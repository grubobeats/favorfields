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

<!-- Wellgo Footer starts here -->
<footer class="main-footer background-color-6">
    <div class="container">
       <!--  <div class="row"> -->
            <div class="col-sm-12">
                <div class="wellgo-footer space-md background-color-3">
                  <div class="row">

                    <div class="col-md-7">
                        <div class="noble-truths background-color-2 border-color-4"> 
                            <h4 class="color-3">Our Four Noble Truths</h4>
                            <ul class="color-3">
                                <li><i class="fa fa-heart" aria-hidden="true"></i> It’s a blessing you were born. </li>
                                <li><i class="fa fa-heart" aria-hidden="true"></i> It matters what you do. </li>
                                <li><i class="fa fa-heart" aria-hidden="true"></i> Your life is a miracle. </li>
                                <li><i class="fa fa-heart" aria-hidden="true"></i> You don’t have to go it alone. </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-5 text-center">
                        <h4>Say hello anytime.</h4>
                        <form class="contact-form row">
                          <div class="form-group col-sm-12">
                            <textarea class="form-control" rows="3"></textarea>
                        </div> 
                        <div class="form-group col-sm-6">
                            <input type="name" class="form-control" placeholder="name">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="email" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-default">send</button>
                        </div>
                    </form>
                </div>

                <div class="col-sm-12"> 
                    <figure class="ff-largo-logo">
                        <img src="http://favorfields.com/wp-content/themes/favorfields/assets/images/ff-large-logo.png" class="img-responsive" alt="">
                    </figure>
                    <hr class="seperator background-color-after-color-3">
                </div>

                <div class="col-md-12 text-center trademarks_copyrights">
                    <?
                    if ( is_singular( 'wellgorithms' ) || is_singular( 'my_wellgorithms' ) ) :

	                $category = get_the_category();
                    $wellgorithm = ( $category[0]->name != "Hellgo" ) ? "Wellgorithm" : "Hellgorithm";
                    ?>
                        <p><span class="cm">FavorFields</span>, Do yourself a favor <span class="tm">today</span>,  <span class="tm"><?= $wellgorithm ?></span>, <span class="cm"><?= $category[0]->name ?></span> and <span class="cm"><?= the_title() ?></span> are trademarks of Lightworkers of the Sphere, LLC.</p>
                    <? else : ?>
                        <p><span class="cm">FavorFields</span>, Do yourself a favor <span class="tm">today</span>,  <span class="tm">Wellgorithm</span>, <span class="cm">Wellgo</span> and <span class="cm">Thought Grenade</span> are trademarks of Lightworkers of the Sphere, LLC.</p>
                    <? endif; ?>
                      <?= $favorfields['footer_copyright'] ?>
                  </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
</footer>
<!-- Wellgo Footer Ends here -->

<?php endif; ?>

</div>


<?php wp_footer(); ?>
<script>var secure_site = '<?= wp_create_nonce('secure-site') ?>';</script>

<?= do_shortcode('[login-form]') ?>



</body>
</html>