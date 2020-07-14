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
      <th scope="col">PM</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr data-href="<?php echo site_url('fl/view/'.$p['id_pekerjaan'])?>">
        <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <?php $fl = $this->db->get_where('pm',['id' =>  $p['id_pm']])->row_array();
        ?>
        <td><?php echo $fl['nama']?></td>
        <td><?php echo $p['status']?></td>
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
