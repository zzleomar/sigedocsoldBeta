<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

class FuncionesController extends Controller
{
    public function GenerarPassword()
    {
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);
        $pass = "";
        $longitudPass=10;
        for($i=1 ; $i<=$longitudPass ; $i++)
        {
            $pos=rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    public function GenerarPasswordUpdate()
    {
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);
        $pass = "";
        $longitudPass=10;
        for($i=1 ; $i<=$longitudPass ; $i++)
        {
            $pos=rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }  
    public function EnviarCorreo($name,$fullname,$email,$password,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.password',['name' =>$name ,'password' => $password,'fullname' => $fullname],
            function($message) use ($admin,$name,$password,$email)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('Usuario Registrado Correctamente '.$name . ' En nuestra Aplicacion SGD');
            }
            );
            return $email;
    }
    public function EnviarCambioClave($name,$fullname,$email,$password,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.cambioclave',['name' =>$name ,'password' => $password,'fullname' => $fullname],
            function($message) use ($admin,$name,$password,$email)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('Usuario '.$name . ' Realizo Cambio de Clave Correctamente  En nuestra Aplicacion SGD');
            }
            );
            return $email;
    }
    public function EnviarDocumento($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.circular',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('Se ha creado la Circular N° '.$Codigo);
            }
            );
            return $email;
    }
      public function EnviarOficio($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.oficio',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('Se ha creado el Oficio N° '.$Codigo);
            }
            );
            return $email;
    }
    public function OficioAprobado($name,$fullname,$Codigo,$email,$admin)
    {
        Mail::send('email.oficioaprobado',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('Se Aprobo el Oficio N° '.$Codigo);
            }
            );
            return $email;
    }
     public function Visto($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.visto',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('El Jefe de Departamento a Visto la Circular N° '.$Codigo);
            }
            );
            return $email;
    }
    public function OficioVisto($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.oficiovisto',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('El Jefe de Departamento a Visto la Circular N° '.$Codigo);
            }
            );
            return $email;
    }
       public function PorFirmar($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.porfirmar',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('El Jefe de Departamento Coloco la Circular N° '.$Codigo.' Por Firmar');
            }
            );
            return $email;
    }
    public function Firmado($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.firmado',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('El Jefe de Departamento Firmo la Circular N° '.$Codigo);
            }
            );
            return $email;
    }
    public function PorCorrecion($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.porcorrecion',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('El Jefe de Departamento Paso Por Correcion la Circular N° '.$Codigo);
            }
            );
            return $email;
    }
    public function Corregido($name,$fullname,$Codigo,$email,$admin) {
            //movemos el archivo a la carpeta final
            Mail::send('email.corregida',['name' =>$name ,'fullname' => $fullname,'Codigo'=>$Codigo],
            function($message) use ($admin,$name,$email,$Codigo)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('La Secretaria Corrigio la Circular N° '.$Codigo);
            }
            );
            return $email;
    }
    
     public function EnviarSolicitud($name,$fullname,$email,$admin,$id) {
            //movemos el archivo a la carpeta final
            Mail::send('email.solicitud',['name' =>$name ,'fullname' => $fullname,'id'=>$id],
            function($message) use ($admin,$name,$email,$id)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->subject('Se ha creado la Solicitud de Preparaduria N° '.$id);
            }
            );
            return $email;
    }
    public function  EnviarSolicitudJefeDpto($name,$fullname,$name_secre,$email,$admin,$dependencia)
    {
            //movemos el archivo a la carpeta final
            Mail::send('email.solicitudjefedpto',['name' =>$name ,'$name_secre' => $name_secre,'fullname' => $fullname,'dependencia'=>$dependencia],
            function($message) use ($admin,$name,$name_secre,$email,$dependencia)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->cc($name_secre,$name_secre)->subject('Se ha enviado Resultados del Concurso de Preparadores Docentes');
            }
            );
            return $email;
    }
    public function EnviarSolicitudJefeEscuela($name,$fullname,$name_secre,$email,$admin,$dependencia){
            //movemos el archivo a la carpeta final
            Mail::send('email.solicitudjefe',['name' =>$name ,'$name_secre' => $name_secre,'fullname' => $fullname,'dependencia'=>$dependencia],
            function($message) use ($admin,$name,$name_secre,$email,$dependencia)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->cc($name_secre,$name_secre)->subject('Se ha Remitido el Resultado del Concurso de Preparadores al Jefe de Escuela');
            }
            );
            return $email;
    }
    public function VistoSolicitud($name,$fullname/*,$name_secre*/,$email,$admin,$id) {
            //movemos el archivo a la carpeta final
            Mail::send('email.vistosolicitud',['name' =>$name /*,'$name_secre' => $name_secre*/,'fullname' => $fullname,'id'=>$id],
            function($message) use ($admin,$name/*,$name_secre*/,$email,$id)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)
                        /*->cc($name_secre,$name_secre)*/->subject('El Jefe de Departamento a Visto la Solicitud de Preparaduria N° '.$id);
            }
            );
            return $email;
    }
    public function Verificado($name,$fullname,$name_secre,$email,$admin,$id,$escuela) {
            //movemos el archivo a la carpeta final
            Mail::send('email.verificado',['name' =>$name ,'$name_secre' => $name_secre,'escuela'=>$escuela,'fullname' => $fullname,'id'=>$id],
            function($message) use ($admin,$name,$name_secre,$email,$id,$escuela)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->cc($name_secre,$name_secre)->subject('El Jefe de Departamento a Verificado la Solicitud de Preparaduria N° '.$id);
            }
            );
            return $email;
    }
    public function Aprobado($name,$fullname,$name_secre,$email,$admin,$id,$escuela) {
            //movemos el archivo a la carpeta final
            Mail::send('email.aprobado',['name' =>$name ,'$name_secre' => $name_secre,'escuela'=>$escuela,'fullname' => $fullname,'id'=>$id],
            function($message) use ($admin,$name,$name_secre,$email,$id,$escuela)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($name_secre,$name_secre)->cc($admin,$name)->subject('El Jefe de Escuela Aprobo la Solicitud de Preparaduria N° '.$id);
            }
            );
            return $email;
    }
    public function Rechazado($name,$fullname,$name_secre,$email,$admin,$id) {
            //movemos el archivo a la carpeta final
            Mail::send('email.rechazado',['name' =>$name ,'$name_secre' => $name_secre,'fullname' => $fullname,'id'=>$id],
            function($message) use ($admin,$name,$name_secre,$email,$id)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->cc($name_secre,$name_secre)->subject('El Jefe de Departamento a Rechazado la Solicitud de Preparaduria N° '.$id);
            }
            );
            return $email;
    }
    public function RechazadoPor($name,$fullname,$name_secre,$email,$admin,$id,$escuela) {
            //movemos el archivo a la carpeta final
            Mail::send('email.rechazadopor',['name' =>$name ,'$name_secre' => $name_secre,'fullname' => $fullname,'id'=>$id,'escuela'=>$escuela],
            function($message) use ($admin,$name,$name_secre,$email,$id,$escuela)
            {
                $message->from('admin@tensoft.com', 'App Sistema de Gestion de Documentos');
                $message->to($admin, $name)->cc($name_secre,$name_secre)->subject('El Jefe de Departamento a Rechazado la Solicitud de Preparaduria N° '.$id);
            }
            );
            return $email;
    }
}
