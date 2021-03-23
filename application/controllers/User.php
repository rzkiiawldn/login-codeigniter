<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'title'     => 'My Profile',
            'warna'     => $this->db->get('tb_warna')->row_array(),
            'user'      => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->template->load('template', 'user/index', $data);
    }
}
