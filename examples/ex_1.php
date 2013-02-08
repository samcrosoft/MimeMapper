<?php
//test file
include_once("../src/MimeMapper/Utils/Files.php");

$sFilename = "filename.ext";

$oMapper = new \MimeMapper\Utils\Files($sFilename);

echo "the extension is " . $oMapper->getExtension() . "\n";
echo " the filename is " . $oMapper->getFilename() . "\n";