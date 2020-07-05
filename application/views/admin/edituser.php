<div class="col">
            
            <h1>
                Edit Data User
            </h1>
            <br>
           <?php echo form_open('admin/do_edituser'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="text" name="id_user" value="<?php echo $user['id_user']?>" readonly></td>
			</tr>
            <tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $user['username']?>"></td>
            </tr>
            <tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $user['password']?>"></td>
            </tr>
            <tr>
				<td>Jenis Kelamin</td>
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
				<td><input type="submit" value="Edit Data"></td>
			</tr>
		</table>
        <?php echo form_close(); ?>
        </div>
