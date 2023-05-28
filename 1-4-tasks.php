<?php
$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

//        1 task
$temp = array_unique(array_column($array, 'id'));
$unique_arr = array_intersect_key($array, $temp);

//        2 task
usort($array, function ($a, $b) {
    return $a['id'] <=> $b['id'];
});

//        3 task
$filterById = 2;

$new = array_filter($array, function ($var) use ($filterById) {
    return ($var['id'] == $filterById);
});

//         4 task
$temp = array_unique(array_column($array, 'id'));
$unique_arr = array_intersect_key($array, $temp);

$newArray = array_map(function ($element) {
    return array(
        $element['name'] => $element['id']
    );
}, $unique_arr);



