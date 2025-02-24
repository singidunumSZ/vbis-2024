<?php
if($params ){
    echo "<span>Products you have reserved</span>";

    $totalPrice = 0;

    foreach ($params as $parm) {
        $totalPrice += $parm['price'];

        echo "
    <div class='card mb-3 mt-4 custom-card'>
        <form action='/processCart' method='post'>
            <input type='hidden' name='id_products' value='{$parm['id']}'>
            <div class='row g-0'>
                <div class='col-md-4'>
                    <img src='../assets/uploads/{$parm['image_name']}' class='img' alt='...'>
                </div>
                <div class='col-md-8'>
                    <div class='card-body '>
                        <h5 class='card-title p-1'>{$parm['name']}</h5>
                        <p class='card-text mb-0'>{$parm['description']}</p>
                        <p class='card-text mb-0'>{$parm['model']}</p>
                        <p class='card-text mb-0'>Price: €{$parm['price']}</p>
                        <p class='card-text mb-0'>Size: {$parm['size']}</p>
                        <p class='card-text mb-0'>Shop time :  {$parm['shop_time']}</p>
                        
                    </div>
                    <div class='card-footer p-0 mt-0'>
                        <div class='row'>
                            <div class='col'></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>";
    }

    echo "
<span class='span1'>Ukupan iznos je: €{$totalPrice}</span>";

}
else{
    echo "
    <h1 >Dobro dosli!</h1>
    ";
}
?>

<style>
    .custom-card {
        width: 400px;
        margin: auto;
    }

    .img {
        height: 150px;
        width: 150px;
        object-fit: cover;
    }

    .input-field {
        width: 100%;
        height: 40px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .my-button {
        height: 30px;
        font-size: 14px;
        margin-top: 5px;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .my-button:hover {
        background-color: #0056b3;
    }

    .span1 {
        font-size: 24px;
        color: gray;
        text-align: right;
        font-weight: bold;
        padding: 10px 20px;
        border-top: 1px solid #ccc;
        margin-top: 20px;
    }
    h1{
        color:lightpink;
    }
</style>