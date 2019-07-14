<?php
require_once('TCPDF/tcpdf_import.php');
require '../database.inc';

$database=new database();


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, "A4", true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins("15", "0", PDF_MARGIN_RIGHT);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->SetFont('times', 'BI', 12);

$pdf->AddPage();

$pdf->SetFont('times', 'BI', 20);

$pdf->SetY(5,true,false);
$pdf->SetX(80,false);
$pdf->writeHTML("<label>List DateVoyage</label>", true, false, true, false, '');


$voyage=$database->query("select DATE_FORMAT(date_depart,'%d/%m/%Y') as date_depart,DATE_FORMAT(date_retour,'%d/%m/%Y') as date_retour , voyage.nom as voyage_nom,ville.nom as ville_nom from voyage_date join voyage join ville on voyage_date.voyage_id=voyage.voyage_id and ville.ville_id=voyage.ville_id and voyage_date.voyage_date_id=".$_GET["voyage_date_id"]);
$voyage=mysqli_fetch_assoc($voyage);
$pdf->SetFont('times', 'BI', 12);

$pdf->SetY(20,true,false);
$pdf->SetX(10,false);
$pdf->writeHTML("<label>Voyage : </label>".$voyage["voyage_nom"], true, false, true, false, '');

$pdf->SetY(30,true,false);
$pdf->SetX(10,false);
$pdf->writeHTML("<label>Ville : </label>".$voyage["ville_nom"], true, false, true, false, '');

$pdf->SetY(40,true,false);
$pdf->SetX(10,false);
$pdf->writeHTML("<label>Périodes : </label>Du ".$voyage["date_depart"]." Au ".$voyage["date_retour"], true, false, true, false, '');


$query_chambre_id=$database->query("select chambre_id from chambre where reserve_id in(select reserve_id from reserve where voyage_date_id=".$_GET["voyage_date_id"].")");

$list_type=array(1=>"Adulte",2=>"Enfant(-12ans)",3=>"Bebe(-3ans)");
$txt="<table border=\"1\" cellpadding=\"2\" cellspacing=\"0\" align=\"center\">";

$txt.="<tr   nobr=\"true\"><th width=\"100\">Chambre</th><th width=\"400\">Nom Prenom</th><th width=\"150\">Categorie</th></tr>";
$i=1;
while ($chambre_id= mysqli_fetch_assoc($query_chambre_id)) {
  $query_invite=$database->query("select nom_prenom,type from invite where chambre_id=".$chambre_id["chambre_id"]);
  $num=mysqli_num_rows($query_invite);
  $invite=mysqli_fetch_assoc($query_invite);
  $txt.="<tr  nobr=\"true\" ><td rowspan=\"".$num."\">".$i."</td><td>".$invite["nom_prenom"]." </td><td>".$list_type[$invite['type']]."</td></tr>";
  while ($invite= mysqli_fetch_assoc($query_invite)) {
  $txt.="<tr><td>".$invite["nom_prenom"]." </td><td>".$list_type[$invite['type']]."</td></tr>";
  }
  $i++;
}
$txt.="</table>";
$pdf->SetFont('times', 'BI', 12);
$pdf->SetY(50,true,false);
$pdf->SetX(5,false);
$pdf->writeHTML($txt, true, false, true, false, '');


$pdf->Output('test.pdf', 'I');

?>
