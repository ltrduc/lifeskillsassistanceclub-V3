<?php
class Home extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | TRANG CHỦ NGƯỜI DÙNG
  |--------------------------------------------------------------------------
  */
  function Index()
  {
    $this->viewUser("layout", ["page" => "home", ]);
  }
}
