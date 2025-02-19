<?php
/**
 * App class
 *
 * @category Controller
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\RMVC;

use App\RMVC\Route\Route;
use App\RMVC\Route\RouteDispatcher;

/**
 * App class
 */
class App
{
  /**
   * Функция запускает  все приложение
   *
   * @return void
   */
  public static function run() {
    $requestMethod = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
    $methodName = 'getRoutes'.$requestMethod;

    foreach (Route::$methodName() as $routeConfig) {
      $routeDispatcher = new RouteDispatcher($routeConfig);
      $routeDispatcher->process();
    }
  }
}
