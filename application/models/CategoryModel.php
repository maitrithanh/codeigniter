<?php

class CategoryModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function insertCategory($data)
  {
    return $this->db->insert("categories", $data);
  }

  public function selectCategory()
  {
    $query = $this->db->get("categories");
    return $query->result();
  }

  public function selectCategoryById($id)
  {
    // $query = $this->db->where('id', $id)->get("brands");
    $query = $this->db->get_where('categories', ['id' => $id]);
    return $query->row();
  }

  public function updateCategory($id, $data)
  {
    return $this->db->update('categories', $data, ['id' => $id]);
  }

  public function deleteCategoryById($id)
  {
    return $this->db->delete('categories', ['id' => $id]);
  }
}