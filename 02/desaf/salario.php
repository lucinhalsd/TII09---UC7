<?php
$salario= (float) $_GET['salario'];
$inss = $salario * 0.11;
$total = $salario - $inss;
echo "salario: $salario, inss: $inss, total; $total";