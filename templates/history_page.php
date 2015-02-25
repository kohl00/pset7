<?php require("../includes/links.php"); ?>
<h2><?= $title ?></h2>
<table>
   <th>
    <tr>
        <td>Type:&nbsp;</td>
        <td>Date:&nbsp; </td>
        <td>Shares:&nbsp; </td>
        <td>Price:&nbsp; </td>
        <td>Stock Symbol:&nbsp; </td>
    </tr>
   </th>
    <?php foreach($rows as $row): ?>
         <tr>
           <td><?= $row["type"]   ?></td>
           <td><?= $row["date"] ?></td>
           <td><?= $row["shares"] ?></td>
           <td><?= money_format('$%i',($row["price"] * number_format($row["price"],2))) ?></td>
           <td><?= $row["stock symbol"] ?></td>
         </tr>  
    <?php endforeach ?>        
</table>
