<?php
/**
 * This function is to be added to FetchMedia()
 * Currently looking at this a a template for creating url links
 * to individual pieces of media.
 */

  $directory = $_SERVER['DOCUMENT_ROOT'] . "/media";
  $media = glob($directory . '/*.png');
  $urlObjs = array();

  foreach ($media as $m) {
    array_push($urlObjs, $m);
  }

  $slide_id = isset($_GET['slide_id']);
  if ($slide_id) 
  {
    if (is_file($file = $urlObjs[htmlspecialchars($_GET['slide_id'])])) 
    {
      header("Content-Type:image/png");
      readfile($file);
    }
  }
