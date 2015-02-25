<?php
    
    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
       render("register_form.php", ["title" =>"Register"]);
    }
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //TODO
        if((empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirmation"])) || ($_POST["password"] !== $_POST["confirmation"]))
        {
          apologize("Something went wrong during save. Try again.");
        }else{
            $result = query("INSERT INTO users (username,hash,cash) VALUES(?,?,10000.00)",$_POST["username"],crypt($_POST["password"]));
            if($result === false){
              apologize("Couldn't be saved to database");
            }else
              $rows = query("SELECT LAST_INSERT_ID() AS id");
              $id = $rows[0]["id"];
              $_SESSION["id"] = $id;  
              redirect("index.php");   
        }
        
    }
?>
