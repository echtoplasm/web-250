<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'Bird Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<div id="main">
  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Bird Inventory</h2>
      <p>Discover local birds in your area.</p>
      <p>Learn about their habitat, diet, and conservation status.</p>
    </div>
    <table id="inventory">
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation Status</th>
        <th>&nbsp;</th>
      </tr>
<?php
$birds = Bird::find_all();
?>
      <?php foreach($birds as $bird) { ?>
      <tr>
        <td><?php echo h($bird->common_name); ?></td>
        <td><?php echo h($bird->habitat); ?></td>
        <td><?php echo h($bird->food); ?></td>
        <td><?php echo h($bird->conservation()); ?></td>
        <td><a href="detail.php?id=<?php echo $bird->id; ?>">View</a></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>
<?php include(SHARED_PATH . '/public_footer.php'); ?>
