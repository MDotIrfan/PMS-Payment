        <!-- MAIN -->
        <div class="col">
            
            <h1>
                List User
            </h1>
            <br>
            <!-- <a href="<?php echo site_url('admin/tambahdata/')?>"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Tambah Data
        </button></a> -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">id_user</th>
      <th scope="col">level</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr>
        <th scope="row" ><?php echo $p['id']?></th>
        <td><?php echo $p['username']?></td>
        <td><?php echo $p['password']?></td>
        <td><?php echo $p['id_user']?></td>
        <td><?php echo $p['level']?></td>
        <td><a href="<?php echo site_url('admin/ubahdatauser/'.$p['id_user'])?>"><button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
        <i class="fa fa-edit"></i>
        </button></a><a href="<?php echo site_url('admin/hapususer/'.$p['id_user'])?>"><button type="button" class="btn btn-danger" data-toggle="button" aria-pressed="false" autocomplete="off">
        <i class="fa fa-trash"></i>
        </button></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

        </div>

        <script>
  document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-href]");
    
    rows.forEach(row=>{
      row.addEventListener("click", () =>{
        window.location.href = row.dataset.href;
      });
    });
  });
</script>
