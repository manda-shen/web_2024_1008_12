<?php
$data = [
    's1' => '我好飽',
    's2' => '實際上是消化不良',
    's3' => '所以去睡吧',
    's4' => '不想再吃飯糰了',
];

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// dd($data);

$myJSON = json_encode($data);

echo $myJSON;