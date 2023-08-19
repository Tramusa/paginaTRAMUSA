<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestasc extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    //Cargamos la librería email
    $this->load->library('email');
  }

  function index(){
    $datos['vista'] = 'encuestasc';
    $this->load->view('header');
    $this->load->view('encuestasc');
    $this->load->view('footer', $datos);
  }

  public function sendEncuesta(){

    //Indicamos el protocolo a utilizar
    $config['protocol'] = 'smtp';
    //El servidor de correo que utilizaremos
    $config["smtp_host"] = 'smtp.titan.email';
    //Nuestro usuario
    $config["smtp_user"] = 'portal@tramusacarrier.com.mx';
    //Nuestra contraseña
    $config["smtp_pass"] = ']q5]cHBSk%M-';
    //El puerto que utilizará el servidor smtp
    $config["smtp_port"] = '465';
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
    //$this->email->to('calidad@tramusacarrier.com.mx', 'Quejas, sugerencias y/o felicitaciones');
    $this->email->to('calidad@tramusacarrier.com.mx', 'Encuesta Satisfacción del Cliente');
    //$this->email->bcc('noe_meza.s@hotmail.com');
    //Definimos el asunto del mensaje
    $this->email->subject('Quejas, sugerencias y/o felicitaciones');
    //Definimos el mensaje a enviar
    $msgText = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Arial Narrow">
      <tr>
        <td height="67" colspan="2" align="left" valign="top" style="border-bottom:2px solid #F26925"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="33%"><img src="http://tramusacarrier.com.mx/img/logo.jpg" width="197" height="57" /></td>
            <td width="67%" align="center"><strong style="color:#00355F">TRAMUSA CARRIER S.A. DE C.V. </strong><br />
              <span style="font-size:10px; font-family:Arial Narrow color:#EA292C">IDENTIFICACIÓN DE QUEJAS, SUGERENCIAS Y/O FELICITACIONES</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="300">&nbsp;</td>
        <td width="300">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><strong>'.$this->input->post("clasifica").'</strong></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Nombre</strong></td>
        <td><strong>Organización</strong></td>
      </tr>
      <tr>
        <td height="25">'.$this->input->post("name").'</td>
        <td>'.$this->input->post("company").'</td>
      </tr>
      <tr>
        <td><strong>Teléfono</strong></td>
        <td><strong>Email</strong></td>
      </tr>
      <tr>
        <td height="26">'.$this->input->post("phone").'</td>
        <td>'.$this->input->post("email").'</td>
      </tr>
      <tr>
        <td colspan="2"><strong>Descripción de la queja, sugerencia o felicitación</strong></td>
        </tr>
      <tr>
        <td height="58" colspan="2">'.$this->input->post("quejas").'</td>
        </tr>
      <tr>
        <td colspan="2"><strong>Medida que usted cree que se deba aplicar para su solución</strong></td>
        </tr>
      <tr>
        <td height="59" colspan="2">'.$this->input->post("solucion").'</td>
        </tr>
      <tr>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="36" colspan="2" align="center" valign="bottom" style="font-size:10px; border-top:2px solid #F26925;">Este email esta dirigido a Ing. Iván Arellano Martines (Coordinador de Calidad).<br />
          <strong style="color:rgb(0, 189, 42)">GRUPO SAEMI</strong> © 2021 TramusaCarrier - Todos los derechos reservados.</td>
        </tr>
      <tr>
        <td height="7" colspan="2" align="center"></td>
        </tr>
    </table>';

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
