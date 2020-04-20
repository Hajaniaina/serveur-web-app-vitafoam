<?php   defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    

    function getAllShowRomm(){
    	$this->db->select("*");
        $this->db->from("showroom");
        $req=$this->db->get();
        return $req->result();
    }
     function getOneShowRomm($idiceSromm){
    	$this->db->select("*");
        $this->db->from("showroom");
        $this->db->where("indiceSroom", $idiceSromm);
        $req=$this->db->get();
        return $req->result();
    }
    function getVoteOneShowRoom($idiceSromm){
        $this->db->select("*");
        $this->db->from("vote");
        $this->db->where("indiceShowRomm", $idiceSromm);
        $req=$this->db->get();
        return $req->result();
    }
    function insert_vote($data)
    {
        $this->db->insert('vote', $data);
        return $this->db->insert_id();
    }

    function deleteVote($id){
    	$this->db->delete('vote', array('ID' => $id));
    }

    function deconexion(){
    	
    }
    
}

?>
