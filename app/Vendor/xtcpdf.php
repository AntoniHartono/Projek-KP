<?php
App::import('Vendor','tcpdf/tcpdf');
class XTCPDF extends TCPDF{
 var $xheadertext  = 'KARTU KELUARGA JEMAAT GKI GONDOKUSUMAN'; 
 var $xheadercolor = array(0,0,200); 
 var $xfootertext  = 'Copyright © %d FTI UKDW. All rights reserved.'; 
 var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
 var $xfooterfontsize = 8 ;
 function Header() 
    { 

        list($r, $b, $g) = $this->xheadercolor; 
        $this->setY(25); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top 
        $this->SetFillColor(177 , 218, 218); 
        $this->SetTextColor(0 , 0, 0); 
        $this->Cell(0,10, '', 0,1,'C', 1); 
        $this->Text(15,26,$this->xheadertext ); 
    } 

    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright Â© %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    function Footer() 
    { 
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20); 
        $this->SetTextColor(0, 0, 0); 
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize); 
        $this->Cell(0,8, $footertext,'T',1,'C'); 
    }
}
?>