        <!-- MAIN -->
        <div class="col">
            
            <h1>
                Menunggu PO
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Task Name</th>
      <th scope="col">Total Kata</th>
      <th scope="col">PM</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr>
        <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <td><?php echo $p['total_kata']?></td>
        <td><?php echo $p['id_pm']?></td>
        <td><?php echo $p['status']?></td>
        <td></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

        </div>
