<?php

    define('USUARIS',array(
        "usuari1" => array(
            "email" => 'admin@educem.com',
            "password" =>convertir_hash('iloveu')
        ),
        "usuari2" => array(
            "email" => 'donald@educem.com',
            "password" =>convertir_hash('m4k3Am3r1caGr3atAg41n')
        ),
        "usuari3" => array(
            "email" => 'gilete@educem.com',
            "password" => convertir_hash('ErF4ryS1empr3')
        ),
        "usuari4" => array(
            "email" => 'gon@educem.com',
            "password" => convertir_hash('Fatality')
        )
    ));


    ///NOTE Funcio que ens permetra convertir en hash las contrasenyas del arxiu usuaris.php
    function convertir_hash($pwd){
        return password_hash($pwd, PASSWORD_DEFAULT);
    }

    