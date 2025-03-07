<?php

class Route
{
  private static array $routes = [];

  public static function get(string $path, array $controller)
  {
     self::$routes["GET"][$path] = $controller;
  }

  public static function post(string $path, array $controller)
  {
     self::$routes["POST"][$path] = $controller;
  }

  public static function patch(string $path, array $controller)
  {
     self::$routes["PATCH"][$path] = $controller;
  }

  public static function DELETE(string $path, array $controller)
  {
     self::$routes["DELETE"][$path] = $controller;
  }

  public static function dispatch(string $method, string $uri)
  {

    $method = strtoupper($method);
    $uri = parse_url($uri, PHP_URL_PATH);

    if(isset(self::$routes[$method][$uri])){
      [$controller, $method] = self::$routes[$method][$uri];

      if(class_exists($controller) && method_exists($controller, $method)){
        $instance = new $controller();
        call_user_func([$instance, $method]);
      } else {
        http_response_code(500);
        echo "Controller or method not found";
      }
    } else {
      http_response_code(404);
      echo "Page Not Found";
    }
  } 

}