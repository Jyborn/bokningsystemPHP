<?php
Require ROOT . "Views/Login/index.php";
loginPopUp();
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
    <div id="colContainer<?php echo $i / 32?>">
<?php
  }?>
      <div class="col col<?php echo floor($i / 32)?>">
        <p id="<?php echo $cells[$i][0] ?>"
          class="<?php if($cells[$i][2] > 0) echo "booked" ?>">
          <?php echo $cells[$i][1];?>
          <br><?php echo $cells[$i][2] ?>
        </p>

      </div>
<?php
}?>
