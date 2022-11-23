<!DOCTYPE html>
<html lang="en">

<body>xxxxxxxxxx
    <h1>Inventario de Productos</h1>
    <table>
      <?php foreach ($products as $item): ?>
      <tr>
        <td>Identificador: <?= $item[0] ?></td>
        <td>Descripcion:   <?= $item[1] ?> </td>
        <td>Ver detalle </td>      

      </tr>
      <?php endforeach; ?>
    </table>    
</body>
</html>