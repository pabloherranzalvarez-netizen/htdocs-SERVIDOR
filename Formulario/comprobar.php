<?php
echo "Estamos ejecutando nuestra primera validacion";
$n =$_GET['nombre'];
$p =$_GET['password'];
echo $n;
echo $p;
$USU='pablo';
$CONTRA='1234';
if ($n==$USU && $p==$CONTRA) {
    echo "Bienvenido";
} else {
    echo "Usuario o contraseña incorrectos";
}