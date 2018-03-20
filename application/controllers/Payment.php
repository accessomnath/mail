<?php

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_model');

    }

    public function index()
    {
        $this->load->view('site/commons/header');
        $this->load->view('site/payment');
        $this->load->view('site/commons/footer');
    }

    public function make_order($id)
    {
        $blog_details = $this->Master_model->fetchalldata('product', 'id', $id);
        $message_details = $blog_details[0];
        $data['message_details'] = $message_details;


        $this->load->view('site/commons/header', $data);
        $this->load->view('site/checkout');
        $this->load->view('site/commons/footer');
    }

    public function make_payment()
    {
        $data = $this->input->post();
        $id = $data['id'];

        $this->session->set_userdata('prod_id', $id);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:616b73e7a2920b551d4e935aacbee308",
                "X-Auth-Token:d370eb08e61fa8cae5d373d3234d82fe"));
        $payload = Array(
            'purpose' => $data['purpose'],
            'amount' => $data['price'],
            'phone' => $data['phone'],
            'buyer_name' => $data['buyer_name'],
            'redirect_url' => base_url() . '/payment/success/',
            'send_email' => true,
            'webhook' => '',
            'send_sms' => true,
            'email' => $data['email'],
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $res_array = json_decode($response);
        redirect($res_array->payment_request->longurl);
    }

    function success()

    {
        $payment_id = $_GET['payment_request_id'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/' . $payment_id . '/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:616b73e7a2920b551d4e935aacbee308",
                "X-Auth-Token:d370eb08e61fa8cae5d373d3234d82fe"));
        $response = curl_exec($ch);
        curl_close($ch);
        $res_array = json_decode($response);
        if ($res_array->success) {
            $payment_data['order_title'] = $res_array->payment_request->purpose;
            $user['customer_name'] = $res_array->payment_request->payments[0]->buyer_name;
            $user['phone'] = $res_array->payment_request->payments[0]->buyer_phone;
            $user['email'] = $res_array->payment_request->payments[0]->buyer_email;
            $payment_data['payment_status'] = $res_array->payment_request->payments[0]->status;
            $payment_data['payment_id'] = $res_array->payment_request->payments[0]->payment_id;
            $payment_data['created_at'] = $res_array->payment_request->payments[0]->created_at;
            $user['password'] = $res_array->payment_request->payments[0]->buyer_email;
            $payment_data['purchase_amt'] = $res_array->payment_request->payments[0]->amount - $res_array->payment_request->payments[0]->fees;
            if (strtolower($payment_data['payment_status']) == 'credit') {
                $user['status'] = true;
            } else {
                $user['status'] = false;
            }

            $payment_data['product_id'] = $this->session->userdata('prod_id');


            $duration = $this->Master_model->fetchdata('product', $payment_data['product_id'])->duration;


            $user['cust_plan'] = $duration;

            $result = $this->Master_model->add_data('users', $user);
            $last_insert_id = $this->db->insert_id();


            $payment_data['cust_id'] = $last_insert_id;
            $result = $this->Master_model->add_data('orders', $payment_data);
            if ($result) {
                $data['payment_data'] = $payment_data;
                $this->load->view('site/commons/header', $data);
                $this->load->view('site/payment_success');
                $this->load->view('site/commons/footer');
            } else {

                echo "hii";

            }

        } else {
            echo '<pre>';
//            var_dump($res_array);
            die();
        }
    }


    public function payment_success()
    {


        $this->load->view('site/commons/header');
        $this->load->view('site/payment_success');
        $this->load->view('site/commons/footer');


    }


}