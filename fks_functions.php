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
                'headline' => 'Akce FYKOSu',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rutrum porta tellus. Aenean et
                        dolor sed elit rutrum finibus eu a tellus. Etiam ac leo sit amet justo rhoncus sodales sed id
                        diam.',
                'page' => 'akce:fyziklani:start',
                'background-id' => 'akce',
                'inner-container-background-id' => null,
            ],
        ],
        'akce:fyziklani:start' => [
            [
                'headline' => 'FYKOSí Fyzikláni',
                'text' => 'Fyziklání je tradiční soutěž maximálně 5členných týmů středoškoláků, kteří se zajímají o matematiku a fyziku. Jejich úlohou bude v daném časovém limitu získat za řešení úloh co nejvíce bodů.',
                'page' => null,
                'background-id' => 1,
                'inner-container-background-id' => 1,
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
                <div class="col-lg-4 col-md-10 col-sm-10 col-xs-10">
                    <a class="page-header" href="' . wl() . '">
                        <div class="row">
                            <div class="col-xs-4">
                            ';
        echo self::getFYKOSLogo();
        echo ' 
                            </div>
                            <div class="col-xs-8 h1 fykos" style="align-self: center;">
                                FYKOS<small style="font-size: 50%">.' . ($lang == 'en' ? 'org' : 'cz') . '</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 primary-menu-container hidden-md-down" style="align-self: flex-end;">
                   ';
        self::getPrimaryNav()
            ->render();

        echo '</div>
            </div>            
        </div>';
        echo '<div class="container-fluid">
            <div class="row hidden-lg-up">';
        self::getFullNav()
            ->render();
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
                <div class="row nav-container hidden-md-down">';
            $secondMenu->render();
            echo '
                </div>
            </div>';
        };
    }

    private static function getFullNav() {
        $fullMenu = new BootstrapNavBar('full');
        $fullMenu->setClassName('col-xs-12 col-md-12 col-sm-12 navbar-inverse  bg-light-fykos');
        $fullMenu->addMenuText('menu-primary');
        $fullMenu->addMenuText('menu-second-left');
        $fullMenu->addMenuText('menu-second-right');
        $fullMenu->addTools('justify-content-end');
        $fullMenu->addLangSelect('justify-content-end');
        return $fullMenu;
    }

    private static function getPrimaryNav() {
        $primaryMenu = new BootstrapNavBar('primary');
        $primaryMenu->setClassName('navbar  bg-light');
        $primaryMenu->addMenuText('menu-primary', 'mr-auto');
        $primaryMenu->addTools();
        $primaryMenu->addLangSelect();
        return $primaryMenu;
    }

    private static function getSecondaryNav() {
        $secondMenu = new BootstrapNavBar('secondary');
        $secondMenu->setClassName('navbar-inverse bg-light-fykos container');
        $secondMenu->addMenuText('menu-second-left', 'mr-auto');
        $secondMenu->addMenuText('menu-second-right');
        return $secondMenu;
    }

    private static function getFYKOSLogo() {
        return '<?xml version="1.0" ?>
<svg version="1.1" baseProfile="tiny" width="100" height="80" viewBox="0 0 22578 11853" preserveAspectRatio="xMidYMid" fill-rule="evenodd" fill="none" stroke-width="28.222" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">
<g stroke-width="250">
    <path  d="M 1218,9014 C 1015,8459 1059,7842 1339,7321 1532,6963 1828,6671 2186,6475 2555,6272 2976,6179 3394,6233 3649,6266 3892,6354 4119,6475 4327,6585 4520,6721 4724,6837 4803,6882 4883,6924 4966,6959 5120,7023 5283,7064 5449,7080"/>
    <path d="M 4120,6474 C 3997,6470 3872,6490 3757,6535 3551,6615 3378,6765 3273,6959"/>
    <path d="M 3273,6958 C 3386,6898 3509,6857 3636,6837 3756,6819 3879,6819 3999,6837"/>
    <path d="M 3999,6837 C 3855,6876 3727,6961 3635,7078 3579,7151 3538,7233 3515,7321"/>
    <path d="M 3515,7322 C 3593,7277 3673,7236 3756,7200 3874,7150 3996,7109 4120,7079"/>
    <path d="M 4120,7079 C 4049,7151 3988,7232 3937,7321 3915,7360 3894,7401 3877,7442"/>
    <path d="M 3877,7442 C 4000,7480 4135,7457 4240,7381 4345,7305 4405,7184 4482,7078 4550,6985 4632,6904 4724,6837"/>
    <path d="M 5568,7081 C 5471,6835 5518,6556 5689,6354 5810,6212 5986,6125 6173,6113"/>
    <path d="M 5447,5871 C 5264,6014 5173,6246 5205,6476 5240,6714 5402,6906 5569,7081 5648,7163 5728,7244 5811,7322"/>
    <path d="M 5569,7563 C 5581,7465 5533,7369 5448,7320 5372,7278 5280,7278 5206,7320"/>
    <path d="M 5449,7079 C 5486,7224 5354,7358 5206,7321 5163,7310 5126,7282 5086,7261 4869,7144 4598,7225 4481,7442"/>
    <path d="M 4481,7441 L 4844,7684"/>
    <path d="M 4845,7683 C 4638,7588 4394,7636 4239,7804 4177,7873 4135,7956 4119,8047"/>
    <path d="M 4724,8168 C 4612,8103 4489,8061 4360,8045 4280,8036 4199,8036 4119,8045"/>
    <path d="M 7020,6837 C 6891,6903 6769,6985 6657,7078 6525,7188 6409,7314 6294,7442 6217,7526 6141,7611 6052,7683 5880,7824 5669,7911 5447,7925 5407,7927 5367,7927 5327,7925"/>
    <path d="M 5328,7925 C 5336,7964 5336,8006 5328,8045 5291,8221 5125,8325 4965,8409 4804,8493 4643,8573 4481,8651"/>
    <path d="M 4480,8651 C 4455,8572 4455,8488 4480,8408 4519,8294 4609,8205 4723,8167"/>
    <path d="M 1218,9014 C 1030,8883 866,8719 735,8531 631,8382 549,8220 493,8047 366,7656 373,7232 493,6838 701,6160 1211,5629 1822,5267 2301,4985 2837,4805 3394,4783 3800,4767 4202,4835 4602,4904 4683,4918 4767,4932 4844,4904 4955,4865 5018,4758 5086,4662 5472,4112 6120,3842 6777,3696 7056,3634 7338,3591 7623,3575 8120,3547 8626,3598 9074,3816 9438,3994 9739,4271 10041,4541 10211,4694 10383,4845 10524,5026 10560,5071 10594,5119 10645,5147 10719,5187 10807,5177 10886,5147 11091,5069 11232,4880 11249,4662"/>
    <path d="M 11248,4663 C 11083,4540 10957,4372 10885,4180 10783,3907 10793,3608 10885,3333 11008,2967 11269,2664 11611,2487"/>
    <path d="M 11610,2487 C 11570,2688 11530,2889 11489,3092 11430,3375 11373,3672 11489,3937 11583,4152 11774,4300 11973,4422 12127,4516 12290,4596 12457,4663"/>
    <path d="M 7624,3575 C 7655,3335 7655,3091 7624,2849 7595,2629 7536,2406 7382,2245 7254,2112 7079,2042 6899,2004 6660,1954 6412,1956 6173,2004 5780,2083 5426,2277 5085,2487 4714,2715 4356,2963 3997,3213 3593,3494 3190,3776 2789,4059"/>
    <path d="M 2789,4059 C 3122,3364 3572,2730 4118,2186 4516,1789 4963,1443 5448,1158 5974,849 6542,615 7139,493 7577,403 8026,376 8470,433 8908,490 9337,634 9678,916 9907,1106 10086,1354 10161,1642 10213,1840 10212,2048 10161,2246 10080,2565 9881,2834 9678,3092 9483,3340 9281,3581 9074,3818"/>
    <path d="M 13664,4784 C 13983,4847 14306,4887 14630,4906 14872,4920 15114,4922 15355,4906 15884,4870 16403,4746 16927,4663 17447,4581 17972,4542 18498,4542"/>
    <path d="M 18498,4542 C 18424,4628 18343,4709 18257,4783 18002,5002 17702,5159 17411,5327 17130,5489 16853,5663 16564,5811 16444,5873 16322,5931 16202,5992 15961,6116 15729,6257 15477,6355 15244,6446 14999,6498 14752,6536 14551,6567 14350,6589 14148,6597 13864,6608 13579,6592 13301,6536 12862,6448 12449,6262 12093,5992"/>
    <path d="M 16565,6354 C 16187,6603 15782,6806 15357,6959 15005,7086 14641,7177 14269,7201 13863,7228 13457,7174 13061,7081 12489,6944 11940,6726 11368,6596 11051,6523 10727,6479 10401,6475 9907,6467 9416,6549 8952,6717"/>
    <path d="M 9437,5750 C 9221,6041 9058,6368 8954,6716 8872,6991 8827,7276 8833,7562 8840,7927 8927,8285 8954,8651 8981,9018 8945,9387 8833,9738 8697,10161 8452,10543 8108,10826 7826,11056 7490,11209 7140,11309 6709,11431 6258,11472 5811,11430 5297,11381 4797,11223 4360,10946 4094,10777 3857,10566 3635,10342 3272,9974 2947,9569 2669,9134"/>
    <path  d="M 2669,9135 C 3017,9327 3380,9488 3756,9618 4186,9767 4632,9873 5086,9860 5514,9847 5933,9727 6295,9497 6539,9343 6751,9141 6900,8893 7095,8566 7168,8184 7141,7805 7118,7480 7023,7164 7020,6837 7019,6674 7041,6512 7081,6354 7123,6186 7183,6024 7262,5871"/>
    <path  d="M 13666,4784 C 13480,4245 12747,4171 12456,4663 12223,5061 12476,5571 12940,5631 13417,5692 13800,5245 13666,4784 Z"/>
    <path d="M 13543,5025 C 13517,5131 13402,5188 13301,5146 13138,5078 13140,4846 13301,4783 13453,4725 13602,4873 13543,5025 Z"/>
    <path d="M 5085,4662 C 5230,4696 5360,4782 5448,4903 5525,5009 5567,5136 5569,5267"/>
    <path d="M 4844,4904 C 4889,4938 4930,4979 4965,5024 5021,5097 5063,5179 5087,5267"/>
    <path  d="M 4603,4904 C 4627,4982 4627,5066 4603,5146 4590,5189 4568,5230 4542,5267"/>
    <path d="M 10644,5146 C 10668,5224 10668,5309 10644,5388 10631,5433 10609,5473 10583,5510"/>
    <path   d="M 10885,5146 C 10922,5243 10943,5345 10946,5450 10947,5470 10947,5490 10946,5510"/>
</g>
</svg>';
    }
}

function bootstrapToc() {
    global $TOC;
    global $ACT;
    global $ID;
    global $REV;
    global $INFO;
    global $conf;
    global $INPUT;
    $html = '';
    $toc = array();

    if (is_array($TOC)) {
        // if a TOC was prepared in global scope, always use it
        $toc = $TOC;
    } elseif (($ACT == 'show' || substr($ACT, 0, 6) == 'export') && !$REV && $INFO['exists']) {
        // get TOC from metadata, render if neccessary
        $meta = p_get_metadata($ID, '', METADATA_RENDER_USING_CACHE);
        if (isset($meta['internal']['toc'])) {
            $tocok = $meta['internal']['toc'];
        } else {
            $tocok = true;
        }
        $toc = isset($meta['description']['tableofcontents']) ? $meta['description']['tableofcontents'] : null;
        if (!$tocok || !is_array($toc) || !$conf['tocminheads'] || count($toc) < $conf['tocminheads']) {
            $toc = array();
        }
    } elseif ($ACT == 'admin') {
        // try to load admin plugin TOC
        /** @var $plugin DokuWiki_Admin_Plugin */
        if ($plugin = plugin_getRequestAdminPlugin()) {
            $toc = $plugin->getTOC();
            $TOC = $toc; // avoid later rebuild
        }
    }
    if (count($toc) === 0) {
        return false;
    }
    $level = 0;
    $html .= '<nav class="navbar flex-column">';
    foreach ($toc as $item) {
        if ($level) {
            if ($level > $item['level']) {
                $html .= str_repeat('</nav>', $level - $item['level']);
            } elseif (($level < $item['level'])) {
                $html .= str_repeat('<nav class="nav flex-column">', $item['level'] - $level);
            }
        }
        $html .= '<a class="nav-link" href="#' . hsc($item['hid']) . '">' . hsc($item['title']) . '</a>';
        $level = $item['level'];
    }
    $html .= '</nav>';
    return $html;


}