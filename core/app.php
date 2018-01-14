<?php

/*
 *   Date: 2017-06-01
 * Author: Dawid Yerginyan
 */

/*
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", getcwd() . DS);
define("APP_PATH", ROOT . 'application' . DS);
define("FRAMEWORK_PATH", ROOT . "framework" . DS);
define("PUBLIC_PATH", ROOT . "public" . DS);
*/

class App {

    private $config = [];

    public $db;

    function __construct () {

        define("URI", $_SERVER['REQUEST_URI']);
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);

    }

    function config () {

        $this->require('/core/config/session.php');
        $this->require('/core/config/database.php');

        try {

            $this->db = new PDO('mysql:host=' . $this->config['database']['hostname'] . ';dbname=' . $this->config['database']['dbname'],
                                $this->config['database']['username'], 
                                $this->config['database']['password']);
            
            // TODO: Remove for production
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            echo 'Błąd połączenia: ' . $e->getMessage();

        }

    }

    function require ($path) {

        require ROOT . $path;

    }

    function start () {

        session_name($this->config['sessionName']);
        session_start();

        $route = explode('/', URI);

        $route[1] = strtolower($route[1]);

        if (file_exists(ROOT . '/app/controllers/' . $route[1] . '.php')) {
            $this->require('/app/controllers/' . $route[1] . '.php');
            $controller = new $route[1]();
        } else {
            $this->require('/app/controllers/main.php');
            $main = new Main();
        }

    }
    
}

?>