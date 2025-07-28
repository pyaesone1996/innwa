<?php

class Glive_API {
    /**
     * Fetches the match list from GLIVE API caching.
     */
    public function get_matches( $sportstype = 'FOOTBALL', $format = 'JSON' ) {
        
        $params = [
            'action' => 'getmatch',
            'apiuser' => GLIVE_API_USER,
            'key' => GLIVE_API_KEY,
            'sportstype' => $sportstype,
            'format' => $format
        ];

        $request_url = add_query_arg($params, GLIVE_API_URL);
        $response = wp_remote_get($request_url, ['timeout' => 20]);

        if ( is_wp_error( $response ) ) {
            return ['error' => 'API Failed: ' . $response->get_error_message()];
        }

        if ( wp_remote_retrieve_response_code( $response ) !== 200 ) {
            return ['error' => 'API Failed: ' . wp_remote_retrieve_response_code( $response )];
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        $matches = isset($data['Match']) ? $data['Match'] : [];
        
        if (empty($matches) || !is_array($matches)) {
            return ['error' => 'API Failed: Invalid response format.'];
        }

        return $matches;
    }

    public function get_player_link( $matchid ) {
        
        if (empty($matchid)) {
            return null; // Return null if match ID is not provided
        }

        $params = [
            'action'    => 'geth5link', // Action to get the player link 
            'apiuser'   => GLIVE_API_USER,
            'key'       => GLIVE_API_KEY,
            'ip'        => $_SERVER['REMOTE_ADDR'], // The end user's IP (IPv4 only) 
            'uid'       => uniqid(), // A unique ID for the user 
            'matchid'   => $matchid, // The ID of the match to watch 
            'brand'     => GLIVE_API_BRAND, // The brand name 
        ];

        $request_url = add_query_arg($params, GLIVE_API_URL);
        $response = wp_remote_get($request_url, ['timeout' => 20]);

        if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
            return ['error' => 'API Failed: ' . $response->get_error_message()];
        }

        $data = json_decode(wp_remote_retrieve_body($response), true);
      
        if (empty($data) || !is_array($data)) {
            return ['error' => 'API Failed: ' . $response->get_error_message()];
        }

        if (isset($data['Status']) && $data['Status'] == 'OK' && $data['H5LINKROW']) {
            return $data['H5LINKROW'];  
        }

        return null;
    }

    
}