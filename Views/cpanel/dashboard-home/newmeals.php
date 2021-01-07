<?php
require('../../../Interfaces/admin/dashboardCategories.php');
require('../../../Interfaces/admin/dashboardProducts.php');


require_once('includes/header.php');
require_once('includes/nav.php');
require_once('includes/main.php');
?>

<center>
    <div class="card" style="height: auto;width: auto;display: inline-block;margin-top: 20px;text-align: center;padding-top: 20px;padding-bottom: 70px;margin-right: 200px">
        <h2>اضافة وجبة جديده</h2>
        <div class="card-body" >
            <form method="POST" action="newmeals.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data">

                <table class="table" style="text-align: right;direction: rtl">
                    <tbody>
                    <tr>
                        <th scope="row">فئة الوجبة</th>
                        <td>
                            <select class="btn btn-outline-primary" name="category_id" id="category_id" style="text-align: right;width:170px">
                                <?php foreach ($users as $category){?>
                                <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">اسم الوجبة</th>

                        <td>
                            <input class="btn btn-outline-primary" type="text" name="name"  id="name" style="text-align: right">
                        </td>

                    </tr>

                    <tr>
                        <th scope="row">سعر الوجبة </th>
                        <td>
                            <input class="btn btn-outline-primary" type="text" name="price" id="price"  style="text-align: right">
                        </td>
                    </tr>


                    <tr>
                        <th scope="row" colspan="2">
                            <center>
                                قم بوضع علامه & بين الاسماء والاسعار للفصل بينهم.
                            </center>
                        </th>

                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td style="border:1px solid white">
                                        اسماء الحجوم
                                    </td>
                                    <td style="border:1px solid white">
                                        <input type="text" name="size">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td style="border:1px solid white">
                                        اسعار الحجوم
                                    </td>
                                    <td style="border:1px solid white">
                                        <input type="text" name="sizeCost">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>



                    </tbody>
                </table>

                <input type="submit" value="اضافة وجبة جديدة" class="btn btn-primary" name="register" >
            </form>
        </div>
    </div>
</center>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBHbT2gERI0qaPIkZqd3C1pG-0njxhY3YY",
        authDomain: "petrolstation-a32b4.firebaseapp.com",
        databaseURL: "https://petrolstation-a32b4.firebaseio.com",
        projectId: "petrolstation-a32b4",
        storageBucket: "petrolstation-a32b4.appspot.com",
        messagingSenderId: "110917488947",
        appId: "1:110917488947:web:0e7d94d3a7a1ded704ee46"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);


    function uploadImage() {
        const ref = firebase.storage().ref('/users');
        const file = document.querySelector("#photo1").files[0];
        const name = +new Date() + "-" + file.name;
        const metadata = {
            contentType: file.type
        };
        const task = ref.child(name).put(file, metadata);
        task
            .then(snapshot => snapshot.ref.getDownloadURL())
            .then(url => {
                console.log(url);
                document.querySelector("#img1").value = url;
                document.querySelector("#disk_d1").value = 1;
            })
            .catch(console.error);
    }

</script>

<?php
require_once('includes/footer.php')
?>
