<?php 
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!--------------------
        START - Mobile Menu
        -------------------->
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
          <div class="mm-logo-buttons-w">
            <a class="mm-logo" href="<?=Url::to('/');?>">
            <i class="os-icon os-icon-home"></i> <span> <?php echo APP;?></span>
            </a>
            <div class="mm-buttons">
              <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
              </div>
              <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
              </div>
            </div>
          </div>
          <div class="menu-and-user">
            <div class="logged-user-w">
              <div class="logged-user-info-w">
                <div class="logged-user-name">
                    <?php echo Yii::$app->user->identity->organization->org_name;?>
                </div>
              </div>
            </div>
            <!--------------------
            START - Mobile Menu List
            -------------------->
            <?=$this->render('menu');?>
            <!--------------------
            END - Mobile Menu List
            -------------------->
          </div>
        </div>
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-bright color-style-default menu-position-side menu-side-left menu-layout-compact sub-menu-style-flyout sub-menu-color-light selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
          <div class="logo-w">
            <a class="logo" href="<?=Url::to(['/report']);?>">
              <div class="logo-label">
                <i class="os-icon os-icon-home"></i>
                 <?php echo APP;?>
              </div>
            </a>
          </div>
          <!-- <hr> -->
            <?=$this->render('menu');?>
        </div>
        <!--------------------
        END - Main Menu
        -------------------->