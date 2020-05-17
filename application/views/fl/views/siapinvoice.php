        <!-- MAIN -->
        <div class="col">
            
            <h1>
                Siap Invoice
            </h1>
            <br>
            <?php echo form_open(base_url().'fl/inputinvoice'); ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID PO</th>
      <th scope="col">Task Name</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">PM</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $query = $this->db->query("SELECT * FROM po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and f.id ="."'".$this->session->userdata('id_user')."' and p.status='Siap Invoice'");
    foreach ($query->result_array() as $po) : ?>
      <tr data-href="<?php echo site_url('pm/view/'.$po['id_pekerjaan'])?>">
        <th scope="row"><?php echo $po['id_po']?></th>
        <td><?php echo $po['nama_pekerjaan']?></td>
        <td><?php echo $po['total_bayar']?></td>
        <td><?php echo $po['nama']?></td>
        <td><?php echo $po['status']?></td>
        <td><input type="checkbox" name="id_po[]" value="<?php echo $po['id_po']?>" /></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <input type="hidden" name="tgl" value="<?php $this->load->helper('date');

$format = "%Y-%m-%d";
echo @mdate($format); ?>">
        <input type="hidden" name="id_invoice" value="<?php echo "I-".@mdate('%m%d%h%i%a'); ?>">
        <?php if(count($query->result_array())!=0) {?>
        <input type="submit" name="submit" value="Buat Invoice">
        <?php } ?>
        <?php echo form_close(); ?>

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