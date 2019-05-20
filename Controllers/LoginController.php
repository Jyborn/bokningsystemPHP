<?php
/**
 *
 */
class LoginController extends Controller
{
  //Hämta alla schemaCells en efter en och lägg in i en array med alla celler
  function index() {
      require(ROOT . 'Models/Login.php');
      $this->render("index");
  }

  //skapa en schemaCell
  function create() {
    require(ROOT . 'Models/Login.php');
    $cell = new SchemaCell();

    if ($cell->create()) {
      header("Location: " . WEBROOT . "Login/index.php");
    }

    $this->render("create");
  }

  public function login() {
    $user = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    //echo $user . " " .  $pass;
    $sql = "SELECT * FROM user WHERE username = :user AND password = :pass";

    $req = Database::getBdd()->prepare($sql);

    $req->execute([
        'user' => $user,
        'pass' => $pass
    ]);

    $exists = $req->fetch(PDO::FETCH_COLUMN, 0);

    if ($exists) {
      echo json_encode(array("login" => true, "username" => $user, "user_pk" => $exists[0]));
    } else {
      echo json_encode(array("login" => false));
    }

    //header("Location: " . ROOT . "/SchemaCell/index");

  }

}

 ?>
