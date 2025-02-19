<?php
/**
 * MainController class
 *
 * @category MainController
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\Http\Controllers;

use App\RMVC\View\View;

/**
 * MainController class
 */
class MainController extends Controller
{
  /**
   * index function
   *
   * @return void
   */
  public function index() {
    return View::view('main');
  }
}
