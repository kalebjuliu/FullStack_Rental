<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
            $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($captcha_response != '') {
            $keySecret = '6LfP5uYaAAAAAHRvcoTprDbtkGVlwYfSuVMBbHXp';

            $check = array(
                'secret'        =>    $keySecret,
                'response'        =>    $this->input->post('g-recaptcha-response')
            );

            $startProcess = curl_init();

            curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($startProcess, CURLOPT_POST, true);
            curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
            curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

            $receiveData = curl_exec($startProcess);
            $finalResponse = json_decode($receiveData, true);
            if ($finalResponse['success']) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $user = $this->db->get_where('user', ['email' => $email])->row_array();


                if ($user) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'first_name' => $user['first_name'],
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('User_admin');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                          Wrong password
                    </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Account does not exist!
                    </div>');
                    redirect('auth');
                }
            } else {
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('first_name', 'first name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'last name', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'The email is already registered'
        ]);
        $this->form_validation->set_rules('address', 'address', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'phone number', 'required|trim|numeric');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[8]|matches[repeat_password]', [
            'matches' => 'The password did not match'
        ]);
        $this->form_validation->set_rules('repeat_password', 'repeat password', 'required|trim|matches[password]');


        if ($this->form_validation->run() == false) {
            $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
            $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
            $this->load->view('auth/registration', $data);
        } else {
            $data = [
                'first_name' => htmlspecialchars($this->input->post('first_name', true)),
                'last_name' => htmlspecialchars($this->input->post('last_name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'address' => htmlspecialchars($this->input->post('address', true)),
                'phone_number' => $this->input->post('phone_number', true)
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your account has been created. You can now login
            </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('first_name');
        redirect('user');
    }
}
