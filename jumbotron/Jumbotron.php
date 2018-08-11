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
    private $pageId;

    /**
     * @param $pageId
     * @return $this
     */
    public function setPageId($pageId) {
        $this->pageId = $pageId;
        return $this;
    }

    private function printSecondMenuContainer(BootstrapNavBar $secondMenu) {
        echo '<div class="row nav-container hidden-md-down second-nav">';
        $secondMenu->render();
        echo '</div>';
    }

    private function printCarouselContainer($stream) {
        echo '<div class="carousel-container">';
        echo p_render('xhtml', p_get_instructions('{{news-carousel>stream="' . $stream . '"}}'), $info);
        echo '</div>';
    }

    private function printJumbotronContainer(JumbotronItem $item) {
        echo '<div class="row jumbotron-background" data-background="' . $item->getOuterContainerBackgroundId() . '">';

        if ($item->getHeadline() || $item->getText()) {
            echo '<div class="offset-lg-1 col-lg-8 offset-xl-3 col-xl-5">';
            echo '<div class="jumbotron-inner-container"    
                             data-background="' . $item->getInnerContainerBackgroundId() . '">';
            echo '<h1>' . $item->getHeadline() . '</h1>';
            echo '<p>' . $item->getText() . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    /**
     * @param BootstrapNavBar $secondMenu
     */
    public function render(BootstrapNavBar $secondMenu) {
        $stream = $this->getStreamByPage();
        $jumbotronData = new JumbotronData();
        $item = $jumbotronData->getJumbotronDataByPage($this->pageId)->getRandom();
        if ($stream) {
            echo '<div class="container-fluid header-image jumbotron">';
            $this->printCarouselContainer($stream);
            $this->printSecondMenuContainer($secondMenu);
            echo '</div>';
        } else if ($item) {
            echo '<div class="container-fluid header-image jumbotron">';
            $this->printJumbotronContainer($item);
            $this->printSecondMenuContainer($secondMenu);
            echo '</div>';
        } else {
            echo '<div class="container-fluid header mb-3">';
            $this->printSecondMenuContainer($secondMenu);
            echo '</div>';
        }
    }

    private function getStreamByPage() {
        switch ($this->pageId) {
            case 'start':
                return 'home-carousel-cs';
            case 'en':
                return 'home-carousel-en';
            case 'akce:fyziklani:start':
                return 'fof-carousel-cs';
            case 'events:physicsbrawl:start':
                return 'fof-carousel-en';
            default:
                return null;
        }
    }
}
