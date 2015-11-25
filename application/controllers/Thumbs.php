<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thumbs extends CI_Controller {

    public function __construct()
    {

        parent::__construct();
            $this->load->library('image_lib');
     }

public function products($width, $height, $img)
{
// Checa se a imagem existe; se não existir, usa uma imagem padrão
$img = is_file('assets/main/images/products/'.$img) ? $img : 'default.jpg';

// Se a miniatura já existir, ela é que será usada
// (não há necessidade de usar a GD library de novo)
if ( ! is_file('assets/main/images/products/thumbs/' . $width . 'x' . $height . '_' . $img))
{
$config['source_image'] = 'assets/main/images/products/' . $img;
$config['new_image']    = 'assets/main/images/products/thumbs/' . $width . 'x' . $height . '_' . $img;
$config['width']        = $width;
$config['height']       = $height;

$this->image_lib->initialize($config);
$this->image_lib->resize_crop();
}

header('Content-Type: image/jpg');
readfile('assets/main/images/products/thumbs/' . $width . 'x' . $height . '_' . $img);
}

}

?>