<?php
/**
 * Created by PhpStorm.
 * User: syacko
 * Date: 1/26/16
 * Time: 4:54 PM
 */

//Variables
$imgCropsAcross = 0;
$imgCropsDown = 0;
$cropWidth = 500;
$cropHeight = 500;


//Process
$myImage = new Imagick();
$myImage->readImage('MapMaster-001.png');
$imgCropsAcross = floor($myImage->getImageWidth()/$cropWidth) - 1;
$imgCropsDown = floor($myImage->getImageHeight()/$cropHeight) - 1;

echo "\n";
echo "The source image MapsMaster-001.png (" . $myImage->getImageWidth() . " x " . $myImage->getImageHeight() . ") will be cropped into " .
	$imgCropsDown * $imgCropsAcross . " ($imgCropsAcross x $imgCropsDown ) titles.\n";
echo "    NOTE: All diminisions are WxH and unit of measure is pixels(px)." . "\n";

for($colCnt = 0; $colCnt <= $imgCropsAcross; $colCnt++)
{
	//echo "Col: $colCnt\n";
	for($rowCnt = 0; $rowCnt <= $imgCropsDown; $rowCnt++)
	{
		//echo "Row: $colCnt ($cropWidth x $cropHeight) x: " . $cropHeight * $colCnt . " y: " . $cropWidth * $rowCnt . "\n";
		$myTitle = clone $myImage;
		$myTitle->cropImage($cropWidth, $cropHeight, $cropHeight * $colCnt, $cropWidth * $rowCnt);
		$fileName = "MapsMaster-001-$colCnt-$rowCnt.jpg";
		echo "Writing $fileName to file system.\n";
		$myTitle->writeImage($fileName);
		$myTitle = null;
	}
}