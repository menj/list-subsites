<?php
/*
Plugin Name: List Subsites
Description: A simple plugin to list all subsites in a WordPress Multisite installation with sorting options.
Version: 1.1
Author: MENJ
Author URI: https://menj.net
*/

function list_subsites($atts) {
    if (is_multisite()) {
        $atts = shortcode_atts(
            array(
                'sort' => 'name',
                'order' => 'asc',
            ),
            $atts,
            'list_subsites'
        );

        // Check if the list is cached
        $cache_key = 'list_subsites_cache';
        $list = wp_cache_get($cache_key);

        if (false === $list) {
            // If not cached, generate the list
            $sites = get_sites();
            $subsites = array();
            foreach ($sites as $site) {
                $details = get_blog_details($site->blog_id);
                $name = esc_html($details->blogname);
                $url = esc_url($details->siteurl);
                $description = get_blog_option($site->blog_id, 'blogdescription');
                if (empty($description)) {
                    $description = 'No tagline set';
                }
                $subsites[] = array(
                    'name' => $name,
                    'url' => $url,
                    'description' => $description,
                );
            }

            // Sort the subsites
            usort($subsites, function ($a, $b) use ($atts) {
                $key = $atts['sort'];
                $order = $atts['order'] === 'asc' ? 1 : -1;
                if ($a[$key] == $b[$key]) {
                    return 0;
                }
                return ($a[$key] < $b[$key]) ? -1 * $order : 1 * $order;
            });

            // Generate the list
            $list = '<ul class="list-subsites">';
            foreach ($subsites as $subsite) {
                $list .= "<li>{$subsite['name']} - <a href='{$subsite['url']}'>{$subsite['url']}</a>: {$subsite['description']}</li>";
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