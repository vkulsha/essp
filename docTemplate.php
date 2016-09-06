<?php
require_once 'PHPWord.php';
///Template.php -> setValue -> закомментировать все, кроме последней строки;
$PHPWord = new PHPWord();
$fn = isset($_GET['fn']) && $_GET['fn'] == 'act' ? 'Act_PIR_Temp' : 'Dog_PIR_Temp';
$document = $PHPWord->loadTemplate("data/$fn.docx");

$orgName = isset($_GET['orgName']) ? $_GET['orgName'] : '';
$orgAddressUr = isset($_GET['orgAddressUr']) ? $_GET['orgAddressUr'] : '';
$orgAddressFact = isset($_GET['orgAddressFact']) ? $_GET['orgAddressFact'] : '';
$orgChAcc = isset($_GET['orgChAcc']) ? $_GET['orgChAcc'] : '';
$orgBank = isset($_GET['orgBank']) ? $_GET['orgBank'] : '';
$orgCorrAcc = isset($_GET['orgCorrAcc']) ? $_GET['orgCorrAcc'] : '';
$orgBIK = isset($_GET['orgBIK']) ? $_GET['orgBIK'] : '';
$orgOKPO = isset($_GET['orgOKPO']) ? $_GET['orgOKPO'] : '';
$orgINN = isset($_GET['orgINN']) ? $_GET['orgINN'] : '';
$orgKPP = isset($_GET['orgKPP']) ? $_GET['orgKPP'] : '';
$orgOGRN = isset($_GET['orgOGRN']) ? $_GET['orgOGRN'] : '';
$orgManagerDolg = isset($_GET['orgManagerDolg']) ? $_GET['orgManagerDolg'] : '';
$orgManagerFIO = isset($_GET['orgManagerFIO']) ? $_GET['orgManagerFIO'] : '';
$orgManagerSFIO = isset($_GET['orgManagerSFIO']) ? $_GET['orgManagerSFIO'] : '';
$orgManagerDoc = isset($_GET['orgManagerDoc']) ? $_GET['orgManagerDoc'] : '';
$bsAddress = isset($_GET['bsAddress']) ? $_GET['bsAddress'] : '';
$bsNum = isset($_GET['bsNum']) ? $_GET['bsNum'] : '';
$bsOwner = isset($_GET['bsOwner']) ? $_GET['bsOwner'] : '';
$dogNum = isset($_GET['dogNum']) ? $_GET['dogNum'] : '';
$dogDate = isset($_GET['dogDate']) ? $_GET['dogDate'] : '';
$actDate = isset($_GET['actDate']) ? $_GET['actDate'] : '';

$document->setValue('orgName', $orgName);
$document->setValue('orgAddressUr', $orgAddressUr);
$document->setValue('orgAddressFact', $orgAddressFact);
$document->setValue('orgChAcc', $orgChAcc);
$document->setValue('orgBank', $orgBank);
$document->setValue('orgCorrAcc', $orgCorrAcc);
$document->setValue('orgBIK', $orgBIK);
$document->setValue('orgOKPO', $orgOKPO);
$document->setValue('orgINN', $orgINN);
$document->setValue('orgKPP', $orgKPP);
$document->setValue('orgOGRN', $orgOGRN);
$document->setValue('orgManagerDolg', $orgManagerDolg);
$document->setValue('orgManagerFIO', $orgManagerFIO);
$document->setValue('orgManagerSFIO', $orgManagerSFIO);
$document->setValue('orgManagerDoc', $orgManagerDoc);
$document->setValue('bsAddress', $bsAddress);
$document->setValue('bsNum', $bsNum);
$document->setValue('bsOwner', $bsOwner);
$document->setValue('dogNum', $dogNum);
$document->setValue('dogDate', $dogDate);
$document->setValue('actDate', $actDate);

$stamp = date('Ymd_His');
$filename = 'data/'.$fn.'_'.$stamp.'.docx';
$document->save($filename);

$ctype = "application/msword";
header("Pragma: public"); 
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false); // нужен для некоторых браузеров
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".filesize($filename)); // необходимо доделать подсчет размера файла по абсолютному пути
readfile("$filename");
unlink("$filename");

?>