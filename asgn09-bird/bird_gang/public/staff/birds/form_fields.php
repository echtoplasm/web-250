<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($bird)) {
  redirect_to(url_for('/staff/birds/index.php'));
}
?>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="bird[common_name]" value="<?php echo h($bird->common_name); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd>
    <select name="bird[habitat]">
      <option value=""></option>
    <?php foreach(Bird::HABITATS as $habitat) { ?>
      <option value="<?php echo $habitat; ?>" <?php if($bird->habitat == $habitat) { echo 'selected'; } ?>><?php echo $habitat; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd>
    <select name="bird[food]">
      <option value=""></option>
    <?php foreach(Bird::FOOD_TYPES as $food) { ?>
      <option value="<?php echo $food; ?>" <?php if($bird->food == $food) { echo 'selected'; } ?>><?php echo $food; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Conservation Status</dt>
  <dd>
    <select name="bird[conservation_id]">
      <option value=""></option>
    <?php foreach(Bird::CONSERVATION_OPTIONS as $status_id => $status_name) { ?>
      <option value="<?php echo $status_id; ?>" <?php if($bird->conservation_id == $status_id) { echo 'selected'; } ?>><?php echo $status_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><textarea name="bird[backyard_tips]" rows="5" cols="50"><?php echo h($bird->backyard_tips); ?></textarea></dd>
</dl>
