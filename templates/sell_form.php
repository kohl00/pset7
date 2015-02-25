<?php require("../includes/links.php"); ?>
<h3><?= $title ?></h3>
<form action="sell.php" method="post">
   <fieldset>
    <div class="form-group">
        <select name="soldPosition">
         <?php foreach($stocks as $stock): ?>
            <option name="<?php echo $stock["symbol"] ?>" ><?php echo $stock["symbol"]?></option>
         <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default" <?= count($stocks) <= 0 ? "disabled" : "" ?>>Sell</button>
    </div>
   </fieldset>
</form>
