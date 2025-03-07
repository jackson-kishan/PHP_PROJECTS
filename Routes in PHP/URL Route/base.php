<?php

class Route
{

  private static array $routes = [];

  public static function get(string $path, callable $callback)
  {
    self::$routes['GET'][$path] = $callback;
  }

  public static function post(string $path, callable $callback)
  {
    self::$routes['POST'][$path] = $callback;
  }

  public static function patch(string $path, callable $callback)
  {
    self::$routes['PATCH'][$path] = $callback;
  }

  public static function DELETE(string $path, callable $callback)
  {
    self::$routes['DELETE'][$path] = $callback;
  }
  
  public static function dispatch(string $method, string $uri)
  {
    
    $method = strtoupper($method);
    $uri = parse_url($uri, PHP_URL_PATH);

    if(isset(self::$routes[$method][$uri])){
      call_user_func(self::$routes[$method][$uri]);
    } else {
      http_response_code(404);
      echo "404 Page not found";
    }
  }
}

// Route::get('/home', function (){
//      echo "Hello from Home";
// });