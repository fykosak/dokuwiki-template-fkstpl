<?php

/**
 * Template Functions
 *
 * This file provides template specific custom functions that are
 * not provided by the DokuWiki core.
 * It is common practice to start each function with an underscore
 * to make sure it won't interfere with future core functions.
 */
// must be run from within DokuWiki
if(!defined('DOKU_INC')) die();



/*
 * začiatok mišoveho šialenstva!!!
 * deti nepite moc energeťaku lebo vám z toho žačne šibať
 */

/**
 * 
 * @global type $INFO
 * @global type $lang
 * @return int
 */
function _fks_topbaruser() {
    global $INFO;
    global $lang;

    $Rdata = array();


    $Rdata[] = array('id' => '',
        'ns' => '',
        'type' => 'd',
        'level' => 1,
        'open' => 1,
        'title' => '<span class="glyphicon glyphicon-cog"></span>');

    $Rdata[] = array('id' => '',
        'ns' => '',
        'type' => 'f',
        'level' => 2,
        'open' => 1,
        'title' => '<li class="dropdown-header"><span class="glyphicon glyphicon-user"></span><span>'.(($INFO['userinfo']['name'] != null) ? ($lang['loggedinas'].'<br>'.$INFO['userinfo']['name']) : tpl_getLang('nologin')).'</span></li>');

    _fks_getUserTools($Rdata);
    _fks_getPageTools($Rdata);
    _fks_getSiteTools($Rdata);

    return $Rdata;
}

/**
 * 
 * @global type $conf
 * @global type $lang
 * @global type $INFO
 * @global type $ID
 * @param helper_plugin_translate $translateHelper
 * @param type $pageLang
 */
function _tpl_mainmenu(helper_plugin_translate $translateHelper,$pageLang) {
    global $conf,$lang;


    $data2 = tpl_parsemenutext($pageLang);

    $data3 = _fks_topbaruser();

    global $INFO,$ID;
    $langs = array();
    if($INFO['exists']){
        if($translateHelper->isTranslatable()){
            $orig = $translateHelper->getOriginal();
            $origlang = $translateHelper->getPageLanguage($orig);
            $langs = array_values($translateHelper->getTranslations($orig));
            $currentlang = $translateHelper->getPageLanguage($ID);

            if(count($langs) > 0 && !in_array($origlang,$langs)){
                array_unshift($langs,$origlang);
            }
            $alangs = $langs;

            unset($langs[array_search($currentlang,$langs)]);
        }
    }

    $lang_select = _fks_langSelect($translateHelper,$alangs,$currentlang);


    echo '
    <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->';


    echo ' <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">    
        <a href="'.wl().'">
            <div class="navbar-brand collapsed">
                <span >FYKOS.cz</span>
                <img class="svg" src="'.DOKU_TPL.'images/fykos-logo.svg" alt="logo FYKOS.cz"/>
            </div>
        </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      </div>
         <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      ';

    _fks_getNavbar($data2,'navbar-left');
    _fks_getNavbar(array_merge($data3,$lang_select),'navbar-right');




    echo '
        </div>
</div><!--/.container-fluid -->
</nav>
<div class = "clearer">
</div>';
}

function _wp_tpl_parsemenufile(&$data,$filename) {

    $ret = TRUE;
    $filepath = wikiFN($filename);
    if(file_exists($filepath)){
        $lines = file($filepath);
        $i = 0;
        $lines2 = array();
// read only lines formatted as wiki lists
        foreach ($lines as $line) {
            if(preg_match('/^\s+\*/',$line)){
                $lines2[] = $line;
            }
            $i++;
        }
        $numlines = count($lines2);
        $oldlevel = 0;
// Array is read back to forth so pages with children can be found easier
// you do not have to go back in the array if a child entry is found
        for ($i = $numlines - 1; $i >= 0; $i--) {
            if(!$lines2[$i]){
                continue;
            }
            $tmparr = explode('*',$lines2[$i]);
            $level = intval(strlen($tmparr[0]) / 2);
            if($level > 3){
                $level = 3;
            }
// ignore lines without links
            if(!preg_match('/\s*\[\[[^\]]+\]\]/',$tmparr[1])){
                continue;
            }
            $tmparr[1] = str_replace(array(']','['),'',trim($tmparr[1]));
            list($id,$title) = explode('|',$tmparr[1]);
// ignore links to non-existing pages
            if(!file_exists(wikiFN($id))){
                if(preg_match('#https?://#',$id)){
                    if(!$title){
                        $title = $id;
                    }
                }else{

                }
            }

            $data[$i]['id'] = $id;


            $data[$i]['type'] = 'f';
            $data[$i]['level'] = $level;
            $data[$i]['open'] = 1;
            $data[$i]['title'] = $title;

           
            if($oldlevel > $level){
                $data[$i]['type'] = 'd';
            }
            $oldlevel = $level;
        }
    }else{
        $ret = FALSE;
    }
    ksort($data);
    return $ret;
}


function tpl_parsemenutext($pageLang = "cs") {
    require_once(DOKU_INC.'inc/search.php');
    $data = array();
    $menufilename = 'system/menu_'.$pageLang;
    _wp_tpl_parsemenufile($data,$menufilename);
    return $data;
}

function _fks_langSelect($translateHelper,$alangs = array(),$currentlang = "") {
    if(count($alangs) == 0) return array();
    $Rdata = array();
    $Rdata[] = array('id' => '',
        'ns' => '',
        'type' => 'f',
        'level' => 1,
        'open' => 1,
        'title' => '<span class="fa fa-language"></span>');

    foreach ($alangs as $l) {
        $text = '<span>'.$translateHelper->getLanguageName($l).'</span>';
        $Rdata[] = array('id' => '',
            'ns' => '',
            'type' => 'f',
            'level' => 2,
            'open' => 1,
            'title' => '<li '.($l == $currentlang ? 'class = "active"' : '').'>'.$translateHelper->translationLink($l,$text,false).' </li >');
    }


    return $Rdata;
}

function _fks_getFYKOS($pageLang) {

    return 'FYKOS'.(($pageLang == "cs") ? '.cz' : '.org');
}

function _fks_getUserTools(&$Rdata) {
    global $lang;
    $Rdata[] = array('id' => '',
        'ns' => '',
        'type' => 'f',
        'level' => 2,
        'open' => 1,
        'title' => '<li class="dropdown-header"><span class="glyphicon glyphicon-user"></span>'.$lang['user_tools'].'.</li>');

    $usertools = array(
        'view' => 'main',
        'items' => array('admin' => tpl_action('admin',1,'li',1),
            //   'userpage' => tpl_action('userpage',1,'li',1),
            'profile' => tpl_action('profile',1,'li',1),
            'register' => tpl_action('register',1,'li',1),
            'login' => tpl_action('login',1,'li',1)
        )
    );

    $evt = new Doku_Event('TEMPLATE_USERTOOLS_DISPLAY',$usertools);

    if($evt->advise_before()){
        foreach ($evt->data['items'] as $k => $html) {
            $Rdata[] = array('id' => '',
                'ns' => '',
                'type' => 'f',
                'level' => 2,
                'open' => 1,
                'title' => $html);
        }
    }

    $evt->advise_after();
    unset($usertools);
    unset($evt);
}

function _fks_getSiteTools(&$Rdata) {


    global $lang;
    $Rdata[] = array('id' => '',
        'ns' => '',
        'type' => 'f',
        'level' => 2,
        'open' => 1,
        'title' => '<li class="dropdown-header"><span class="glyphicon glyphicon-user"></span>'.$lang['site_tools'].'.</li>');



    ob_start();
    tpl_searchform();
    $search_form = ob_get_contents();
    ob_end_clean();

    $sitetools = array(
        'view' => 'main',
        'items' => array(
            'recent' => tpl_action('recent',1,'li',1),
            'media' => tpl_action('media',1,'li',1),
            'index' => tpl_action('index',1,'li',1),
            'search' => $search_form
        )
    );

    $evt = new Doku_Event('TEMPLATE_USERTOOLS_DISPLAY',$sitetools);

    if($evt->advise_before()){
        foreach ($evt->data['items'] as $k => $html) {
            $Rdata[] = array('id' => '',
                'ns' => '',
                'type' => 'f',
                'level' => 2,
                'open' => 1,
                'title' => $html);
        }
    }

    $evt->advise_after();
    unset($sitetools);
    unset($evt);
}

function _fks_getPageTools(&$Rdata) {
    global $lang;
    $Rdata[] = array('id' => '',
        'ns' => '',
        'type' => 'f',
        'level' => 2,
        'open' => 1,
        'title' => '<li class="dropdown-header"><span class="glyphicon glyphicon-user"></span>'.$lang['page_tools'].'</li>');


    $pagetools = array(
        'view' => 'main',
        'items' => array(
            'edit' => tpl_action('edit',1,'li',1),
            'revert' => tpl_action('revert',1,'li',1),
            'revisions' => tpl_action('revisions',1,'li',1),
            'backlink' => tpl_action('backlink',1,'li',1),
            'subscribe' => tpl_action('subscribe',1,'li',1)
        )
    );


    $evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY',$pagetools);

    if($evt->advise_before()){
        foreach ($evt->data['items'] as $k => $html) {
            $Rdata[] = array('id' => '',
                'ns' => '',
                'type' => 'f',
                'level' => 2,
                'open' => 1,
                'title' => $html);
        }
    }

    $evt->advise_after();
    unset($pagetools);
    unset($evt);
}

function _fks_getnavbar($data,$class = "") {

    echo ' 
 
      <ul class="nav navbar-nav '.$class.'">';
    $inli = false;
    $inul = false;

    foreach ($data as $k => $v) {
        if($v['level'] == 1){

            if($inul){
                $inul = false;
                echo'</ul>';
            }
            if($inli){
                $inli = false;
                echo'</li>';
            }
            /* is next level 2? */
            if($data[$k + 1]['level'] == 2){
                $inli = true;
                echo'<li class="dropdown">
          <a href="'.wl(cleanID($v['id'])).'" class="dropdown-toggle" data-toggle="dropdown">'.$v['title'].'<span class="caret"></span></a>';
            }else{

                if(preg_match('#https?://#',$v['id'])){
                    echo'<li> <a class="navbar-brand" href="'.htmlspecialchars($v['id']).'">
                        <span>'.htmlspecialchars($v['title']).' </span>
                                            </a> </li>';
                }else{
                    echo'<li> <a class="navbar-brand" href="'.wl(cleanID($v['id'])).'">
                        <span>'.$v['title'].' </span>
                                            </a></li> ';
                }
            }
        }elseif($v['level'] == 2){
            if(!$inul){
                $inul = true;
                echo'<ul class="dropdown-menu" role="menu">';
            }

            if(!empty($v['id'])){
                echo'<li>';

                if($v['type'] == 'abs'){
                    echo'<a href="'.$v['id'].'"><span class="menu_'.$v['id'].'">'.$v['title'].'</span></a>';
                }else{

                    echo'<a href="'.wl(cleanID($v['id'])).'"><span class="menu_'.$v['id'].'">'.$v['title'].'</span></a>';
                }
                echo'</li>';
            }else{

                echo $v['title'];
            }
        }
    }
    if($inli){
        $inli = false;
        echo'</li>';
    }
    if($inul){
        $inul = false;
        echo'</ul>';
    }

    echo'

      </ul>
    </li>
  </ul>
';
}
