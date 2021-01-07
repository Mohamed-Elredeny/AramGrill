<?php
require_once '../../../Controllers/admin/CategoriesController.php';
require_once '../../../Controllers/admin/ProductsController.php';
$CategoriesController = new CategoriesController();
$ProductsController = new ProductsController();
$categories = $CategoriesController->selectAll();

?>

<style>
    *{
        font-size: 17px;
        color: black;
    }
</style>
<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content" >
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" >
            <!--Users -->
            <li class="nav-item">
                <a href="#">
                    <span class="menu-title" data-i18n="nav.dash.main">المستخدمين</span>
                </a>
                <ul class="menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


                        <li class="nav-item">
                          
                            <ul class="menu-content">
                                <li class="active"><a class="menu-item" href="users.php"
                                                      data-i18n="nav.dash.ecommerce">عرض كل المستخدمين</a>
                                </li>
                                <li><a class="menu-item" href="newuser.php" data-i18n="nav.dash.crypto">اضافة مستخدم جديد
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>




                </ul>
            </li>

            <!--Categories -->
            <li class="nav-item">
                <a href="#">
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام</span>
                </a>
                <ul class="menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


                        <li class="nav-item">

                            <ul class="menu-content">
                                <li class="active"><a class="menu-item" href="categories.php"
                                                      data-i18n="nav.dash.ecommerce">عرض كل الاقسام</a>
                                </li>
                                <li><a class="menu-item" href="newcategory.php" data-i18n="nav.dash.crypto">اضافة قسم جديد
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>




                </ul>
            </li>

            <!--Products -->
            <li class="nav-item">
                <a href="#">
                    <span class="menu-title" data-i18n="nav.dash.main">الوجبات</span>
                </a>
                <ul class="menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                        <?php foreach($categories as $cats){ ?>
                        <li class="nav-item">
                            <a href="#">
                                <span class="menu-title" data-i18n="nav.dash.main"><?php echo $cats['name']?></span>
                            </a>
                            <ul class="menu-content">
                                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                                    <li class="nav-item">
                                        <ul class="menu-content">
                                            <li class="active"><a class="menu-item" href="meals.php?id=<?php echo $cats['id']?>"
                                                                  data-i18n="nav.dash.ecommerce">عرض كل الوجبات</a>
                                            </li>
                                            <li><a class="menu-item" href="newmeals.php?id=<?php echo $cats['id']?>" data-i18n="nav.dash.crypto">اضافة وجبة جديده
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <?php } ?>


                    </ul>
                </ul>

            </li>


        </ul>
    </div>
</div>
<!--End Sidebare-->