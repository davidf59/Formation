<?php $title = 'Hello world'; ?>

<?php ob_start(); ?>
   
<h1>Planetes
</h1>

<?php         
    foreach ($tabaff->results as $col => $obj) {
      echo '</br></br>'.$obj->name;
    }
$data = ob_get_clean();
require('template.php'); 