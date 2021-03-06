        <!-- MAIN -->
        <div class="col">
            
            <h1>
                Siap Invoice
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID PO</th>
      <th scope="col">Task Name</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">FL</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $query = $this->db->query("SELECT * FROM po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and pm.id ="."'".$this->session->userdata('id_user')."' and p.status='Siap Invoice'");
    foreach ($query->result_array() as $po) : ?>
      <tr>
        <th scope="row"><a href="<?php echo base_url(); ?>uploads/<?php echo $po['id_po'] ?>.pdf"><?php echo $po['id_po']?></a></th>
        <td><?php echo $po['nama_pekerjaan']?></td>
        <td><?php echo $po['total_bayar']?></td>
        <?php $fl = $this->db->get_where('freelance',['id' =>  $po['id_fl']])->row_array();?>
        <td><?php echo $fl['nama']?></td>
        <td><?php echo $po['status']?></td>
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