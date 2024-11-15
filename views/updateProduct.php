<?php
/** @var $params UserModel
 */

use app\models\UserModel;
?>
<div class="card z-index-0 fadeIn3 fadeInBottom">

    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
            <h4>Edit product</h4>

    </div>
    <div class="card-body">
        <form action = "/processUpdateUser" method = "post" class="text-start">
            <input type="hidden" name="id" value="<?php echo $params->id?>"onfocus="focused(this)" onfocusout="defocused(this)">
            <div class="input-group input-group-outline my-3">
                <label for="example-text-input" class="form-control-label"> Name </label>
                <input class="form-control" type="text" name = "first_name" value="<?php echo $params->name?>" onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="input-group input-group-outline mb-3">
                <label for="example-text-input" class="form-control-label"> Description </label>
                <input class="form-control" type="text" name = "last_name" value="<?php echo $params->description?>" onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
            <div class="input-group input-group-outline mm-3">
                <label for="example-text-input" class="form-control-label"> Price </label>
                <input class="form-control" type="text" name="email" value="<?php echo $params->price?>" onfocus="focused(this)" onfocusout="defocused(this)">
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
</style>

