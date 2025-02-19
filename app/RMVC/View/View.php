<?php
/**
 * View class
 *
 * @category Controller
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\RMVC\View;

/**
 * View class
 */
class View
{
  private static $path;
  private static ?array $data;

  /**
   * function возвращает темплейт
   *
   * @param String $viewName Название темплейта
   * @param Array  $data     Переменные из контроллера
   * @return string
   */
  public static function view($viewName, $data = []) {
    self::$data = $data;
    // путь до темплейта
    $path = str_replace('public', 'resourses/views/', $_SERVER['DOCUMENT_ROOT']);
    self::$path = $path.str_replace('.', '/', $viewName).'.php';

    return self::getContent();
  }

  /**
   * function возвращает контент темплейта
   *
   * @return string
   */
  private static function getContent() {
    // Превращаем ключи в названия переменных
    extract(self::$data);
    // Открыли буфер
    ob_start();
    // Добавили и сохранили всё из файла по пути
    include self::$path;
    $html = ob_get_contents();
    // Завершили и закрыли буфер
    ob_end_clean();

    return $html;
  }
}
