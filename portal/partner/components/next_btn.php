<?php 
    if(!isset($message)){
        $message = "Next";
    }
    if(!isset($icon)){
        $icon = "circle-chevron-right";
    }
    if(!isset($btn_features)){
        $btn_features="";
    }
    if(!isset($is_disabled)){
        $is_disabled = "";
    }
    if(!isset($btn_id)){
        $btn_id = "";
    }
    if(!isset($btn_type)){
        $btn_type = "button";
    }
    //  echo $btn_features;
?>
<button type="<?php echo $btn_type; ?>" class="btn_default" id="<?php echo $btn_id;?>" <?php echo $is_disabled;?> >
    <div class="btn_default__message">
        <?php echo $message;?>
    </div>
    <i class="fa-solid fa-<?php echo $icon;?> btn_default_icon"></i>
</button>