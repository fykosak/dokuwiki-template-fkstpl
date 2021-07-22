<?php

namespace fksTemplate\Jumbotron;

use FYKOS\dokuwiki\template\NavBar\BootstrapNavBar;

require_once(dirname(__FILE__) . '/JumbotronItem.php');

final class Jumbotron
{
    public static function render(BootstrapNavBar $secondMenu, string $pageId): string
    {
        $items = self::getItemsByPage($pageId);
        $html = '<div class="container-fluid header-image jumbotron">';
        $html .= '<div class="carousel-container">';
        $html .= self::innerRender($items);
        $html .= '</div>';
        $html .= '<div class="row nav-container hidden-md-down second-nav">';
        $html .= $secondMenu->render();
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    public static function innerRender(array $items): string
    {
        $id = uniqid();
        $indicators = [];
        $parsedItems = [];
        foreach ($items as $key => $item) {
            $indicators[] = '<li data-target="#' . $id . '" data-slide-to="' . $key . '"></li>';
            $parsedItems[] = self::getCarouselItem($item, !$key);
        }
        $html = '<div id="' . $id . '" class="feed-carousel carousel slide mb-3" data-ride="carousel">';

        $html .= '<ol class="carousel-indicators">';
        $html .= join('', $indicators);
        $html .= '</ol>';


        $html .= '<div class="carousel-inner" role="listbox">';
        $html .= join('', $parsedItems);
        $html .= '</div>';

        $html .= '</div>';
        return $html;
    }

    private static function getCarouselItem(JumbotronItem $item, bool $active): string
    {
        $style = null;
        if (is_string($item->backgrounds['outer'])) {
            $style = 'background-image: url(' . ml($item->backgrounds['outer'], ['w' => 1200]) . ')';
        }

        $html = '<div class="carousel-item ' .
            ($style ? '' : 'bg-' . $item->backgrounds['inner'] . '-fade ') .
            ($active ? ' active' : '') .
            '" style="' . ($style ?? '') . '">
            <div class="mx-auto col-lg-8 col-xl-5">
      <div class=" jumbotron-inner-container d-block ' . ($style ? 'bg-' . $item->backgrounds['inner'] . '-fade ' : '') . '">';

        $html .= '<h1>' . hsc($item->headline) . '</h1>';
        $html .= '<p>' . p_render('xhtml', p_get_instructions($item->text), $info) . '</p>';
        $html .= self::getButtons($item);

        $html .= '</div></div></div>';
        return $html;
    }

    private static function getButtons(JumbotronItem $item): string
    {
        $html = '';
        foreach ($item->buttons as $button) {
            $id = $button['page'];

            if (preg_match('|^https?://|', $id)) {
                $href = hsc($id);
            } else {
                $href = wl($id, null, true);
            }
            $html .= '<p><a class="btn btn-outline-secondary" href="' . $href . '">' . $button['title'] . '</a></p>';

        }
        return $html;
    }

    private static function getDataFromJSON(string $dataPage): array
    {
        $content = io_readFile(wikiFN($dataPage));
        $data = json_decode($content, true);
        $items = [];
        if ($data) {
            foreach ($data as $datum) {
                $items[] = new  JumbotronItem($datum);
            }
        }
        return $items;
    }

    /**
     * @param string $page
     * @return JumbotronItem[]
     */
    public static function getItemsByPage(string $page): array
    {
        switch ($page) {
            case 'start':
                return self::getDataFromJSON('jumbotron-data-cs');
            case 'en':
                return self::getDataFromJSON('jumbotron-data-en');
            default:
                return [];
        }
    }
}
