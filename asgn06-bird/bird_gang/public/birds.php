<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'Bird Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Bird Database</h2>
      <p>Explore our collection of backyard birds.</p>
      <p>Learn about their habitats, diets, and how to attract them to your yard.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Common Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation Status</th>
        <th>Backyard Tips</th>
      </tr>

      <?php
      $sql = "SELECT * FROM birds";
      $result = $database->query($sql);
      
      while($row = $result->fetch_assoc()) {
        $bird = new Bird($row);
      ?>
        <tr>
          <td><?php echo h($bird->common_name); ?></td>
          <td><?php echo h($bird->habitat); ?></td>
          <td><?php echo h($bird->food); ?></td>
          <td><?php echo h($bird->conservation()); ?></td>
          <td><?php echo h($bird->backyard_tips); ?></td>
        </tr>
      <?php } ?>
      
      <?php $result->free(); ?>
    </table>

  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
