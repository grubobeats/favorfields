<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FavorFields
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <h3 class="entry-sub-title"> A new way to practice spiritual growth.</h3>

		<?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
				<?php favorfields_posted_on(); ?>
            </div><!-- .entry-meta -->
		<?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
		<?php
		echo get_the_content();
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'favorfields' ),
			'after'  => '</div>',
		) );
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
		<?php favorfields_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

