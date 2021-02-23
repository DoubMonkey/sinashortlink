<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2021 https://www.fengxiaopeng.cn
// +----------------------------------------------------------------------
// | Author: 傲寒 <510077775@qq.com>.
// +----------------------------------------------------------------------

include_once "config.php";

$conn = new mysqli($db_host, $db_user, $db_pwd, $db_name);

if($conn->connect_error){
    die("数据库链接失败");
}

if (!isset($_POST['website']) || empty($_POST['website'])){
    die("非法访问！");
}else{
    $website = $_POST['website'];
}

$shorturl = shorturl($website);

$sql = "SELECT * FROM shorturl WHERE website = '{$website}'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $gai = "UPDATE shorturl SET count = count + 1 WHERE website = '{$website}'";
    mysqli_query($conn, $gai);
    mysqli_close($conn);
    echo json_encode(['website' => $website, 'shorturl' => $short_host . $shorturl]);
}else{
    $zeng = "INSERT INTO shorturl(website, shorturl) VALUES ('{$website}', '{$shorturl}')";
    if ($conn->query($zeng) === TRUE){
        echo json_encode(['website' => $website, 'shorturl' => $short_host . $shorturl]);
    }else{
        echo "Error: " . $zeng . "<br>" . $conn->error;
    }
    $conn->close();
}





function code62($x) {
    $show = '';
    while($x > 0) {
        $s = $x % 62;
        if ($s > 35) {
            $s = chr($s+61);
        } elseif ($s > 9 && $s <=35) {
            $s = chr($s + 55);
        }
        $show .= $s;
        $x = floor($x/62);
    }
    return $show;
}

function shorturl($url) {
    $url = crc32($url);
    $result = sprintf("%u", $url);
    //return $url;
    //return $result;
    return code62($result);
}