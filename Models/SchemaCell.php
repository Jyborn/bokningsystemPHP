<?php
class SchemaCell extends Model {

    private $cells = [];

    public function create($dayTime) {
        echo "create cell " . $dayTime;
        $sql = "INSERT INTO booking (dayTime, user_fk) VALUES (:dayTime, :user_fk)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'dayTime' => $dayTime,
            'user_fk' => 0
        ]);

    }

    public function addSchemaCellToAllCells($dayTime) {
        $sql = "SELECT pk, dayTime, user_fk FROM booking WHERE dayTime = '" . $dayTime ."'";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetch();
        //echo "<br>";
        //print_r($data);
        array_push($this->cells, $data);
    }

    public function showAllSchemaCells() {
      //print_r($this->cells);
      return $this->cells;
    }

}
?>
