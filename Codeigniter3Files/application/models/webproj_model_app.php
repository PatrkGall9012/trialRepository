<?php

class webproj_model_app extends CI_Model {

    function insert_into_user($data){
        $this->db->insert("user_info",$data);
    }

    function checkPass($password, $username)
    {
        $query = $this->db->query("SELECT * FROM user_info WHERE sender_pass='$password' AND sender_user='$username'
        AND sender_status='1' ");
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else{
            return false;
        }
    }
}

?>