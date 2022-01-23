<?php
class Session
{
  public static function init()
  {
    if (version_compare(phpversion(), '5.4.0', '<')) {
      if (session_id() == '') {
        session_start();
      }
    } else {
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    }
  }

  public static function set($key, $val)
  {
    $_SESSION[$key] = $val;
  }

  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }

  public static function checkSession()
  {
    self::init();
    if (self::get("login") == false) {
      self::destroy();
      echo '<script>window.location="/../Auth/Login"</script>';
    }
  }

  public static function checkLogin()
  {
    self::init();
    if (self::get("login") == true) {
      echo '<script>window.location="/../Admin/Home"</script>';
    }
  }

  public static function destroy()
  {
    session_destroy();
    echo '<script>window.location="/../Auth/Login"</script>';
  }
}
