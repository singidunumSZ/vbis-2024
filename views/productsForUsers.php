<?php


use app\models\ProductModel;


foreach ($params as $parm){
    echo "
    <div class='card mb-3 mt-4 custom-card'>
<form action='/processCart' method='post'>
<input type='hidden' name='id_products' value='$parm[id]'>
<div class='row g-0'>
        <div class='col-md-4'>
            <img src='../assets/uploads/$parm[image_name]' class='img' alt='...'>
        </div>
        <div class='col-md-8'>
            <div class='card-body '>
                <h5 class='card-title p-1'>$parm[name]</h5>
                <p class='card-text mb-0' >$parm[description]</p>
                <p class='card-text mb-0'>$parm[model]</p>
                <p class='card-text mb-0'>$parm[price]e</p>
               
                </div>
                <div class = 'card-footer p-0 mt-0'>
                <div class = 'row'>
                <div class='col'>
               <h9  >Enter the size you want to reserve or purchase this product in</h9>
                <input type='text' name='size'class='input-field' mb-2>
                <input type='datetime-local' name='shop_time'class='input-field' mb-2>
                
                 </div>
                 
                <div class='col-me-2 '>   
                <button class='my-button '>Add to cart</button>
                </div>
                

</div>

           </div>
        </div>
    </div>
</form>
    
</div>
    ";
}

?>

<style>

    .custom-card {
        width: 400px; /* Postavi željenu širinu kartice */

        margin: auto; /* Centriraj karticu */
    }

    .input-field {
        width: 90%; /* Postavi širinu input polja na 100% */
        height: 30px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 0px;
    }
    .my-button{
        height:  30px;
        font-size: 10px;
        margin-top: 0px;


    }
    h9{
        font-size: 10px;

    }
    .img{
        height: 150px;

        width:130px;
    }
</style>