<?php

class Auth_model extends CI_Model
{
    public function registrasi()
    {
        $data = [
            'nama'          => htmlspecialchars($this->input->post('nama', TRUE)),
            'email'         => htmlspecialchars($this->input->post('email', TRUE)),
            'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'foto'          => 'default.jpg',
            'id_level'      => 2,
            'date_created'  => time()
        ];
        $this->db->insert("tb_user", $data);
    }
}
