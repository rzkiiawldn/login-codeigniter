<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'warna'     => $this->db->get('tb_warna')->row_array(),
            'user'      => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->template->load('template', 'admin/index', $data);
    }

    public function edit($id)
    {
        $warna = $this->input->post('warna');
        $this->db->set('warna', $warna);
        $this->db->where('id', $id);
        $this->db->update('tb_warna');
        redirect('admin');
    }

    public function role()
    {
        $data = [
            'title'     => 'Role',
            'warna'     => $this->db->get('tb_warna')->row_array(),
            'dataRole'  => $this->db->get('tb_level')->result_array(),
            'user'      => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->template->load('template', 'admin/role', $data);
    }

    public function roleAkses($id_level)
    {
        $data = [
            'title'     => 'Role Akses',
            'warna'     => $this->db->get('tb_warna')->row_array(),
            // query data menu, kecualikan data admin
            'dataMenu'  => $this->db->get_where('tb_user_menu', ['id !=' => 1])->result_array(),
            'dataRole'  => $this->db->get_where('tb_level', ['id_level' => $id_level])->row_array(),
            'user'      => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->template->load('template', 'admin/roleAkses', $data);
    }

    public function ubahAkses()
    {
        $id_menu    = $this->input->post('menuId');
        $id_level   = $this->input->post('levelId');

        $data = [
            'id_level'  => $id_level,
            'id_menu'   => $id_menu
        ];

        $result = $this->db->get_where('tb_user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tb_user_access_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hak akses berhasil ditambah</div>');
        } else {
            $this->db->delete('tb_user_access_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hak akses berhasil dihapus</div>');
        }
    }
}
