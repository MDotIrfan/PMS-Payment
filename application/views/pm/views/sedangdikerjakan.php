        <!-- MAIN -->
        <div class="col">
           <br> 
            <h1>
                Sedang Dikerjakan
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Task Name</th>
      <th scope="col">Fl</th>
      <th scope="col">Pekerjaan Selesai</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr data-href="<?php echo site_url('pm/view/'.$p['id_pekerjaan'])?>">
      <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <?php $fl = $this->db->get_where('freelance',['id' =>  $p['id_fl']])->row_array();
        ?>
        <td><?php echo $fl['nama']?></td>
        <td> <a href="<?php echo base_url(); ?>uploads/<?php echo $p['file_asal'] ?>"><?php echo $p['file_asal'] ?></a> <br></td>
        <td><?php echo $p['status']?></td>
        <td></td>
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
