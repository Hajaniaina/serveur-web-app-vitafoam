<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	     $this->load->model('AccueilModel','',TRUE);
       $this->load->helper('date');

	}

	public function index()
	{
        $AllShowRoom = $this->AccueilModel->getAllShowRomm();
        $jsonSromm = "[";
        $nmbreVote = "[";
        $i=0;
        foreach ($AllShowRoom as $sr) {
          # code...
          $voteShowRoom = $all_Show_Room =  $this->AccueilModel->getVoteOneShowRoom($sr->indiceSroom);
          $nmbreVote.=sizeof($voteShowRoom);

          $jsonSromm.='"'.$sr->Nom.'"';
          if($i<sizeof($AllShowRoom)-1){
            $jsonSromm.=",";
            $nmbreVote.=",";
          }
          $i++;
          
        }

        $jsonSromm.= "]";
        $nmbreVote .= "]";
        $data ["jsonSroom"] = $jsonSromm;
        $data["nombreVote"] = $nmbreVote;
        $data['title'] = "Statistiques des votes";
        $this->load->view('singlepage/graphePage',$data);
	}

  

}
