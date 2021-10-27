<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null) {
            redirect('auth');
        }
        $this->load->library('cart');
        $this->load->model('product');
    }

    public function index()
    {
        $data = array();
        $data['cartItems'] = $this->cart->contents();
        $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
        $data['navlinks'] = $this->load->view('templates/navlinks.php', NULL, TRUE);
        $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
        $this->load->view('cart/index', $data);
    }



    public function removeItem($rowid)
    {
        $remove = $this->cart->remove($rowid);

        redirect('cart/');
    }
}
