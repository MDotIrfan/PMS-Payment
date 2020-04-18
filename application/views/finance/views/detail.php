<div class="col">
<h1><?php echo $pekerjaan['nama_pekerjaan'] ?></h1> <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Lakukan Pembayaran
        </button>
<hr>
<p>
<embed width="600" height="450" src="<?php echo base_url(); ?>files/contoh_invoice.pdf" type="application/pdf"></embed>
<embed width="600" height="450" src="<?php echo base_url(); ?>files/contoh_po.pdf" type="application/pdf"></embed>
</p>
</div>