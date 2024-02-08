<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getStatusBy()
    {
        $query = "SELECT * FROM `data_keluarga` 
                  WHERE `status` = 'Kepala Keluarga' ";
        return $this->db->query($query)->result_array();
    }

    public function getDataWarga($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('nik', $keyword);
            $this->db->or_like('status', $keyword);
        }
        return $this->db->get('data_keluarga', $limit, $start)->result_array();
    }

    public function countAllDataWarga()
    {
        return $this->db->get('data_keluarga')->num_rows();
    }

    public function getRole()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                    FROM `user` INNER JOIN `user_role`
                    ON `user`.`role_id` = `user_role`.`id` 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getAccount($limit, $start, $keywordaccount = null)
    {
        $this->db->select("*");
        $this->db->from("user");
        if ($keywordaccount) {
            $this->db->like('name', $keywordaccount);
            $this->db->or_like('email', $keywordaccount);
        }
        $this->db->join("user_role", "user_role.id = user.role_id");
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function countAllAccount()
    {
        return $this->db->get('user')->num_rows();
    }
}
