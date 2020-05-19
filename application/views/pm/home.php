        <!-- MAIN -->
        <div class="col">
<br>
<div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card bg" >Sedang Dikerjakan</span></div>
                <div class="text-info text-center mt-3"><h4></h4></div>
                <div class="text-info text-center mt-2"><h1><?php echo count($psd)?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card">Menunggu PO</div>
                <div class="text-success text-center mt-3"><h4></h4></div>
                <div class="text-success text-center mt-2"><h1><?php echo count($pmp)?></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" >Siap Invoice</div>
                <div class="text-danger text-center mt-3"></div>
                <div class="text-danger text-center mt-2"><h1><?php echo count($psi)?></h1></div>
            </div>
        </div>
     </div>

        </div>
