$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            utilidad: 2666,
            compras: null,
            ventas: 2647
        }, {
            period: '2010 Q2',
            utilidad: 2778,
            compras: 2294,
            ventas: 2441
        }, {
            period: '2010 Q3',
            utilidad: 4912,
            compras: 1969,
            ventas: 2501
        }, {
            period: '2010 Q4',
            utilidad: 3767,
            compras: 3597,
            ventas: 5689
        }, {
            period: '2011 Q1',
            utilidad: 6810,
            compras: 1914,
            ventas: 2293
        }, {
            period: '2011 Q2',
            utilidad: 5670,
            compras: 4293,
            ventas: 1881
        }, {
            period: '2011 Q3',
            utilidad: 4820,
            compras: 3795,
            ventas: 1588
        }, {
            period: '2011 Q4',
            utilidad: 15073,
            compras: 5967,
            ventas: 5175
        }, {
            period: '2012 Q1',
            utilidad: 10687,
            compras: 4460,
            ventas: 2028
        }, {
            period: '2012 Q2',
            iphone: 8432,
            compras: 5713,
            ventas: 1791
        }],
        xkey: 'period',
        ykeys: ['utilidad', 'compras', 'ventas'],
        labels: ['Utilidad', 'Compras', 'Ventas'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
