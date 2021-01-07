<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Resources/user/css/bootstrap.css">
    <link rel="stylesheet" href="Resources/user/css/MainStyle.css">
    <title>تسجيل الدخول</title>
</head>
<body style="background-image: url(Resources/user/images/bg.jpg);  background-size: cover;">
    <form action="Views/order.php" method="post">
        <div class="login">
            <h2 >مشويات عرام السوري</h2>
            <br><br>
            <div>
<!--                <lable for="name" style="color:white; padding:5px">اسم المستخدم</lable><br>
-->             <input style="width:70%; border-radius:50px ; padding:5px;direction: rtl" name="name" type="text" placeholder="اسم المستخدم">
            </div>
            <div style="margin-top:20px">
<!--                <lable for="password" style="color:white; padding:5px">الـــرقــم الســـري</lable><br>
-->                <input style="width:70%; border-radius:50px ; padding:5px;direction: rtl" type="Password" name="password" placeholder="الـــرقــم الســـري">
            </div>
            <div style="margin-top:20px">
            <button type="submit" class="btn btn-primary" style="width:50%">تسجيل الدخول</button>
          
            </div>
        </div>
    </form>
</body>
</html>