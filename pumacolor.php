<?php

//Receive data

//material 8 bit data
$material = preg_replace('/[^[:alnum:]_]/', '',$_GET["material"]); //material
$red_m = preg_replace('/[^[:alnum:]_]/', '',$_GET["red_m"]); //red color material
$green_m = preg_replace('/[^[:alnum:]_]/', '',$_GET["green_m"]); //gren color material
$blue_m = preg_replace('/[^[:alnum:]_]/', '',$_GET["blue_m"]); //blue color material
/*
$mask = preg_replace('/[^[:alnum:]_]/', '',$_GET["mask"]); //mask
$red_k = preg_replace('/[^[:alnum:]_]/', '',$_GET["red_k"]); //red color mask
$green_k = preg_replace('/[^[:alnum:]_]/', '',$_GET["green_k"]);//gren color mask
$blue_k = preg_replace('/[^[:alnum:]_]/', '',$_GET["blue_k"]); //blue color mask
*/
$wheels = preg_replace('/[^[:alnum:]_]/', '',$_GET["wheels"]); //wheels type
/*
$battery = preg_replace('/[^[:alnum:]_]/', '',$_GET["battery"]); //battery type
$eyes = preg_replace('/[^[:alnum:]_]/', '',$_GET["eyes"]); //eyes type
*/
$side = preg_replace('/[^[:alnum:]_]/', '',$_GET["side"]); //side type
$frontal = preg_replace('/[^[:alnum:]_]/', '',$_GET["frontal"]); //frontal accessory
$top = preg_replace('/[^[:alnum:]_]/', '',$_GET["top"]); //top accessory
/*
$display = preg_replace('/[^[:alnum:]_]/', '',$_GET["display"]); //top accessory
$name = preg_replace('~[^0-9a-z\\s]~i', '',$_GET["name"]);
//future update
$config_code = preg_replace('/[^[:alnum:]_]/', '',$_GET["code"]); //unique code
//01FFEEDD01
if($config_code!=""){
    //preference to config code
    $material = hexdec(substr($config_code,0,2));
    $red_m = hexdec(substr($config_code,2,2));
    $green_m = hexdec(substr($config_code,4,2));
    $blue_m = hexdec(substr($config_code,6,2));
    $mask = hexdec(substr($config_code,8,2));
    $red_k = hexdec(substr($config_code,10,2));
    $green_k = hexdec(substr($config_code,12,2));
    $blue_k = hexdec(substr($config_code,14,2));
    $wheels = hexdec(substr($config_code,16,2));
    $battery = hexdec(substr($config_code,18,2));
    $eyes = hexdec(substr($config_code,20,2));
    $side = hexdec(substr($config_code,22,2));
    $frontal = hexdec(substr($config_code,24,2));
    $top = hexdec(substr($config_code,26,2));
    $display = hexdec(substr($config_code,28,2));
    $nothing = hexdec(substr($config_code,30,2));
    $name = hexdec(substr($config_code,32,5));
}

//recebe nome e define padrão caso vazio
if($name=="") $name="decabot";  

//não deixa sem rodas
if($wheels=="") $wheels=1;

//não usa mascara no modo Super Buggy
if($wheels==9) $mask="";
*/

/*
//seta material
//Se material for brilhoso ou não
if($material=="2"){
	$basic_image = imagecreatefrompng('images/decabot_acrylic.png');
} else {
	$basic_image = imagecreatefrompng('images/decabot_basic.png');
}
$material_image = imagecreatefrompng('images/decabot_material.png');

//seta cor do material
//se material for inexistente, pinta com cores de MDF
if($material=="") {
	$chassis = imagecolorallocatealpha($material_image, 235, 183, 101, 0);
} else {
	$chassis = imagecolorallocatealpha($material_image, $red_m, $green_m, $blue_m, 0);
}
imagefill($material_image, 128, 128, $chassis);

//olhos
$eyes_image = imagecreatefrompng("images/decabot_eye_$eyes.png");

//mascara
//carrega máscara e pinta com a cor selecionada
$mask_image = imagecreatefrompng("images/decabot_mask_$mask.png");
$color_mask = imagecolorallocate($mask_image, $red_k, $green_k, $blue_k);
imagefill($mask_image,75,140, $color_mask);
imagefill($mask_image,190,125, $color_mask);

//mascara extra
//carrega imagem suplementar para modelos acrilicos
if($mask>=6){
    $extra_mask_image = imagecreatefrompng("images/decabot_acrylic_$mask.png");   
}

//ferramenta frontal
$frontal_image = imagecreatefrompng("images/decabot_frontal_$frontal.png");

//ferramenta superior
$top_image = imagecreatefrompng("images/decabot_top_$top.png");

//bateria
$battery_image = imagecreatefrompng("images/decabot_power_$battery.png");
if($display==1) $battery_image = imagecreatefrompng("images/decabot_display_$display.png");

//laterais
$side_r_image = imagecreatefrompng("images/decabot_side_r_$side.png");
$side_l_image = imagecreatefrompng("images/decabot_side_l_$side.png");

//rodas
$wheels_image = imagecreatefrompng("images/decabot_motor_$wheels.png");

//cria quadro branco ao redor da imagem
$frame_image = imagecreatefrompng('images/decabot_frame.png');

//monta imagem destino
$dest_image = imagecreatetruecolor(256, 256);
$color_bkg = imagecolorallocatealpha($dest_image, 255, 255, 255, 0);

imagecopy($dest_image, $material_image, 0, 0, 0, 0, 256, 256);
imagecopy($dest_image, $basic_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $eyes_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $frame_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $battery_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $mask_image, 0, 0, 0, 0, 256, 256);
//if($mask>=6){
//    imagecopy($dest_image, $extra_mask_image, 0, 0, 0, 0, 256, 256);
//}
//imagecopy($dest_image, $wheels_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $side_l_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $top_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $frontal_image, 0, 0, 0, 0, 256, 256);
//imagecopy($dest_image, $side_r_image, 0, 0, 0, 0, 256, 256);

//nome na imagem
$color_text = imagecolorallocatealpha($dest_image, 200, 200, 200, 0);
imagestring($dest_image, 2, 2, 0, "corisco.org/pumacolor", $color_text);

//põe transparencia
imagecolortransparent($dest_image, $color_bkg);

// Output and free from memory
header("Content-Disposition: Attachment;filename=$name.png");
header('Content-type: image/png');
imagepng($dest_image);

imagedestroy($material_image);
imagedestroy($eyes_image);
imagedestroy($dest_image);
imagedestroy($basic_image);
imagedestroy($frame_image);
imagedestroy($mask_image);
imagedestroy($wheels_image);
imagedestroy($frontal_image);
imagedestroy($top_image);
imagedestroy($battery_image);
imagedestroy($side_l_image);
imagedestroy($side_r_image);
*/
$chassis = imagecolorallocatealpha($material_image, $red_m, $green_m, $blue_m, 0);
$material_image = imagecreatefrompng('images/decabot_material.png');
imagefill($material_image, 128, 128, $chassis);

$dest_image = imagecreatetruecolor(1920, 1080);
imagecopy($dest_image, $material_image, 0, 0, 0, 0, 1920, 1080);
imagedestroy($material_image);
header("Content-Disposition: Attachment;filename=pumacolorimage.png");
header('Content-type: image/png');
imagepng($dest_image);
?>
