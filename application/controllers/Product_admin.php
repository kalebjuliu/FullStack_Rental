<?php

class Product_admin extends CI_Controller
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
        $data['products'] = $this->admin_model->get_product();
        $this->load->view('admin/product_dashboard', $data);
    }

    public function add_product()
    {
        $this->form_validation->set_rules('name', 'product name', 'required|trim');
        $this->form_validation->set_rules('qty', 'quantity', 'required|trim|numeric');
        $this->form_validation->set_rules('price', 'price', 'required|trim|numeric');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['name'] = $data['user']['first_name'];

            $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
            $data['sidebar'] = $this->load->view('templates/sidebar.php', $data, TRUE);
            $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
            $data['products'] = $this->admin_model->get_product();
            $this->load->view('admin/product_dashboard', $data);
        } else {
            $image = $_FILES['image']['name'];
            if ($image = '') {
            } else {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo 'Image failed to upload';
                } else {
                    $image = $this->upload->data('file_name');
                }
            }


            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'qty' => $this->input->post('qty', true),
                'image' => $image,
                'price' => $this->input->post('price', true),
                'description' => htmlspecialchars($this->input->post('description', true)),
            ];

            $this->db->insert('products', $data);
            redirect('Product_admin');
        }
    }

    public function edit_product($id)
    {
        $where = array('id' => $id);
        $data['product'] = $this->admin_model->edit_product($where, 'products')->result();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['name'] = $data['user']['first_name'];

        $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
        $data['sidebar'] = $this->load->view('templates/sidebar.php', $data, TRUE);
        $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
        $this->load->view('admin/edit_product_dashboard', $data);
    }

    public function update_product()
    {
        $this->form_validation->set_rules('name', 'product name', 'required|trim');
        $this->form_validation->set_rules('qty', 'quantity', 'required|trim|numeric');
        $this->form_validation->set_rules('price', 'price', 'required|trim|numeric');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        if ($this->form_validation->run() == false) {

            $where = array('id' => $this->input->post('id'));
            $data['product'] = $this->admin_model->edit_product($where, 'products')->result();

            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['name'] = $data['user']['first_name'];

            $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
            $data['sidebar'] = $this->load->view('templates/sidebar.php', $data, TRUE);
            $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
            $this->load->view('admin/edit_product_dashboard', $data);
        } else {
            if ($_FILES['image']['error'] != 4) {

                $image_name = $this->input->post('image_name');

                if (file_exists('./assets/img/' . $image_name)) {
                    unlink('./assets/img/' . $image_name);
                }

                $image = $_FILES['image']['name'];
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    echo 'Image failed to upload';
                } else {
                    $image = $this->upload->data('file_name');
                }
            } else {
                $image = $this->input->post('image_name');
            }

            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'qty' => $this->input->post('qty', true),
                'image' => $image,
                'price' => $this->input->post('price', true),
                'description' => htmlspecialchars($this->input->post('description', true)),
            ];

            $where = [
                'id' => $this->input->post('id')
            ];

            $this->admin_model->update_data($where, $data, 'products');
            redirect('Product_admin');
        }
    }

    public function delete_product($id)
    {
        $where = [
            'id' => $id
        ];
        $this->admin_model->delete_data($where, 'products');
        redirect('Product_admin');
    }
}
