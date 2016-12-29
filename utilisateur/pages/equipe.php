
<p><br/>Equipes et pilotes engagés en F1 pour la saison 2017
    <br/>Dernière mise à jour : 20/12/2016<br/></p>
<?php 
    $query="select * from vue_equipe";
    $result=pg_query($cnx,$query);
    $tab=array();
    $n=pg_num_rows($result);
    
    for($i=0;$i<$n;$i++){
        $tab[$i]=pg_fetch_array($result,$i);
    }
?>
                         
<h2>EQUIPES</h2>
<table>
<tr>
<th>PRENOMS</th>
<th>NOMS</th>
</tr>

    <?php
         for($i=0;$i<$n;$i++)
    { ?>

  <tr><td><?php echo $tab[$i]['nomequipe'];?></td>
  <td><?php echo substr($tab[$i]['nompilote'],0,500);?></td>
  <td><a href="index.php?page=equipe.php&dest= </td><?php 
  echo $tab[$i]['idequipe'];?>">
  <?php    
  }?>
  </table>