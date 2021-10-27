<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model
{

    function __construct()
    {
        $this->proTable = 'products';
        $this->custTable = 'user';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }

    public function getRows($id = '')
    {
        $this->db->select('*');
        $this->db->from($this->proTable);
        if ($id) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }

        return !empty($result) ? $result : false;
    }
    public function getOrder($id)
    {
        $this->db->select('o.*, c.first_name, c.last_name ,c.email, c.phone_number, c.address, o.status');
        $this->db->from($this->ordTable . ' as o');
        $this->db->join($this->custTable . ' as c', 'c.id = o.user_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();

        // Get order items
        $this->db->select('*');
        $this->db->from($this->ordItemsTable . ' as i');
        $this->db->join($this->proTable . ' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0) ? $query2->result_array() : array();

        // Return fetched data
        return !empty($result) ? $result : false;
    }
    public function insertOrder($data)
    {

        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert ? $this->db->insert_id() : false;
    }

    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array())
    {

        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert ? true : false;
    }

    public function getOrderItemsId($custID)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('user_id', $custID);
        $this->db->where('status !=', 'Selesai');
        $query = $this->db->get();

        $result = $query->row_array();

        return $result;
    }
    public function updateQtyMinus($productID)
    {
        $this->db->set('qty', 'qty - 1', false);
        $this->db->where('id', $productID);
        $this->db->update('products');
    }
    public function updateQtyPlus($productID)
    {
        $this->db->set('qty', 'qty + 1', false);
        $this->db->where('id', $productID);
        $this->db->update('products');
    }
}
