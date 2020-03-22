<?php

require_once 'API.php';
class MyAPI extends API
{
    protected $User;

    public function __construct($request, $origin) {
        parent::__construct($request);

        /**
         * This is important now...
         * This has to be used for security for customer use.
         * Needs database to be able to issue and keep track
         */

        // // Abstracted out for example
        // $APIKey = new Models\APIKey();
        // $User = new Models\User();
        //
        // if (!array_key_exists('apiKey', $this->request)) {
        //     throw new Exception('No API Key provided');
        // } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
        //     throw new Exception('Invalid API Key');
        // } else if (array_key_exists('token', $this->request) &&
        //      !$User->get('token', $this->request['token'])) {
        //
        //     throw new Exception('Invalid User Token');
        // }
        //
        // $this->User = $User;
    }

    /**
     * GET end points for determining base number of
     * imgs and vids contained in stream - to be used
     * in calculation of random number of slides
     */
     protected function example() {
        if ($this->method == 'GET') {
            $directory = $_SERVER['DOCUMENT_ROOT'] . "/media";
            $images = glob($directory . '/*.jpg');
            $imgObjs = array();
            $gifs = glob($directory . '/*.gif');
            $gifObjs = array();

            foreach ($images as $i) {
              array_push($imgObjs, $i);
            }
            foreach ($gifs as $g) {
              array_push($gifObjs, $g);
            }
            $data = {
              img : count($imgObjs),
              gif : count($gifObjs)
            };
            return json_encode($data);
        } else {
            return "Only accepts GET requests";
        }
     }

     // protected function setVids() {
     //    if ($this->method == 'GET') {
     //        $directory = $_SERVER['DOCUMENT_ROOT'] . "/media";
     //        $media = glob($directory . '/*.mp4');
     //        $urlObjs = array();
     //
     //        foreach ($media as $m) {
     //          array_push($urlObjs, $m);
     //        }
     //        $data = count($urlObjs);
     //        return json_encode($data);
     //    } else {
     //        return "Only accepts GET requests";
     //    }
     // }

     /**
      * POST endpoints for sharing imgs and vids
      */
     protected function shareimg() {
       if ($this->method == 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            if ($data->url) {
              if (!copy($data->url, './media/'.hash('sha256', $data->url).'.jpg')) {
                return 'Image failed to copy';
              } else {
                // return "media item shared and copied: " . $data->url;
                return 'Image successfully copied to:: ./media/'.hash('sha256', $data->url).'.jpg';
              }
            }
       } else {
            return "Only accepts POST requests";
       }
     }

     protected function sharegif() {
       if ($this->method == 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            if ($data->url) {
              if (!copy($data->url, './media/'.hash('sha256', $data->url).'.gif')) {
                return 'GIF failed to copy';
              } else {
                // return "media item shared and copied: " . $data->url;
                return 'GIF successfully copied to:: ./media/'.hash('sha256', $data->url).'.gif';
              }
            }
       } else {
            return "Only accepts POST requests";
       }
     }

     protected function sharevid() {
       if ($this->method == 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            if ($data->url) {
              if (!copy($data->url, './media/'.hash('sha256', $data->url).'.mp4')) {
                return 'Video failed to copy';
              } else {
                // return "media item shared and copied: " . $data->url;
                return 'Video successfully copied to:: ./media/'.hash('sha256', $data->url).'.mp4';
              }
            }
       } else {
            return "Only accepts POST requests";
       }
     }
 }
