<?php

/** @var $params UserModel
 */

use app\models\UserModel;

?>
<div class = "card">
    <div class = "card-body">
        <h1><?php echo $params->first_name ?? "NOT FOUND "?><br> <?php echo $params->last_name?? "NOT FOUND "?><br> <?php echo $params->email?? "NOT FOUND "?> </h1>
        <style>
            h1{
                color:pink;
                font-style: italic;
                font-size: smaller;
            }
        </style>
    </div>

</div>

