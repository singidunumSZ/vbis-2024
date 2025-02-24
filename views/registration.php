<?php
/** @var $params RegModel
 */

use app\models\RegModel;
?>
<div>
    <p class=" my-0">Enter your email and password to sign up</p>
</div>
<div class="card-body">

    <form role="form" method="post" action = "/processRegistration"class="text-start">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $params->email?>">
            <?php
            if($params != null && $params->errors != null){
                foreach($params->errors as $attribute=>$error){
                    if($attribute == 'email'){
                        echo "<span class='text-danger'>$error[0]</span>";
                    }
                }
            }
            ?>
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name = "password"value="<?php echo $params->password?>">
            <?php
            if($params != null && $params->errors != null){
                foreach($params->errors as $attribute=>$error){
                    if($attribute == 'password'){
                        echo "<span class='text-danger'>$error[0]</span>";
                    }
                }
            }
            ?>
        </div>

        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
        </div>
<style>
    p{color : lightpink;}
    span{
        font-size: 10px;
        margin-top: 10px;
        margin-block: auto;
    }
</style>