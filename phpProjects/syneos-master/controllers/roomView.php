<?php 
  require_once('../includes/config.inc.php');

  if($_GET['action']=='fetchRoomList'){

    //=== Dummy data... data should be pulled from database

    $data = array(      
      'data' => [
        [
          'id'=> 1,
          'name' => 'Room 1'
        ]
      ]
    );

    header('Content-type:application/json');
    echo json_encode($data);

  }
