<?php

/** @var $params UserModel
 */

use app\models\UserModel;

?>

<h1><?php echo $params->first_name?><br> <?php echo $params->last_name?><br> <?php echo $params->email?> </h1>
<style>
    h1{
        color:pink;
        font-style: italic;
        font-size: smaller;
    }
</style>
