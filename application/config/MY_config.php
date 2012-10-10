<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Deny routes when not logged in.
$config['members'] = array('change_password',
                           'logout',
                           'renew',
                           'history',
                           'add_to_favorites',
                           'remove_from_favorites',
                           'favorites',
                           'history',                           
);

$config['guest'] = array('register',
                         'forgot_password',
);

define('ERROR_SYSTEM', 'A system error occurred. We apologize for any inconvenience.');
define('ERROR_ACCESS', 'This page has been accessed in error.');

define('PDF_PATH', BASEPATH . '../uploads/');
