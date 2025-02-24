<?php
/** @var $params ProductModel
 */

use app\models\ProductModel;

?>
<div class="card z-index-0 fadeIn3 fadeInBottom">

    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
            <h4>Edit product</h4>

    </div>
    <div class="card-body">
        <form action = "/processUpdateProduct" method = "post" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php echo $params->id?>"onfocus="focused(this)" onfocusout="defocused(this)">
            <div class="input-group input-group-outline my-3">
                <label for="example-text-input" class="form-control-label"> Name </label>
                <input class="form-control" type="text" name = "name" value="<?php echo $params->name?>" onfocus="focused(this)" onfocusout="defocused(this)">
                <?php
                if($params != null && $params->errors != null){
                    foreach($params->errors as $attribute=>$error){
                        if($attribute == 'name'){
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="example-text-input" class="form-control-label"> Description </label>
                <input class="form-control" type="text" name = "description" value="<?php echo $params->description?>" onfocus="focused(this)" onfocusout="defocused(this)">
                <?php
                if($params != null && $params->errors != null){
                    foreach($params->errors as $attribute=>$error){
                        if($attribute == 'description'){
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="example-text-input" class="form-control-label"> Model </label>
                <input class="form-control" type="text" name="model" value="<?php echo $params->model?>" onfocus="focused(this)" onfocusout="defocused(this)">
                <?php
                if($params != null && $params->errors != null){
                    foreach($params->errors as $attribute=>$error){
                        if($attribute == 'model'){
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="input-group input-group-outline my-3">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label"> Image </label>
                    <input type="file" class="form-control" name="file">
                    <?php
                    if($params != null && $params->errors != null){
                        foreach($params->errors as $attribute=>$error){
                            if($attribute == 'image_name'){
                                echo "<span class='text-danger'>$error[0]</span>";
                            }
                        }
                    }
                    ?>
                </div>
            <div class="input-group input-group-outline my-3">
                <label for="example-text-input" class="form-control-label"> Price </label>
                <input class="form-control" type="text" name = "price" value="<?php echo $params->price?>" onfocus="focused(this)" onfocusout="defocused(this)">
                <?php
                if($params != null && $params->errors != null){
                    foreach($params->errors as $attribute=>$error){
                        if($attribute == 'price'){
                            echo "<span class='text-danger'>$error[0]</span>";
                        }
                    }
                }
                ?>
            </div>



            <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Save</button>
            </div>

        </form>
    </div>
    </div>

</div>
<style>
    h4{
        color: lightpink;

    }
    label{
        color: pink;
        margin-right: 30px;

    }
    span{
        font-size: 10px;
        margin-top: 10px;
        margin-block: auto;
    }
</style>

