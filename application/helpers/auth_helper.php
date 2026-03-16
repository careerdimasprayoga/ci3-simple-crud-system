<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {
  function is_logged_in() {
    $CI = &get_instance();
    if (!$CI->session->userdata('username')) {
      redirect('auth/signin');
    }
  }
}

if (!function_exists('is_guest')) {
  function is_guest() {
    $CI = &get_instance();
    if ($CI->session->userdata('username')) {
      redirect('dashboard');
    }
  }
}
