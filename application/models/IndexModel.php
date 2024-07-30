<?php

class IndexModel extends CI_Model
{

  public function getCategory()
  {
    $query = $this->db->get_where("categories", ["status" => 1]);

    return $query->result();
  }


  public function getBrand()
  {
    $query = $this->db->get_where("brands", ["status" => 1]);

    return $query->result();
  }


  public function getAllProduct()
  {
    $query = $this->db->get_where("products", ['status' => 1]);
    return $query->result();
  }

}
