<?php require("../includes/links.php"); ?>

<h1><?=$title ?></h1>
<table>
   <th>
    <tr>
        <td>Name:&nbsp;</td>
        <td>Symbol:&nbsp; </td>
        <td>Price:&nbsp; </td>
        <td>Shares:&nbsp; </td>
        <td>Total Position:&nbsp; </td>
    </tr>
   </th>
    <?php foreach($positions as $position): ?>
         <tr>
           <td><?= $position["name"]   ?></td>
           <td><?= $position["symbol"] ?></td>
           <td><?= number_format($position["price"],2)  ?></td>
           <td><?= $position["shares"] ?></td>
           <td><?= money_format('$%i',($position["shares"] * number_format($position["price"],2))) ?></td>
         </tr>  
    <?php endforeach ?>
    <tr>
        <td "><?= number_format($cash_balance[0]["cash"],2) ?></td>
    </tr>
         
</table>
<div>
    <a href="logout.php">Log Out</a>
</div>
