<?php
Require ROOT . "Views/Login/index.php";
/*
  $cells[$i][0] = cell_pk
  $cells[$i][1] = dayTime
  $cells[$i][2] = user
*/

for ($i = 0; $i < sizeOf($cells); $i++) {
  if ($i == 0 || ($i / 32) == floor($i / 32)) {
    $startOfCol = $i;
    if($i != 0) {
?>
    </div>
<?php
    }
?>
    <div id="colContainer<?php echo $i / 32?>" class="colContainer">
      <h2 class="datum"> <?php echo substr($cells[$i][1], 5, 5); ?> </h2>
<?php
  }?>
      <div class="col col<?php echo floor($i / 32)?>">
        <p id="<?php echo $cells[$i][0] ?>"
          class="<?php if($cells[$i][2] > 0) echo "booked ". $cells[$i][2] ?>">
          <?php echo substr($cells[$i][1], strrpos($cells[$i][1], " ", 0), 6);?>
          <br><?php echo $cells[$i][2] ?>
        </p>

      </div>
<?php
}?>
