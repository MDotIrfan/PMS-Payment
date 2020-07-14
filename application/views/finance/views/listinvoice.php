<div class="col">
            
            <h1>
                List Invoice
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Total</th>
      <th scope="col">PM-FL</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($invoice as $p) : ?>
      <tr data-href="<?php echo site_url('finance/view/'.$p['id_invoice'])?>">
        <th scope="row"><?php echo $p['id_invoice']?></th>
        <td><?php echo $p['wc_xtranslated'] + $p['wc_repetition'] + $p['wc_fuzzy100'] + $p['wc_fuzzy95'] + $p['wc_fuzzy85'] + $p['wc_fuzzy75'] + $p['wc_fuzzy50'] + $p['wc_nomatch']?></td>
        <?php $fl = $this->db->get_where('freelance',['id' =>  $p['id_fl']])->row_array();
            $pm = $this->db->get_where('pm',['id' =>  $p['id_pm']])->row_array()
        ?>
        <td><?php echo $pm['nama']."-".$fl['nama'];?></td>
        <td><?php echo $p['tgl'];?></td>
        <td><?php if($p['status']=="Sudah Invoice"){echo "Belum Pembayaran";} else {echo "Selesai Pembayaran";}?></td>
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