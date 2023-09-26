<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacantes extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    //Cargamos la librería email
    $this->load->library('email');
  }

  function index(){
    $datos['vista'] = 'vacantes';
    $this->load->view('header');
    $this->load->view('vacantes');
    $this->load->view('footer', $datos);
  }

  public function sendVacante(){

    //Indicamos el protocolo a utilizar
    $config['protocol'] = 'smtp';
    //El servidor de correo que utilizaremos
    $config["smtp_host"] = 'smtp.titan.email';
    //Nuestro usuario
    $config["smtp_user"] = 'portal@tramusacarrier.com.mx';
    //Nuestra contraseña
    $config["smtp_pass"] = ']q5]cHBSk%M-';
    //El puerto que utilizará el servidor smtp
    $config["smtp_port"] = '587';
    //El juego de caracteres a utilizar
    $config['charset'] = 'utf-8';
    //Permitimos que se puedan cortar palabras
    $config['wordwrap'] = TRUE;
    //El email debe ser valido
    $config['validate'] = true;
    //Permitir Etiquetas HTML
    $config['mailtype'] = 'html';
    //Establecemos esta configuración
    $this->email->initialize($config);

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('portal@tramusacarrier.com.mx', 'Portal TramusaCarrier');

    /*
    * Ponemos el o los destinatarios para los que va el email
    * en este caso al ser un formulario de contacto te lo enviarás a ti
    * mismo
    */
    $this->email->to('info@tramusacarrier.com.mx', 'Bolsa de trabajo');
    $this->email->cc('r.humanos@tramusacarrier.com.mx', 'Bolsa de trabajo');
    $this->email->bcc('noe_meza.s@hotmail.com');
    //Definimos el asunto del mensaje
    $this->email->subject('Solicitud de empleo');
    //Definimos el mensaje a enviar
    $msgText = "<p>Información enviada desde el sitio www.tramusacarrier.com.mx.</p>";
    $msgText .= "<b>Nombre:</b> ".$this->input->post("name")."<br>";
    $msgText .= "<b>Email:</b> ".$this->input->post("email")."<br>";
    $msgText .= "<b>Teléfono:</b> ".$this->input->post("phone")."<br>";
    $msgText .= "<b>Puesto:</b> ".$this->input->post("subject")."<br>";
    $msgText .= "<b>Mensaje:</b> ".$this->input->post("message")."<br>";

    $this->email->message($msgText);
    //Enviamos el email y si se produce bien o mal que avise con una flasdata
    if($this->email->send()){
        echo json_encode(array('success'=>'true'));
    }else{
        echo json_encode(array('error'=>'true'));
    }
  }

}
?>
