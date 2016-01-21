<table border="1">
  <thead>
    <th>ID</th>
    <th>NOMBRE</th>        
    <th>NOMBRE DE USUARIO</th>
  </thead>
  <tbody>
    <?php foreach($this->users as $user):?>
    <tr>
      <td><?php echo $user->id?></td>
      <td><?php echo $user->name?></td>
      <td><?php echo $user->username?></td>
      <?php endforeach;?>
    </tr>
  </tbody>
</table>

<div class="author">MVC by: <br><?php echo AUTHOR;?></div>
