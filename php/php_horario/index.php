<?php
// Calculando tempo com input de dois horários

// Tratando o input tirando o '-' e limpando os espaços
$input = '12:10 -  11:55 ';
$input = explode('-',$input);
$input =  array_map('trim', $input);
// Resultado: Array ( [0] => 12:10 [1] => 11:55 )


// Convertendo para data 
$date1 = DateTime::createFromFormat('H:i', $input[0]);
$date2 = DateTime::createFromFormat('H:i', $input[1]);


$diff = $date1->diff($date2);
$minutes = $diff->format('%i');

echo "$minutes minutos";