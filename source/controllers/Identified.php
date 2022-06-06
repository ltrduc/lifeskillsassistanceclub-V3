<?php
class Identified extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | BỘ NHẬN DIỆN
  |--------------------------------------------------------------------------
  */
  function Index()
  {
    $this->viewUser("layout", ["page" => "identified", ]);
  }
}
