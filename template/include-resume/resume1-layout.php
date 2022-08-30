<style>
    .group-blocks {
        background-color: #efefef;
        padding: 10px 15px 1px 14px;
        margin-bottom: 10px;
        border-radius: 3px;
    }

    .block {
        background-color: #ccc;
        padding: 10px 10px;
        margin-bottom: 10px;
        font-weight: 500;
        border-radius: 3px;
    }

    .check-selector {
        font-size: 18px;
        color: #666;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border-radius: 3px;
        cursor: pointer;
        text-align: center;
        line-height: 20px;
    }

    .icon-order {
        font-size: 24px;
        color: #666;
        cursor: pointer;
    }

    .ui-sortable-handle {
        cursor: move;
    }

    #check-all-layout, #default-layout {
        cursor: pointer;
    }
</style>

<div class="group-blocks">

    <!-- for first block -->
    <?php
        foreach($data_pos as $data_position){

        if($data_position==1){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==1){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="1" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Skills</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==2){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==2){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="2" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Work Experience</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==3){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==3){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="3" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Education</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==4){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==4){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="4" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Activities</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==5){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==5){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="5" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Certifications</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==6){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==6){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="6" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Honour & Awards</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==7){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==7){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="7" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Interest</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==8){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==8){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="8" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Language</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        }else if($data_position==9){

            $fa_checked=false;
            foreach($hide_block as $fa_check){
                if($fa_check==9){
                    $fa_checked=true;
                    break;
                }
            }
    ?>
    <div data-position="9" class="block <?php echo ($fa_checked==false)?'active-block':''; ?>">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div class="check-selector">
                    <i class="fa-solid <?php echo ($fa_checked==false)?'fa-check':''; ?>"></i>
                </div>
                <span>Reference</span>
            </div>
            <i class="fa-solid fa-bars icon-order"></i>
        </div>
    </div>
    <?php
        } }
    ?>

</div>