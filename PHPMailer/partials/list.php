<li class='list-group-item grid grid-cols-2 gap-2'>
  <div class='grid-span-2'>
    <Span class='fw-semibold'>Compose Date:</Span>
    <?php echo $data['created_at']; ?>
  </div>
  <div>
    <Span class='fw-semibold'>To:</Span>
    <?php echo $data['toEmail']; ?>
  </div>
  <div>
    <Span class='fw-semibold'>Subject:</Span>
    <?php echo $data['subject']; ?>
  </div>
  <div class='grid-span-2'>
    <Span class='fw-semibold'>Body:</Span>
    <?php echo $data['body']; ?>
  </div>
</li>