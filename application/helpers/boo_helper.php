<?php

if ( ! function_exists('date2bd')){
  function date2db($date){
    $data = explode("/", $date);
    $data = $data[2] . '-' . $data[1] . '-' . $data[0];
    return $data;
  }
}

if ( ! function_exists('date2print')){
  function date2print($date){
    $data = explode("-", $date);
    $data = $data[2] . '/' . $data[1] . '/' . $data[0];
    return $data;
  }
}

function db_safe($valor, $num = 0) {
  if(!$num){
    return addslashes(urldecode($valor));
  }else{
    if(is_numeric($valor)){
      return $valor;
    }else{
      return false;
    }
  }
}

function base64url_encode($data) {
  $return = rtrim(strtr(base64_encode($data), '+/', '-_'), '=');;
  for ($i=0; $i < 5; $i++) {
    $return = rtrim(strtr(base64_encode($return), '+/', '-_'), '=');
  }
  return $return;
}

function base64url_decode($data) {
  $return = base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  for ($i=0; $i < 5; $i++) {
    $return = base64_decode(str_pad(strtr($return, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }

  return $return;
}

function array_sort($array, $on, $order=SORT_ASC){
  $new_array = array();
  $sortable_array = array();

  if (count($array) > 0) {
      foreach ($array as $k => $v) {
          if (is_array($v)) {
              foreach ($v as $k2 => $v2) {
                  if ($k2 == $on) {
                      $sortable_array[$k] = $v2;
                  }
              }
          } else {
              $sortable_array[$k] = $v;
          }
      }

      switch ($order) {
          case SORT_ASC:
              asort($sortable_array);
          break;
          case SORT_DESC:
              arsort($sortable_array);
          break;
      }

      foreach ($sortable_array as $k => $v) {
          $new_array[$k] = $array[$k];
      }
  }

  return $new_array;
}

function slugify($text){
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}

function sem_acentos($string){
  $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
  $to = "aaaaeeiooouucAAAAEEIOOOUUC";
           
  $keys = array();
  $values = array();
  preg_match_all('/./u', $from, $keys);
  preg_match_all('/./u', $to, $values);
  $mapping = array_combine($keys[0], $values[0]);
  return strtr($string, $mapping);
}
