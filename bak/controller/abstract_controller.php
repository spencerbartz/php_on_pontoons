<?php
  abstract class AbstractController {

    public static function render($filename) {
      $filetext = AbstractController::render_php_to_str($filename);
      echo $filetext;
    }

    private function render_php_to_str($file, $vars=null) {
      if (is_array($vars) && !empty($vars)) {
        extract($vars);
      }

      ob_start();
      include $file;
      return ob_get_clean();
    }

    public static function to_string() {
      return "Error abstract base class instantiated";
    }

    public static function process_request() {
      $parts = explode(SLASH, pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));

      $controller_name = count($parts) === 1 ? "Home" : ucfirst($parts[0]);
      $controller_name .= "Controller";

      if($controller_name !== "HomeController") {
        die("in process_request");
      }

      if($controller_name !== get_called_class()) {
        return;
      }

      $controller = new $controller_name();
      $action = isset($parts[1]) ? $parts[1] : "index";
      $id = isset($_GET["id"]) ? $_GET["id"] : NULL;

      $controller->$action($id);
    }
  }
?>