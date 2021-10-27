<?php

class Admin_model extends CI_Model
{
    function get_user()
    {
        $query = $this->db->query("SELECT * FROM user");
        return $query->result_array();
    }
    function get_product()
    {
        $query = $this->db->query("SELECT * FROM products");
        return $query->result_array();
    }
    function get_product_detail($id)
    {
        $result = $this->db->where('id', $id)->get('products');
        return $result->result_array();
    }
    function get_order()
    {
        $query = $this->db->query("SELECT * FROM orders");
        return $query->result_array();
    }
    function edit_product($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
