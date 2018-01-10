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

    function __construct () {

        define("URI", $_SERVER['REQUEST_URI']);
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);

    }

    function require ($path) {

        require ROOT . $path;

    }

    function start () {

        $route = explode('/', URI);

        $route[1] = ucfirst($route[1]);

        if (file_exists(ROOT . '/app/controllers/' . $route[1] . '.php')) {
            $this->require('/app/controllers/' . $route[1] . '.php');
            $controller = new $route[1]();
        } else {
            $this->require('/app/controllers/Main.php');
            $main = new Main();
        }

    }
    
}

?>