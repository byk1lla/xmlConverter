<?php function autoLoadClass($className) {

    $classNameParts = explode("\\", $className);
    $className = end($classNameParts);

    $fileName = $className . ".class.php";
    $classPath = "../". "config/" . $fileName;
    
    if (is_readable($classPath)) {
        
        require_once $classPath;
    }
}

function autoLoadLib($libName) {

    $libNameParts = explode("\\", $libName);
    $libName = end($libNameParts);
    $fileName = $libName . ".lib.php";
    $classPath = "../../". "vendor/" . $fileName;

    if (is_readable($classPath)) {
        
        require_once $classPath;
    }
}

spl_autoload_register("autoLoadLib");
spl_autoload_register("autoLoadClass");

use byk1lla\libs as libs;

use YeniToptancı\Classes as yenitoptanci;

error_reporting(E_ERROR);
$helper = new yenitoptanci\Helper();
$datab = new yenitoptanci\yenitoptanci();
$log = new libs\Logger("C:\\xampp\\logs\\yenitoptanci");
