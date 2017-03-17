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
var _ga = {e: ['seznam.cz:q', 'seznam.cz:w', 'atlas.centrum.cz:q', 'searchatlas.centrum.cz:q', 'atlas.cz:q', 'centrum.cz:q', '1188.cz:q', 'jyxo.cz:q', 'mapy.cz:ssq', 'najisto.centrum.cz:what', 'takeit.cz:q', 'tiscali.cz:query', 'volny.cz:search', 'zacatek.cz:q', 'webhledani.cz:q', 'zlatestranky.cz:search', 'zoohoo.cz:q', '1.cz:q', 'akcni-cena.cz:search', 'b2bc.cz:XSearching', 'ceno.cz:q', 'cenyzbozi.cz:q', 'dobra-koupe.cz:searchtext', 'elektro.cz:w', 'elektrus.cz:h', 'eshop-katalog.cz:hledej', 'foxter.cz:search', 'heureka.cz:h[fraze]', 'hledam-zbozi.cz:q', 'hledejceny.cz:search', 'hyperceny.cz:q', 'ishopy.eu:search', 'koupis.cz:q', 'lepsiceny.cz:q', 'levnenakupy.cz:searchword', 'mojse.cz:search_text', 'monitor.cz:qw', 'naakup.cz:hledat', 'najdicenu.cz:ss', 'nakupte.cz:what', 'nejlepsiceny.cz:t', 'nejlepsinakupy.cz:q', 'nejnakup.cz:q', 'onlinezbozi.cz:search', 'porovnejcenu.cz:phrase', 'seznamobchodu.cz:search', 'seznamzbozi.cz:st', 'shoops.cz:s', 'shopy.cz:s', 'srovname.cz:hledat', 'srovnanicen.cz:q', 'srovnavadlo.cz:q', 'taxa.cz:keyword', 'usetrim.cz:q', 'vybereme.cz:q', 'zalevno.cz:q', 'zbozi.eshop-katalog.cz:hledej', 'zbozi.poptavky.cz:cond[fulltext]', 'zbozi.portik.cz:vyraz', 'zbozi.cz:q', 'atlas.sk:phrase', 'centrum.sk:q', 'azet.sk:q', 'azet.sk:sq', 'morfeo.sk:q', 'surf.sk:kw', 'szm.sk:ws', 'zoohoo.sk:q', 'zoznam.sk:s', 'cenoveinfo.sk:SearchProductName', 'e-nakupovanie.sk:searchword', 'heureka.sk:h[fraze]', 'najdicenu.sk:ss', 'najnakup.sk:q', 'nakup.24hod.sk:q', 'srovname.sk:hledat', 'superdeal.sk:q', 'tovar.sk:q', 'google:q', 'google:as_q', 'google:as_oq', 'google:as_epq', 'google:as_lq', 'google:as_rq', 'ananzi.co.za:qt', 'anzwers.com.au:search', 'araby.com:q', 'bbc.co.uk:q', 'britishinformation.com:search', 'club-internet.fr:q', 'elmundo.es:q', 'eniro.se:geo_area', 'excite.co.uk:q', 'excite.com:q', 'gigablast.com:q', 'hotbot.co.uk:query', 'hotbot.com:query', 'iafrica.funnel.co.za:q', 'icq.com:q', 'kelkoo:contextKeywords', 'looksmart.com:qt', 'maktoob.com:q', 'myway.com:searchfor', 'mywebsearch.com:searchfor', 'najdi.si:q', 'netsprint.pl:q', 'onet.pl:qt', 'orange.co.uk:q', 'rambler.ru:query', 'search.com:q', 'searcheurope.com:query', 'searchy.co.uk:search_term', 'sky.com:term', 'suche.web.de:su', 'tesco.net:q', 'tiscali.co.uk:query', 'virginmedia.com', 'q', 'wolframalpha.com:i', 'zinza.com:query'], create: function (a, b, c) {
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
    }};

/* Custom code */
jQuery(function () {
    var $ = jQuery;
    $('#dokuwiki-control-toggle').click(function () {
        $('#dokuwiki-control').toggle();
    });

    $('nav .level1 > .li a').click(function (event) {

        var $ul = $(this).parents('.li').next('ul');

        if ($ul.length > 0) {
            event.preventDefault();
            $ul.slideToggle();
        }

    });



    //jQuery("#content table").tablesorter();
    /* $('img.svg').each(function () {
     var $img = $(this);
     var imgID = $img.attr('id');
     var imgClass = $img.attr('class');
     var imgURL = $img.attr('src');
     
     $.get(imgURL, function (data) {
     // Get the SVG tag, ignore the rest
     var $svg = $(data).find('svg');
     
     // Add replaced image's ID to the new SVG
     if (typeof imgID !== 'undefined') {
     $svg = $svg.attr('id', imgID);
     }
     // Add replaced image's classes to the new SVG
     if (typeof imgClass !== 'undefined') {
     $svg = $svg.attr('class', imgClass + ' replaced-svg');
     }
     
     // Remove any invalid XML tags as per http://validator.w3.org
     $svg = $svg.removeAttr('xmlns:a');
     
     // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
     if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
     $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
     }
     
     // Replace image with new SVG
     $img.replaceWith($svg);
     
     }, 'xml');
     
     
     
     });*/

    $(document).on("scroll", function (event) {
        console.log($(document).scrollLeft());
        var w = $(this).scrollTop();
        var $i = $('div#dw__toc');
        var p = $i.position();
        if (p) {
            if (!$i.data('oldtop')) {
                $i.data('oldtop', p.top);
            }



            if (w > Number($i.data('oldtop'))) {
                $i.addClass('fixed').css({position: "fixed"}).animate({top: "0px"});
            } else {
                $i.removeClass('fixed').css({position: "initial"});
            }
        }




    });

    $('.sidebar-toogle').click(function (event) {
        var $sidebar = $('aside.sidebar');
        if (!$sidebar.is(':visible')) {
            $sidebar.show();
        } else {
            $sidebar.hide();
        }
        ;

    });
});


