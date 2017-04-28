<?php

/**
 * Created by PhpStorm.
 * User: vladan
 * Date: 28/04/2017
 * Time: 09:32
 */
class Blog {

	/**
	 * Showing tag cloud only for tags inside categories
	 * @param $cat_id
	 *
	 * @return mixed
	 */
	function get_tag_cloud_by_category( $cat_id )
	{
		$query_args = array(
			'cat' => $cat_id,
			'posts_per_page' => -1
	    );

	    $query = new WP_Query( $query_args );
	    $posttags = [];
	    while( $query->have_posts() ) {
			$query->the_post();

			$pid = get_the_ID();

			foreach ( wp_get_post_tags($pid)[0] as $tag_id ) {
				$posttags[] = wp_get_post_tags($pid)[0]->term_id;
			}
	    }

	    // Reset
	    wp_reset_postdata();

	    // Remove duplicates from array
	    $sortedtags = array_unique($posttags);

	    // Remove the blank entry due to get_the_tag_list
	    $sortedtags = array_values( array_filter($sortedtags) );

		$args = array(
			'smallest' => 8,
			'largest'  => 22,
			'unit'     => 'pt',
			'number'   => 20,
			'format'   => 'flat',
			'separator'=> "\n",
			'orderby'  => 'name',
			'order'    => 'ASC',
			'exclude'  => null,
			'include'  => $sortedtags,
			'link'     => 'view',
			'echo'     => false,
			'child_of' => null, // see Note!
			'taxonomy' => array( 'post_tag' ),
		);

		return wp_tag_cloud( $args );
	}
}