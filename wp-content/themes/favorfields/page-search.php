<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FavorFields
 *
 * Template name: Algolia search
 */

get_header(); ?>

<!-- Main -->
<div id="main">
    <div class="inner">
        <?php

        // TO SHOW THE PAGE CONTENTS
        while ( have_posts() ) :
            the_post();
            the_content();

        endwhile; //resetting the page loop

        wp_reset_query(); //resetting the page query
        ?>
        <br><br><br>
        <h1>How are you feeling?</h1>

        <style>
            .search-form {
                margin: 0;
                padding: 0;
                border: 0;
                outline: 0;
                font-size: 100%;
                vertical-align: baseline;
                background: transparent;
                display: block;
                line-height: normal;
                color: #333;
            }

            .search-box-wrapper {
                padding: 20px 100px 20px;
                font-size: 1em;
                background-color: #74bfe6;
                max-width: 100%;
                margin: 0px auto 0px auto;
            }

            .search-box {
                margin: 0px 0 0 0;
                padding: 0 0 0 50px;
                position: relative;
            }

            #inputfield {
                margin-right: 56px;
            }

            #inputfield i {
                font-size: 25px;
                color: white;
                position: absolute;
                left: 0px;
                bottom: 10px;
            }

            #inputfield input {
                width: 500px;
                height: 45px;
                display: block;
                border: none;
                color: black;
                font-size: 2em;
                background-color: white;
                margin: 0 auto;
                border-radius: 30px;
                text-align: center;
                padding: 27px 33px;
                box-shadow: none;
            }
            }
            #inputfield input::-webkit-input-placeholder { color: #4A6B82; }
            #inputfield input::-moz-placeholder { color: #4A6B82; } /* firefox 19+ */
            #inputfield input:-ms-input-placeholder { color: #4A6B82; } /* ie */
            #inputfield inputinput:-moz-placeholder { color: #4A6B82; }

            #inputfield input:focus {
                outline-width: 0px;
            }

            #facets {
                float: left;
            }

            #facets li.active {
                font-weight: bold;
            }

            #hits {
                min-height: 800px;
            }
            .hit {
                padding: 10px;
                margin-bottom: -1px;
                border: 1px solid #dedede;
            }
            .hit a{
                color: #46AEDA;
            }
            .hit em {
                font-size: 1em;
                background-color: #F7FFBA;
                font-style: normal;
            }
            .hit a em {
                color: #2388B0;
            }
            .primary-attribute{
                font-size: 1.4em;
                font-weight: 600;
                padding: .1em 0;
                display: block;

            }
            .secondary-attribute{
                font-size: 1em;
                color: #666;
                background-color: #eee;
                display: inline-block;
                font-style: italic;
                padding: .05em .2em;
                margin: .2em 0 0;
                border-radius: 4px;
            }
            .tertiary-attribute{
                font-size: 1.1em;
                margin: .4em 0 1em;
                color: #888;
                display: block;
            }
            .others-attribute{
                border-top: dotted 1px #eee;
                padding: 20px 0;
                margin: 0;
                clear: both;
                font-size: 0.9em;
                color: #bbb;
            }
            .others-attribute dd{
                color: #888;
            }
            .image-attribute{
                float: left;
                width: 80px;
                min-height: 80px;
                margin: 0 20px 10px 0;
            }
            .image-attribute img{
                width: 100%;
            }
        </style>



        <div class='search-box-wrapper'>
            <div class='search-box'>
                <div id='inputfield'>
                    <input autocomplete='off' autocorrect='off' placeholder='I am feeling...' spellcheck='false' type='text'>
                </div>
            </div>
        </div>
        <section class='panel search-panel'>
            <div class='panel-body'>
                <div class='text-right' id='stats'></div>
                <div id='facets'></div>
                <div id='hits'></div>
                <div id='right_side'></div>
            </div>
        </section>



    </div>
</div>

<?php get_footer(); ?>


<script>


    jQuery(function($) {


        // Helper
        Number.prototype.number_with_delimiter = function(delimiter) {
            var number = this + '', delimiter = delimiter || ',';
            var split = number.split('.');
            split[0] = split[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1' + delimiter);
            return split.join('.');
        };

        // faceting global variables
        var refinements = {};
        function toggleRefinement(facet, value) {
            var refine = facet + ':' + value;
            refinements[refine] = !refinements[refine];
            search();
        }

        // strip HTML tags + keep <em>, <p>, <b>, <i>, <u>, <strong>
        function stripTags(v) {
            return $('<textarea />').text(v).html()
                .replace(/&lt;(\/)?(em|p|b|i|u|strong)&gt;/g, '<$1$2>');
        }

        var entityMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;',
            '`': '&#x60;',
            '=': '&#x3D;'
        };

        function escapeHTML (string) {
            return String(string).replace(/[&<>"'`=\/]/g, function fromEntityMap (s) {
                return entityMap[s];
            });
        }

        function escapeHTMLAttr(str) {
            return str
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&quot;');
        }

        //helper attribute multiple (ie: categories)
        function objToString(obj) {
            var str = '';
            for (var p in obj) {
                if (obj.hasOwnProperty(p)) {
                    str += str === '' ? '' : ' - ';
                    str += obj[p];
                }
            }
            return str;
        }

        // attribute to skip every time
        var skip = [
            'objectID',
            '_highlightResult'
        ];

        // attribute to skip at the end since it can be multi-attribute
        var attributeToSkip = [];
        if ('post_title' !== ''){
            attributeToSkip.push('post_title');
        };
        if ('' !== ''){
            attributeToSkip.push('');
        };
        if ('' !== ''){
            attributeToSkip.push('');
        };

        // retrieve all keys and remove skipped ones
        function retrieveAllAttributes(hit){
            var i = 0;
            var allkeys = [];
            iterate(hit, '' , allkeys);
            for (var attr in attributeToSkip){
                var s = allkeys.indexOf(attributeToSkip[attr]);
                if(s != -1) {
                    allkeys.splice(s, 1);
                }
            }
            return allkeys;
        }

        // recursively find keys in object
        function iterate(obj, stack , allkeys) {
            var dot = stack === '' ? '' : '.';
            for (var property in obj) {
                if ( obj.hasOwnProperty(property) && skip.indexOf(property) === -1 ) {
                    if (typeof obj[property] === "object") {
                        if (Object.prototype.toString.call(obj[property]) === '[object Array]') {
                            if (obj[property].length > 0 && typeof obj[property][0] === 'object') {
                                iterate(obj[property], stack + dot + property, allkeys);
                            } else {
                                allkeys.push(stack + dot + property);
                            }
                        } else {
                            iterate(obj[property], stack + dot + property, allkeys);
                        }
                    } else {
                        allkeys.push(stack + dot + property);
                    }
                }
            }
        }

        function urlMatch(url) {
            var urlRegex = new RegExp(
                "^" +
                // protocol identifier
                "(?:(?:https?|ftp)://)" +
                // user:pass authentication
                "(?:\\S+(?::\\S*)?@)?" +
                "(?:" +
                // IP address exclusion
                // private & local networks
                "(?!(?:10|127)(?:\\.\\d{1,3}){3})" +
                "(?!(?:169\\.254|192\\.168)(?:\\.\\d{1,3}){2})" +
                "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" +
                // IP address dotted notation octets
                // excludes loopback network 0.0.0.0
                // excludes reserved space >= 224.0.0.0
                // excludes network & broacast addresses
                // (first & last IP address of each class)
                "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" +
                "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" +
                "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" +
                "|" +
                // host name
                "(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)" +
                // domain name
                "(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*" +
                // TLD identifier
                "(?:\\.(?:[a-z\\u00a1-\\uffff]{2,}))" +
                // TLD may end with dot
                "\\.?" +
                ")" +
                // port number
                "(?::\\d{2,5})?" +
                // resource path
                "(?:[/?#]\\S*)?" +
                "$", "i"
            );

            return !!String(url).match(urlRegex);
        }

        // return attribute or highlighted attribute
        function getAttributeValue(attr_string, hit) {
            var v = getStringAttributeFromObject(attr_string, hit._highlightResult);
            return v ? v : getStringAttributeFromObject(attr_string, hit);
        }

        function capitalize(string) {
            return string.slice(0, 1).toUpperCase() + string.slice(1);
        }

        // handle attribute from tree
        function getStringAttributeFromObject(attr_string, hit){
            var attr_array = attr_string.split(".");
            var attr = hit;
            $.each(attr_array, function(i){
                attr = attr && attr[attr_array[i]];
            });
            if (!attr) {
                return false;
            }
            if (attr.value) {
                // we're on a highlighted form
                return attr.value;
            }
            if (Object.prototype.toString.call(attr) === '[object Array]') {
                var str = [];
                $.each(attr, function(i, e) {
                    if (e && typeof e === 'string') {
                        str.push(e);
                    } else if (e && e.value) {
                        str.push(e.value);
                    } else if (e) {
                        str.push(objToString(e));
                    }
                });
                return str.join(', ');
            }
            if (typeof attr === 'object') {
                attr = objToString(attr);
            }
            return '' + attr;
        }

        // function called on each keystroke
        function searchCallback(error, content) {
            if (error || content.query != $("#inputfield input").val()) {
                // this results is out-dated, do not consider it
                return;
            }
            if (content.hits.length == 0 ) {
                // no results or empty query
                $('#stats').empty().html('<h3 class="no-results">No resuluts matching this query.</h3>');;
                $('#facets').empty();
                $('#hits').empty();
                return;
            } else {
                $('#stats').empty();
            }
            var res = '';
            for (var i = 0; i < content.hits.length; ++i) {
                var hit = content.hits[i];
                // render the hit
                res += '<div class="hit">';
                /// hit image ?
                if ('vp_icon' !== '') {
                    var img_src = getStringAttributeFromObject('vp_icon',hit);
                    res += '<span class="image-attribute"><img src="' + escapeHTML(img_src) + '"/></span>';
                }
                // hit title (primary attribute)
                if ('post_title' !== '') {
                    var v = getAttributeValue('post_title',hit);
                    res += '<span class="primary-attribute">';
                    if ('permalink' !== '') {
                        // url attribute
                        var url = stripTags(getStringAttributeFromObject('permalink',hit));
                        res += '<a href="' + ((urlMatch(url)) ? escapeHTML(url) : '') + '">';
                        res +=  stripTags(v);
                        res += '</a>';
                    } else {
                        res += stripTags(v);
                    }
                    res += '</span> ';
                }
                // hit subtitle (secondary attribute)
                if ('' !== '') {
                    var v =  getAttributeValue('',hit);
                    if (v && v.trim() !== '') {
                        res += '<span class="secondary-attribute">' + stripTags(v) + '</span>';
                    }
                }
                // hit description (tertiary attribute)
                if ('' !== '') {
                    var v =  getAttributeValue('',hit);
                    if (v && v.trim() !== '') {
                        res += '<span class="tertiary-attribute">' + stripTags(v) + '</span>';
                    }
                }
                // display all others attributes

                res += '<div class="clearfix"></div></div>';
            }

            $('#hits').html(res);

            if (content.facets && !$.isEmptyObject(content.facets)) {
                res = '<ul class="list-unstyled">'
                for (var facet in content.facets) {
                    var facets = [];
                    for (var f in content.facets[facet]) {
                        facets.push([f, content.facets[facet][f]]);
                    }
                    facets.sort(function(a, b) { return a[1] < b[1] ? 1 : (a[1] > b[1] ? -1 : 0) });

                    res += '<li class="m-b-large">';

                    // Sorting data by facets
                    if ( facet == 'vp_mood' ) {
                        var vp_mood = res;
                        vp_mood += '<h3>Mood</h3>';
                        vp_mood += '<ol class="list-unstyled m-l">' +
                            $.map(facets, function(v, i) {

                                var $wrap = $('<div/>');
                                var $el = $('<li/>');
                                var $a = $('<a/>');

                                $('#right_side').data(
                                    escapeHTMLAttr(facet) + '-' + i,
                                    {
                                        name: facet,
                                        value: v[0]
                                    }
                                );

                                if ( v[0] == "Sunshine" ) {
                                    v[0] = '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-sunny.png">';
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.find('img').attr('href', '#');
                                    $a.find('img').addClass('facet-value');
                                    $a.find('img').attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.find('img').attr('data-facet-index', i);
                                } else if ( v[0] == "Storm" ) {
                                    v[0] = '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-storm.png">';
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.find('img').attr('href', '#');
                                    $a.find('img').addClass('facet-value');
                                    $a.find('img').attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.find('img').attr('data-facet-index', i);
                                } else if ( v[0] == "Rainbow" ) {
                                    v[0] = '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rainbow.png">';
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.find('img').attr('href', '#');
                                    $a.find('img').addClass('facet-value');
                                    $a.find('img').attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.find('img').attr('data-facet-index', i);
                                } else if ( v[0] == "Rain" ) {
                                    v[0] = '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rain.png">';
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.find('img').attr('href', '#');
                                    $a.find('img').addClass('facet-value');
                                    $a.find('img').attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.find('img').attr('data-facet-index', i);
                                } else if ( v[0] == "Partly_sunny" ) {
                                    v[0] = '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-partly-sunny.png">';
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.find('img').attr('href', '#');
                                    $a.find('img').addClass('facet-value');
                                    $a.find('img').attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.find('img').attr('data-facet-index', i);
                                } else if ( v[0] == "Clouds" ) {
                                    v[0] = '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-clouds.png">';
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.find('img').attr('href', '#');
                                    $a.find('img').addClass('facet-value');
                                    $a.find('img').attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.find('img').attr('data-facet-index', i);
                                } else {
                                    $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                    $a.html( v[0] );
                                    $a.attr('href', '#');
                                    $a.addClass('facet-value');
                                    $a.attr('data-facet-name', escapeHTMLAttr(facet));
                                    $a.attr('data-facet-index', i);
                                }

                                $el.append(
                                    $('<span/>').append($a)
                                ).append(v[1]);

                                $wrap.append($el);

                                return $wrap.html();

                                // return '<li class="' + stripTags(refinements[facet + ':' + v[0]] ? 'active' : '') + '"><a href="#" class="facet-value" data-facet-name="'+ escapeHTMLAttr(facet) +'" data-facet-value="'+ escapeHTMLAttr(v[0]) +'">' + stripTags(v[0]) + '</a> (' + v[1] + ')</li>';
                            }).join('') +
                            '</ol>';

                    } else {
                        res += '<h3>' + capitalize(stripTags(facet)).replace(/_/g, ' ') + '</h3>';
                        res += '<ol class="list-unstyled m-l">' +
                            $.map(facets, function(v, i) {

                                var $wrap = $('<div/>');
                                var $el = $('<li/>');
                                var $a = $('<a/>');

                                $('#facets').data(
                                    escapeHTMLAttr(facet) + '-' + i,
                                    {
                                        name: facet,
                                        value: v[0]
                                    }
                                );

                                $el.addClass(refinements[facet + ':' + v[0]] ? 'active' : '');
                                $a.text(stripTags(v[0]));
                                $a.attr('href', '#');
                                $a.addClass('facet-value');
                                $a.attr('data-facet-name', escapeHTMLAttr(facet));
                                $a.attr('data-facet-index', i);

                                $el.append(
                                    $('<span/>').append($a)
                                ).append(v[1]);

                                $wrap.append($el);

                                return $wrap.html();

                            }).join('') +
                            '</ol>';
                    }

                    res += '</li>';
                    vp_mood += '</li>';
                }
                res += '</ul>';
                vp_mood += '</ul>';
                $('#facets').html(res).css('float', 'left').css('width', '20%');
                $('#hits').css('float', 'left').css('width', '60%');
                $('#right_side').html(vp_mood).css('float', 'left').css('width', '20%');
            }

            // stats
//            $('#stats').html('<b>' + content.nbHits.number_with_delimiter() + '</b> result' + (content.nbHits > 1 ? 's' : '') + ' in <b>' + content.processingTimeMS + '</b> ms')
        }


        var algolia = algoliasearch('T2B04QR9B0', '09cfed2845a581f23909b7667f397f37');
        var index = algolia.initIndex('wp_posts_wellgorithms');

        window.search = function() {
            var facetFilters = [];
            for (var refine in refinements) {
                if (refinements[refine]) {
                    facetFilters.push(refine);
                }
            }
            index.search($("#inputfield input").val(), {
                hitsPerPage: 10,
                facets: '*',
                maxValuesPerFacet: 10,
                facetFilters: facetFilters
            }, searchCallback);
        }

        $("#inputfield input").keyup(function() {
            refinements = {};
            window.search();
        }).focus();

        if ($("#inputfield input").val() === '') {
            window.search();
        }

        $('#facets').on('click', '.facet-value', function(e) {
            var facetName = $(e.target).attr('data-facet-name');
            var facetNumber = $(e.target).attr('data-facet-index');
            var facet = $('#facets').data(facetName + '-' + facetNumber);

            toggleRefinement(facet.name, facet.value);
        });

        $('#right_side').on('click', '.facet-value', function(e) {
            var facetName = $(e.target).attr('data-facet-name');
            var facetNumber = $(e.target).attr('data-facet-index');
            var facet = $('#right_side').data(facetName + '-' + facetNumber);

            toggleRefinement(facet.name, facet.value);
        });
    });

</script>