<?php
if (!function_exists('dsm'))
{
    /**
     * This function prints the array in a pre formatter style.
     * @param array $var
     * @param bool $stop
     */
    function dsm($var, $stop = false) {
        print '<pre class="spit">';
        print_r($var);
        print '</pre>';

        if ($stop) {
            exit();
        }
    }
}


/**
 * This function will check for the user's session and determine
 * if the user is authenticated or not.
 */
if (!function_exists('auth_user'))
{
    function auth_user() {
        $ci =& get_instance();
        if (!$ci->ion_auth->logged_in()) {
            redirect('auth/login');
        }
    }
}
if (!function_exists('redirect_user'))
{
    function redirect_user() {
        $ci =& get_instance(); // getting the CI instance
        $user = $ci->ion_auth->user()->row();

        if ($user->login_status) {

        }
        else {
            redirect('auth/change_password');
        }
    }
}
if (!function_exists('set_message'))
{
    /**
     * This message will set a session variable message
     * which will be used to pass messages and alerts.
     * @param $message
     * @param string $type
     * @return bool
     */
    function set_message($message, $type = 'info', $mode = 'flash') {
        //    getting the CI instance
        $ci =& get_instance();

        if ($mode == 'flash') {
            //    setting the messeage to the session data
            $ci->session->set_flashdata('message', $message);

            //    Setting the message type - block | error | success | info
            $ci->session->set_flashdata('type', $type);
        }

        if ($mode == 'session') {
            $message = array('message' => $message, 'type' => $type);
            $ci->session->set_userdata('message', $message);
        }

        return true;
    }
}

if (!function_exists('get_message'))
{
    /**
     * This message will be used to get any message
     * which might have been set by some code in the session
     * and then display the message
     * @return bool
     */
    function get_message() {
        //    getting the ci instance
        $ci =& get_instance();

        $message = array();
        //    building the array
        if ($ci->session->flashdata('message')) {
            $message['message'] = $ci->session->flashdata('message');
            $message['type'] = $ci->session->flashdata('type');
        }

        $message_session = $ci->session->userdata('message');

        if ($message_session) {
            $message =  $message_session;
            $ci->session->unset_userdata('message');
        }

        if ($message) {
            return $message;
        }
        else {
            return false;
        }

    }
}

function getGroups()
{
    $ci =& get_instance();
    $groups =  $ci->db->get('groups')->result_array();
    $group_arr =array();
    foreach ($groups as $key => $val) {
        $id = $val['id'];
        $name = $val['name'];
        $group_arr[$id] = $name;
    }
    return $group_arr;
}
