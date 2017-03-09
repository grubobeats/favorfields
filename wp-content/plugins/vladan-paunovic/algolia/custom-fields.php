<?php
/**
 * Agnolia search
 */


add_filter( 'algolia_post_shared_attributes', 'my_post_attributes', 10, 2 );
add_filter( 'algolia_searchable_post_shared_attributes', 'my_post_attributes', 10, 2 );

/**
 * @param array   $attributes
 * @param WP_Post $post
 *
 * @return array
 */
function my_post_attributes( array $attributes, WP_Post $post ) {

    if ( 'wellghoritms' !== $post->post_type ) {
        // We only want to add an attribute for the 'speaker' post type.
        // Here the post isn't a 'speaker', so we return the attributes unaltered.

        $attributes['vp_icon'] = get_post_meta( $post->ID, 'basic_settings_icon' );
        $attributes['vp_mood'] = array_map( 'intval', get_post_meta( $post->ID, 'basic_settings_mood' ) );
        $attributes['vp_level'] = array_map( 'intval', get_post_meta( $post->ID, 'basic_settings_level' ) );
        $attributes['vp_confidence'] = array_map( 'intval', get_post_meta( $post->ID, 'basic_settings_confidence' ) );
        $attributes['vp_recommended'] = get_post_meta( $post->ID, 'basic_settings_recommended' );
        $attributes['vp_weight'] = array_map( 'intval', get_post_meta( $post->ID, 'basic_settings_weight' ) );
        $attributes['vp_synonyms'] = get_post_meta( $post->ID, 'basic_settings_synonyms' );

        return $attributes;
    }

    // Get the field value with the 'get_field' method and assign it to the attributes array.

    $attributes['vp_icon'] = get_post_meta( $post->ID, 'basic_settings_icon' );
    $attributes['vp_mood'] = get_post_meta( $post->ID, 'basic_settings_mood' );
    $attributes['vp_level'] = get_post_meta( $post->ID, 'basic_settings_level' );
    $attributes['vp_confidence'] = get_post_meta( $post->ID, 'basic_settings_confidence' );
    $attributes['vp_recommended'] = get_post_meta( $post->ID, 'basic_settings_recommended' );
    $attributes['vp_weight'] = get_post_meta( $post->ID, 'basic_settings_weight' );
    $attributes['vp_synonyms'] = get_post_meta( $post->ID, 'basic_settings_synonyms' );

    // Always return the value we are filtering.
    return $attributes;

//    var_dump($attributes);
}
