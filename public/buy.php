<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    if($_SESSION["id"] !== NULL){
       if($_SERVER["REQUEST_METHOD"] == "GET"){
           // $user = $_SESSION["id"];
        render("buy_form.php", ["title" => "Buy Form!!!"]);
      }
      else if($_SERVER["REQUEST_METHOD"] == "POST"){
         $shs = $_POST["shares"];
         $price = $_POST["price"];
         $symbol = strtoupper($_POST["symbol"]);
         $user = $_SESSION["id"];
         $current_cash = query("SELECT `cash` FROM `users` WHERE id = (?)", $user);
      
         if(($shs <= 0) || ($symbol == '') || !(preg_match("/^\d+$/", $shs))){
            apologize("Please make sure you enter a valid symbol & share amout.");
         }else if(($shs*$price) > $current_cash){
             apologize("Insufficient funds.");
         }else{ 
            //buy shares
            $purchase = query("INSERT INTO `Portfolio`(`id`, `symbol`, `shares`, `transaction`, `transType`) VALUES ((?),(?),(?),NOW(),(?)) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",$user,$symbol,$shs,"BUY"); 
            $cost = query("UPDATE users SET cash = cash - (?) WHERE id = (?)",($shs*$price),$user);
            $history = query("INSERT INTO `history`(`id`, `type`, `date`, `shares`, `price`, `stock symbol`) VALUES ((?),(?),NOW(),(?),(?),(?))", $user,"BUY",$shs,$price,$symbol);
            if(($purchase !== false && $cost !== false && $history !== false)){
                 redirect("index.php");
            }else{
               apologize("Something went wrong during the transaction. Sorry!");   
            }
         }
      }
     }
?>
