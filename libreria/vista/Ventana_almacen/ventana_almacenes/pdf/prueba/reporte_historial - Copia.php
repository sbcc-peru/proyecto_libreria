<?php

require('fpdf/fpdf.php');
require('conexion.php');
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(180);
    // Título
   // $this->Cell(50,10,'R.U.C. Nº 20100488699',1,0,'C');
	$this->Cell(50,10, iconv('UTF-8', 'ISO-8859-2', 'R.U.C. N° 20100488699'),1);
	
	
	$this->Ln();
	$this->Cell(180);
	$this->Cell(50,10,'GUIA DE REMISION',1,0,'C');
	//$this->Image('logo.jpg' , 80 ,22, 35 , 38,'JPG', 'http://www.desarrolloweb.com');

	
	  
    // Salto de línea
    $this->Ln(20);

}
/*
function Header()
{

	$this->SetFont('Arial','',10);
	$this->Text(20,14,'PEDIDOS',0,'C', 0);
	$this->Ln(30);
	
	
}
*/
function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'PEDIDOS',0,0,'L');

}

}

	$paciente= $_GET['id'];
	$con = new DB;
	$pacientes = $con->conectar();	
	
	$strConsulta = "select var_nick_usu,var_nom_usu,var_apmat_usu,var_usuadd_usu from t_usuario";
	
	$pacientes = mysql_query($strConsulta);
	
	$fila = mysql_fetch_array($pacientes);









	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(10,20,20);
	
	$pdf->Ln(10);

    $pdf->SetFont('Arial','',12);
	

	

    
	
	
	
	$pdf->Cell(0,6,'NRO GUIA: '.$fila['var_nick_usu'],0,1);
	$pdf->Cell(0,6,'Nombre: '.$fila['var_nom_usu'].' '.$fila['var_nom_usu'].' '.$fila['var_nom_usu'],0,1);
	$pdf->Cell(0,6,'DIRECCION: '.$fila['var_nom_usu'],0,1); 
	$pdf->Cell(0,6,'Domicilio: '.$fila['var_nom_usu'],0,1); 
	
	$pdf->Ln(0);
	

	
	
	$pdf->SetWidths(array(65, 60, 55, 50, 20));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(120,120,120);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('FECHA', 'PRODUCTO', 'EMPRESA', 'CANT'));
			}
	
	$historial = $con->conectar();	
	$strConsulta = "select var_nick_usu,var_nom_usu,var_apmat_usu,var_usuadd_usu from t_usuario";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			$pdf->SetFont('Arial','',10);
			
			
				$pdf->SetFillColor(248,248,248);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['var_nom_usu'], $fila['var_nom_usu'], $fila['var_nom_usu'], $fila['var_nom_usu']));
			
		}






$pdf->Output();


?>
