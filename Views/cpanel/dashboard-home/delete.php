<?php

    if(isset($_GET['page'])){
        if($_GET['page'] == 'Questions') {
            if(isset($_GET['id'])){
                DelOneNode($_GET['page'],$_GET['id']);
                header('location:questions.php');

            }else{
                header('location:questions.php');
            }
        }elseif ($_GET['page'] == 'PetrolStation') {
            if(isset($_GET['id'])){
                DelOneNode($_GET['page'],$_GET['id']);
                header('location:petrolstations.php');

            }else{
                header('location:petrolstations.php');
            }

        }elseif ($_GET['page'] == 'users'){
            $usersController->deleteWithId($_GET['id']);
            require('../../../Interfaces/admin/dashboard.php');
            //DelTwoNode('Users','accepted',$_GET['id']);
            header('location:users.php');
        }elseif ($_GET['page'] == 'cats'){
            require('../../../Interfaces/admin/dashboardCategories.php');
            $usersController->deleteWithId($_GET['id']);
            //DelTwoNode('Users','accepted',$_GET['id']);
            header('location:categories.php');
        }elseif ($_GET['page'] == 'meal'){
            require('../../../Interfaces/admin/dashboardProducts.php');
            $usersController->deleteWithId($_GET['id']);
            header('location:meals.php?id='.$_GET['pageid'].'');

        }
    }