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
	function get_tag_cloud_by_category( $cat_id = -1)
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


			foreach ( wp_get_post_tags($pid) as $tag_id ) {
				$posttags[] = $tag_id->term_id;
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

	/**
	 * Getting clean tags based on categories
	 * @param int $cat_id
	 *
	 * @return array
	 */
	function get_tags_by_category( $loop = 4, $cat_id = -1 )
	{
		$query_args = array(
			'cat' => $cat_id,
			'posts_per_page' => -1
		);

		$counter = 0;
		$query = new WP_Query( $query_args );
		$posttags = [];
		while( $query->have_posts() ) {

			if( count($posttags) >= 3){ continue; }

			$query->the_post();

			$pid = get_the_ID();

			foreach ( wp_get_post_tags($pid) as $tag_id ) {
				$posttags[] = $tag_id->term_id;
			}

			$counter++;
		}

		// Reset
		wp_reset_postdata();


		// Remove duplicates from array
		$sortedtags = array_unique($posttags);

		// Remove the blank entry due to get_the_tag_list
		$sortedtags = array_values( array_filter($sortedtags) );

		return array_slice($sortedtags, 0, $loop);
	}


	/**
	 * Getting the list of wellgorithms within category or out of category
	 * @param int $count_loop
	 * @param int $cat_id
	 *
	 * @return array
	 */
	function get_wellgorithms_by_category( $count_loop = 4, $cat_id = -1 )
	{
		$query_args = array(
			'cat' => $cat_id,
			'posts_per_page' => 50,
			'post_type' => 'wellgorithms',
			'post_status'=> 'publish',
			'orderby' => 'rand'
		);

		$query = new WP_Query( $query_args );
		$posttags = [];
		while( $query->have_posts() ) {
			$query->the_post();

			$posttags[] = get_the_ID();
		}

		// Reset
		wp_reset_postdata();


		shuffle($posttags);

		return array_slice($posttags, 0, $count_loop);
	}
}