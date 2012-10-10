<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($config)
    {
        // Passing $config is required for this to work.
        parent::__construct($config);

        $this->set_error_delimiters('<span class="error">', '</span>');

        $this->set_message('is_unique',  ' This %s has already been registered.');
        $this->set_message('is_natural', ' Please select a category!');
    }

    public function valid_password($password)
    {
        $this->set_message('valid_password', 'Please enter a valid password!');
        // 6 and 20 characters, with at least one lowercase letter,
        // one uppercase letter, and one number.
        $pattern = '/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/';
        return preg_match($pattern, $password) ? $password : FALSE;
    }

    public function verify_password($password)
    {
        $this->set_message('verify_password', 'Your current password is incorrect!');
        $ci = get_instance();
        $result = $ci->user->where('id', $this->session->userdata('id'))
                           ->where('pass', $ci->users->hash($password))
                           ->count_all_results('users');
        return $result ? $password : FALSE;
    }

    public function verify_email($email)
    {
        $this->set_message('verify_email', 'The submitted email address does not match those on file!');
        $ci = get_instance();
        return $ci->user->find_email($email) ? $email : FALSE;
    }
}
