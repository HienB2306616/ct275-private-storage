<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  require_once realpath(__DIR__ . '/db_connect.php');
