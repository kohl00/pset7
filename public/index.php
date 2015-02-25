<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    if($_SESSION["id"] !== NULL){
        $user = $_SESSION["id"];
        $positions = [];
        $rows = query("SELECT `symbol`,`shares` FROM `Portfolio` WHERE id = (?)", $user);
        $current_cash = query("SELECT `cash` FROM `users` WHERE id = (?)", $user);
        foreach($rows as $row){
          $result = lookup($row["symbol"]);
          $result["shares"] = $row["shares"];
          array_push($positions,$result);
        }
        render("portfolio.php", ["positions" => $positions, "cash_balance" => $current_cash, "title" => "My Portfolio"]);
      }
?>
