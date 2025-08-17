<fieldset class="fieldset bg-base-200 border-base-300 rounded-box min-w-100 border p-4">
  <legend class="fieldset-legend"><?php echo $fieldName; ?></legend>
  <div class="join">
    <input type="text" class="input join-item" id="<?php echo $name ?>" name="<?php echo $name ?>" placeholder="<?php echo $placeholder ?>" required autocomplete="off" />
    <button type="submit" class="btn join-item">Add <?php echo substr($title, 0, -1); ?></button>
  </div>
</fieldset>