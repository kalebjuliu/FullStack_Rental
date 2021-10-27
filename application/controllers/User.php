<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('cart');
        $this->load->model('product');
    }

    public function index()
    {
        if ($this->session->userdata('email') != null) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['name'] = $data['user']['first_name'];
        }
        $data['products'] = $this->admin_model->get_product();
        $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
        $data['navlinks'] = $this->load->view('templates/navlinks.php', NULL, TRUE);
        $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
        $this->load->view('user/index', $data);
    }
    public function addToCart($proID)
    {
        if ($this->session->userdata('id')) {
            $data_dump = array();
            $flag = 0;
            $data_dump['cartItems'] = $this->cart->contents();
            foreach ($data_dump['cartItems'] as $item) {
                if ($item['id'] == $proID) {
                    $flag = 1;
                }
            }
            if ($flag == 0) {
                $product = $this->product->getRows($proID);

                $data = array(
                    'id'    => $product['id'],
                    'name'    => $product['name'],
                    'qty'    => 1,
                    'price'    => $product['price'],
                    'image' => $product['image'],
                    'description' => $product['description'],
                );


                $this->cart->insert($data);

                redirect('user');
            } else {
                redirect('user');
            }
        } else {
            redirect('auth');
        }
    }
    public function detail($id)
    {
        $data['product'] = $this->admin_model->get_product_detail($id);
        $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
        $data['navlinks'] = $this->load->view('templates/navlinks.php', NULL, TRUE);
        $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
        $this->load->view('user/detail', $data);
    }
}
