<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Objet extends CI_Controller{
      public function objets(){
        $this->load->view('Admin/InsertObject');
      }
    
      public function add(){
        print_r($_POST);
        print_r($_FILES);
        if($_FILES){
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file')  )
            {
                    $error = array('error' => $this->upload->display_errors());
                    die("Error");
            } else
            {
                $data = array('upload_data' => $this->upload->data());
                $photo=$data['upload_data']['file_name'];
              
                $this->load->model('Insert');
                $query=$this->Insert->addPhoto(2,$photo);
                if($query){
                    $this->session->set_flashdata('inserted','yes');
                  redirect('Objet/add');
                }else{
                    redirect('Objet/add');
                }
            }           
        }else{  
      }
    }
  }
?>