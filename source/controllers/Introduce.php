<?php
class Introduce extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | GIỚI THIỆU CLB
  |--------------------------------------------------------------------------
  */
  function Index()
  {
    $this->viewUser("layout", ["page" => "introduce", ]);
  }
}
