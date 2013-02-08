<?php
include_once("../src/MimeMapper/MimeMapper.php");

$oMimeMapper = new MimeMapper(false);
$sFilename   = "http://notjustok.jarapages.netdna-cdn.com/wp-content/uploads/2013/01/Durella.png";
echo "the mime extension of [$sFilename] is ".$oMimeMapper->getMimeFromFilename($sFilename);
print("\n");
echo "the mime extension of [png] is " . $oMimeMapper->getMimeFromExtension("png");

// test the cloning here
$oMimeTwo = clone $oMimeMapper;
print "\n\n the class for the clone is " . get_class($oMimeTwo);