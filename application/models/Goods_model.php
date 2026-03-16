<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Goods_model extends CI_Model {



  public function get_all_categories() {
    return $this->db->order_by('id', 'DESC')->get('goods_categories')->result_array();
  }
  public function get_all_goods() {
    $this->db->select('goods.*, goods_categories.name as category_name');
    $this->db->from('goods');
    $this->db->join('goods_categories', 'goods_categories.id = goods.id_category', 'left');
    return $this->db->get()->result_array();
  }
  public function get_goods_by_id($id) {
    $this->db->select('goods.*, goods_categories.name as category_name');
    $this->db->from('goods');
    $this->db->join('goods_categories', 'goods_categories.id = goods.id_category', 'left');
    $this->db->where('goods.id', $id);
    return $this->db->get()->row_array();
  }
  public function delete_goods($id) {
    return $this->db->where('id', $id)->delete('goods');
  }
  public function update_goods($id, $data) {
    return $this->db->where('id', $id)->update('goods', $data);
  }


  public function get_category_by_id($id) {
    return $this->db->get_where('goods_categories', ['id' => $id])->row_array();
  }
  public function update_category($id, $data) {
    return $this->db->where('id', $id)->update('goods_categories', $data);
  }
  public function delete_category($id) {
    return $this->db->where('id', $id)->delete('goods_categories');
  }

  public function count_goods_by_category($id_category) {
    return $this->db->where('id_category', $id_category)->count_all_results('goods');
  }




}
