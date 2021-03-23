<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim|is_unique[tb_user_menu.urutan]', [
            'is_unique' => 'Posisi tidak boleh sama'
        ]);
        $this->form_validation->set_message('required', 'Kolom %s Tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Menu Management',
                'warna'     => $this->db->get('tb_warna')->row_array(),
                'user'      => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
                'dataMenu'  => $this->menu_model->get()->result_array()
            ];
            $this->template->load('template', 'menu/index', $data);
        } else {
            $this->menu_model->add();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan</div>');
            redirect('menu');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim|callback_urutan_cek');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Menu Management',
                'warna'     => $this->db->get('tb_warna')->row_array(),
                'user'      => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
                'dataMenu'  => $this->menu_model->get()->result_array()
            ];
            $this->template->load('template', 'menu/index', $data);
        } else {
            $this->menu_model->edit($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu berhasil di ubah</div>');
            redirect('menu');
        }
    }

    // proses edit urutan, jika urutan tidak berubah, karena jika tidak diberikan function ini maka proses edit data dengan urutan yang sama tidak berhasil
    function urutan_cek()
    {
        $id         = $this->input->post('id');
        $urutan     = $this->input->post('urutan');
        $query      = $this->db->query("SELECT * FROM tb_user_menu WHERE urutan = '$urutan' AND id != '$id'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('urutan_cek', '{field} ini sudah dipakai, silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function delete($id)
    {
        $this->menu_model->del($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Menu berhasil dihapus</div>');
        redirect('menu');
    }

    // SUBMENU
    public function submenu()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('id_menu', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_message('required', 'Kolom %s Tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'         => 'Submenu Management',
                'warna'         => $this->db->get('tb_warna')->row_array(),
                'user'          => $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array(),
                'dataMenu'      => $this->menu_model->get()->result_array(),
                'dataSubMenu'   => $this->menu_model->getSubMenu()->result_array()
            ];
            $this->template->load('template', 'menu/submenu', $data);
        } else {
            $this->menu_model->addSub();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">SubMenu baru berhasil ditambahkan</div>');
            redirect('menu/submenu');
        }
    }

    public function deleteSub($id_sub)
    {
        $this->menu_model->delSub($id_sub);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">SubMenu berhasil dihapus</div>');
        redirect('menu/submenu');
    }
}
