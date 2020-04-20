<?php   defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    

    function get_user($username,$mdp){
        $this->db->select("*");
        $this->db->from("membre");
        $this->db->where("identifiant", $username);
        $this->db->where("motdepasse", $mdp);
        $req=$this->db->get();
        return $req->result();
    }

    function get_All_user(){
        $this->db->select("*");
        $this->db->from("membre");
        $req=$this->db->get();
        return $req->result();
    }

    function delete_user($id){
        $this->db->delete('membre', array('ID' => $id));
    }

    function update_membre($id,$data){
        $this->db->where("ID", $id);
        $this->db->update("membre", $data);
    }
    function add_member($data){
        $this->db->insert('membre', $data);
        return $this->db->insert_id();
    }
    
}

?>
