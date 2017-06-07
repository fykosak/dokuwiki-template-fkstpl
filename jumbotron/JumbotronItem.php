<?php

namespace fksTemplate\Jumbotron;

class JumbotronItem {
    /**
     * @var string
     */
    private $headline;
    /**
     * @var string
     */
    private $text;

    /**
     * @var number|string
     */
    private $innerContainerBackgroundID;
    /**
     * @var number|string
     */
    private $outerContainerBackgroundID;


    public function __construct($params) {
        $this->headline = $params['headline'];
        $this->text = $params['text'];
        $this->innerContainerBackgroundID = $params['inner-container-background-id'];
        $this->outerContainerBackgroundID = $params['outer-container-background-id'];
    }

    /**
     * @return string
     */
    public function getHeadline() {
        return $this->headline;
    }

    /**
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @return number|string
     */
    public function getInnerContainerBackgroundID() {
        return $this->innerContainerBackgroundID;
    }

    /**
     * @return number|string
     */
    public function getOuterContainerBackgroundID() {
        return $this->outerContainerBackgroundID;
    }
}
