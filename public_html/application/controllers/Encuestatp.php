<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encuestatp extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    //Cargamos la librería email
    $this->load->library('email');
  }

  function index(){
    $datos['vista'] = 'encuestatp';
    $this->load->view('header');
    $this->load->view('encuestatp');
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
    $this->email->to('calidad@tramusacarrier.com.mx', 'Encuesta Satisfacción del Cliente');
    //$this->email->to('noe_meza.s@hotmail.com', 'Encuesta Satisfacción del Cliente');
    //$this->email->cc('noems@gruposaemi.com', 'Encuesta Satisfacción del Cliente');
    //$this->email->bcc('noe_meza.s@hotmail.com');
    //Definimos el asunto del mensaje
    $this->email->subject('Encuesta Satisfacción del Cliente');
    //Definimos el mensaje a enviar
    $msgText = '<table width="600" border="0" align="center" cellpadding="0" cellspacing="0"  style="font-family:Arial Narrow">
      <tr>
        <td height="67" colspan="2" align="left" valign="top" style="border-bottom:2px solid #F26925"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="33%"><img src="http://tramusacarrier.com.mx/img/logo.jpg" width="197" height="57" /></td>
            <td width="67%" align="center"><strong style="color:#00355F">TRAMUSA CARRIER S.A. DE C.V. </strong><br />
              <span style="font-size:10px; color:#EA292C">ENCUESTA DE SATISFACCIÓN DEL CLIENTE</span></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td width="300">&nbsp;</td>
        <td width="300">&nbsp;</td>
      </tr>
      <tr>
        <td><strong>PASSPORT</strong></td>
        <td><strong>NOMBRE</strong></td>
      </tr>
      <tr>
        <td height="25">'.$this->input->post("passport").'</td>
        <td>'.$this->input->post("name").'</td>
      </tr>
      <tr>
        <td height="18">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><strong>LOS OPERADORES DAN A CONOCER DE MANERA VERBAL LAS MEDIDAS DE SEGURIDAD DEL SERVICIO DE TRANSPORTE EN FORMA CLARA A LOS PASAJEROS</strong></td>
        </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta1").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas1").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE LOS OPERADORES DE LAS UNIDADES DE TRANSPORTE REALIZAN LA CONDUCCIÓN DE FORMA COORDINADA Y SEGURA, EVITANDO REALIZAR ACTOS INSEGUROS</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta2").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas2").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE LA VELOCIDAD DE CONDUCCIÓN DEL OPERADOR ES SEGURA</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta3").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas3").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO DE MANERA GENERAL QUE MI TRASLADO A DESTINO ES SEGURO</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta4").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas4").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE LA LIMPIEZA DE LA UNIDAD DE TRANSPORTE ES LA ADECUADA</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta5").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas5").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE LOS CONTROLES COVID, SON LOS ADECUADOS</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta6").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas6").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE EL SANITARIO DE LA UNIDAD DE TRANSPORTE ES LIMPIO Y CONFIABLE PARA MI USO</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta7").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas7").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE EL SANITARIO CUENTA CON LOS INSUMOS NECESARIOS PARA MI USO, AGUA, JABÓN Y PAPEL</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta8").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas8").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE EL MALETERO ES SUFICIENTE Y LIMPIO PARA EL RESGUARDO DE MÍ EQUIPAJE</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta9").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas9").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE EL SERVICIO DE INTERNET ES SUFICIENTE PARA CUMPLIR MIS TAREAS Y TRABAJOS DE OFICINA</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta10").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas10").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE LA CARTELERA DE PELÍCULAS, LA CALIDAD DE AUDIO Y VIDEO SON SUFICIENTES PARA MÍ ENTRETENIMIENTO DURANTE MI TRASLADO</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta11").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas11").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE EL FUNCIONAMIENTO DEL AIRE ACONDICIONADO Y TEMPERATURA DE LA UNIDAD DE TRANSPORTE ES ADECUADO</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta12").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas12").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE EL COMPORTAMIENTO Y LA ACTITUD DEL OPERADOR ES CORTES HACIA LOS PASAJEROS</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta13").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas13").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>CONSIDERO QUE LA COMODIDAD DE LOS ASIENTOS ES SUFICIENTE PARA EL DESCANSO DE MÍ TRASLADO</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta14").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas14").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>EL OPERADOR ATIENDE LAS OBSERVACIONES REALIZADAS POR LOS PASAJEROS</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta15").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas15").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="18" colspan="2"><strong>QUÉ SUGERENCIAS NOS RECOMENDARÍA PARA MEJORAR EL SERVICIO</strong></td>
      </tr>
      <tr>
        <td height="18" colspan="2">'.$this->input->post("s_respuesta16").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">OBSERVACIONES: '.$this->input->post("notas16").'</td>
      </tr>
      <tr>
        <td height="18" colspan="2">&nbsp;</td>
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
