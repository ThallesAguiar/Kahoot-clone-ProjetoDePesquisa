<?php
session_start();

unset(
$_SESSION['UsuarioID'],
$_SESSION['UsuarioNome'],
$_SESSION['UsuarioEmail'],
$_SESSION['UsuarioNivel']
);

header("Location:../index.php");

