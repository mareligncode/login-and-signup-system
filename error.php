<?php
if(count($error) > 0):
?>
<div class="error">
    <?php
    foreach($error as $errorr):
    ?>
    <p><?php
    echo $errorr;
    ?></p>
    <?php
    endforeach;
    ?>
</div>
<?php endif ?>