<?php
function	calcul($c_r, $c_i, &$z_r, &$z_i, $k)
{
	$cpy_i = $z_i;
	$cpy_r = $z_r;
	for ($j = 1; $j < $k; $j++)
	{
		$tmp = $cpy_r * $z_r - $cpy_i * $z_i;
		$z_i = $cpy_i * $z_r + $cpy_r * $z_i;
		$z_r = $tmp;
	}
	$z_r = $z_r + $c_r;
	$z_i = $z_i + $c_i;
}

function    create_back_image($img_x, $img_y)
{
	$picture = imagecreatetruecolor($img_x, $img_y);
	return ($picture);
}

function  	tab_colors_pixels($picture, $k)
{
	$couleur = array();
	for ($q = 0; $q < $k; $q++)
	  $couleur[$q] = imagecolorallocate($picture, $q * 255 / $k, $q * 155 / $k, $q * 255 / $k);
	return ($couleur);
}

function	inf_or_sup_quatre($z_r, $z_i)
{
  return (($z_r * $z_r + $z_i * $z_i) < 4);
}