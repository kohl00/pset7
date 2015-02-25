<?php require("../includes/links.php"); ?>
<h3><?= $title ?></h3>
<form action="quote.php" method="post">
   <fieldset>
    <div class="form-group">
       <input type="text" name="symbol" placeholder="Enter a symbol to buy"></input>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Buy</button>
    </div>
   </fieldset>
</form>
