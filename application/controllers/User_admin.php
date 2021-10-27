<?php

class User_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
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
        $data['users'] = $this->admin_model->get_user();
        $this->load->view('admin/user_dashboard', $data);
    }
}
