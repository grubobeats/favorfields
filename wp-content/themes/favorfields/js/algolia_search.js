
'use strict';

var search = instantsearch({
    appId: 'T2B04QR9B0',
    apiKey: '28985d34dee832a8f54db2e290beaec7',
    indexName: 'wp_posts_wellgorithms'
});

search.addWidget(instantsearch.widgets.searchBox({
    container: '#search-box',
    placeholder: 'I am feeling...',
    autofocus: false
}));

var hitTemplate = document.getElementById('movie').innerHTML;

search.addWidget(instantsearch.widgets.hits({
    container: '#hits',
    hitsPerPage: 100,
    templates: {
        item: hitTemplate
    },
    transformData: function transformData(hit) {
        hit.stars = [];
        for (var i = 1; i <= 3; ++i) {
            hit.stars.push(i <= hit.vp_level);
        }
        return hit;
    }
}));

search.addWidget(instantsearch.widgets.refinementList({
    container: '#focus',
    attributeName: 'taxonomies.post_tag',
    limit: 7,
    templates: {
        item: function item(data) {
            return "<div class='focus__items'>" + data.name + "</div>";
        }
    },
    cssClasses: {
        list: "titles__list"
    }
}));

search.addWidget(instantsearch.widgets.rangeSlider({
    container: '#confidence',
    attributeName: 'vp_confidence',
    tooltips: {
        format: function format(v) {
            return "";
        }
    },
    min: 0,
    max: 10,
    pips: false,
    templates: {
        footer: 'Confidence Range'
    }
}));

search.addWidget(instantsearch.widgets.numericRefinementList({
    container: '#category',
    attributeName: 'vp_category',
    limit: 3,
    autoHideContainer: false,
    options: [{ start: 4, end: 4, name: 'Hellgo' }, { start: 3, end: 3, name: 'Wellgo' }, { start: 5, end: 5, name: 'Letgo' }],
    templates: {
        item: function item(data) {
            var output = "";
            if (data.name == 'Hellgo') {
                output = "<img src='http://favorfields.wpengine.com/wp-content/uploads/2017/02/hellgo3.png'><span>Hellgo</span>";
            } else if (data.name == 'Letgo') {
                output = "<img src='http://favorfields.com/wp-content/uploads/2017/02/rego1.png'><span>Letgo</span>";
            } else if (data.name == 'Wellgo') {
                output = "<img src='http://favorfields.wpengine.com/wp-content/uploads/2017/02/wellgo1.png'><span>Wellgo</span>";
            }
            return output;
        }
    },
    cssClasses: {
        item: "wellgo_categories"
    },
    sortBy: ['name:desc']
}));

search.addWidget(instantsearch.widgets.numericRefinementList({
    container: '#level',
    attributeName: 'vp_level',
    options: [{ start: 1, end: 1, name: '1' }, { start: 2, end: 2, name: '2' }, { start: 3, end: 3, name: '3' }],
    autoHideContainer: false,
    templates: {
        item: function item(data) {
            return " ";
        },
        footer: "Level"
    },
    cssClasses: {
        list: "wellgo_levels"
    }
}));

search.addWidget(instantsearch.widgets.numericRefinementList({
    container: '#mood',
    attributeName: 'vp_mood',
    options: [{ start: 1, end: 1, name: 'Sunshine' }, { start: 5, end: 5, name: 'Partly_sunny' }, { start: 6, end: 6, name: 'Clouds' }, { start: 4, end: 4, name: 'Rain' }, { start: 2, end: 2, name: 'Storm' }, { start: 3, end: 3, name: 'Rainbow' }],
    autoHideContainer: false,
    templates: {
        item: function item(data) {
            if (data.name == 'Storm') {
                return "<img src='http://favorfields.com/wp-content/uploads/2017/03/w-storm.png'>";
            } else if (data.name == 'Sunshine') {
                return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-sunny.png">';
            } else if (data.name == 'Rainbow') {
                return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rainbow.png">';
            } else if (data.name == 'Rain') {
                return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-rain.png">';
            } else if (data.name == 'Clouds') {
                return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-clouds.png">';
            } else if (data.name == 'Partly_sunny') {
                return '<img src="http://favorfields.com/wp-content/uploads/2017/03/w-partly-sunny.png">';
            } else {
                return 'x';
            }
        }
    }

}));

search.addWidget(instantsearch.widgets.clearAll({
    container: '#stats',
    templates: {
        link: '<i class="fa fa-repeat reload_search" aria-hidden="true"></i>'
    },
    autoHideContainer: false
}));

search.start();