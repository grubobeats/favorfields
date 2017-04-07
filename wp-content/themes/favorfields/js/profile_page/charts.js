/**
 * Created by vladan on 06/04/2017.
 */

jQuery(document).ready(function ($) {

    // The most used tags
    Highcharts.chart('most-used-tags', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Your most used tags'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Frequency',
            colorByPoint: true,
            data: most_used_tags
        }]
    });


    var proccessed_json = new Array();

    for ( step = 0; step < most_passed_wellgorithms.length; step++ ) {
        proccessed_json.push( [ most_passed_wellgorithms[step].name, most_passed_wellgorithms[step].y ] );
    }

    // The most visited Wellgorithms
    Highcharts.chart('most-used-wellgorithms', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'How many times you passed wellgorithms?'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: 0,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Passed (times)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'You passed this wellgorithm: <b>{point.y} times</b>'
        },
        series: [{
            name: 'Times passed',
            data: proccessed_json,
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });



});

