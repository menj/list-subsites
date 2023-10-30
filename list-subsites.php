<?php
/*
Plugin Name: List Subsites
Description: A simple plugin to list all subsites in a WordPress Multisite installation.
Version: 1.0
Author: MENJ
Author URI: https://menj.net
*/

function list_subsites() {
    if (is_multisite()) {
        // Check if the list is cached
        $cache_key = 'list_subsites_cache';
        $list = wp_cache_get($cache_key);

        if (false === $list) {
            // If not cached, generate the list
            $sites = get_sites();
            $list = '<ul class="list-subsites">';
            foreach ($sites as $site) {
                $details = get_blog_details($site->blog_id);
                $name = esc_html($details->blogname);
                $url = esc_url($details->siteurl);
                $description = get_blog_option($site->blog_id, 'blogdescription');
                if (empty($description)) {
                    $description = 'No tagline set';
                }
                $list .= "<li>$name - <a href='$url'>$url</a>: $description</li>";
            }
            $list .= '</ul>';

            // Cache the list for 1 hour
            wp_cache_set($cache_key, $list, '', HOUR_IN_SECONDS);
        }

        return $list;
    } else {
        return 'This is not a multisite installation.';
    }
}

add_shortcode('list_subsites', 'list_subsites');

function list_subsites_styles() {
    ?>
    <style>
        .list-subsites {
            list-style-type: none;
            padding: 0;
        }

        .list-subsites li {
            margin-bottom: 10px;
        }
    </style>
    <?php
}

add_action('wp_head', 'list_subsites_styles');