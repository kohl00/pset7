<?php require("../includes/links.php"); ?>

<h1><?=$title ?></h1>
<table style="margin-left: auto;margin-right: auto;">
   <th>
    <tr>
        <td style="padding-right: 5px">Name:&nbsp;</td>
        <td style="padding-right: 5px">Symbol:&nbsp; </td>
        <td style="padding-right: 5px">Price:&nbsp; </td>
        <td style="padding-right: 5px">Shares:&nbsp; </td>
        <td>Total Position:&nbsp; </td>
    </tr>
   </th>
    <?php foreach($positions as $position): ?>
         <tr>
           <td style="text-align: left"><?= $position["name"]   ?></td>
           <td><?= $position["symbol"] ?></td>
           <td><?= number_format($position["price"],2)  ?></td>
           <td><?= $position["shares"] ?></td>
           <td><?= money_format('$%i',($position["shares"] * number_format($position["price"],2))) ?></td>
         </tr>  
    <?php endforeach ?>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td "><?= number_format($cash_balance[0]["cash"],2) ?></td>
    </tr>
         
</table>
<div>
    <a href="logout.php">Log Out</a>
</div>
