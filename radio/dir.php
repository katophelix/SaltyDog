



$dir = "data.txt";
if(!is_writable($dir)){
    echo "cannot write to file";
}

if (!empty($_REQUEST["search"])) {
    $input = $_REQUEST["search"];
   
    $bitecount = file_put_contents($dir, $input, FILE_APPEND);
}
echo $bitecount . " bites were written to the file";