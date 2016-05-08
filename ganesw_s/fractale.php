<?php
include("calcul.php");
$k = $_POST['k'];
$n = $_POST['n'];
if (empty($_POST['k']))
    $k = 2;
if (empty($_POST['n']))
    $n = 50;
if (preg_match('/^[\d]+$/', $k) && (int)$k >= 1 && preg_match('/^[\d]+$/', $n) && (int)$n >= 1)
{
  header('Content-type: image/png');
  $x1 = -2.1;
  $x2 = 2.1;
  $y1 = -2.1;
  $y2 = 2.1;
  $hd = 100;
  $abscisse = $x2 - $x1;
  $ordonnee = $y2 - $y1;
  $img_x = $abscisse * $hd;
  $img_y = $ordonnee * $hd;
  $picture = create_back_image($img_x, $img_y);
  $couleur = tab_colors_pixels($picture, $n);
  $white = imagecolorallocate($picture, 255, 255, 255);
  imagefill($picture, 0 ,0 , $white);
  for ($l = 0; $l < $img_x; $l++)
  {
    for ($h = 0; $h < $img_y; $h++)
    {
        $c_r = $l / $hd + $x1;
        $c_i = $h / $hd + $y1;
        $z_r = 0;
        $z_i = 0;
        $i   = 0;
        for (; $i < $n && inf_or_sup_quatre($z_r, $z_i); $i++)
	  calcul($c_r, $c_i, $z_r, $z_i, $k);
	if ($i == $n)
          imagesetpixel($picture, $l, $h, $white);
        else
          imagesetpixel($picture, $l, $h, $couleur[$i]);
    }
  }
  imagepng($picture);
}
else
  header('Location: error.html');

