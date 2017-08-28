<?php
namespace fksTemplate\Jumbotron;

/**
 * Translated to en by Matěj Mezera <m.mezera@fykos.cz>
 */
class JumbotronData {

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getEvents($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'Zážitky, na které se nezapomíná',
                    'text' => 'Stává se ti, že už si večer nevzpomeneš, co jsi vlastně dělal přes den ve škole. Na FYKOSím soustředění ti tohle nehrozí, zážitky jako hraní famfrpálu nebo trávení dne poslepu se prostě nezapomínají.',
                    // Mimo to žádná zmrzlina nechutná tak, jako ta čerstvě připravená pomocí kapalného dusíku. ',
                    'outer-container-background-id' => 5,
                    'inner-container-background-id' => 5,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'Unforgettable experiences',
                    'text' => 'Does it happen to you that you can\'t remember what were you doing all day in school. At the FYKOS Camp, this is not the case. You can\'t just forget experiences like Quidditch or being blind for one day. ',
                    // Besides that, there is no better ice-cream then ice-cream prepared using liquid oxygen. ',
                    'outer-container-background-id' => 5,
                    'inner-container-background-id' => 5,
                ]);
        }
    }

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getBrawl($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'Týmové soutěže',
                    'text' => 'Sestav tým na Fyziklání a Fyziklání online a poměřte svoje síly s ostatními. 
                    Chceš na fyzikální souboj vyzvat svoje učitele nebo kamarády ze zahraničí? Žádný problém, 
                    Fyziklání online je dostupné pro celý svět a v kategorii open se může zúčastnit i ten, kdo už není středoškolák.',
                    'outer-container-background-id' => 1,
                    'inner-container-background-id' => 1,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'Team contests',
                    'text' => 'Put together a team for Physics Brawl and Online Physics Brawl to compare your strengths with others. 
                    Do you want to challenge your teachers or foreign friends? No problem, 
                    Online Physics Brawl is available for the whole world and anyone (even non hing school student) can take part in open category.',
                    'outer-container-background-id' => 1,
                    'inner-container-background-id' => 1,
                ]);
        }
    }

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getCamps($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'Nezapomenutelná soustředění',
                    'text' => 'FYKOSí soustředění patří k nejzábavnějším akcím v této galaxii. 
                    Pořádána jsou dvakrát ročně jako odměna pro nejlepší řešitele v nějakém malebném kouty naší vlasti. ',
                    // Jedná se o více než týden zážitkového programu, který doplňuje také odborný program v podobě přednášek a experimentů.',
                    'outer-container-background-id' => 3,
                    'inner-container-background-id' => 3,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'Unforgettable camps',
                    'text' => 'FYKOS Camp is one of the most entertaining events in our galaxy. 
                    Is is being held twice a year in some beautiful part of our country as a reward for the best participants of FYKOS.  ',
                    // It is more then one week full of entertaining program including professional lectures and experiments.',
                    'outer-container-background-id' => 3,
                    'inner-container-background-id' => 3,
                ]);
        }
    }

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getDsef($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'Exkurze na vědecká pracoviště',
                    'text' => 'Už jsi byl v CERNu, viděl tokamak nebo jaderný reaktor? FYKOS pořádá exkurze na ta nejzajímavější pracoviště z oblasti fyziky a jejích aplikací, nenechej si je ujít. ',
                    'outer-container-background-id' => 6,
                    'inner-container-background-id' => 6,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'Excursion to scientific workplaces and research institutes',
                    'text' => 'Have you been to CERN? Have you seen the tokamak or nuclear reactor? FYKOS organizes excursions to the most interesting workplaces if physics, don\'t miss it. ',
                    'outer-container-background-id' => 6,
                    'inner-container-background-id' => 6,
                ]);
        }
    }

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getSex($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'Věda zábavným způsobem',
                    'text' => 'Nudíš se ve škole? Pak jsi na ni možná až moc chytrý. 
                    Zapojte se do FYKOSu a získáš možnost poznat se s vědou zblízka zajímavějším způsobem. 
                    Naše úlohy jsou mnohem komplexnější než ty, které znáš z hodin fyziky. ',
                    //A také pořádáme spoustu exkurzí a odborných přednášek. ',
                    'outer-container-background-id' => 4,
                    'inner-container-background-id' => 4,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'Science through an entertaining way',
                    'text' => 'Are you bored at school? Then you are maybe too smart. 
                    Take part in FYKOS and you get to know science in a more interesting way. 
                    Our tasks are much more complex than those you know from physics classes. ',
                    //And we also organize a lot of excursions and professional lectures. ',
                    'outer-container-background-id' => 4,
                    'inner-container-background-id' => 4,
                ]);
        }
    }

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getNewFriends($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'Noví kamarádi',
                    'text' => 'Neberou tě jen řeči o fotbale, nebo barvě laku na nehty. 
                    Přidej se k FYKOSu a poznej spoustu lidí, kteří mají stejné zájmy jako ty.',
                    'page' => 'akce:start',
                    'outer-container-background-id' => 2,
                    'inner-container-background-id' => 2,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'New friends',
                    'text' => 'You don\'t like just talking about football or the color of your nail polish. 
                    Join FYKOS and meet a bunch of people with same interests as you.',
                    'page' => 'events:start',
                    'outer-container-background-id' => 2,
                    'inner-container-background-id' => 2,
                ]);
        }
    }

    /**
     * @param $lang string language code
     * @return JumbotronItem
     */
    private function getFOFIntro($lang = 'cs') {
        switch ($lang) {
            case 'cs':
                return new JumbotronItem([
                    'headline' => 'FYKOSí Fyziklání',
                    'text' => 'Fyziklání je tradiční soutěž maximálně 5členných týmů středoškoláků, kteří se zajímají o matematiku a fyziku. Jejich úlohou bude v daném časovém limitu získat za řešení úloh co nejvíce bodů.',
                    'page' => null,
                    'outer-container-background-id' => 1,
                    'inner-container-background-id' => 1,
                ]);
                break;
            case 'en':
            default:
                return new JumbotronItem([
                    'headline' => 'Physics Brawl',
                    'text' => 'Physics Brawl is a traditional competition of a maximum od 5-member teams of high school students with interest in maths and physics.  Their task is to obtain as much points as possible for solving physics problems in given time limit.',
                    'page' => null,
                    'outer-container-background-id' => 1,
                    'inner-container-background-id' => 1,
                ]);
        }
    }

    /**
     * @param $page string
     * @return JumbotronGroup
     */
    public function getJumbotronDataByPage($page) {
        switch ($page) {
            case 'start':
                return new JumbotronGroup([
                    $this->getBrawl(),
                    $this->getCamps(),
                    $this->getDsef(),
                    $this->getEvents(),
                    $this->getNewFriends(),
                    $this->getSex(),
                ]);
            case 'en':
                return new JumbotronGroup([
                    $this->getBrawl('en'),
                    $this->getCamps('en'),
                    $this->getDsef('en'),
                    $this->getEvents('en'),
                    $this->getNewFriends('en'),
                    $this->getSex('en'),
                ]);
            case 'akce:fyziklani:start':
                return new JumbotronGroup([$this->getFOFIntro()]);
            case 'events:physicsbrawl:start':
                return new JumbotronGroup([$this->getFOFIntro('en')]);
            default:
                return new JumbotronGroup([]);
        }
    }
}
