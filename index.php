<?php
//Arquivo index responsável pela inicialização do sistema

require_once 'system/config.php';
include_once 'helpers.php';

if (validarEmail('teste@email.com')) {
    echo 'Endereço de e-mail válido';
} else {
    echo 'Endereço de e-mail inválido';
}

var_dump(validarUrl('http://teste.com'));
// var_dump(validarEmail('teste@email.com'));