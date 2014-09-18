  <?php
  $m = new MongoClient();
  $db = $m->graffiti;
  $collection = $db->posts;
  $cursor = $collection->find();
  echo json_encode(iterator_to_array($cursor));

  ?>