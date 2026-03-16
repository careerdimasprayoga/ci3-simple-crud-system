<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {


  public function __construct() {
    parent::__construct();
    is_logged_in();
    $this->load->model('Goods_model');
    $this->load->library('form_validation');
    $this->load->helper('form');
  }

  // start::crud-goods
	public function list() {
    $data['goods_list'] = $this->Goods_model->get_all_goods();   
    $this->load->view('goods/goods-list', $data);
	}
  public function delete($id) {
    $goods = $this->Goods_model->get_goods_by_id($id);
    if (!$goods) {
      show_404();
    }
    $this->Goods_model->delete_goods($id);
    redirect('goods/list');
  }
  public function create() {
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Nama Barang', 'required|trim');
    $this->form_validation->set_rules('goods_category', 'Kategori Barang', 'required|trim');
    $this->form_validation->set_rules('price', 'Harga Barang', 'required|trim|numeric');
    $this->form_validation->set_rules('date_purchase', 'Tanggal Pembelian', 'required|trim');
    if($this->form_validation->run() == FALSE) {
      $data['category_list'] = $this->Goods_model->get_all_categories();   
      $this->load->view('goods/goods-create', $data);
    } else {
      $datePurchase = $this->input->post('date_purchase'); 
      $dateObj = DateTime::createFromFormat('m/d/Y', $datePurchase);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'id_category' => htmlspecialchars($this->input->post('goods_category', true)),
        'price' => htmlspecialchars($this->input->post('price', true)),
        'date_purchase' => $dateObj ? $dateObj->format('Y-m-d') : null,
      ];
      $this->db->insert('goods', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! Barang telah di tambahkan</div>');
      redirect('goods/list');
    }
	}
  public function update($id) {
    $goods = $this->Goods_model->get_goods_by_id($id);
    if (!$goods) {
      show_404();
    }
    $this->form_validation->set_rules('name', 'Nama Barang', 'required|trim');
    $this->form_validation->set_rules('goods_category', 'Kategori Barang', 'required|trim');
    $this->form_validation->set_rules('price', 'Harga Barang', 'required|trim|numeric');
    $this->form_validation->set_rules('date_purchase', 'Tanggal Pembelian', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $data['goods'] = $goods;
      $data['category_list'] = $this->Goods_model->get_all_categories();
      $this->load->view('goods/goods-update', $data);
    } else {
      $datePurchase = $this->input->post('date_purchase');
      $dateObj = DateTime::createFromFormat('m/d/Y', $datePurchase);
      if (!$dateObj) {
        $dateObj = DateTime::createFromFormat('Y-m-d', $datePurchase);
      }

      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'id_category' => htmlspecialchars($this->input->post('goods_category', true)),
        'price' => htmlspecialchars($this->input->post('price', true)),
        'date_purchase' => $dateObj ? $dateObj->format('Y-m-d') : null,
      ];

      $this->Goods_model->update_goods($id, $data);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! Barang telah di update</div>');
      redirect('goods/list');
    }
  }

  // end::crud-goods



  // start::category
  public function category() {
    $data['category_list'] = $this->Goods_model->get_all_categories();   
    $this->load->view('goods/category-list', $data);
	}

  public function category_create() {
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Nama Kategori', 'required|trim');
    if($this->form_validation->run() == FALSE) {
      $this->load->view('goods/category-create');
    } else {
      $data = ['name' => htmlspecialchars($this->input->post('name', true))];
      $this->db->insert('goods_categories', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ! Kategori telah di tambahkan</div>');
      redirect('goods/category');
    }
	}

  public function category_update($id) {
    $category = $this->Goods_model->get_category_by_id($id);
    if (!$category) {
      show_404();
    }
    $this->form_validation->set_rules('name', 'Nama Kategori', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $data['category'] = $category;
      $this->load->view('goods/category-update', $data);
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true))
      ];
      $this->Goods_model->update_category($id, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! Kategori telah di update</div>');
      redirect('goods/category');
    }
  }

  public function category_delete($id) {
    $category = $this->Goods_model->get_category_by_id($id);
    if (!$category) {
      show_404();
    }
    $totalGoods = $this->Goods_model->count_goods_by_category($id);
    if ($totalGoods > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kategori gagal dihapus! Kategori ini masih digunakan oleh barang.</div>');
      redirect('goods/category');
    }
    $this->Goods_model->delete_category($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! Kategori telah dihapus</div>');
    redirect('goods/category');
  }


  // end::category


  

}
