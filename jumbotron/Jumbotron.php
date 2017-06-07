<?php

namespace fksTemplate\Jumbotron;

require_once(dirname(__FILE__) . '/JumbotronData.php');
require_once(dirname(__FILE__) . '/JumbotronGroup.php');
require_once(dirname(__FILE__) . '/JumbotronItem.php');

use fksTemplate\NavBar\BootstrapNavBar;

class Jumbotron {
    /**
     * @var string
     */
    private $pageID;

    /**
     * @param $pageID
     * @return $this
     */
    public function setPageID($pageID) {
        $this->pageID = $pageID;
        return $this;
    }

    /**
     * @param BootstrapNavBar $secondMenu
     */
    public function render(BootstrapNavBar $secondMenu) {
        $jumbotronData = new JumbotronData();
        $item = $jumbotronData->getJumbotronDataByPage($this->pageID)->getRandom();
        if ($item) {
            echo '<div
                class="container-fluid header-image jumbotron"
                data-background="' . $item->getOuterContainerBackgroundID() . '">
                <div class="row nav-container hidden-md-down">
                   ';
            $secondMenu->render();
            echo '</div>
                <div class="row">
                    <div class="offset-lg-1 col-lg-8 offset-xl-3 col-xl-5">
                        <div
                            class="jumbotron-inner-container" 
                            data-background="' . $item->getInnerContainerBackgroundID() . '">
                            <h1>' . $item->getHeadline() . '</h1>
                            <p>' . $item->getText() . '</p>
                        </div>
                    </div>
                </div>

            </div>';
        } else {
            echo '<div class="container-fluid header mb-3">
                <div class="row nav-container hidden-md-down">';
            $secondMenu->render();
            echo '
                </div>
            </div>';
        };
    }
}
