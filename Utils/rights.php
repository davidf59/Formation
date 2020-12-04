<?php
  function verifrights(){
      if (isset($_COOKIE["auth"])&& !isset($_POST["logout"])){
        return true;
      } else {
        return false;
      }
    };