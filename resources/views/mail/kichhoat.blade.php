<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đồ án Thương mại điện tử</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Cảm ơn bạn đã đăng kí sử dụng website Điện thoại di động.
            Vui lòng đăng nhập và nhập mã kích hoạt tài khoản này để có thể tiếp tục sử dụng:
        </br>
            <h1><?= isset($nd_kichhoat)?$nd_kichhoat:''?></h1>
        </div>
    </div>
</div>
</body>
</html>
