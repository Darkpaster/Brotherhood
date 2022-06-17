<style type="text/css">

#online{
	position: absolute;
	top: 15vw;
	font-size: 1.5vw;
	color: darkblue;
}

</style>

<?php
include("bd.php");

print_r(session_save_path());

$path=session_save_path();
$dh = opendir( $path ) or die( "Не удалось открыть каталог ".$path );
$path.='/';
//$df=date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));    // храню сесии 1 день
while ($f = readdir($dh)) {
    if (substr($f,0,1)=='.') continue;
    //echo "s"; 
    if (strpos(file_get_contents($path . "/" . $f), "s:0:") || empty(file_get_contents($path . "/" . $f)) !== false){
        //print_r($f);
        @unlink($path . "/" . $f);
        
    }
}
closedir($dh);


function getUsersOnline() {  
   $count = 0;  
  
   $handle = opendir(session_save_path());  
   if ($handle == false) return -1;  
  
   while (($file = readdir($handle)) != false) {  
       if (preg_match("/^sess/", $file)) $count++;  
   }  
   closedir($handle);  
  
   return $count;  
}

$usercount = getUsersOnline();
?>
<h2 id="online">Онлайн: <?php echo  '<b>'.$usercount.'</b>'; ?></h1> <?php
    
?>

