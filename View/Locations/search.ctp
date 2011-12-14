<?php echo $this->Form->create('Location'); ?>
<?php echo $this->Form->input('location') ?>
<?php echo $this->Form->end(__('Search', true)); ?>

<?php if (!empty($results)): ?>
  <h3>Results</h3>
  <table border="0" cellspacing="5" cellpadding="5">
    <thead>
      <tr>
        <td>Latitude</td>
        <td>Longitude</td>
        <td>Address</td>
        <td>State / County</td>
        <td>Country</td>
        <td>Zip / Post Code</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $location): ?>
      <tr>
        <td><?php echo $location['Location']['latitude'] ?></td>
        <td><?php echo $location['Location']['longitude'] ?></td>
        <td><?php echo $location['Location']['line1'] ?></td>
        <td><?php echo $location['Location']['state'] ?></td>
        <td><?php echo $location['Location']['country'] ?></td>
        <td><?php echo $location['Location']['uzip'] ?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
<?php endif ?>