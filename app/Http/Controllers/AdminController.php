<?php
/**
 * AdminController class
 *
 * @category AdminController
 * @version 1.0
 * @author Apromit <apromit@apromit.ru>
 */

namespace App\Http\Controllers;

use App\RMVC\Route\Route;
use App\RMVC\View\View;

/**
 * AdminController class
 */
class AdminController extends Controller
{
  /**
   * index function
   *
   * @return void
   */
  public function index() {
    return View::view('admin.index');
  }

  /**
   * showUser function
   *
   * @param mixed $user
   * @return string
   */
  public function showUser($user) {
    //
    return View::view('admin.show', compact('user'));
  }

  /**
   * store function
   *
   * @return void
   */
  public function store() {
    $_SESSION['message'] = isset($_POST['title']) ? $_POST['title'] : 'none';
    Route::redirect('/admin');
  }
}
