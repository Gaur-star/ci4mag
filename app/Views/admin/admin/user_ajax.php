<select name="author" class="form-control">
<?php foreach($user as $author){?>
        <option value="<?php echo $author['user_name'];?>">&nbsp;<?php echo $author['user_name'];?></option>
      <?php } ?>
      <option value="Admin">&nbsp;Admin</option>
				<option value="User">&nbsp;User</option>
      </select>