<?php

namespace fksTemplate\NavBar;

class NavBarItem
{
    private ?string $id;
    private ?string $icon;
    private int $level;
    private string $content;

    public function __construct(array $parameters)
    {
        $this->id = $parameters['id'];
        $this->icon = $parameters['icon'];
        $this->level = $parameters['level'];
        $this->content = $parameters['content'];
    }

    public static function createExpanded(?string $id, ?string $icon, int $level, string $content): self
    {
        return new static(['id' => $id, 'icon' => $icon, 'level' => $level, 'content' => $content]);

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getIcon(): string
    {
        if (isset($this->icon)) {
            return ' <span class="' . $this->icon . '" ></span > ';
        }
        return '';
    }

    private function isExternal(): bool
    {
        return preg_match('#https?://#', $this->id);
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getLink(): string
    {

        if (substr($this->id, 0, 1) == '/') {
            return $this->id;
        }
        if ($this->isExternal()) {
            return htmlspecialchars($this->id);
        }
        return wl(cleanID($this->id));
    }

    public function hasId(): bool
    {
        return !is_null($this->id);
    }
}
