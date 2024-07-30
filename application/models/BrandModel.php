<?php

class BrandModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function insertBrand($data)
  {
    return $this->db->insert("brands", $data);
  }

  public function selectBrand()
  {
    $query = $this->db->get("brands");
    return $query->result();
  }

  public function selectBrandById($id)
  {
    // $query = $this->db->where('id', $id)->get("brands");
    $query = $this->db->get_where('brands', ['id' => $id]);
    return $query->row();
  }

  public function updateBrand($id, $data)
  {
    return $this->db->update('brands', $data, ['id' => $id]);
  }

  public function deleteBrandById($id)
  {
    return $this->db->delete('brands', ['id' => $id]);
  }
}