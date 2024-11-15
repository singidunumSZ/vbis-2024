<?php

/** @var $params UserModel
 */

use app\models\UserModel;

?>
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">All users</h4>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Company</th>

                    <th class="text-secondary opacity-7"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($params as $user){
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='d-flex px-2 py-1'>";
                    echo "<div class='d-flex flex-column justify-content-center'>";
                    echo "<h6 class='mb-0 text-sm'>$user[first_name] $user[last_name]</h6>";
                    echo " <p class='text-xs text-secondary mb-0'>$user[email]</p>";

                    echo "</div>";

                    echo "</div>";
                    echo "<a href='/updateUser?id=$user[id]' target='_blank' class='text-secondary font-weight-bold text-xs' data-toggle='tooltip' data-original-title='Edit user'>
                      Edit
                        </a>";
                    echo "</td>";
                    echo "<tr>";


                }

                ?>

                </tbody>
            </table>
        </div>

       <style>
            h6{
                color:pink;
                font-style: italic;
                font-size: smaller;
            }
        </style>

    </div>
</div>