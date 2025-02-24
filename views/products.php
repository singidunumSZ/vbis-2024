<?php

/** @var $params UserModel
 */

use app\models\ProductModel;

?>
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">All products available</h4>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>



                </tr>
                </thead>
                <tbody>
                <?php
                foreach($params as $parm){
                    echo "<tr>";
                    echo "<td>";
                    echo "<div >";
                    echo "<div >";
                    echo "<div '>
        <div class='.img'>
            <img src='../assets/uploads/$parm[image_name]' class='img' alt='...'>
        </div>";

                    echo "<h6 class='mb-0 text-sm'>$parm[name] </h6>";
                    echo "<h6 class='mb-0 text-sm'>$parm[description]</h6>";
                    echo " <p class='text-xs text-secondary mb-0'>$parm[model]</p>";
                    echo " <p class='text-xs text-secondary mb-0'>$parm[price]e</p>";





                    echo "</div>";

                    echo "</div>";
                    echo "<a href='/updateProduct?id=$parm[id]' target='_blank' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>
                      Edit
                        </a>";

                    echo "</td>";
                    echo "<tr>";


                }

                ?>

                </tbody>
            </table>
        </div>
       <div>
           <a class="btn bg-white text-dark" href="/createProduct">Add product</a>
       </div>
       <style>
            h6{
                color:pink;
                font-style: italic;
                font-size: smaller;
            }
            .img{
                height: 120px;

                width:100px;
            }
        </style>

    </div>
</div>