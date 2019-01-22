<?php
header("Content-Type: text/html; charset=utf-8");

$photos = array(
  'bounty',
  'citrus',
  'mintChocolate'
);

include 'Lib/Twig/Autoloader.php';
Twig_Autoloader::register(); 
try {
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader); 
  $template = $twig->loadTemplate('main.tmpl');
  $num = rand (0,30);
  $div = ($num % 2);
  echo $template->render(array (
    'photos' => $photos
  )); 
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>
