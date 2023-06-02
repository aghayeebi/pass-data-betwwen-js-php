<?php

class Circle
{

    public const PI = 3.14;
    public $r = 0;
    public function __construct($r)
    {
        $this->r = $r;
    }
    public function getArea()
    {
        $pi = self::PI;

        $a = 2 * $pi * $this->r;
        return $a;
    }
    public function getPerimeter()
    {
        $pi = self::PI;
        $s = $pi * $this->r * $this->r;
        return $s;
    }
}

$r = getDataFromJsonFile();
$circle = new Circle($r);
$a = $circle->getArea();
$s = $circle->getPerimeter();
// echo "A : " . $a . "<br> S : " . $s;

setDataOnJsonFile($a,$s);


function readJsonFile()
{
    $path_json = "data.json";
    $jsonString = file_get_contents($path_json);
    $data = json_decode($jsonString, true) ;
    return $data;
}
function getDataFromJsonFile()
{
    
    $data = readJsonFile();
    $r = $data["radius"];
    return $r;

}

function setDataOnJsonFile(int $a, int $s)
{   
    $data = readJsonFile();
    $data["a"] = $a;
    $data["s"] = $s;
    file_put_contents('data.json', json_encode($data));

}

?>