<?php

// O, utilizar una función anónima, a partir de PHP 5.3.0
spl_autoload_register(function ($clase) {
    include 'clases/' . $clase . '.php';
});

?>