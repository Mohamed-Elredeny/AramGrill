<?php
require_once('includes/header.php');
require_once('includes/nav.php');
require_once('includes/main.php');
require('../../../Interfaces/admin/dashboard.php');

if(@$users){
    if(@count($users) > 0){
?>


    <!--End Sidebare-->
    <div class="app-content content" style="overflow-x: auto;text-align: right">
        <div class="content-wrapper">
            <center>

            </center>
             <table
                    class="table display nowrap table-striped table-bordered " style="padding-bottom: 20px;height: auto">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Is Admin </th>
                    <th scope="col">Delete </th>

                </tr>
                </thead>
                <tbody>

                <?php foreach ($users as $u){ ?>
                 <tr>
                        <td  style="width: auto"><?php echo $u['id'] ?></td>
                     <td scope="col"><?php echo $u['name'] ?></td>
                     <td scope="col"><?php echo $u['email'] ?></td>
                     <td scope="col"><?php echo $u['password'] ?></td>
                     <?php if(@$u['isAdmin'] == '1'){ ?>
                     <td scope="col">Admin</td>
                     <?php }else{ ?>
                    <td scope="col">Not Admin</td>
                    <?php  } ?>



                        <td>
                            <div class="btn-group" role="group"
                                 aria-label="Basic example">
                                <a href="delete.php?page=users&id=<?php echo $u['id']?>"
                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                            </div>
                        </td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>




<?php
}else{
        echo "
            <center>
            لا يوجد مستخدمين بعد
               </center>
        ";
    }
}
require_once('includes/footer.php');

?>









