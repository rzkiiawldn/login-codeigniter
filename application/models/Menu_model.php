<?php

class Menu_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_user_menu');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add()
    {
        $data = [
            'menu'          => htmlspecialchars($this->input->post('menu', TRUE)),
            'urutan'        => htmlspecialchars($this->input->post('urutan', TRUE))
        ];
        $this->db->insert("tb_user_menu", $data);
    }

    public function edit($id)
    {
        $data = [
            'menu'         => htmlspecialchars($this->input->post('menu', TRUE)),
            'urutan'       => htmlspecialchars($this->input->post('urutan', TRUE))
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tb_user_menu');
    }

    public function del($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user_menu');
    }

    // QUERY SUB MENU
    public function getSubMenu($id_sub = null)
    {
        if ($id_sub != null) {
            return $this->db->query("SELECT * FROM tb_user_sub_menu tusm JOIN tb_user_menu tum ON tusm.id_menu = tum.id WHERE id_sub = '$id_sub'");
        }
        return $this->db->query("SELECT * FROM tb_user_sub_menu tusm JOIN tb_user_menu tum ON tusm.id_menu = tum.id");
    }

    public function addSub()
    {
        $data = [
            'id_menu'        => htmlspecialchars($this->input->post('id_menu', TRUE)),
            'judul'          => htmlspecialchars($this->input->post('judul', TRUE)),
            'url'            => htmlspecialchars($this->input->post('url', TRUE)),
            'icon'           => htmlspecialchars($this->input->post('icon', TRUE)),
            'is_active'      => htmlspecialchars($this->input->post('is_active', TRUE))
        ];
        $this->db->insert("tb_user_sub_menu", $data);
    }

    public function editSub($id_sub)
    {
        $data = [
            'id_menu'        => htmlspecialchars($this->input->post('id_menu', TRUE)),
            'judul'          => htmlspecialchars($this->input->post('judul', TRUE)),
            'url'            => htmlspecialchars($this->input->post('url', TRUE)),
            'icon'           => htmlspecialchars($this->input->post('icon', TRUE)),
            'is_active'      => htmlspecialchars($this->input->post('urutan', TRUE))
        ];
        $this->db->set($data);
        $this->db->where('id_sub', $id_sub);
        $this->db->update('tb_user_sub_menu');
    }

    public function delSub($id_sub)
    {
        $this->db->where('id_sub', $id_sub);
        $this->db->delete('tb_user_sub_menu');
    }
}
