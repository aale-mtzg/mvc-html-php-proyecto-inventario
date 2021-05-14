<?php

/* ---------Esto esta en el archivo config.ini------**/
const SERVER = "localhost";
const DB = "inventarioactivos8";
const USER = "root";
const PASS = "";


//sistema gestor de BD
//variable para conectar con la BD
const SGBD = "mysql:host=".SERVER.";dbname=".DB;

//variables para encriptacion de contraseñas hash
const METHOD_HASH ="AES-256-CBC";
//Llave secreta
const SECRET_KEY = '$SISTEMAINVENTARIO@2020';
const SECRET_ID = '200220'; 

?>