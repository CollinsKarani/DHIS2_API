<?php

error_reporting(E_ALL);

$url = 'http://test.hiskenya.org/api/users.json?page=5';

$username = 'bootcamp2016';
$password = 'Bootcamp2016';

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//curl_setopt($ch, CURLOPT_REFERER, $url);

$result = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$data = json_decode($result, true);

//print_r($data);
if($data){
	echo '<link rel="stylesheet" type="text/css" href="test.css" />';
	echo'<div id="wrapper">
  <h1>User Details Table</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>NAME</span></th>
        <th><span>UID</span></th>
        <th><span>MORE DETAILS</span></th>
        
      </tr>
    </thead>
    <tbody>
      <tr>';


	
        
        foreach($data['users'] as $item) 
      {
              echo '<tr class="lalign">';
                  echo '<td>'.$item['name'].'</td>';
                  echo '<td>'.$item['id'].'</td>';
                   echo '<td><a href="userdetails.php?id='.$item['href'].'"> <button>More details</button></td>';

              echo '</tr>';
      }

}


      


?>