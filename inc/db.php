<?php


const HOST = "localhost";
const USER = "root";
const BAZA = "mon";
const PASS = "root";

global $connect;
$connect = new mysqli(HOST, USER, PASS, BAZA );
$connect->query("SET NAMES 'utf8' ");
?>