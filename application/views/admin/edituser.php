<div class="col">
            
            <h1>
                Edit Data User
            </h1>
            <br>
           <?php echo form_open('admin/do_edituser/'.$user['id_user']); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="text" name="id_user" value="<?php echo $user['id_user']?>" readonly></td>
			</tr>
            <tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $user['username']?>"><?php echo form_error('username');?></td>
            </tr>
            <tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $user['email']?>"><?php echo form_error('email');?></td>
            </tr>
            <tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo $user['password']?>"><?php echo form_error('password');?></td>
            </tr>
            <tr>
				<td>Level User</td>
				<td><select name="level">
                    <option value="admin" <?php if ( $user['level'] === 'admin') { 
                            echo 'selected'; } ?>>Admin</option>
                    <option value="fl" <?php if ( $user['level'] === 'fl') { 
                            echo 'selected'; } ?>>Freelance</option>
                    <option value="pm" <?php if ( $user['level'] === 'pm') { 
                            echo 'selected'; } ?>>Project Manager</option>
                    <option value="finance" <?php if ( $user['level'] === 'finance') { 
                            echo 'selected'; } ?>>Finance</option>
</select></td>
            </tr>
			<tr>
				<td></td>
				<td><button type="button" class="btnmodal" data-toggle="modal" data-target="#exampleModal">
  Edit Data
</button></td>
			</tr>
                </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Mengubah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" style="padding: 10px; margin-bottom: 6px;" value="Ubah Data">
      </div>
    </div>
  </div>
</div>
        <?php echo form_close(); ?>
        </div>
