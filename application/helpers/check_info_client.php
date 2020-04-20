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
?>