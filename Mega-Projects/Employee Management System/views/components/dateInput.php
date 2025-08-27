<div>
  <label for="<?php echo $date; ?>" class="block text-gray-400 mb-2 text-[12px] md:text-sm">
    <?php echo ucwords(str_replace("_", " ", $date)); ?>
  </label>

  <input type="date" name="<?php echo $date; ?>" id="<?php echo $date; ?>" class="block w-full form-field p-2 border border-gray-700">
</div>