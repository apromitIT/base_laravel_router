<?php
/**
 * RouteConfig class
 *
 * @category Controller
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\RMVC\Route;

/**
 * RouteConfig class
 */
class RouteConfig
{
  public string $route;
  public string $controller;
  public string $action;
  public string $name;
  public string $middleware;

  /**
   * RouteConfig constructor
   *
   * @param String $route
   * @param String $controller
   * @param String $action
   */
  public function __construct($route, $controller, $action) {
    $this->route = $route;
    $this->controller = $controller;
    $this->action = $action;
  }

  /**
   * RouteConfig name
   *
   * @param String $name
   * @return RouteConfig
   */
  public function name($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * RouteConfig name
   *
   * @param String $middleware
   * @return RouteConfig
   */
  public function middleware($middleware) {
    $this->middleware = $middleware;

    return $this;
  }
}
