<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage BlueOne
 * @since 1.0.0
 */

get_header();
    $blueone_home_sections = blueone_home_section();

    foreach ($blueone_home_sections as $blueone_home_section) {
        get_template_part( 'template-parts/section', $blueone_home_section );
    }

get_footer();
