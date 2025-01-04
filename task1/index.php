<?php
 
  $array = ['a', 'b', 'c', 'd'];

  for($i = 0; $i<count($array); $i++){
 
    if($array[$i] == 'b' || $array[$i] == 'c'){
        continue;
    }

    echo $array[$i] . "<br/>";
  }

//  foreach($array as $name){
//     echo $name . "<br/>";
//  }

// function sendEmail($to, $subject, $body) {
//     echo "send an email to $to". "<br>";
//     echo "$subject" . "<br>";
//     echo "$body" . "<br>";
//   }

// sendEmail('test@test.com', 'subject', 'body of the email');

// How to Loop Through Arrays with map(), filter(), and reduce() in PHP

// $numbers = [1,2,3,4,5,6,7,8,9];

//  $others = array_map( fn($a) => $a * 2 , $numbers);

//  foreach($others as $one){
//     echo $one;
//  }

$numbers = [1, 2, 3, 4];

$result = array_reduce($numbers, fn($carry, $value) => $carry * $value, 1);

echo $result;

mail('rwema916@gmail.com', 'this subject', 'the body');

?>