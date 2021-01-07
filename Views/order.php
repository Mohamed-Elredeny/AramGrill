<?php
require_once '../Interfaces/user/ordersPage.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Resources/user/css/bootstrap.css">
    <link rel="stylesheet" href="../Resources/user/css/MainStyle.css">
    <!-- Bootstrap CSS -->


    <title>صفحة الطلبات</title>
</head>

<body style="background-image: url(../Resources/user/images/bg2.jpg);  background-size: cover;">
<form action="order.php" method="">
    
    <nav style="margin-bottom:20px" dir="rtl" class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a style="font-weight: bold;" class="navbar-brand" href="#">عــرام السـوري</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="order.php">ادخال الطلب</a>
                <a class="nav-link active" aria-current="page" href="cpanel/dashboard-home/dashboard.php">لوحة التحكم </a>
                <a class="nav-link active" aria-current="page" href="order.php"></a>
                <button type="button" class="btn btn-danger">تسجيل الخروج</button>
            </div>
            </div>
        </div>
    </nav>

    <div dir="rtl" class="container-fluid row" >
        <div class="col-5" >
            <!-- category dorpdown -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <?php
                //Categories
                for($i=0;$i<count($allCats);$i++){ ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne<?php echo $i?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $i?>" aria-expanded="true" aria-controls="flush-collapseOne<?php echo $i?>">
                           <?php echo $allCats[$i]['name']?>
                        </button>
                    </h2>
                    <div id="flush-collapseOne<?php echo $i?>" class="accordion-collapse collapse"  data-bs-parent="#accordionFlushExample">
                        <?php //Products
                        $counter = 1;
                        foreach ($products->selectWithForignKey($allCats[$i]['id']) as $product){
                        ?>
                        <div class="card">
                            <div class="card-body" >
                               <table style="width: 100%;text-align: center;font-size: 20px;font-weight: bolder">
                                   <tr>
                                       <td style="width: 50px;">
                                           <?php echo $counter?>

                                       </td>
                                       <td style="width: 80px;">
                                           <?php echo $product['name']?>
                                       </td>
                                       <td style="width: 80px;">
                                           <?php echo $product['price'] . "جنية " ?>
                                       </td>
                                       <td style="width: 50px;">
                                           <input type="hidden" name="productId" id="productId<?php echo $product['id'] ?>" value="<?php echo $product['id'] ?>">
                                           <input type="button" class="btn btn-danger" value="تسجيل" id="btn<?php echo $product['id'] ?>">
                                       </td>
                                   </tr>
                               </table>
                            </div>
                        </div>
                        <?php
                            $counter++;
                        }
                        $counter=1;
                        ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- End of dropdown -->
        </div>
        <!-- table of orders -->
        <div class="table-container col-7"  id="SelStdDep">
            <table dir="rtl" class="table"  style="height: 500px">
                <thead class="table-dark">
                    <tr style="height: 70px;">
                        <th>الرقم</th>
                        <th>الوجبة</th>
                        <th>العدد</th>
<!--                        <th>الحجم</th>
-->                        <th>سعر الواحد</th>
                        <th>السعر الكلي</th>
                        <th>
                            حذف
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total =0;

                if(count(@$allMealInOneOrder) > 0){
                for($i=0;$i<count(@$allMealInOneOrder);$i++){ ?>
                <tr>
                    <td width="30px"><?php echo ($i+1)?></td>
                    <td><?php echo $products->selectWithId($allMealInOneOrder[$i]['product_id'])[0]['name']?></td>
                    <!--Quantity -->
                    <td>
                        <input type="hidden" name="productId1" id="productId1<?php echo  $allMealInOneOrder[$i]['id'] ?>" value="<?php echo $allMealInOneOrder[$i]['id'] ?>">

                        <input style="text-align: center" type="text" id="quantity<?php echo  $allMealInOneOrder[$i]['id']?>" value="<?php echo $allMealInOneOrder[$i]['quantity']?>">
                    </td>
                    <!-- Different Sized -->
                    <?php
                        $sizes =  $products->selectWithId($allMealInOneOrder[$i]['product_id'])[0]['size'];
                        $sizes =  explode("&", $sizes);
                    ?>
                  <!--  <td>
                        <select name="" id="" style="width: 100px">
                            <?php
/*                            $sizeCounter =0;
                            foreach ($sizes as $size){
                                */?>
                            <option value="<?php /*echo $sizeCounter*/?>"><?php /*echo $size*/?></option>
                            <?php
/*                                $sizeCounter++;
                            } */?>
                        </select>
                    </td>-->
                    <td><?php echo  $products->selectWithId($allMealInOneOrder[$i]['product_id'])[0]['price']?></td>

                    <td><?php echo  $allMealInOneOrder[$i]['quantity'] * $products->selectWithId($allMealInOneOrder[$i]['product_id'])[0]['price']?></td>
                    <td>
                        <input type="hidden" name="mealId" id="mealId<?php echo  $allMealInOneOrder[$i]['id'] ?>" value="<?php echo $allMealInOneOrder[$i]['id'] ?>">

                        <button style="height : 32px; " type="button" class="btn btn-danger" id="btn2<?php echo $product['id']?>">X</button>
                    </td>
                </tr>

                <?php
                $total +=$allMealInOneOrder[$i]['quantity'] * $products->selectWithId($allMealInOneOrder[$i]['product_id'])[0]['price'];
                }}else{
                    echo '<tr>
                        </tr>';
                } ?>
                <tr class="table-dark" style="height: 50px">
                    <td colspan="3">اجمالي المبلغ</td>
                    <td colspan="4">
                        <?php echo $total?> جنية
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


<script src="../Resources/user/js/bootstrap.js"></script>
<script src="../Resources/user/js/bootstrap.esm.js"></script>
<script src="../Resources/user/js/bootstrap.bundle.js"></script>
<script src="../Resources/user/js/jquery-3.5.1.min.js">

</script>

<script>
    //Adding product to order
    <?php for($i=0;$i<count($allCats);$i++){
        foreach ($products->selectWithForignKey($allCats[$i]['id']) as $product){
    ?>
        $(document).ready(function(){
            $('#btn<?php echo $product['id']?>').click(function(){
                //var productId = $(this).val();
                var productId = $('#productId<?php echo $product['id']?>').val();
                $.ajax({
                    url:"ajax/addOrder.php",
                    method:"POST",
                    data:{productId:productId},
                    dataType:"text",
                    success:function(data){
                        //$('#SelStdDep').html(data);
                        var newLocation = "ajax/empty.php?page=thanksGod";
                        window.location = newLocation;
                    }
                });
            });
        });
    <?php
            }
        } ?>
    //Delete product from order
    <?php for($i=0;$i<count($allCats);$i++){
    foreach ($products->selectWithForignKey($allCats[$i]['id']) as $product){
    ?>
    $(document).ready(function(){
        $('#btn2<?php echo $product['id']?>').click(function(){
            //var productId = $(this).val();
            var productId = $('#productId<?php echo $product['id']?>').val();
            $.ajax({
                url:"ajax/deleteOrder.php",
                method:"POST",
                data:{productId:productId},
                dataType:"text",
                success:function(data){
                    //$('#SelStdDep').html(data);
                    var newLocation = "ajax/empty.php?page=thanksGod";
                    window.location = newLocation;
                }
            });
        });
    });
    <?php
    }
    } ?>
    //Change amount
    <?php  for($i=0;$i<count(@$allMealInOneOrder);$i++){ ?>
    $(document).ready(function(){
        $('#quantity<?php echo  $allMealInOneOrder[$i]['id']?>').change(function(){
            //var productId = $(this).val();
            var mealID = $('#productId1<?php echo $allMealInOneOrder[$i]['id']?>').val();
            var quantity = $(this).val();

            $.ajax({
                    url:"ajax/onChangeUpdate.php",
                    method:"POST",
                    data:{mealID:mealID,quantity:quantity},
                    dataType:"text",
                    success:function(data){
                        //$('#SelStdDep').html(data);
                        var newLocation = "ajax/empty.php?page=thanksGod";
                        window.location = newLocation;
                    }
                });
            });
        });
        <?php } ?>
</script>

</body>
</html>