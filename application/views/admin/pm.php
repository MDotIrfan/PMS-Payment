        <!-- MAIN -->
        <div class="col">
            
            <h1>
                List Project Manager
            </h1>
            <?= $this->session->flashdata('message');
            ?>
            <br>
            <a href="<?php echo site_url('admin/tambahdatapm/')?>"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Tambah Data
        </button></a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama PM</th>
      <th scope="col">Email PM</th>
      <th scope="col">Foto</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr data-href="<?php echo site_url('admin/profilepm/'.$p['id'])?>">
        <th scope="row" ><?php echo $p['id']?></th>
        <td><?php echo $p['nama']?></td>
        <td><?php echo $p['email_pm']?></td>
        <td><img src="<?php echo base_url()."/images/".$p['foto'];?>" style="height: 100px; width: 100px; object-fit: cover;"alt=""/></td>
        <td><a href="<?php echo site_url('admin/ubahdatapm/'.$p['id'])?>"><button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
        <i class="fa fa-edit"></i>
        </button></a><a href="<?php echo site_url('admin/hapuspm/'.$p['id'])?>"><button type="button" class="btn btn-danger" data-toggle="button" aria-pressed="false" autocomplete="off">
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
