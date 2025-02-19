<?php
/**
 * Route class
 *
 * @category Controller
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\RMVC\Route;

/**
 * Route class
 */
class Route
{
  private static array $routesGet = [];
  private static array $routesPost = [];

  /**
   * @return array
   */
  public static function getRoutesGet() {
    return self::$routesGet;
  }

  /**
   * @return array
   */
  public static function getRoutesPost() {
    return self::$routesPost;
  }

  /**
   * Get
   *
   * @param String $route
   * @param Array  $controller
   * @return RouteConfig
   */
  public static function get($route, $controller) {
    $routeConfig = new RouteConfig($route, $controller[0], $controller[1]);
    self::$routesGet[] = $routeConfig;

    return $routeConfig;
  }

  /**
   * POST
   *
   * @param String $route
   * @param Array  $controller
   * @return RouteConfig
   */
  public static function post($route, $controller) {
    $routeConfig = new RouteConfig($route, $controller[0], $controller[1]);
    self::$routesPost[] = $routeConfig;

    return $routeConfig;
  }

  /**
   * REDIRECT
   *
   * @param String $url
   * @return RouteConfig
   */
  public static function redirect($url) {
    header('Location: '.$url);
  }
}
