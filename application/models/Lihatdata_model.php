<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lihatdata_model extends CI_Model
{
    public function getLihatData()
    {
        $query = "SELECT `data_keluarga`.*, `user`.`lihat`
                    FROM `data_keluarga` JOIN `user`
                    ON `data_keluarga`.`user_id` = `user`.`id` 
                ";
        return $this->db->query($query)->result_array();
    }
}
