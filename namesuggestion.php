<?php
$members_file = 'members.json';
$members = json_decode(file_get_contents($members_file), true);

$a = array();
foreach ($members as $member) {
    $a[] = $member['name'];
}

$q = $_REQUEST["q"];

$suggest = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($suggest === "") {
                $suggest = $name;
            } else {
                $suggest .= "<br>" . $name;
            }
        }
    }
}

echo $suggest === "" ? "no suggested name" : $suggest;
?>