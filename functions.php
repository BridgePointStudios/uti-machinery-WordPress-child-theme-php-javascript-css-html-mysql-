<?php


// Show posts of 'post', 'page', 'acme_product' and 'movie' post types on home page
function search_filter( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( $query->is_search ) {
      $query->set( 'post_type', array( 'machine' ) );
    }
  }
}

add_action( 'pre_get_posts','search_filter' );

// this function adds alt text to the list of files/images in media library
function wpse_media_extra_column( $cols ) {
    $cols["alt"] = "ALT";
    return $cols;
}
function wpse_media_extra_column_value( $column_name, $id ) {
    if( $column_name == 'alt' )
        echo get_post_meta( $id, '_wp_attachment_image_alt', true);
}
add_filter( 'manage_media_columns', 'wpse_media_extra_column' );
add_action( 'manage_media_custom_column', 'wpse_media_extra_column_value', 10, 2 );

// this funtion adds a dynamic 'year' to the copyright date
function wpb_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "© " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}
