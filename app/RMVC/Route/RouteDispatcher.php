<?php
/**
 * RouteDispatcher class
 *
 * @category Controller
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\RMVC\Route;

/**
 * RouteDispatcher class
 */
class RouteDispatcher
{
  private string $requestUri = '/';
  private array $paramMap = [];
  private array $paramRequestMap = [];
  private RouteConfig $routeConfig;

  /**
   * construct function
   *
   * @param RouteConfig $routeConfig
   */
  public function __construct($routeConfig) {
    $this->routeConfig = $routeConfig;
  }

  /**
   * @return void
   */
  public function process() {
    // Если есть строка запроса - чистим ее и строку роута
    $this->saveRequestUri();

    // Разбиваем строку роута на массив и сохраняем в новый массив позицию параметр и его название
    $this->setParamMap();

    // Разбиваем строку запроса на массив и проверяем есть ли в этом массиве позиция, как у позиции параметра. Если есть, приводим строку запроса в регулярное выражение
    $this->makeRegexpRequest();

    // Запускаем контроллер и экшен
    $this->run();
  }

  /**
   * Undocumented function
   *
   * @return void
   */
  private function saveRequestUri() {
    if ($_SERVER['REQUEST_URI'] !== '/') {
      $this->requestUri = $this->clean($_SERVER['REQUEST_URI']);
      $this->routeConfig->route = $this->clean($this->routeConfig->route);
    }
  }

  /**
   * function убирает / в начале и конце uri
   *
   * @param string $str
   * @return string
   */
  private function clean($str) {
    return preg_replace('/(^\/)|(\/$)/', '', $str);
  }

  /**
   * function
   *
   * @return void
   */
  private function setParamMap() {
    $routeArray = explode('/', $this->routeConfig->route);

    foreach ($routeArray as $paramKey => $param) {
      if (preg_match('/{.*}/', $param)) $this->paramMap[$paramKey] = preg_replace('/(^{)|(}$)/', '', $param);
    }
  }

  /**
   * function
   *
   * @return void
   */
  private function makeRegexpRequest() {
    $requestUriArray = explode('/', $this->requestUri);

    foreach ($this->paramMap as $paramKey => $param) {
      if (!isset($requestUriArray[$paramKey])) return;

      $this->paramRequestMap[$param] = $requestUriArray[$paramKey];
      $requestUriArray[$paramKey] = '{.*}';
    }

    $this->requestUri = implode('/', $requestUriArray);
    $this->prepareRegex();
  }

    /**
   * function
   *
   * @return void
   */
  private function prepareRegex() {
    $this->requestUri = str_replace('/', '\/', $this->requestUri);
  }

    /**
   * function
   *
   * @return void
   */
  private function run() {
    if (preg_match("/$this->requestUri/", $this->routeConfig->route)) {
      $this->render();
    }
  }

    /**
   * function
   *
   * @return void
   */
  private function render() {
    $classNane = $this->routeConfig->controller;
    $action = $this->routeConfig->action;
    // Передаем массив параметров через ... , т.к. их кол-во м.б. любое
    print((new $classNane())->$action(...$this->paramRequestMap));
    die;
  }
}
