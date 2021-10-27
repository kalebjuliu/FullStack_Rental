<?php

class Order_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('product');
        if ($this->session->userdata('role_id') == 0) {
            redirect('user');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['name'] = $data['user']['first_name'];

        $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
        $data['sidebar'] = $this->load->view('templates/sidebar.php', $data, TRUE);
        $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
        $data['orders'] = $this->admin_model->get_order();
        $this->load->view('admin/order_dashboard', $data);
    }
    public function delivered($orderID)
    {
        $this->db->set('status', 'Sudah Dikirim');
        $this->db->where('id', $orderID);
        $this->db->update('orders');

        redirect('Order_admin');
    }
    public function done($orderID)
    {
        $this->db->set('status', 'Selesai');
        $this->db->where('id', $orderID);
        $this->db->update('orders');

        $data['order'] = $this->product->getOrder($orderID);
        foreach ($data['order']['items'] as $item) {
            $this->product->updateQtyPlus($item['product_id']);
        }

        redirect('Order_admin');
    }
}
