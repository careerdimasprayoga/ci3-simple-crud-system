<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function signin() {   
		$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules( 'password', 'Password', 'required|min_length[5]');
    if($this->form_validation->run() == FALSE) {
      is_guest();
      $this->load->view('auth/sign-in');
    } else {
      $this->action_signin();
    }
	}

  private function action_signin() {
    $username = trim($this->input->post('username', true));
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['username' => $username])->row_array();

    if (!$user) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account not found!</div>');
      return redirect('auth/signin');
    }

    if (isset($user['is_active']) && $user['is_active'] != 1) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account not activated yet!</div>');
      return redirect('auth/signin');
    }

    if (!password_verify($password, $user['password'])) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
      return redirect('auth/signin');
    }

    $data = [
      'name'      => $user['name'],
      'username'  => $user['username'],
      'logged_in' => true
    ];

    $this->session->set_userdata($data);
    return redirect('dashboard');
  }


  public function signup() {   
    is_guest();
		$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
    $this->form_validation->set_rules( 'password', 'Password', 'required|min_length[5]');
    if($this->form_validation->run() == FALSE) {
      $this->load->view('auth/sign-up');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'username' => htmlspecialchars($this->input->post('username', true)),
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
      ];
      $this->db->insert('users', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! Silahkan masuk</div>');
      redirect('auth/signin');
    }
	}

  public function signout() {
    $this->session->sess_destroy();
    redirect('auth/signin');
  }


}
