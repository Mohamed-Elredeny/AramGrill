<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Resources/user/css/bootstrap.css">
    <link rel="stylesheet" href="../Resources/user/css/MainStyle.css">
    <title>قائمة الطلبات</title>
</head>
<body style="background-image: url(../images/bg2.jpg);  background-size: cover;">
<form action="order.php" method="">
    
    <nav style="margin-bottom:20px" dir="rtl" class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid" >
            <a style="font-weight: bold;" class="navbar-brand" href="#">عــرام السـوري</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="order.php">ادخال الطلب</a>
                    <a class="nav-link active" aria-current="page" href="dashboard.php">قائمة الطلبات</a>
                    <a class="nav-link active" aria-current="page" href="#"></a>
                </div>
            <button type="button" class="btn btn-danger">تسجيل الخروج</button>
            </div>
        </div>
        
    </nav>

    <div dir="rtl" class="container-fluid row div">
       <h3 style="text-align: center">متابعة المبيعات</h3>
        <!-- table of orders -->
        <div class="table-container ">
            <table dir="rtl" class="table">
                <thead class="table-dark">
                    <tr>
                        <th>الرقم</th>
                        <th>مبيعات اليوم</th>
                        <th>مبيعات الاسبوع</th>
                        <th>مبيعات الشهر</th>
                        <th>مبيعات السنة</th>
                        <th>
                            حذف
                        </th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="30px">1</td>
                    <td style="cursor: pointer;"><a data-bs-toggle="modal" data-bs-target="#OrderModal">ماندي</a></td>
                    <td style="cursor: pointer;"><a data-bs-toggle="modal" data-bs-target="#OrderModal">ماندي</a></td>
                    <td style="cursor: pointer;"><a data-bs-toggle="modal" data-bs-target="#OrderModal">ماندي</a></td>
                    <td style="cursor: pointer;"><a data-bs-toggle="modal" data-bs-target="#OrderModal">ماندي</a></td>
                    <td>
                        <button style="height : 32px; " type="button" class="btn btn-danger">X</button>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>  <!-- End table of orders -->
            <!-- Modal -->
                <div class="modal fade" id="OrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body"><!-- end model table-->
                            <div class="table-container">
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
                        </div><!-- end model table-->
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div><!--End Modal -->
        </div>
        
</form>

<script src="../Resources/user/js/bootstrap.js"></script>
<script src="../Resources/user/js/bootstrap.esm.js"></script>
<script src="../Resources/user/js/bootstrap.bundle.js"></script>
</body>
</html>