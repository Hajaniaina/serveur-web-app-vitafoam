<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccueilController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	     $this->load->model('AccueilModel','',TRUE);
       $this->load->model('LoginModel','',TRUE);
       $this->load->helper('date');

	}

	public function index()
	{
    $all_Show_Room =  $this->AccueilModel->getAllShowRomm();
    $nbr = sizeof($all_Show_Room);
    $template = array(
          'table_open' => '<table id="tablesorte" class="table table-striped" style="width:100%" border="0" cellpadding="4" cellspacing="0">',
          'thead_open' => '<thead >',
          'thead_close' => '</thead>',
          'tbody_open'            => '<tbody>',
          'tbody_close'           => '</tbody>',
          'table_close' => '</table>'
      );
        
        $this->table->set_template($template);
        $this->table->set_heading('Showroom','Nombre de vote','Actions');
        foreach ($all_Show_Room as $sroom) {
         
          $voteShowRoom = $all_Show_Room =  $this->AccueilModel->getVoteOneShowRoom($sroom->indiceSroom);


          $lien_voir = "-- // --";
          if( sizeof($voteShowRoom) > 0){
             $lien_voir = anchor('AccueilController/on_showroom_vote/'.$sroom->indiceSroom, 'Voir', array('class' => 'delete',"desable"=> "true"));
           }
          $this->table->add_row(
              $sroom->Nom,
              sizeof($voteShowRoom),
              $lien_voir
            );
      }
        $data['data_page'] = $this->table->generate();
        $data['nbr']=$nbr;
        $data['title'] = "Liste des votes";
    		$this->load->view('singlepage/singlepage',$data);
	}

  public function on_showroom_vote(){
    $indecesroom = $this->uri->segment(3);
    $one_Show_Room_vote = $this->AccueilModel->getVoteOneShowRoom($indecesroom);
    $nbr = sizeof($one_Show_Room_vote);
    $showrommName = "";
    $template = array(
          'table_open' => '<table id="tablesorte" class="table table-striped" style="width:100%" border="0" cellpadding="7" cellspacing="0">',
          'thead_open' => '<thead >',
          'thead_close' => '</thead>',
          'tbody_open'            => '<tbody>',
          'tbody_close'           => '</tbody>',
          'table_close' => '</table>'
      );
        
        $this->table->set_template($template);
        $this->table->set_heading('ID','Vote','Date','Actions');
        $ID_vote = 1;
        foreach ($one_Show_Room_vote as $vote) {
        $deleteMessage = "Voulez-vous vraiment supprimer ce vote?";
        $lien_suppr = anchor('AccueilController/supprimer_vote/'. $vote->ID."/".$indecesroom, 'Supprimer', array('class' => 'delete','onclick'=>"return confirm('" . $deleteMessage . "')"));

        $showrommName = $this->AccueilModel->getOneShowRomm($vote->indiceShowRomm)[0]->Nom;
           
          $this->table->add_row(
            $ID_vote,
            $vote->vote,
            $vote->dateDeVote,
            $vote->numeroPhone,
            $lien_suppr
          );

          $ID_vote++;
      }
        $data['data_page'] = $this->table->generate();
        $data['nbr']=$nbr;
        $data['title'] = "ShowRoom " .$showrommName;
        $this->load->view('singlepage/singlepage',$data);
  }

  public function add_vote(){
    $heure = date("H");
    $minute = date("i");
    $seconde = date("s");
    $heure_register=($heure+1).":".$minute.":".$seconde;
    $date_sent_register=date("Y-m-d");
    $datenow = $date_sent_register ." ".$heure_register;

     $datavote  = array('dateDeVote'           => $datenow,
                        'indiceShowRomm'       => $this->uri->segment(3),
                        'indiceVote'           => $this->uri->segment(4),
                        'vote'                 => $this->uri->segment(5),
                        'numeroPhone'          => "0345048260",
                        'IMEI'                 => "0123456789"
                       );   
    $lastId = $this->AccueilModel->insert_vote($datavote);

    $showrommName = $this->AccueilModel->getOneShowRomm($this->uri->segment(3))[0]->Nom;

    if($lastId !=0){
     $message = "Un nouveau vote arrive dans la base de Vitafoam Madagascar pour Showroom ". $showrommName ."! Cliquez sur nom de domaine pour voir";
     $from="dev.m2realisation@gmail.com";
     $to="dev.m2realisation@gmail.com";
     $cc="francisco.mahatia@yahoo.com";
     $this->send_mail_notification($from,$to,$cc,$message);
    }

    echo $lastId;
  }

  public function supprimer_vote(){
      $idvote = $this->uri->segment(3);
      $indiceSroom = $this->uri->segment(4);
      $this->AccueilModel->deleteVote($idvote);
      redirect("AccueilController/on_showroom_vote/".$indiceSroom);
  }

  //fonction pour une notification par mail
      function send_mail_notification($from,$to,$cc,$message) { 
         $from_email = $from; 
         $to_email =$to; 

         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Notification Vitafoam Madagascar'); 

         $this->email->to($to_email);
         $this->email->cc($cc);
         $this->email->subject('Notification : Espace admin Vitafoam Madagascar'); 
         $this->email->message($message); 
   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else {
          $this->session->set_flashdata("email_sent","Error in sending Email."); 
         }
         
        // $this->email->print_debugger();
      } 


      function get_all_member(){
           $isAdd = $this->uri->segment(3);
           $message = "";
           switch ($isAdd) {
             case '1':
               $message = "Un nouveau membre a été ajouté!";
               break;
             case '0':
               # code...
               $message = "Le membre n'a pas été ajouté !!";
               break;
             
             default:
               # code...
               break;
           }
           $all_member = $this->LoginModel->get_All_user();
            $nbr = sizeof($all_member);
            $modalModif = "";
            $template = array(
                  'table_open' => '<table id="tablesorte" class="table table-striped" style="width:100%" border="0" cellpadding="7" cellspacing="0">',
                  'thead_open' => '<thead >',
                  'thead_close' => '</thead>',
                  'tbody_open'            => '<tbody>',
                  'tbody_close'           => '</tbody>',
                  'table_close' => '</table>'
              );
                
                $this->table->set_template($template);
                $this->table->set_heading('Nom','Prénom','Identifiant','Mot de passe','Actions');
                $ID_vote = 1;
                foreach ($all_member as $u) {
                $deleteMessage = "Voulez-vous vraiment supprimer ".$u->Nom ." ". $u->Prenom." ?";
                $lien_suppr ="";
                $sep="";
                if($u->ID != $this->session->userdata('id')){
                  $lien_suppr = anchor('AccueilController/supprimer_membre/'. $u->ID, 'Supprimer', array('class' => 'delete','onclick'=>"return confirm('" . $deleteMessage . "')"));
                  $sep = "/";
                }
                
                $lien_modif = anchor('#'. $u->ID, 'Modifier', array('class' => 'modifier',"data-toggle"=>"modal", "data-target"=>"#modif".$u->ID));

                $modalModif.=create_modal( $u->ID, $u->Nom, $u->Prenom, $u->identifiant,$u->motdepasse);

                  $this->table->add_row(
                    $u->Nom,
                    $u->Prenom,
                    $u->identifiant,
                    "*****",
                    $lien_modif." ". $sep." " .$lien_suppr
                  );

                  $ID_vote++;
              }
                $lienAddMember =  anchor('#'. $u->ID, 'AJOUTER', array('class' => 'modifier','style'=>'color:white;background:rgb(61, 89, 117);padding:0 5px 0 5px;',"data-toggle"=>"modal", "data-target"=>"#addMember"));
                $data['data_page'] = $this->table->generate().$modalModif;
                $data['nbr']=$nbr;
                $data["message"] = $message;
                $data['title'] = "Liste des membres ".$lienAddMember;
                $this->load->view('singlepage/singlepage',$data);
      }

      function  supprimer_membre(){
        $id = $this->uri->segment(3);
        $this->LoginModel->delete_user($id);
         redirect("AccueilController/get_all_member");
      }

      function modif_member(){
          $id = $this->input->post("idmember");
          $nom = $this->input->post("nom");
          $prenom = $this->input->post("prenom");
          $identifiant = $this->input->post("identifiant");
          $mdp = $this->input->post("mdp");
          $datamembre  = array( 'Nom'           =>$nom,
                                'Prenom'        => $prenom,
                                'identifiant'   => $identifiant,
                                'motdepasse'    =>$mdp
                                );
          $this->LoginModel->update_membre($id,$datamembre);
          redirect("AccueilController/get_all_member");

      }
}
