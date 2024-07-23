<?php

// $filteredItems = array_filter($relationships, function ($item, $relationshipType = "friend") {
//         return $item["relationship"] != $relationshipType;
//     });
// is_array($filteredItems) ? $filteredItems : [];

view('index.view.php', [
  'heading' => 'Home'
]);
