<?php
require_once('includes/header.php');
require_once('includes/nav.php');
require_once('includes/main.php');
require('../../../Interfaces/admin/dashboardCategories.php');

if(@$users){
    if(@count($users) > 0){
        ?>


        <!--End Sidebare-->
        <div class="app-content content" style="overflow-x: auto;text-align: right;height: auto">
            <div class="content-wrapper">
                <center>

                </center>
                <table
                    class="table display nowrap table-striped table-bordered " style="padding-bottom: 20px">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $u){ ?>
                        <tr>
                            <td  style="width: auto"><?php echo $u['id'] ?></td>
                            <td scope="col"><?php echo $u['name'] ?></td>



                            <td>
                                <div class="btn-group" role="group"
                                     aria-label="Basic example">
                                    <a href="delete.php?page=cats&id=<?php echo $u['id']?>"
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









