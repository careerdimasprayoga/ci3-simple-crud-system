<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboards_model extends CI_Model {


public function get_all_total_goods_categories() {
  $this->db->select('goods.id_category, goods_categories.name as category_name, SUM(goods.price) as total_price');
  $this->db->from('goods');
  $this->db->join('goods_categories', 'goods_categories.id = goods.id_category', 'left');
  $this->db->group_by('goods.id_category, goods_categories.name');
  return $this->db->get()->result_array();
}


}
