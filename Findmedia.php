<?php

class FetchMedia
{

    public static function findjpg() 
    {
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/media";
        $media = glob($directory . '/*.jpg');
        $urlObjs = array();
    
        foreach ($media as $m) 
        {
            array_push($urlObjs, $m);
        }
    
        $jpg_id = isset($_GET['jpg_id']);
        if ($jpg_id) 
        {
            if (is_file($file = $urlObjs[htmlspecialchars($_GET['jpg_id'])])) 
            {
                $header = "Content-Type:image/jpg";
                return array($header, $file);
            }
        }
    }

    public static function findgif()
    {
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/media";
        $media = glob($directory . '/*.gif');
        $urlObjs = array();

        foreach ($media as $m) 
        {
            array_push($urlObjs, $m);
        }

         $gif_id = isset($_GET['gif_id']);
        if ($gif_id) 
        {
            if (is_file($file = $urlObjs[htmlspecialchars($_GET['gif_id'])])) 
            {
                $header = "Content-Type:image/gif";
                return array($header, $file);
            }
        }
    }

    public static function findvid()
    {
        $directory = $_SERVER['DOCUMENT_ROOT'] . "/media";
        $media = glob($directory . '/*.mp4');
        $urlObjs = array();

        foreach ($media as $m) 
        {
        array_push($urlObjs, $m);
        }

        $vid_id = isset($_GET['vid_id']);
        if ($vid_id) 
        {
            if (is_file($file = $urlObjs[htmlspecialchars($_GET['vid_id'])])) 
            {
            $header = "Content-Type:video/mp4";
            return array($header, $file);
            }
        }
    }
}    