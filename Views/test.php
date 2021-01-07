<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../Resources/user/css/bootstrap.css">
<link rel="stylesheet" href="../Resources/user/css/MainStyle.css">

<select name="productId" id="productId">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>

<div id="SelStdDep">

</div>
<script src="../Resources/user/js/jquery-3.5.1.min.js">

</script>
<script>
    $(document).ready(function(){
        $('#productId').change(function(){
            var productId = $(this).val();
            $.ajax({
                url:"ajax/addOrder.php",
                method:"POST",
                data:{productId:productId},
                dataType:"text",
                success:function(data){
                    $('#SelStdDep').html(data);
                }
            });
        });
    });

</script>
