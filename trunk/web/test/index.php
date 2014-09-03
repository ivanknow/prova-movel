<?php
 function getValuesList(){
	$array = array();
	if ($handle = opendir('../test')) {
		while (false !== ($file = readdir($handle)))
		{
			if ($file != "." && $file != ".." && strpos($file, "Test.php"))
			{
				$array[] = $file;
			}
		}
		closedir($handle);
	}
	return $array;
}

function loadValues($listNames){
	
	foreach ($listNames as $name){
		$nameWithotExt = str_replace(".php","",$name);
		$result = "<div>";
			$result .= "<a href='index.php?test=$nameWithotExt'>$nameWithotExt</a>";
		$result .= "/<div>";
		
		echo $result;
		
	}
}

$version = system('phpunit --version',$retval);

if($retval!=1){
	
	if(isset($_GET['test'])){
		echo "<h2>".$_GET['test']."</h2>";
		echo "<div>";
			echo "<h3>Teste executado</h3>";
			system('phpunit '.$_GET['test'].".php",$retval);
		echo "</div><hr/>";
		
	}
	
	loadValues(getValuesList());
	
	
}else{
	echo "You need insert phpunit in your PATH";
}

?>