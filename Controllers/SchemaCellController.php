<?php
class SchemaCellController extends Controller {

    //Hämta alla schemaCells en efter en och lägg in i en array med alla celler
    function index() {
        require(ROOT . 'Models/SchemaCell.php');
        /*
        $action = $_POST['action'];
        $user = $_POST['username'];
        $cellpk = $_POST['cell_pk'];

        if ($action == "bookCell"){
          bookSchemaCell($user, $cellpk);
        }
        */
        $cell = new SchemaCell();

        $day = date('w');
        $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
        for ($i = 0; $i < 7; $i++) {
          $week_start = date('Y-m-d', strtotime($week_start . "+1 days"));
        //  echo "weekstart2 " . $week_start;
          for ($j = 7;  $j < 23; $j++) {
            for ($k = 0; $k < 2; $k++) {
              if ($k == 0) {
                if ($j < 10) {
                  $dateTime = $week_start . " 0" . $j . ":00:00";
                } else {
                  $dateTime = $week_start . " " . $j . ":00:00";
                }
              } else {
                if ($j < 10) {
                  $dateTime = $week_start . " 0" . $j . ":30:00";
                } else {
                  $dateTime = $week_start . " " . $j . ":30:00";
                }
              }
              //$cell->create($dateTime);
              $cell->addSchemaCellToAllCells($dateTime);
            }
          }
        }
        //Skicka vidare alla celler till view
        $d['cells'] = $cell->showAllSchemaCells();
        $this->set($d);
        $this->render("index");

    }

    //skapa en schemaCell
    function create() {
      require(ROOT . 'Models/SchemaCell.php');

      $cell = new SchemaCell();

      if ($cell->create($dateTime)) {
        header("Location: " . WEBROOT . "SchemaCells/index.php");
      }

        $this->render("create");
    }

    public function bookSchemaCell() {
      echo "BookSchemaCell";
      $user = $_POST['username'];
      $cell_pk = $_POST['cell_pk'];

        $sql = "UPDATE booking SET user_fk = :user WHERE pk = :cellpk";

        $req = Database::getBdd()->prepare($sql);

        $req->execute([
            'user' => $user,
            'cellpk' => $cell_pk
        ]);

        echo json_encode(array("booked" => true));
    }
}
?>
