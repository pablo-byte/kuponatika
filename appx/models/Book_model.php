<?php

class Book_model extends CI_Model {

    public function __construct() {
        $this->table = 'tbl_books';
        $this->load->database();
    }

    public function getbookbyid($id) {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function getbookbykeyword($keyword) {

        $this->db->select('id, name, price, author, category, language, ISBN, publish_date');
        $this->db->from($this->table);
        $this->db->like('name', $keyword);
        $this->db->or_like('category', $keyword);
        $this->db->limit(50);
        $query = $this->db->get();
        //echo $this->db->last_query();die();
        
        return $query->result_array();
    }

    public function getallbooks() {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }
    
    public function getallbooksstats() {

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by("cant", "desc");
        $this->db->limit(20);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }
    
    public function update($id, $data) {

        $this->db->where('id', $id);
        if ($this->db->update($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }

}
