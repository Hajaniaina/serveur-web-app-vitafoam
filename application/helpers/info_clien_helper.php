<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function check_info_client(){
  $CI          = get_instance();
  $id = $CI->session->userdata('id');
  
  switch ($id) {
    case '':
      # code...
        redirect('LoginController');
      break;
    case ' ':
      # code...
        redirect('LoginController');
      break;
    default:
      # code...
      break;
  }
  
}

function getNomPrenom(){
   $CI          = get_instance();
  return $CI->session->userdata('nom') ." ".$CI->session->userdata('prenom') ." ";
}

function create_modal($id,$nom,$prenom,$ident,$mdp){
  $url=site_url("AccueilController/modif_member");;
  $modal = '<div class="modal" id="modif'.$id.'">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header" style="align-content: center !important;">
                      <h4 class="modal-title">Modifier</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="'.$url.'" method="POST" class="was-validated">
                      <div class="form-group">
                              
                              <input type="hidden" class="form-control" id="idmember"  name="idmember" required  value="'.$id.'">
                              
                            </div>
                            <div class="form-group">
                              <label for="nom">Nom:</label>
                              <input type="text" class="form-control" id="nom" placeholder="Enter username" name="nom" required  value="'.$nom.'">
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            <div class="form-group">
                              <label for="prenom">Prenom:</label>
                              <input type="text" class="form-control" id="prenom" placeholder="Enter username" name="prenom" required value="'.$prenom.'">
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            <div class="form-group">
                              <label for="identifiant">Identifiant:</label>
                              <input type="text" class="form-control" id="identifiant" placeholder="Enter username" name="identifiant" required value="'.$ident.'">
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            <div class="form-group">
                              <label for="mdp">Mot de passe:</label>
                              <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required value="'.$mdp.'">
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">MODIFIER</button>
                    </form>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">FERMER</button>
                    </div>
                    
                  </div>
                </div>
              </div>';

              return $modal;
}
?>