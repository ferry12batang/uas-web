<?php

namespace Inc;

class Request
{
  /**
   * The data store from $_POST or $_GET
   * 
   * @since 1.0.2
   * @version 1.0.2
   * @var $data
   */
  protected static $data;
  protected static $post;
  protected static $get;

  public function __construct()
  {
    self::$data = array_merge($_GET, $_POST);
    self::$post = $_POST;
    self::$get  = $_GET;

    // foreach(self::$data as $key => $value) {
    //   self::${$key} = $value;
    // }
  }

  public function input($key = null, $default = null)
  {
    if ($key === null) return self::$post;
    return isset(self::$post[$key]) ? self::$post[$key] : $default;
  }

  /**
   * Getting all request data
   * 
   * @since 1.0.2
   * @version 1.0.2
   * @author Cak Adi <cakadi190@gmail.com>
   * @return $this
   */
  public static function all()
  {
    return self::$data;
  }

  /**
   * Getting single request data
   * 
   * @since 1.0.2
   * @version 1.0.2
   * @author Cak Adi <cakadi190@gmail.com>
   * @return $this
   */
  public function get($key = null, $default = null)
  {
    if ($key === null) return self::$get;
    return isset(self::$get[$key]) ? self::$get[$key] : $default;
  }

  /**
   * Validate request data is exist or not?
   * 
   * @since 1.0.2
   * @version 1.0.2
   * @author Cak Adi <cakadi190@gmail.com>
   * @return $this
   */
  public static function has($key)
  {
    return isset(self::$data[$key]);
  }

  /**
   * Getting single request data
   * 
   * @since 1.0.2
   * @version 1.0.2
   * @author Cak Adi <cakadi190@gmail.com>
   * @return $this
   */
  public static function only($keys)
  {
    $keys = is_array($keys) ? $keys : func_get_args();
    $filtered = [];

    foreach ($keys as $key) {
      if (isset(self::$data[$key])) $filtered[$key] = self::$data[$key];
    }

    return $filtered;
  }

  public static function except($keys)
  {
    $keys = is_array($keys) ? $keys : func_get_args();
    $filtered = self::$data;

    foreach ($keys as $key) {
      unset($filtered[$key]);
    }

    return $filtered;
  }
}
