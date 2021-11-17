<?php

class main_model extends CI_Model {

    public function insert_into_user(){

        $data = array("sender_user"=>"patrick", "sender_pass"=>"testing");
        $this->db->insert("sender_info",$data);
    }
}

?>