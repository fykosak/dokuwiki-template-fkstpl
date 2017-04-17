<?php

class fksTemplate {
    private static $jumbotronData = [
        'start' => [
            [
                'headline' => 'Týmové soutěže',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:fyziklani:start',
                'background-id' => 1,
                'inner-container-background-id' => 1,
            ],
            [
                'headline' => 'Noví kamarádi',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:soustredeni:start',
                'background-id' => 2,
                'inner-container-background-id' => 2,
            ],
            [
                'headline' => 'Nezapomenutelná soustředění',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:soustredeni:start',
                'background-id' => 3,
                'inner-container-background-id' => 3,
            ],
            [
                'headline' => 'Věda zábavným způsobem',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:soustredeni:start',
                'background-id' => 4,
                'inner-container-background-id' => 4,
            ],
            [
                'headline' => 'Zážitky, na které se nezapomíná',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:soustredeni:start',
                'background-id' => 5,
                'inner-container-background-id' => 5,
            ],
            [
                'headline' => 'Exkurze na vědecká pracoviště',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:soustredeni:start',
                'background-id' => 6,
                'inner-container-background-id' => 6,
            ],
        ],
        'akce:start' => [
            [
                'headline' => 'Týmové soutěže',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:fyziklani:start',
                'background-id' => 1,
                'inner-container-background-id' => 1,
            ],
        ],
        'akce:fyziklani:start' => [
            [
                'headline' => 'FYKOSí Fyzikláni',
                'text' => 'Fyziklání je tradiční soutěž maximálně 5členných týmů středoškoláků, kteří se zajímají o matematiku a fyziku. Jejich úlohou bude v daném časovém limitu získat za řešení úloh co nejvíce bodů.',
                'page' => null,
                'background-id' => 'fof',
                'inner-container-background-id' => null,
            ],
        ],
    ];

    public static function getRandomJumbotron($pageID) {
        if (self::$jumbotronData[$pageID]) {
            return self::$jumbotronData[$pageID][array_rand(self::$jumbotronData[$pageID])];
        }
        return false;
    }

    public static function printHeader($lang, $pageID) {
        echo '<header>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-10 col-sm-10 col-xs-10">
                    <a class="page-header" href="' . wl() . '">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="' . DOKU_TPL . 'images/fykos-logo-blue.svg"
                                     width="150"
                                     height="120"
                                     class="d-inline-block align-top"
                                     alt=""/>
                            </div>
                            <div class="col-xs-8 h1 fykos" style="align-self: center;">
                                FYKOS<small style="font-size: 50%">.' . ($lang == 'en' ? 'org' : 'cz') . '</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 primary-menu-container hidden-md-down" style="align-self: flex-end;">
                   ';
        self::getPrimaryNav()->render();

        echo '</div>
            </div>            
        </div>';
        echo '<div class="container-fluid">
            <div class="row hidden-lg-up">';
        self::getFullNav()->render();
        echo ' </div>
 </div><!-- Primary menu + FYKOS-->';
        self::printHeaderImage($lang, $pageID);
        echo '</header>';
    }

    private static function printHeaderImage($lang, $pageID) {
        $secondMenu = self::getSecondaryNav();
        $data = fksTemplate::getRandomJumbotron($pageID);
        if ($data) {

            echo '<div
                class="container-fluid header-image jumbotron"
                data-background="' . $data['background-id'] . '">
                <div class="row nav-container hidden-md-down">
                   ';
            $secondMenu->render();

            echo '</div>
                <div class="row">
                    <div class="offset-lg-1 col-lg-8 offset-xl-3 col-xl-5">
                        <div
                            class="jumbotron-inner-container" 
                            ' . ($data['inner-container-background-id'] ? ' data-background="' . $data['inner-container-background-id'] . '"' : '') . '>
                            <h1>' . $data['headline'] . '</h1>
                            <p>' . $data['text'] . '</p>';
            if ($data['page']) {
                echo '<p>
                         <a class="btn btn-secondary" role="button"
                                   href="' . wl($data['page'], null, true) . '">See more</a>
                     </p>';
            }
            echo '</div>
                    </div>
                </div>

            </div>';
        } else {
            echo '<div class="container-fluid header">
                <div class="row nav-container">';

            $secondMenu->render();
            echo '
                </div>

            </div>';

        };
    }

    private static function getFullNav() {
        $fullMenu = new BootstrapNavBar('full');
        $fullMenu->setClassName('col-xs-12 col-md-12 col-sm-12 navbar-inverse  bg-light-fykos');
        $fullMenu->addMenuText('menu-primary', 'justify-content-start');
        $fullMenu->addMenuText('menu-second', 'justify-content-start');
        $fullMenu->addTools('justify-content-end');
        $fullMenu->addLangSelect('justify-content-end');
        return $fullMenu;
    }

    private static function getPrimaryNav() {
        $primaryMenu = new BootstrapNavBar('primary');
        $primaryMenu->setClassName('navbar  bg-light');
        $primaryMenu->addMenuText('menu-primary', 'justify-content-start');
        $primaryMenu->addTools('justify-content-end');
        $primaryMenu->addLangSelect('justify-content-end');
        return $primaryMenu;
    }

    private static function getSecondaryNav() {
        $secondMenu = new BootstrapNavBar('secondary');
        $secondMenu->setClassName('navbar-inverse bg-light-fykos container');
        $secondMenu->addMenuText('menu-second');
        return $secondMenu;
    }
}
