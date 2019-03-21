<?php
function DBStr($texto)
{
	return "'".$texto."'";
}


function utils_debugfile($origen, $texto)
{
        if (true)
        {
        //setlocale(LC_TIME,"es_CO");
        $time = time();
        //date(DATE_RSS)
        $file = fopen("log\logs.txt", "a");
	fwrite($file,  date("d-m-Y (H:i:s)", $time) . ": " . $origen . "--> ". $texto . PHP_EOL);
	fwrite($file, "-----------------------------------" . PHP_EOL);
        fclose($file);	
        }
}

?>