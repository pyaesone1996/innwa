<?php
// inc/glive/class-glive-ajax.php

class Glive_AJAX {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
      
        add_action( 'wp_ajax_get_glive_matches', [ $this, 'handle_get_matches' ] );
        add_action( 'wp_ajax_nopriv_get_glive_matches', [ $this, 'handle_get_matches' ] );

        add_action('wp_ajax_get_player_link', [$this, 'handle_get_player_link']);
        add_action('wp_ajax_nopriv_get_player_link', [$this, 'handle_get_player_link']);
    }

    public function enqueue_scripts() {
       
        wp_enqueue_script( 'glive-main', get_template_directory_uri() . '/assets/js/glive-main.js', ['jquery'], null, true );
        wp_localize_script( 'glive-main', 'glive_ajax_object', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
        ]);
    }

    public function handle_get_matches() {
        // check_ajax_referer('glive_nonce', 'security');
        $api = new Glive_API();
        $matches = $api->get_matches();
        wp_send_json_success($matches);
      
        wp_die();
    }

    public function handle_get_player_link()
    {
        // check_ajax_referer('glive_nonce', 'security');
        if (!isset($_GET['matchid']) || empty($_GET['matchid'])) {
            wp_send_json_error('Match ID is missing.');
        }

        $match_id = sanitize_text_field($_GET['matchid']);
        $api = new Glive_API();
        $player_link = $api->get_player_link($match_id);

        if ($player_link) {
            wp_send_json_success($player_link);
        } else {
            wp_send_json_error('Could not retrieve player link.');
        }

        wp_die();
    }
}