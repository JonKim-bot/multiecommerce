<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Models\AdminModel;
use CodeIgniter\Controller;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url', 'form', 'infector', 'session'];

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();

        $session = session();
        $uri = service('uri');

        $this->AdminModel = new AdminModel();

    }

    public function hash($password)
    {

        $salt = rand(111111, 999999);
        $password = hash("sha512", $salt . $password);

        $hash = array(
            "salt" => $salt,
            "password" => $password,
        );

        return $hash;
    }

    public function debug($data)
    {

        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();

    }

    public function checkExists($username, $exclude_id = "")
    {

        $where = array(
            "username" => $username,
        );

        if ($exclude_id == "") {

            $admin = $this->AdminModel->getWhere($where);

            if (empty($admin) and empty($user)) {

                return false;

            } else {
                return true;
            }

        } else if ($exclude_id != "") {
            $admin = $this->AdminModel->getWhereAndPrimaryIsNot($where, $exclude_id);

            if (empty($admin) and empty($user)) {

                return false;

            } else {

                return true;
            }
        }

    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function show404(){
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}
