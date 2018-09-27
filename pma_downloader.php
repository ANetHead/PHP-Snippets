<?php

$pma_version = (float)phpversion() >= 5.5  ? '4.8.3' : '4.0.10.20';

$pma_url = 'https://files.phpmyadmin.net/phpMyAdmin/'.$pma_version.'/phpMyAdmin-'.$pma_version.'-all-languages.zip';

echo 'Downloading from following url : <br>'.$pma_url;

file_put_contents("pma.zip", fopen($pma_url,'r'));

echo '<br> Download Completed of size : '.filesize("pma.zip");

$file = 'pma.zip';

$path = pathinfo(realpath($file), PATHINFO_DIRNAME);

$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === TRUE) {  
		  $zip->extractTo($path);
		  $zip->close();
		  echo "WOOT! $file extracted to $path";
} else 
  		   echo "Doh! I couldn't open $file";

// unlink($file);

// function delete_directory($dirname) {
//          if (is_dir($dirname))
//            $dir_handle = opendir($dirname);
//      if (!$dir_handle)
//           return false;
//      while($file = readdir($dir_handle)) {
//            if ($file != "." && $file != "..") {
//                 if (!is_dir($dirname."/".$file))
//                      unlink($dirname."/".$file);
//                 else
//                      delete_directory($dirname.'/'.$file);
//            }
//      }
//      closedir($dir_handle);
//      rmdir($dirname);
//      return true;
// }

?>
