<?php

class JumbotronData {
    private static $camps = [
        [
            'headline' => 'Nezapomenutelná soustředění',
            'text' => 'FYKOSí soustředění patří k nejzábavnějším akcím v této galaxii. Pořádána jsou dvakrát ročně jako odměna pro nejlepší řešitele v nějakém malebném kouty naší vlasti. Jedná se o více než týden zážitkového programu, který doplňuje také odborný program v podobě přednášek a experimentů.',
            'pages' => [
                [
                    'link' => 'akce:soustredeni:start',
                    'text' => 'Chci se zúčastnit!'
                ]
            ],
            'background-id' => 3,
            'inner-container-background-id' => 3,
        ],

    ];

    private static $events = [
        [
            'headline' => 'Zážitky, na které se nezapomíná',
            'text' => 'Stává se ti, že už si večer nevzpomeneš, co jsi vlastně dělal přes den ve škole. Na FYKOSím soustředění ti tohle nehrozí, zážitky jako hraní famfrpálu nebo trávení dne poslepu se prostě nezapomínají. Mimo to žádná zmrzlina nechutná tak, jako ta čerstvě připravená pomocí kapalného dusíku. ',
            'background-id' => 5,
            'inner-container-background-id' => 5,
        ],
        [
            'headline' => 'Noví kamarádi',
            'text' => 'Neberou tě jen řeči o fotbale, nebo barvě laku na nehty. Přidej se k FYKOSu a poznej spoustu lidí, kteří mají stejné zájmy jako ty.',
            'page' => 'akce:start',
            'background-id' => 2,
            'inner-container-background-id' => 2,
        ]
    ];

    private static $brawl = [
        [
            'headline' => 'Týmové soutěže',
            'text' => 'Sestav tým na Fyziklání a Fyziklání online a poměřte svoje síly s ostatními. Chceš na fyzikální souboj vyzvat svoje učitele nebo kamarády ze zahraničí? Žádný problém, Fyziklání online je dostupné pro celý svět a v kategorii open se může zúčastnit i ten, kdo už není středoškolák.',
            'pages' => [
                [
                    'link' => 'akce:fyziklani:start',
                    'text' => 'FYKOSí Fyziklání',
                ],
                [
                    'link' => 'http://online.fyziklani.cz',
                    'text' => 'Fyziklání online',
                ],
            ],
            'background-id' => 1,
            'inner-container-background-id' => 1,
        ]
    ];

    private static $sex = [
        [
            'headline' => 'Věda zábavným způsobem',
            'text' => 'Nudíš se ve škole? Pak jsi na ni možná až moc chytrý. Zapojte se do FYKOSu a získáš možnost poznat se s vědou zblízka zajímavějším způsobem. Naše úlohy jsou mnohem komplexnější než ty, které znáš z hodin fyziky. A také pořádáme spoustu exkurzí a odborných přednášek. ',
            'page' => 'akce:dsef:start',
            'background-id' => 4,
            'inner-container-background-id' => 4,
        ],
    ];
    private static $dsef = [
        [
            'headline' => 'Exkurze na vědecká pracoviště',
            'text' => 'Už jsi byl v CERNu, viděl tokamak nebo jaderný reaktor? FYKOS pořádá exkurze na ta nejzajímavější pracoviště z oblasti fyziky a jejích aplikací, nenechej si je ujít. ',
            'pages' => [
                [
                    'link' => 'akce:dsef:start',
                    'text' => 'Den s experimentální fyzikou',
                ],
                [
                    'link' => 'akce:tsaf:start',
                    'text' => 'Týden s aplikovanou fyzikou',
                ],
                [
                    'link' => 'akce:vaf:start',
                    'text' => 'Víkend s aplikovanou fyzikou',
                ],
            ],
            'background-id' => 6,
            'inner-container-background-id' => 6,
        ],
    ];

    private static $fofIntro = [
        [
            'headline' => 'FYKOSí Fyzikláni',
            'text' => 'Fyziklání je tradiční soutěž maximálně 5členných týmů středoškoláků, kteří se zajímají o matematiku a fyziku. Jejich úlohou bude v daném časovém limitu získat za řešení úloh co nejvíce bodů.',
            'page' => null,
            'background-id' => 1,
            'inner-container-background-id' => 1,
        ],
    ];

    public static function getJumbotronDataByPage($page) {
        switch ($page) {
            case 'start':
                return array_merge(self::$brawl,
                    self::$camps,
                    self::$dsef,
                    self::$events,
                    self::$sex);
            case 'akce:fyziklani:start':
                return self::$fofIntro;
            default:
                return null;
        }
    }
}
