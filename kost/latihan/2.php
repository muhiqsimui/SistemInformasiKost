<?php
$tgl1 = new DateTime("2019-11-01");
$tgl2 = new DateTime("2020-12-31");
$d = $tgl2->diff($tgl1)->days + 1;
echo "rp. " . $f = $d * 5000;
echo "<br>";
$g = $tgl2->diff($tgl1)->days + 7;
echo $g . " hari";
