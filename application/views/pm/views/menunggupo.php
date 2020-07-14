        <!-- MAIN -->
        <div class="col">
            <br>
            <h1>
                Menunggu PO
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Task Name</th>
      <th scope="col">PM</th>
      <th scope="col">File Pekerjaan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr data-href="<?php echo site_url('pm/view/'.$p['id_pekerjaan'])?>">
        <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <?php $fl = $this->db->get_where('pm',['id' =>  $p['id_pm']])->row_array();?>
        <td><?php echo $fl['nama']?></td>
        <td> <a href="<?php echo base_url(); ?>uploads/<?php echo $p['file_selesai'] ?>"><?php echo $p['file_selesai'] ?></a> <br></td>
        <td><?php if($p['status']=='Menunggu PO'){?><a href="<?php echo site_url('pm/buatpo/'.$p['id_pekerjaan'])?>"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Buat Purchase Order
        </button></a><?php } ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

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

        </div>
