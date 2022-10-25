<?php

namespace FYKOS\dokuwiki\template\FYKOSTemplate;

use fksTemplate\Jumbotron\Jumbotron;
use FYKOS\dokuwiki\template\NavBar\BootstrapNavBar;

class FYKOSTemplate
{

    public function printHeader(string $pageId): string
    {
        global $conf;

        return '
<header>
    <div class="container">
        <div class="row">
            <div style="padding-top: 1rem;padding-left: 0rem;" class="col-lg-4 col-md-10 col-sm-10 col-xs-10">
                <a class="page-header" href="' . ($conf['lang'] == 'en' ? wl('en') : wl()) . '">
                     <div class="row">
                        <div class="col-lg-7 h1 fykos" style="align-self: center;">
                             ' . self::getFYKOSLogo() . '
</div>
                     </div>
                </a>
            </div>
            <div class="col-lg-8 primary-menu-container hidden-md-down" style="align-self: flex-end;">
                   ' . self::getPrimaryNav()->render() . '
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row hidden-lg-up">' . self::getFullNav()->render() . '</div>
    </div>
 ' . (new Jumbotron())->render(self::getSecondaryNav(), $pageId) . '
 </header>';
    }

    private static function getFullNav(): BootstrapNavBar
    {
        $fullMenu = new BootstrapNavBar('full', 'col-xs-12 col-md-12 col-sm-12 navbar-inverse  bg-light-fykos');
        $fullMenu->addMenuText('menu-primary');
        $fullMenu->addMenuText('menu-second-left');
        $fullMenu->addMenuText('menu-second-right');
        $fullMenu->addTools('justify-content-end', true);
        $fullMenu->addLangSelect('justify-content-end');
        return $fullMenu;
    }

    private static function getPrimaryNav(): BootstrapNavBar
    {
        $primaryMenu = new BootstrapNavBar('primary', 'navbar  bg-light');
        $primaryMenu->addMenuText('menu-primary', 'mr-auto');
        $primaryMenu->addTools(null, true);
        $primaryMenu->addLangSelect();
        return $primaryMenu;
    }

    private static function getSecondaryNav(): BootstrapNavBar
    {
        $secondMenu = new BootstrapNavBar('secondary', 'navbar-inverse bg-light-fykos container');
        $secondMenu->addMenuText('menu-second-left', 'mr-auto');
        $secondMenu->addMenuText('menu-second-right');
        return $secondMenu;
    }

    private static function getFYKOSLogo(): string
    {
        return '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 962.02 250" style="enable-background:new 0 0 962.02 250;" xml:space="preserve">
<style type="text/css">
	.st0{fill:#1175DA;}
	.st1{fill:#FFFFFF;}
</style>
<g>
	<path d="M371.54,110.18h48.84V139h-48.84v59.18H335.9V51.44h84.48v28.82h-48.84V110.18z"></path>
	<path d="M512.56,198.18h-35.64V133.5l-48.18-82.06h42.46l23.76,45.1l23.32-45.1h41.8l-47.52,82.06V198.18z"></path>
	<path d="M606.72,198.18h-35.64V51.44h35.64v62.04l34.32-62.04h40.92l-40.92,69.74l40.92,77h-40.92l-34.32-64.24V198.18z"></path>
	<path d="M842.56,125.14c0,42.02-34.32,75.9-76.78,75.9c-43.78,0-78.54-33.44-78.54-75.68c0-21.34,8.58-41.14,24.64-56.32
		c14.08-13.2,33.22-20.46,54.78-20.46C810,48.58,842.56,81.36,842.56,125.14z M723.54,124.92c0,24.2,18.26,43.12,41.58,43.12
		c22.88,0,41.36-18.92,41.36-42.46c0-25.08-17.6-44-41.14-44C741.36,81.58,723.54,100.06,723.54,124.92z"></path>
	<path d="M892.27,153.74c-0.22,0.88-0.22,1.98-0.22,2.42c0,7.26,7.92,13.42,17.38,13.42c8.58,0,15.18-5.06,15.18-11.66
		c0-6.82-3.96-9.9-21.12-16.06c-32.12-11.44-44.66-24.86-44.66-47.3c0-27.5,20.24-45.98,50.82-45.98c19.8,0,36.08,8.36,44.66,22.66
		c4.18,6.82,6.16,13.2,7.7,23.54h-36.3c-1.1-10.12-6.16-14.74-16.28-14.74c-8.8,0-14.52,4.62-14.52,11.66c0,4.4,2.2,7.92,6.82,10.56
		c2.64,1.76,5.5,3.08,16.72,7.26c16.72,6.38,24.64,10.56,31.24,16.5c8.14,7.48,12.32,17.6,12.32,29.48
		c0,27.28-21.12,45.54-52.58,45.54c-32.12,0-52.14-18.26-52.14-47.3H892.27z"></path>
</g>
<rect id="Box_00000083056659096386301490000016113851017412428735_" class="st0" width="250" height="250"></rect>
<polygon class="st1" points="143.43,95.17 166.54,106.36 162.85,121.54 141.31,136.81 138.32,116.48 128.28,81.22 91.31,54.88 
	109.67,92.54 107.01,110.9 140.38,155.77 107.61,162.89 130.85,152.17 102.8,109.36 89.59,95.2 28.9,64.92 68.14,110.47 
	92.72,168.12 83.41,183.15 48.74,185.84 80.38,195.12 103.65,182.68 147.98,165.02 159.65,144.67 174.86,122.57 209.49,95.22 
	188.16,103.95 221.1,68.78 182.84,97.43 "></polygon>
</svg>';
    }
}
