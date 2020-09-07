/**
 * Normalize carousel heights
 */
jQuery(() => {
    document.querySelectorAll('.carousel-container').forEach((carousel) => {
        let items = carousel.querySelectorAll('.carousel-item');

        let normalizeHeights = () => {
            let tallest = 0;
            items.forEach((item) => {
                item.style.minHeight = '0';
                tallest = Math.max(tallest, jQuery(item).height());
            });
            items.forEach((item) => {
                item.style.minHeight = tallest + 'px';
            });
        };

        normalizeHeights();

        window.addEventListener('resize', normalizeHeights);
        window.addEventListener('orientationchange', normalizeHeights);
    });

    return true;
});

/**
 * Customized Google Analytics tracking code
 * Version 5.00
 *
 * Copyright (c) 2008-2010 H1.cz s.r.o.
 * Copyright (c) 2010 Medio Interactive, s.r.o.
 * See http://www.h1.cz/ga for more information.
 */
var _gaq = _gaq || [];
(function () {
    var a = document.createElement('script');
    a.type = 'text/javascript';
    a.async = true;
    a.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(a, s);
})();
var _ga = {
    e: ['seznam.cz:q', 'seznam.cz:w', 'atlas.centrum.cz:q', 'searchatlas.centrum.cz:q', 'atlas.cz:q', 'centrum.cz:q', '1188.cz:q', 'jyxo.cz:q', 'mapy.cz:ssq', 'najisto.centrum.cz:what', 'takeit.cz:q', 'tiscali.cz:query', 'volny.cz:search', 'zacatek.cz:q', 'webhledani.cz:q', 'zlatestranky.cz:search', 'zoohoo.cz:q', '1.cz:q', 'akcni-cena.cz:search', 'b2bc.cz:XSearching', 'ceno.cz:q', 'cenyzbozi.cz:q', 'dobra-koupe.cz:searchtext', 'elektro.cz:w', 'elektrus.cz:h', 'eshop-katalog.cz:hledej', 'foxter.cz:search', 'heureka.cz:h[fraze]', 'hledam-zbozi.cz:q', 'hledejceny.cz:search', 'hyperceny.cz:q', 'ishopy.eu:search', 'koupis.cz:q', 'lepsiceny.cz:q', 'levnenakupy.cz:searchword', 'mojse.cz:search_text', 'monitor.cz:qw', 'naakup.cz:hledat', 'najdicenu.cz:ss', 'nakupte.cz:what', 'nejlepsiceny.cz:t', 'nejlepsinakupy.cz:q', 'nejnakup.cz:q', 'onlinezbozi.cz:search', 'porovnejcenu.cz:phrase', 'seznamobchodu.cz:search', 'seznamzbozi.cz:st', 'shoops.cz:s', 'shopy.cz:s', 'srovname.cz:hledat', 'srovnanicen.cz:q', 'srovnavadlo.cz:q', 'taxa.cz:keyword', 'usetrim.cz:q', 'vybereme.cz:q', 'zalevno.cz:q', 'zbozi.eshop-katalog.cz:hledej', 'zbozi.poptavky.cz:cond[fulltext]', 'zbozi.portik.cz:vyraz', 'zbozi.cz:q', 'atlas.sk:phrase', 'centrum.sk:q', 'azet.sk:q', 'azet.sk:sq', 'morfeo.sk:q', 'surf.sk:kw', 'szm.sk:ws', 'zoohoo.sk:q', 'zoznam.sk:s', 'cenoveinfo.sk:SearchProductName', 'e-nakupovanie.sk:searchword', 'heureka.sk:h[fraze]', 'najdicenu.sk:ss', 'najnakup.sk:q', 'nakup.24hod.sk:q', 'srovname.sk:hledat', 'superdeal.sk:q', 'tovar.sk:q', 'google:q', 'google:as_q', 'google:as_oq', 'google:as_epq', 'google:as_lq', 'google:as_rq', 'ananzi.co.za:qt', 'anzwers.com.au:search', 'araby.com:q', 'bbc.co.uk:q', 'britishinformation.com:search', 'club-internet.fr:q', 'elmundo.es:q', 'eniro.se:geo_area', 'excite.co.uk:q', 'excite.com:q', 'gigablast.com:q', 'hotbot.co.uk:query', 'hotbot.com:query', 'iafrica.funnel.co.za:q', 'icq.com:q', 'kelkoo:contextKeywords', 'looksmart.com:qt', 'maktoob.com:q', 'myway.com:searchfor', 'mywebsearch.com:searchfor', 'najdi.si:q', 'netsprint.pl:q', 'onet.pl:qt', 'orange.co.uk:q', 'rambler.ru:query', 'search.com:q', 'searcheurope.com:query', 'searchy.co.uk:search_term', 'sky.com:term', 'suche.web.de:su', 'tesco.net:q', 'tiscali.co.uk:query', 'virginmedia.com', 'q', 'wolframalpha.com:i', 'zinza.com:query'],
    create: function (a, b, c) {
        if (!b) {
            b = 'auto';
        }
        if (c) {
            c += '.';
        } else {
            c = '';
        }
        _gaq.push([c + '_setAccount', a]);
        _gaq.push([c + '_setDomainName', b]);
        _gaq.push([c + '_setAllowAnchor', true]);
        var s, i;
        for (i = this.e.length - 1; i >= 0; i--) {
            s = this.e[i].split(':');
            _gaq.push([c + '_addOrganic', s[0], s[1], true])
        }
    }
};


