<?php

$config = array(

    'login' => array(
        array(
            'field' => 'login_email',
            'label' => 'Email',
            'rules' => 'required|valid_email',
          ),
        array(
            'field' => 'login_password',
            'label' => 'Password',
            'rules' => 'required|min_length[6]|max_length[20]',
          ),
    ),

    'register' => array(
        array(
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'required|min_length[2]|max_length[20]|alpha',
          ),
        array(
            'field' => 'last_name',
            'label' => 'Last Name',
            'rules' => 'required|min_length[2]|max_length[40]|alpha',
          ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|min_length[2]|max_length[30]|alpha_numeric|is_unique[users.username]',
          ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[users.email]',
          ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|valid_password',
          ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[password]',
        ),
    ),

    'forgot_password' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|verify_email',
        ),
    ),

    'change_password' => array(
        array(
            'field' => 'current_password',
            'label' => 'Current Password',
            'rules' => 'required|verify_password',
        ),
        array(
            'field' => 'new_password',
            'label' => 'New Password',
            'rules' => 'required|valid_password',
          ),
        array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[new_password]',
        ),
    ),

    'add_page' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|min_length[1]|max_length[64]',
        ),
        array(
            'field' => 'category_id',
            'rules' => 'required|is_natural',
          ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required|min_length[1]|max_length[128]',
        ),
        array(
            'field' => 'content',
            'label' => 'Content',
            'rules' => 'required|min_length[1]|max_length[1024]',
        ),
    ),

    'add_pdf' => array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|min_length[1]|max_length[64]',
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required|min_length[1]|max_length[128]',
        ),
    ),

);
