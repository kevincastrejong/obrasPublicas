<?php

$id = 1;

$sel = $con->prepare("SELECT * FROM mitabla WHERE id=?");
$sel->bind_param('i',$id);
$sel->execute();

//resultado
$res = $sel->get_result();
?>

<table>
  <th>id estado</th>
  <th>nombre estado</th>
  <?php while($f = $res->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $f['id'];?></td>
      <td><?php echo $f['estado'];?></td>
    </tr>
  <?php }
  $sel->close();
  $con->close();
  ?>
</table>


<!-- forma dos -->
<?php

$id = 1;

$sel = $con->prepare("SELECT id,estado FROM mitabla WHERE id=?");
$sel->bind_param('i',$id);
$sel->execute();

//resultado
$sel->bind_result($id,$estado);
?>

<table>
  <th>id estado</th>
  <th>nombre estado</th>
  <?php while($f = $res->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $f[$id];?></td>
      <td><?php echo $f[$estado];?></td>
    </tr>
  <?php }
  $sel->close();
  $con->close();
  ?>
</table>
