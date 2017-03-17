<?php

class BootstrapNavBar {
    private $data = [];
    const PAGE_TOOLS_CLASS_NAME = 'tools';

    public function addItem($item) {
        $this->data[] = $item;
    }


    private static function userTools() {
        global $INFO;
        global $lang;
        $data = [];
        $data[] = [
            'id' => '',
            'type' => 'd',
            'level' => 1,
            'open' => 1,
            'title' => '<span class="nav-item glyphicon glyphicon-cog"></span>'
        ];
        $userName = (($INFO['userinfo']['name'] != null) ? ($lang['loggedinas'] . $INFO['userinfo']['name']) : tpl_getLang('nologin'));
        $data[] = [
            'id' => '',
            'type' => 'f',
            'level' => 2,
            'open' => 1,
            'title' => '<div class="dropdown-item"><span class="fa fa-user"/>
' . $userName . '</div>'
        ];
        self::getUserTools($data);
        self::getPageTools($data);
        self::getSiteTools($data);
        return $data;
    }


    public static function mainMenu() {
        global $conf;
        $html = '';

        $data2 = self::parseMenuText($conf['lang']);
        $data3 = self::userTools();

        $lang_select = self::getLangSelect();
        $html .= '
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-light-fykos offset-lg-1 offset-md-1 col-xs-12 col-sm-12 col-md-10 col-lg-10" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->';

        $html .= '    
        <a class="navbar-brand" href="' . wl() . '">               
                <img class="svg" src="' . DOKU_TPL . 'images/fykos-logo.svg" width="60" height="60" class="d-inline-block align-top" alt=""/>
                 FYKOS.cz
        </a>
        
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 
   
         <div class="collapse navbar-collapse" id="mainNavbar">
      ';

        $html .= self::renderNavBar($data2, 'nav justify-content-start');
        $html .= self::renderNavBar(array_merge($data3, $lang_select), 'nav justify-content-end');


        $html .= '
</nav>';
        echo $html;
    }

    function parseMenuFile(&$data, $filename) {

        $ret = TRUE;
        $filepath = wikiFN($filename);
        if (file_exists($filepath)) {
            $lines = file($filepath);
            $i = 0;
            $lines2 = array();
// read only lines formatted as wiki lists
            foreach ($lines as $line) {
                if (preg_match('/^\s+\*/', $line)) {
                    $lines2[] = $line;
                }
                $i++;
            }
            $numlines = count($lines2);
            $oldlevel = 0;
// Array is read back to forth so pages with children can be found easier
// you do not have to go back in the array if a child entry is found
            for ($i = $numlines - 1; $i >= 0; $i--) {
                if (!$lines2[$i]) {
                    continue;
                }
                $tmparr = explode('*', $lines2[$i]);
                $level = intval(strlen($tmparr[0]) / 2);
                if ($level > 2) {
                    $level = 2;
                }
// ignore lines without links
                if (!preg_match('/\s*\[\[[^\]]+\]\]/', $tmparr[1])) {
                    continue;
                }
                $tmparr[1] = str_replace(array(']', '['), '', trim($tmparr[1]));
                list($id, $title, $icon) = explode('|', $tmparr[1]);

                $data[$i]['id'] = $id;
                $data[$i]['icon'] = $icon;

                $data[$i]['type'] = 'f';
                $data[$i]['level'] = $level;
                $data[$i]['open'] = 1;
                $data[$i]['title'] = $title;


                if ($oldlevel > $level) {
                    $data[$i]['type'] = 'd';
                }
                $oldlevel = $level;
            }
        } else {
            $ret = FALSE;
        }
        ksort($data);
        return $ret;
    }

    public static function parseMenuText($pageLang = "cs") {

        $data = [];
        $menuFileName = 'system/menu_' . $pageLang;
        self::parseMenuFile($data, $menuFileName);
        return $data;
    }

    public static function getLangSelect() {
        global $conf;
        if (count($conf['available_lang']) == 0) return array();
        $data = [];
        $data[] = array(
            'id' => '',
            'ns' => '',
            'type' => 'f',
            'level' => 1,
            'open' => 1,
            'title' => '<span class="fa fa-language"></span>'
        );

        foreach ($conf['available_lang'] as $l) {

            $data[] = array(
                'id' => '',
                'ns' => '',
                'type' => 'f',
                'level' => 2,
                'open' => 1,
                'title' => '<div class = "dropdown-item ' . ($l['code'] == $conf['lang'] ? 'active' : '') . '">' . $l['text'] . ' </div>'
            );
        }


        return $data;
    }

    public static function fks_getFykos() {
        global $conf;
        return 'FYKOS' . (($conf['lang'] == "cs") ? '.cz' : '.org');
    }

    public static function getUserTools(&$data) {
        global $lang;
        $data[] = array(
            'id' => '',
            'ns' => '',
            'type' => 'f',
            'level' => 2,
            'open' => 1,
            'title' => '<div class="dropdown-header"><span class="glyphicon glyphicon-user"></span>' . $lang['user_tools'] . '.</div>'
        );

        $userTools = array(
            'view' => 'main',
            'items' => array(
                'admin' => tpl_action('admin', true, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                //   'userpage' => tpl_action('userpage',1,'li',1),
                'profile' => tpl_action('profile', true, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'register' => tpl_action('register', true, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'login' => tpl_action('login', true, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1)
            )
        );
        $evt = new Doku_Event('TEMPLATE_USERTOOLS_DISPLAY', $userTools);

        if ($evt->advise_before()) {
            foreach ($evt->data['items'] as $k => $html) {
                $data[] = array(
                    'id' => '',
                    'ns' => '',
                    'type' => 'f',
                    'level' => 2,
                    'open' => 1,
                    'title' => $html
                );
            }
        }

        $evt->advise_after();
        unset($userTools);
        unset($evt);
    }

    public static function getSiteTools(&$data) {


        global $lang;
        $data[] = array(
            'id' => '',
            'ns' => '',
            'type' => 'f',
            'level' => 2,
            'open' => 1,
            'title' => '<div class="dropdown-header"><span class="glyphicon glyphicon-user"></span>' . $lang['site_tools'] . '.</div>'
        );


        ob_start();
        tpl_searchform();
        $search_form = ob_get_contents();
        ob_end_clean();

        $siteTools = array(
            'view' => 'main',
            'items' => array(
                'recent' => tpl_action('recent', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'media' => tpl_action('media', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'index' => tpl_action('index', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'search' => $search_form
            )
        );

        $event = new Doku_Event('TEMPLATE_USERTOOLS_DISPLAY', $siteTools);

        if ($event->advise_before()) {
            foreach ($event->data['items'] as $k => $html) {
                $data[] = array(
                    'id' => '',
                    'type' => 'f',
                    'level' => 2,
                    'open' => 1,
                    'title' => $html
                );
            }
        }

        $event->advise_after();
        unset($siteTools);
        unset($evt);
    }

    public static function getPageTools(&$data) {
        global $lang;
        $data[] = array(
            'id' => '',
            'type' => 'f',
            'level' => 2,
            'open' => 1,
            'title' => '<div class="dropdown-header"><span class="glyphicon glyphicon-user"></span>' . $lang['page_tools'] . '</div>'
        );
        $pageTools = [
            'view' => 'main',
            'items' => array(
                'edit' => tpl_action('edit', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'revert' => tpl_action('revert', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'revisions' => tpl_action('revisions', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'backlink' => tpl_action('backlink', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1),
                'subscribe' => tpl_action('subscribe', 1, 'div class="' . self::PAGE_TOOLS_CLASS_NAME . '"', 1)
            )
        ];


        $event = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $pageTools);

        if ($event->advise_before()) {
            foreach ($event->data['items'] as $k => $html) {
                $data[] = array(
                    'id' => '',
                    'type' => 'f',
                    'level' => 2,
                    'open' => 1,
                    'title' => $html
                );
            }
        }

        $event->advise_after();
        unset($pageTools);
        unset($evt);
    }

    public function renderNavBar($data, $class = "") {
        $html = '';

        $html .= '<ul class="nav navbar-nav ' . $class . '">';
        $inLI = false;
        $inUL = false;

        foreach ($data as $k => $v) {
            $icon = $v['icon'] ? ('<span class="' . $v['icon'] . '"/>') : '';
            $link = preg_match('#https?://#', $v['id']) ? htmlspecialchars($v['id']) : wl(cleanID($v['id']));
            $title = $icon . $v['title'];
            if ($v['level'] == 1) {

                if ($inUL) {
                    $inUL = false;
                    $html .= '</div>' . "\n";
                }
                if ($inLI) {
                    $inLI = false;
                    $html .= '</li>' . "\n";
                }
                /* is next level 2? */
                if ($data[$k + 1]['level'] == 2) {
                    $inLI = true;

                    $html .= '<li class="dropdown nav-item">
          <a href="' . $link . '" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >' . $title . '<span class="caret"></span></a>';
                } else {
                    $html .= '<a class="nav-item nav-link" href="' . $link . '">' . $title . '</a>' . "\n";
                }
            } elseif ($v['level'] == 2) {
                if (!$inUL) {
                    $inUL = true;
                    $html .= '<div class="dropdown-menu" role="menu">' . "\n";
                }

                if (!empty($v['id'])) {
                    $html .= '<a class="dropdown-item" href="' . $link . '">' . $title . '</a>' . "\n";
                } else {
                    $html .= $v['title'] . "\n";
                }
            }
        }
        if ($inLI) {
            $html .= '</li>';
        }
        if ($inUL) {
            $html .= '</div>';
        }

        $html .= '

      </ul>
    </li>
  </ul>
';
        return $html;

    }
    /*
        public static function fks_msg() {
            global $conf;
            $msg = tpl_getConf('msg_' . $conf['lang']);
            if ($msg == "") {
                return;
            }
            $msgs = explode(DOKU_LF, $msg);
            $msgs = array_filter($msgs, function ($a) {
                return $a != "";
            });
            echo hsc($msgs[array_rand($msgs)]);
            return;
        }*/

    /**
     *
     *
     * public static function fks_fastLinks() {
     * global $conf;
     * $l = tpl_getConf('flast-links_' . $conf['lang']);
     * $ls = array_filter(explode(DOKU_LF, $l), function ($a) {
     * return $a != "";
     * });
     * $links = array_map(function ($a) {
     *
     * preg_match('/\[\[(.*)\|(.*)\]\]/', $a, $matches);
     * return array('id' => trim($matches[1]), 'text' => $matches[2]);
     * }, $ls);
     *
     * foreach ($links as $value) {
     * echo '<a href="' . wl(cleanID($value['id'])) . '" class="fast-link" data-color="' . self::fks_getNameSpaceColor($value['id']) . '">';
     * echo '<div>';
     * echo '<span>' . hsc($value['text']) . '</span>';
     * echo '</div>';
     * echo '</a>';
     * }
     * }
     *
     * public static function fks_getNameSpaceColor($id) {
     * return rand(0, 5);
     * }
     *  */
}

