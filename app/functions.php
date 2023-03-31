<?php

function redirect($url)
{
  header("Location: $url");
}
function view($name, $model = '')
{
  global $view_bag;
  require(APP_PATH . "views/layout.view.php");
}


function is_post()
{
  return $_SERVER['REQUEST_METHOD'] === "POST";
}
function is_get()
{
  return $_SERVER['REQUEST_METHOD'] === "GET";
}

function sanitize($value)
{
  $temp = filter_var(trim($value), FILTER_UNSAFE_RAW);
  if ($temp === false) {
    return '';
  }
  return $temp;
}

function authenticate_user($email, $password)
{
  $user = Data::get_user($email);
  if (empty($user)) {
    return false;
  } else {
    if ($user->email == $email && $user->password == $password) {
      return $user;
    }
  }
}
function is_user_authenticated()
{
  return isset($_SESSION['email']);
}
function ensure_user_is_authenticated()
{
  if (!is_user_authenticated()) {
    redirect('login.php');
    die();
  }
}
function is_user_authorised($role)
{
  ensure_user_is_authenticated();
  if ($role === "SuperAdmin") {
    redirect('admin/index.php');
  } else {
    redirect("user.php");
  }
}
function is_user_allowed($role)
{
  ensure_user_is_authenticated();
  if ($role === "SuperAdmin") {
    return true;
  }
}