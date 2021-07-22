<?php

namespace FYKOS\dokuwiki\template\NavBar;

/**
 * @property-read string|null $icon
 * @property-read string|null $pageId
 * @property-read int $level
 * @property-read string|null $content
 */
class NavBarItem
{
    public ?string $pageId;
    public ?string $icon;
    public int $level;
    public ?string $content;

    public function __construct(?string $pageId, ?string $content, int $level, ?string $icon)
    {
        $this->pageId = $pageId;
        $this->icon = $icon;
        $this->level = $level;
        $this->content = $content;
    }

    public function getLink(): string
    {
        if (preg_match('#https?://#', $this->pageId)) {
            return htmlspecialchars($this->pageId);
        }
        return wl(cleanID($this->pageId));
    }
}
