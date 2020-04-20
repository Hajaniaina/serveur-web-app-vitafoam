<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
	{
		   parent::__construct();
	     $this->load->model('LoginModel','',TRUE);
       $this->load->helper('date');

	}

	public function index()
	{
    $data["erreur"] = "";
    $this->load->view('LoginView',$data);
	}

  public function add_membre(){
     $datamembre  = array('Nom'           =>$this->input->post("nom"),
                        'Prenom'        => $this->input->post("prenom"),
                        'identifiant'   => $this->input->post("identifiant"),
                        'motdepasse'    =>$this->input->post("mdp")
                        );
      $lastId = $this->LoginModel->add_member($datamembre);
      $isadd  = 0;
      if($lastId>0){
        $isadd = 1;
        echo "<script>
              alert('Un nouveau membre a été ajouté!');
            </script>";
      }else{
        echo "<script>
              alert('Le membre n'a pas été ajouté !!);
            </script>";
      }
     $message = "Un nouveau membre a été ajouté";
     $from="dev.m2realisation@gmail.com";
     $to="dev.m2realisation@gmail.com";
     $cc="francisco.mahatia@yahoo.com";
     $this->send_mail_notification($from,$to,$cc,$message);
      redirect('AccueilController/get_all_member/'.$isadd);

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

   function deconnexion(){
        $this->session->sess_destroy();
        redirect('LoginController');
    }

  public function get_connexion(){


    $data["erreur"] = "";
    $username = $this->input->post("username");
    $mdp = $this->input->post("password");

    $user = $this->LoginModel->get_user($username,$mdp);
    if(sizeof($user)>0){
         $this->save_sessaion($user);
         redirect('AccueilController');
         
    }else{
      $data["erreur"] = "Identifiant ou mot de passe incorecte!";
      $this->load->view('LoginView',$data);
    }
   
  }

  public function save_sessaion($user){
    foreach ($user as $u) {
           $data = array( 'id'          => $u->ID,
                          'nom'         =>  $u->Nom,
                          'prenom'      =>  $u->Prenom,
                          'identifiant' =>  $u->identifiant,
                          'mdp'         =>  $u->motdepasse
                          ); 
        }

        $this->session->set_userdata($data);
  }

}
