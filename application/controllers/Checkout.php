<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    function  __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id') == null) {
            redirect('auth');
        }
        $this->load->library('cart');
        $this->load->model('product');
        $this->controller = 'checkout';
    }
    public function index()
    {
        if ($this->cart->total_items() <= 0) {
            redirect('user/');
        }
        $data['cartItems'] = $this->cart->contents();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $userID = $data['user']['id'];

        $duration = $this->input->post('day');
        $order = $this->placeOrder($userID, $duration);

        if ($order) {
            $this->session->set_userdata('success_msg', 'Order placed successfully.');
            redirect('checkout/myOrder/');
            //redirect('user');
        } else {
            $data['error_msg'] = 'Order submission failed, please try again.';
        }
        $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
        $data['navlinks'] = $this->load->view('templates/navlinks.php', NULL, TRUE);
        $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
        $this->load->view($this->controller . '/index', $data);
    }


    public function placeOrder($custID, $duration)
    {
        // Insert order data
        $ordData = array(
            'user_id' => $custID,
            'grand_total' => $this->cart->total(),
            'duration' => $duration
        );
        $insertOrder = $this->product->insertOrder($ordData);

        if ($insertOrder) {
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();

            // Cart items
            $ordItemData = array();
            $i = 0;
            foreach ($cartItems as $item) {
                $ordItemData[$i]['order_id']        = $insertOrder;
                $ordItemData[$i]['product_id']      = $item['id'];
                $ordItemData[$i]['quantity']        = $item['qty'];
                $ordItemData[$i]['sub_total']       = $item["subtotal"];
                $i++;
                $this->product->updateQtyMinus($item['id']);
            }

            if (!empty($ordItemData)) {
                // Insert order items
                $insertOrderItems = $this->product->insertOrderItems($ordItemData);

                if ($insertOrderItems) {
                    // Remove items from the cart
                    $this->cart->destroy();
                    $this->session->set_userdata('orderID', $insertOrder);

                    return $insertOrder;
                }
            }
        }
        return false;
    }

    public function changeStatus($ordID)
    {
        $this->db->set('status', 'Siap di Pick-up');
        $this->db->where('id', $ordID);
        $this->db->update('orders');

        redirect('checkout/myOrder/');
    }
    public function myOrder()
    {
        $custID = $this->session->userdata('id');

        if ($custID != null && $this->product->getOrderItemsId($custID) != null) {
            $ordID = $this->product->getOrderItemsId($custID);
            $ordID = $ordID['id'];
            if ($ordID != null) {
                $data['order'] = $this->product->getOrder($ordID);
                $data['ordID'] = $ordID;

                $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
                $data['navlinks'] = $this->load->view('templates/navlinks.php', NULL, TRUE);
                $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
                $this->load->view($this->controller . '/order-success', $data);
            }
        } else {
            $data['header'] = $this->load->view('templates/header.php', NULL, TRUE);
            $data['navlinks'] = $this->load->view('templates/navlinks.php', NULL, TRUE);
            $data['footer'] = $this->load->view('templates/footer.php', NULL, TRUE);
            $this->load->view($this->controller . '/order-empty', $data);
        }
    }
}
