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
    private $innerContainerBackgroundId;
    /**
     * @var number|string
     */
    private $outerContainerBackgroundId;


    public function __construct($params) {
        $this->headline = $params['headline'];
        $this->text = $params['text'];
        $this->innerContainerBackgroundId = $params['inner-container-background-id'];
        $this->outerContainerBackgroundId = $params['outer-container-background-id'];
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
    public function getInnerContainerBackgroundId() {
        return $this->innerContainerBackgroundId;
    }

    /**
     * @return number|string
     */
    public function getOuterContainerBackgroundId() {
        return $this->outerContainerBackgroundId;
    }
}
