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
    <?php foreach ($po as $po) : ?>
      <tr>
        <th scope="row"><?php echo $po['id_po']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <td><?php echo $po['total_bayar']?></td>
        <td><?php echo $pm['nama']?></td>
        <td><?php echo $p['status']?></td>
        <td><input type="checkbox" name="id_po[]" value="<?php echo $po['id_po']?>" /></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <input type="hidden" name="tgl" value="<?php $this->load->helper('date');

$format = "%Y-%m-%d";
echo @mdate($format); ?>">
        <input type="hidden" name="id_invoice" value="<?php echo $fl['id']."-".@mdate("%m"); ?>">
        <input type="submit" name="submit" value="Buat Invoice">
        <?php echo form_close(); ?>

        </div>
