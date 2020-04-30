<?php 
use yii\helpers\Html;
?>
<!--------------------
    START - Top Bar
    -------------------->
    <div class="top-bar color-scheme-bright">
    <!--------------------
    START - Top Menu Controls
    -------------------->
    <div class="top-menu-controls">
        <!-- <div class="element-search autosuggest-search-activator">
        <input placeholder="Start typing to search..." type="text">
        </div> -->
        <!--------------------
        START - Settings Link in secondary top menu
        -------------------->
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
        <i class="os-icon os-icon-ui-46"></i>
        <div class="os-dropdown">
            <div class="icon-w">
            <i class="os-icon os-icon-ui-46"></i>
            </div>
            <ul>
                <li>
                    <?=Html::a('<i class="os-icon os-icon-ui-49"></i><span>Log Out</span>',['/site/log-out'],['data-method' => 'post']);?>
                </li>
            </ul>
        </div>
        </div>
        <!--------------------
        END - Settings Link in secondary top menu
        --------------------><!--------------------
        START - User avatar and menu in secondary top menu
        -------------------->
        <div class="logged-user-w">
        <div class="logged-user-i">
            <div class="avatar-w">
            <!-- <img alt="" src="img/avatar1.jpg">  -->
                <span>Hello, <?php echo Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name;?></span>
                <span>&nbsp;&nbsp;( <?php echo Yii::$app->user->identity->organization->org_name;?> )</span>
            </div>
        </div>
        </div>
        <!--------------------
        END - User avatar and menu in secondary top menu
        -------------------->
    </div>
    <!--------------------
    END - Top Menu Controls
    -------------------->
    </div>
    <!--------------------
    END - Top Bar
-------------------->