<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function add($post)
    {
        $user = array(
            'username'   => $post['username'],
            'email'      => $post['email'],
            'pass'       => $this->hash($post['password']),
            'first_name' => $post['first_name'],
            'last_name'  => $post['last_name'],
        );
        $this->db->set('date_expires', 'ADDDATE(NOW(), INTERVAL 1 MONTH)', FALSE);

        return $this->db->insert('users', $user);
    }

    public function verify($email, $password)
    {
        return $this->db->select('id, type, IF(date_expires < NOW(), true, false) as is_expired', FALSE)
                        ->where('email', $email)
                        ->where('pass', $this->hash($password))
                        ->get('users')->row_array();
    }

    public function find_email($email)
    {
        return $this->db->where('email', $email)
                        ->count_all_results('users');
    }

        public function verify_password($password)
        {
            return $this->db->where('id', $this->session->userdata('id'))
                            ->where('pass', $this->hash($password))
                            ->count_all_results('users');
        }

    public function password_update($password, $user=NULL)
    {
        $user OR $user = $this->db->where('id', $this->session->userdata('id'));

        $user->set('pass', $this->hash($password));
        $user->set('date_modified', 'NOW()', FALSE);

        return $user->update('users');
    }

    public function new_password($email)
    {
        $new_password = substr(md5(uniqid(rand(), TRUE)), 10, 15);
        $user = $this->db->where('email', $email);
        if ($this->password_update($new_password, $user))
        {
            return $new_password;
        }
    }

    public function renew()
    {
        $user = $this->db->where('id', $this->session->userdata('id'));
        $user->set('date_expires', 'ADDDATE(NOW(), INTERVAL 1 MONTH)', FALSE);
        $user->set('date_modified', 'NOW()', FALSE);
        return $user->update('users');
    }

    public function hash($password)
    {
        return hash_hmac('sha256', $password, 'rainbow', TRUE);
    }
}
