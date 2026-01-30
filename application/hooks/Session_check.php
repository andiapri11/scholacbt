<?php
/**
 * ScholaCBT - Global Session Check Hook
 * Created by Antigravity
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Session_check {

    public function check_session() {
        $CI =& get_instance();
        
        // Skip for Auth controller and API routes if any
        $controller = $CI->router->fetch_class();
        if ($controller === 'auth' || $controller === 'init' || $controller === 'login') {
            return;
        }

        // Only check if user is logged in
        if ($CI->ion_auth->logged_in()) {
            $user = $CI->ion_auth->user()->row();
            $current_session_id = session_id();

            // Compare local session ID with the one in database
            // Safety check for migration
            if (property_exists($user, 'session_id') && $user->session_id !== null && $user->session_id !== $current_session_id) {
                // Kick out!
                $CI->ion_auth->logout();
                $CI->session->set_flashdata('message', 'Sesi Anda telah berakhir karena login di perangkat lain.');
                redirect('auth/login');
            }
        }
    }
}
