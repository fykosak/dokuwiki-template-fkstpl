<?php
namespace fksTemplate\Jumbotron;

class JumbotronData {

    /**
     * @return JumbotronItem
     */
    private function getEvents() {
        return new JumbotronItem([
            'headline' => 'Zážitky, na které se nezapomíná',
            'text' => 'Stává se ti, že už si večer nevzpomeneš, co jsi vlastně dělal přes den ve škole. Na FYKOSím soustředění ti tohle nehrozí, zážitky jako hraní famfrpálu nebo trávení dne poslepu se prostě nezapomínají.',
            // Mimo to žádná zmrzlina nechutná tak, jako ta čerstvě připravená pomocí kapalného dusíku. ',
            'outer-container-background-id' => 5,
            'inner-container-background-id' => 5,
        ]);
    }

    /**
     * @return JumbotronItem
     */
    private function getBrawl() {
        return new JumbotronItem([
            'headline' => 'Týmové soutěže',
            'text' => 'Sestav tým na Fyziklání a Fyziklání online a poměřte svoje síly s ostatními. 
            Chceš na fyzikální souboj vyzvat svoje učitele nebo kamarády ze zahraničí? Žádný problém, 
            Fyziklání online je dostupné pro celý svět a v kategorii open se může zúčastnit i ten, kdo už není středoškolák.',
            'outer-container-background-id' => 1,
            'inner-container-background-id' => 1,
        ]);
    }

    /**
     * @return JumbotronItem
     */
    private function getCamps() {
        return new JumbotronItem([
            'headline' => 'Nezapomenutelná soustředění',
            'text' => 'FYKOSí soustředění patří k nejzábavnějším akcím v této galaxii. 
            Pořádána jsou dvakrát ročně jako odměna pro nejlepší řešitele v nějakém malebném kouty naší vlasti. ',
            // Jedná se o více než týden zážitkového programu, který doplňuje také odborný program v podobě přednášek a experimentů.',
            'outer-container-background-id' => 3,
            'inner-container-background-id' => 3,
        ]);
    }

    /**
     * @return JumbotronItem
     */
    private function getDsef() {
        return new JumbotronItem([
            'headline' => 'Exkurze na vědecká pracoviště',
            'text' => 'Už jsi byl v CERNu, viděl tokamak nebo jaderný reaktor? FYKOS pořádá exkurze na ta nejzajímavější pracoviště z oblasti fyziky a jejích aplikací, nenechej si je ujít. ',
            'outer-container-background-id' => 6,
            'inner-container-background-id' => 6,
        ]);
    }

    /**
     * @return JumbotronItem
     */
    private function getSex() {
        return new JumbotronItem([
            'headline' => 'Věda zábavným způsobem',
            'text' => 'Nudíš se ve škole? Pak jsi na ni možná až moc chytrý. 
            Zapojte se do FYKOSu a získáš možnost poznat se s vědou zblízka zajímavějším způsobem. 
            Naše úlohy jsou mnohem komplexnější než ty, které znáš z hodin fyziky. ',
            //A také pořádáme spoustu exkurzí a odborných přednášek. ',
            'outer-container-background-id' => 4,
            'inner-container-background-id' => 4,
        ]);
    }

    /**
     * @return JumbotronItem
     */
    private function getNewFriends() {
        return new JumbotronItem([
            'headline' => 'Noví kamarádi',
            'text' => 'Neberou tě jen řeči o fotbale, nebo barvě laku na nehty. 
            Přidej se k FYKOSu a poznej spoustu lidí, kteří mají stejné zájmy jako ty.',
            'page' => 'akce:start',
            'outer-container-background-id' => 2,
            'inner-container-background-id' => 2,
        ]);
    }

    /**
     * @return JumbotronItem
     */
    private function getFOFIntro() {
        return new JumbotronItem([
            'headline' => 'FYKOSí Fyziklání',
            'text' => 'Fyziklání je tradiční soutěž maximálně 5členných týmů středoškoláků, kteří se zajímají o matematiku a fyziku. Jejich úlohou bude v daném časovém limitu získat za řešení úloh co nejvíce bodů.',
            'page' => null,
            'outer-container-background-id' => 1,
            'inner-container-background-id' => 1,
        ]);
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
            case 'akce:fyziklani:start':
                return new JumbotronGroup([$this->getFOFIntro()]);
            default:
                return new JumbotronGroup([]);
        }
    }
}
