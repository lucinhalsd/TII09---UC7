<?
/*
Crie um formulario que recebe uma idade(inteiro)
Verifique se idade:
    -Menor que 12: Criança
    -Menor que 18: Adolescente
    -Menor que 60: Adulto
    -Qualquer outra idade: Idoso
    
*/

$idade = (int) $_GET['idade'];

if ($idade < 12) {
    echo "Criança, tem $idade anos";
} elseif ($idade < 18) {
    echo "Adolescente, tem $idade anos";
} elseif ($idade < 60) {
    echo "Adulto, tem $idade anos";
} else {
    echo "Idoso, tem $idade anos";
}