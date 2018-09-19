<?php
require_once (dirname(__FILE__).'/MPDF60/mpdf.php');

/**
 * Handles the saving generated PDF to user-defined output file on server
 */

/**
 * Runs the HTML->PDF conversion with default settings
 *
 * Warning: if you have any files (like CSS stylesheets and/or images referenced by this file,
 * use absolute links (like http://my.host/image.gif).
 *
 * @param $path_to_html String HTML code to be converted
 * @param $path_to_pdf  String path to  file to save generated PDF to.
 * @param $base_path    String base path to use when resolving relative links in HTML code.
 */

class prueba extends mPDF{
    
    public function prueba($mode='',$format='A4',$default_font_size='',$default_font='',$mgl=10,$mgr=10,$mgt=28,$mgb=25,$mgh=5,$mgf=0){
        parent::__construct($mode,$format,$default_font_size,$default_font,$mgl,$mgr,$mgt,$mgb,$mgh,$mgf, $orientation);     
        //parent::__construct('',$format,'','',10,10,28,25, 5, 0); 
    }
    
    function mergePDFFiles(Array $filenames, $outFile='')
{
    if ($filenames) {

        $filesTotal = sizeof($filenames);
        $fileNumber = 1;

        $this->SetImportUse();
        $this->SetHeader('');
        
        
        foreach ($filenames as $fileName) {
            if (file_exists($fileName)) {
                $pagesInFile = $this->SetSourceFile($fileName);
                for ($i = 1; $i <= $pagesInFile; $i++) {
                    //$this->AddPage();
                    $tplId = $this->importPage($i);
                    $s = $this->getTemplatesize($tplId);
                    if ($i== 1){
                        $this->WriteHTML('<pagebreak sheet-size="'.$s['w'].'mm '. $s['h'] . 'mm"/>');                        
                    }
                    $this->UseTemplate($tplId);
                    if (($i != $pagesInFile)) {
                        $this->WriteHTML('<pagebreak  />');                        
                        
                    }
                }
            }
            $fileNumber++;
        }
    }

}
    
}

class GenerarPDFReportes{

    function pdf_create($html, $filename, $baja=false, $sizepage=1, $piepagina=true, $orientacion=0, $textopiepagina = 'Página ',$textoemision='Fecha Emisión ') {
        //usando MFPDF

        $path_to_pdf="adjuntos/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                break;
            case 2:
                $formato = array(216,139.5);
                break;
            }

        //$mpdf=new mPDF('','Letter','','',5,5,5,15);
        $mpdf=new mPDF('',$formato,'','',5,5,5,15);
        //$mpdf->pagenumPrefix = 'Fecha de Emisi�n'.date('d/m/Y').' P�gina ';
		$mpdf->pagenumPrefix = ($textoemision.date('d/m/Y').' - '.$textopiepagina);
        $mpdf->pagenumSuffix = '';
        $mpdf->nbpgPrefix = ' de ';

        if ($piepagina) {
             $mpdf->SetFooter('{PAGENO}{nbpg}');
        }
        

        //$mpdf->Bookmark('Start of the document');
        $mpdf->WriteHTML($html);

        if($baja){
            $mpdf->Output($filename.".pdf",'D');
        }else{
            $mpdf->Output($path_to_pdf,'F');
        }

    }

    function pdf_create_separador($html, $filename, $baja=false, $sizepage=1, $piepagina=true, $orientacion=0, $textopiepagina = 'Página ',$textoemision='Fecha Emisión ') {
        //usando MFPDF
        
        $path_to_pdf="adjuntos/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                break;
            case 2:
                $formato = array(216,139.5);
                break;
            }

        $mpdf=new mPDF('',$formato,'','',10,10,10,15);
        //$mpdf=new mPDF('',array(216,139.5),'','',5,5,5,15);
        //$mpdf->pagenumPrefix = 'Fecha de Emisi�n'.date('d/m/Y').' P�gina ';
		$mpdf->pagenumPrefix = ($textoemision.date('d/m/Y').' - '.$textopiepagina);
        $mpdf->pagenumSuffix = '';
        $mpdf->nbpgPrefix = ' de ';
        //$mpdf->SetHeader("pruebaaa");
        if ($piepagina) {
             $mpdf->SetFooter('{PAGENO}{nbpg}');
        }

        //$mpdf->Bookmark('Start of the document');
        $tam = count($html);
        $i = 0;        
        foreach ($html as $cont) {            
            $mpdf->WriteHTML($cont);
            if ($i!=(count($html) - 1)) 
            {
                $mpdf->AddPage();
            }
            $i++;
        }        


        if($baja){
            $mpdf->Output($filename.".pdf",'D');
        }else{
            $mpdf->Output($path_to_pdf,'F');
        }
        
        /*
        $path_to_pdf="adjuntos/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                break;
            case 2:
                $formato = array(216,139.5);
                break;
            }

        $mpdf=new mPDF('',$formato,'','',10,10,40,25, 10, 8);        
        if ($piepagina) {
             
        }
        $mpdf->SetHTMLHeaderByName('MyHeader1');

        
        $tam = count($html);
        $i = 0;
        
        foreach ($html as $cont) {        
            $mpdf->WriteHTML($cont);
            if ($i!=(count($html) - 1)) 
            {
                $mpdf->AddPage();
            }
            $i++;
        }


        if($baja){
            $mpdf->Output($filename.".pdf",'D');
        }else{
            $mpdf->Output($path_to_pdf,'F');
        }*/
    }
    
    function pdf_create_informe_alerta($html, $filename, $baja=false, $sizepage=1, $piepagina=true, $orientacion=0, $textopiepagina = 'Página ',$textoemision='Fecha Emisión ') {
        //usando MFPDF

        $path_to_pdf="adjuntos/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                break;
            case 2:
                $formato = array(216,139.5);
                break;
            }

        $mpdf=new mPDF('',$formato,'','',20,20,20,25);
        //$mpdf=new mPDF('',array(216,139.5),'','',5,5,5,15);
        //$mpdf->pagenumPrefix = 'Fecha de Emisi�n'.date('d/m/Y').' P�gina ';
		$mpdf->pagenumPrefix = ($textoemision.date('d/m/Y').' - '.$textopiepagina);
        $mpdf->pagenumSuffix = '';
        $mpdf->nbpgPrefix = ' de ';
        //$mpdf->SetHeader("pruebaaa");
//        if ($piepagina) {
//             $mpdf->SetFooter('{PAGENO}{nbpg}');
//        }

        //$mpdf->Bookmark('Start of the document');
        $tam = count($html);
        $i = 0;        
        foreach ($html as $cont) {            
            $mpdf->WriteHTML($cont);
            if ($i!=(count($html) - 1)) 
            {
                $mpdf->AddPage();
            }
            $i++;
        }        


        if($baja){
            $mpdf->Output($filename.".pdf",'D');
        }else{
            $mpdf->Output($path_to_pdf,'F');
        }

    }
    
    function pdf_create_informe_alerta_new($html, $filename, $baja=false, $sizepage=1, $piepagina=true, $orientacion=0, $textopiepagina = 'Página ',$textoemision='Fecha Emisión ') {
        //usando MFPDF

        $path_to_pdf="adjuntos/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                
                $mpdf=new mPDF('',$formato,'','',20,20,20,25);
                break;
            case 2:
               
                $formato = "Letter-L";
                $mpdf=new mPDF('',$formato,'','',0,0,0,1);
                break;
            }

        
        //$mpdf=new mPDF('',array(216,139.5),'','',5,5,5,15);
        //$mpdf->pagenumPrefix = 'Fecha de Emisi�n'.date('d/m/Y').' P�gina ';
		$mpdf->pagenumPrefix = ($textoemision.date('d/m/Y').' - '.$textopiepagina);
        $mpdf->pagenumSuffix = '';
        $mpdf->nbpgPrefix = ' de ';
        //$mpdf->SetHeader("pruebaaa");
//        if ($piepagina) {
//             $mpdf->SetFooter('{PAGENO}{nbpg}');
//        }

        //$mpdf->Bookmark('Start of the document');
        $tam = count($html);
        $i = 0;        
        foreach ($html as $cont) {            
            $mpdf->WriteHTML($cont);
            if ($i!=(count($html) - 1)) 
            {
                $mpdf->AddPage();
            }
            $i++;
        }        


        if($baja){
            $mpdf->Output($filename.".pdf",'D');
        }else{
            $mpdf->Output($path_to_pdf,'F');
        }

    }
    
    function pdf_create_reporte($html, $filename, $baja=false, $sizepage=1, $piepagina=true, $orientacion=0,$ruta,$merge=array()) {
        //usando MFPDF
                

        if (!file_exists("downloads/tmp_doc/".$ruta."/")) {
	    	mkdir("downloads/tmp_doc/".$ruta."/", 0777);
			chmod("downloads/tmp_doc/".$ruta."/", 0777);
		}
        $path_to_pdf="downloads/tmp_doc/".$ruta."/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                break;
            case 3:
                if($orientacion==1){
                    $formato = "Legal-L";
                }else{
                    $formato = "Legal";
                }
                break;
            case 2:
                $formato = array(216,139.5);
                break;
            }

        //$mpdf=new mPDF('',$formato,'','',10,10,33,25, 5, 0); 
        $mpdf=new prueba('',$formato); 
        $mpdf->mirrorMargins = 1;
        $stylesheet = file_get_contents('dist/css/styles_pdf.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        if ($piepagina) {
             
        }
        

        
        $tam = count($html);
        $i = 0;        
        foreach ($html as $cont) {        
            //$mpdf->WriteHTML($cont,2+$i);
            $mpdf->WriteHTML($cont);
            if ($i!=(count($html) - 1)) 
            {
                $mpdf->AddPage();
            }
            $i++;
        }
        $mpdf->SetHTMLHeader('MyHeader1');
        //$mpdf->SetHeader('');
        //$mpdf->SetFooter('');
        if (count($merge)>0){
            $mpdf->mergePDFFiles($merge);
        }

//echo $baja.22222;exit();
        if($baja === TRUE){
            //$mpdf->Output($filename.".pdf",'I');
             $mpdf->Output($path_to_pdf,'F');
             return  $path_to_pdf;

        }else  {
            $mpdf->Output($filename.".pdf",'I');
            //$mpdf->Output($path_to_pdf,'F');
            $mpdf->debug = true;
            //return $path_to_pdf;
            //Header("Location: " .APPLICATION_ROOT . $path_to_pdf);
        }        
    }
    
    function  marcaAgua($marca_agua, $filename,$merge=array(), $baja=false, $ruta){
        if (!file_exists("downloads/tmp_doc/".$ruta."/")) {
	    	mkdir("downloads/tmp_doc/".$ruta."/", 0777);
			chmod("downloads/tmp_doc/".$ruta."/", 0777);
		}
        $path_to_pdf="downloads/tmp_doc/".$ruta."/".$filename.".pdf";
                    
        $mpdf_aux = new mPDF('', 'Letter','','',10,10,33,25, 5, 0);
        $mpdf_aux->SetImportUse(); 
        $pagesInFile = $mpdf_aux->SetSourceFile($merge);
        $tplId = $mpdf_aux->importPage(1);
        $s = $mpdf_aux->getTemplatesize($tplId);
        //print_r($s);exit;
        
        $formato = array($s['w']*1,$s['h']*1);
        //$formato = array(216,279.4);
        $mpdf=new mPDF('utf-8', $formato);
        
        $mpdf->useOnlyCoreFonts = true;    // false is default
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle($filename);
        //$mpdf->SetAuthor("Sanros Trading Co.");
        $mpdf->SetWatermarkText($marca_agua);
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

       // $mpdf=new mPDF(); 
        
        $mpdf->SetImportUse(); 


        $pagesInFile = $mpdf->SetSourceFile($merge);
        for ($i = 1; $i <= $pagesInFile; $i++) {
            //$this->AddPage();
            $tplId = $mpdf->importPage($i);
            $s = $mpdf->getTemplatesize($tplId);
            if ($i== 1){
                //$mpdf->WriteHTML('<pagebreak sheet-size="'.$s['w'].'mm '. $s['h'] . 'mm"/>');
                $mpdf->SetFooter('');
            }
            $mpdf->UseTemplate($tplId);
            if (($i != $pagesInFile)) {
                $mpdf->WriteHTML('<pagebreak />');
                //$this->WriteHTML('<pagebreak sheet-size="'.$s['w'].'mm '. $s['h'] . 'mm"/>');

            }
        }


        if($baja === TRUE){
            //$mpdf->Output($filename.".pdf",'I');
             $mpdf->Output($path_to_pdf,'F');
             return  $path_to_pdf;

        }else  {
            $mpdf->Output($filename.".pdf",'I');
            //$mpdf->Output($path_to_pdf,'F');
            $mpdf->debug = true;
            //return $path_to_pdf;
            //Header("Location: " .APPLICATION_ROOT . $path_to_pdf);
        }        
    }
            
    function pdf_create_portada_formato1($html, $filename, $baja=false, $css_formato,$ruta,$merge=array()) {
        //usando MFPDF
                
        
        if (!file_exists("downloads/tmp_doc/".$ruta."/")) {
	    	mkdir("downloads/tmp_doc/".$ruta."/", 0777);
			chmod("downloads/tmp_doc/".$ruta."/", 0777);
		}
        $path_to_pdf="downloads/tmp_doc/".$ruta."/".$filename.".pdf";
        $formato = "";

        switch ($sizepage) {
            case 1:
                if($orientacion==1){
                    $formato = "Letter-L";
                }else{
                    $formato = "Letter";
                }
                break;
            case 3:
                if($orientacion==1){
                    $formato = "Legal-L";
                }else{
                    $formato = "Legal";
                }
                break;
            case 2:
                $formato = array(216,139.5);
                break;
            }

        //$mpdf=new mPDF('',$formato,'','',0,0,30,25, 0, 0);  
        $mpdf=new prueba('',$formato,'','',0,0,30,25, 0, 0); 
        //C:\xampp70\htdocs\mosaikusapps\mosaikus
        //<img class="img-responsive" src="{HOME}/diseno/images/logo_empresa/11_logo_empresa_documento.png">
        
        
        $stylesheet = file_get_contents('dist/css/pdf_copia_controlada_base.css'); // external css
        $mpdf->WriteHTML($stylesheet,1);
        $stylesheet = file_get_contents('dist/css/'.$css_formato); // external css
        $mpdf->WriteHTML($stylesheet,1);
        if ($piepagina) {
             
        }
        //$mpdf->SetHTMLHeaderByName('MyHeader1');
        
        
        $tam = count($html);
        $i = 0;
        
        foreach ($html as $cont) {        
            $mpdf->WriteHTML($cont,2+$i);
            if ($i!=(count($html) - 1)) 
            {
                $mpdf->AddPage();
            }
            $i++;
        }

        $mpdf->SetHTMLFooter('', 'E');
        
        
        if (count($merge)>0){
            $mpdf->mergePDFFiles($merge);
        }

        if($baja){
            $mpdf->Output($filename.".pdf",'I');
        }else{
            $mpdf->Output($path_to_pdf,'F');
            $mpdf->debug = true;
            return $path_to_pdf;
            //Header("Location: " .APPLICATION_ROOT . $path_to_pdf);
        }
    }
}

?>