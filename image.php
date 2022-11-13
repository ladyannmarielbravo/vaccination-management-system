<?php

class ImageDiff {

  // not bigger 20
  private $matrix = 15;

  public function getImageInfo($image_path){
    list($width, $height, $type, $attr) = getimagesize($image_path);
    $image_type = '';
    switch ($type) {
      case IMAGETYPE_JPEG:
        $image_type = 'jpeg';
        break;
      case IMAGETYPE_GIF:
        $image_type = 'gif';
        break;
      case IMAGETYPE_PNG:
        $image_type = 'png';
        break;
      case IMAGETYPE_BMP:
        $image_type = 'bmp';
        break;
      default:
        $image_type = '';
    }
    return array('width' => $width, 'height' => $height, 'type' => $image_type);
  }

  public function generateArray($image_path){
    $image_info = $this->getImageInfo($image_path);
    $func = 'imagecreatefrom'.$image_info['type'];
    if (function_exists($func)){
      $main_img = $func($image_path);
      $tmp_img = imagecreatetruecolor($this->matrix, $this->matrix);
      imagecopyresampled($tmp_img, $main_img, 0, 0, 0, 0, $this->matrix, $this->matrix, $image_info['width'], $image_info['height']);

      $pixelmap = array();
      $average_pixel = 0;
      for($x = 0; $x < $this->matrix; $x++){
        for($y = 0; $y < $this->matrix; $y++){
          $color = imagecolorat($tmp_img, $x, $y);
          $color = imagecolorsforindex($tmp_img, $color);
	  $pixelmap[$x][$y]= 0.299 * $color['red'] + 0.587 * $color['green'] + 0.114 * $color['blue'];
          $average_pixel += $pixelmap[$x][$y];
        }
      }

      $average_pixel = $average_pixel/($this->matrix * $this->matrix);

      imagedestroy($main_img);
      imagedestroy($tmp_img);

      for($x = 0; $x < $this->matrix; $x++){
        for($y = 0; $y < $this->matrix; $y++){

          $row_num = ($pixelmap[$x][$y] == 0) ? 0 : (round( 2*(($pixelmap[$x][$y] > $average_pixel) ? $pixelmap[$x][$y] / $average_pixel : ($average_pixel/$pixelmap[$x][$y]) * -1)));
          $row = sprintf("%02d", ($x + 10));
          $row .= sprintf("%02d", ($y + 10));
          $row .= sprintf("%03d", (255 + $row_num));
          $result[] = intval($row);
        }
      }
      return $result;
                    
    } else {
      //raise exception
      throw new Exception('File type  not supported!');
    }
  }

  public function diffImages($image_path1, $image_path2){
    $array1 = $this->generateArray($image_path1);
    $array2 = $this->generateArray($image_path2);
    $result = 0;
    $result = count( array_intersect($array1, $array2) );
    return round($result / ( $this->matrix * $this->matrix ), 6);
  }
    

}

$image_diff = new ImageDiff();

//print_r($image_diff->generateArray("images/signature (1).png"));
print_r($image_diff->diffImages("images/signature (1).png", "images/signature (2).png"));

?>