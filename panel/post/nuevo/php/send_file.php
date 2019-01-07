<?php
  $dir_name = "../../../../../blog/asset/img/";
  move_uploaded_file($_FILES['file']['tmp_name'],$dir_name.$_FILES['file']['name']);
  echo $dir_name.$_FILES['file']['name'];
?>
