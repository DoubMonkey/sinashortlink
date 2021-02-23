<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2021 https://www.fengxiaopeng.cn
// +----------------------------------------------------------------------
// | Author: 傲寒 <510077775@qq.com>.
// +----------------------------------------------------------------------

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FX短网址生成</title>
</head>
<body>
    <form action="api.php" method="post">
        <label for="website">请输入网址(带http/https协议)：</label>
        <input type="text" id="website" name="website" value="">
        <input type="button" value="生成" id="btn">
    </form>
    <p style="display: none;" id="short_p"><a href="" target="_blank" id="short_url">点击访问短网址</a></p>
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script>
        $("#btn").on("click", function () {
            var website = $("#website").val();
            var reg = /^([hH][tT]{2}[pP]:\/\/|[hH][tT]{2}[pP][sS]:\/\/)(([A-Za-z0-9-~]+)\.)+([A-Za-z0-9-~\/])+$/;
            if (website == ""){
                alert("请输入网址！");
                return false;
            }
            if (!reg.test(website)){
                alert("网址不合法，请重新输入！");
                return false;
            } else{
                $.ajax({
                    type: 'POST',
                    url: 'api.php',
                    dataType: 'JSON',
                    data: {
                        website: website
                    },
                    success: function (res) {
                        // console.log(res);
                        $("#short_p").show();
                        $("#short_url").attr('href', res.shorturl);
                    },
                    error: function (e) {
                        // console.log(e);
                    }
                })
            }
        })
    </script>
</body>
</html>
