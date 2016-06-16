<?php

function get_value($value)
{
  $params = array_merge($_POST, $_GET);

  return isset($params[$value]) && !empty($params[$value]) ? $params[$value] : NULL;
}

function h($str)
{
  return html_escape($str);
}

function html_escape($str)
{
  return htmlentities($str, ENT_QUOTES, "UTF-8");
}