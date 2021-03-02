<?php
// Array con nombres
$a[] = "Lucero";
$a[] = "Adrian";
$a[] = "Jose";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Enrique";
$a[] = "Perla";
$a[] = "Linda";
$a[] = "Ofelia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Vicky";

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $nombre) {
        if (stristr($q, substr($nombre, 0, $len))) {
            if ($hint === "") {
                $hint = $nombre;
            } else {
                $hint .= ", $nombre";
            }
        }
    }
}
echo $hint === "" ? "no hay sugerencias" : $hint;
?>