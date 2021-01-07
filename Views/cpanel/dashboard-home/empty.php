<?php
if(isset($_GET['page'])){
    if($_GET['page'] == 'register') {
        header('location:newuser.php');
    }elseif ($_GET['page'] == 'petrol'){
        header('location:newpetrol.php');

    }elseif ($_GET['page'] == 'question'){
        header('location:newquestion.php');
    }elseif ($_GET['page'] =='addTypesAmounts'){
            if($_GET['request'] == 'Types'){
                $type ='type';
            }elseif ($_GET['request'] == 'Amount'){
                $type ='amount';
            }

        header('location:addNewTypesAmountsPg.php?type='.$_GET['type'].'&request='.$type.'');
    }elseif ($_GET['page'] == 'handelRequests'){
        if($_GET['request'] == 'petrol'){
            echo $_GET['state'];
           // header('location:handelRequests.php?request=petrol&state='.$_GET['state'].'');
        }elseif ($_GET['request'] == 'gaz'){
            echo $_GET['state'];
           // header('location:handelRequests.php?request=gaz&state='.$_GET['state'].'');
        }elseif ($_GET['request'] == 'card'){
            echo $_GET['state'];
         //   header('location:handelRequests.php?request=card&state='.$_GET['state'].'');
        }
    }elseif ($_GET['page'] == 'accOrRef'){
        if($_GET['req'] =='pending' ){
            header('location:pendingusers.php');
        }elseif ($_GET['req'] =='refused'){
            header('location:refusedusers.php');

        }
    }elseif ($_GET['page'] == 'contact'){
        header('location:contact.php');

    }elseif ($_GET['page'] == 'registercat'){
        header('location:newcategory.php');
    }elseif ($_GET['page'] == 'registerproduct'){
        header('location:newmeals.php?id='.$_GET['id'].'');

    }
}
?>