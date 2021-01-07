<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/MainStyle.css">
    <title>عمل طلب</title>
</head>
<body style="background-image: url(../images/bg2.jpg);  background-size: cover;">
<form action="html/order.php" method="">
    
    <nav style="margin-bottom:20px" dir="rtl" class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a style="font-weight: bold;" class="navbar-brand" href="#">عــرام السـوري</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="order.php">ادخال الطلب</a>
                <a class="nav-link active" aria-current="page" href="dashboard.php">قائمة الطلبات</a>
                <a class="nav-link active" aria-current="page" href="order.php"></a>
                <button type="button" class="btn btn-danger">تسجيل الخروج</button>
            </div>
            </div>
        </div>
    </nav>

    <div dir="rtl" class="container-fluid row">
        <div class="col-6" >
            <!-- category dorpdown -->
            <div class="dropdown" style="padding-bottom:20px">
            <button style="width:300px" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                البــيـــتـــزااا
            </button>
            <ul  style="text-align:right; width:300px" class=" dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li class="row"><a style="width:50%" class="dropdown-item" href="#">مارجريتا </a><a style="width:50%" class="dropdown-item" href="#">50 جنية</a></li>
            </ul>
            </div>
        </div>
        <!-- table of orders -->
        <div class="table-container col-6">
            <table dir="rtl" class="table">
                <thead class="table-dark">
                    <tr>
                        <th>الرقم</th>
                        <th>الوجبة</th>
                        <th>العدد</th>
                        <th>السعر</th>
                        <th>
                            حذف
                        </th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="30px">1</td>
                    <td>ماندي</td>
                    <td>1</td>
                    <td>200</td>
                    <td>
                        <button style="height : 32px; " type="button" class="btn btn-danger">X</button>
                    </td>
                </tr>
                <tr class="table-dark">
                    <td colspan="2">اجمالي المبلغ</td>
                    <td colspan="3">
                        500 جنية
                    </td>
                    
                </tr>    
                    
                </tbody>
            </table>
            <div style="width:100% ; text-align:center" >
                <button type="button" class="btn btn-success" style="width:30%">تاكيد الطلب</button>
                <button type="button" class="btn btn-danger" style="width:30%">حذف الطلب</button>
            </div>
        </div>
        
</form>

<script src="../js/bootstrap.js"></script>
<script src="../js/bootstrap.esm.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>