<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getDataKeluargaById($id)
    {
        return $this->db->get_where('data_keluarga', ['id' => $id])->row_array();
    }

    public function dataKeluargaEdit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');

        $data = [
            'name' => $this->input->post('name', true),
            'nik' => $this->input->post('nik', true),
            'kelamin' => $this->input->post('kelamin', true),
            'tempatlahir' => $this->input->post('tempatlahir', true),
            'tanggallahir' => $this->input->post('tanggallahir'), true,
            'alamat' => $this->input->post('alamat', true),
            'agama' => $this->input->post('agama', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'pekerjaan' => $this->input->post('pekerjaan', true),
            'status' => $this->input->post('status', true),
            'kewarganegaraan' => $this->input->post('kewarganegaraan', true),
        ];
        $this->db->set('name', 'nik', 'kelamin', 'tempatlahir', 'tanggallahir', 'alamat', 'agama', 'pendidikan', 'pekerjaan', 'status', 'kewarganegaraan', $data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_keluarga', $data);
    }

    public function getUser()
    {
        $query = "SELECT `data_keluarga`.*, `user`.`id`
                    FROM `data_keluarga` JOIN `user`
                    ON `data_keluarga`.`user_id` = `user`.`id` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKeluargaById()
    {
        $session_uid = $this->session->userdata['user_id'];
        return $this->db->get_where('data_keluarga', ['user_id' => $session_uid])->result_array();
    }
}
