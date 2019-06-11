@extends('layouts.admin')
@section('externolink')
<link href="{{asset('tokenfield/dist/css/bootstrap-tokenfield.min.css')}}" rel="stylesheet">
	<link href="{{asset('jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">

	<!-- <link href="estilos/carousel.css" rel="stylesheet"> -->
    <link href="{{asset('css/product.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection
@section('externoscript')
	<script	src="{{asset('jquery-ui/jquery-ui.min.js')}}"> </script>
	<script src="{{asset('tokenfield/dist/bootstrap-tokenfield.min.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	<script src="https://www.amcharts.com/lib/3/serial.js"></script>
	<script src="https://www.amcharts.com/lib/3/pie.js"></script>
	<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
	<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
	<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<script type="text/javascript" src="{{asset('js/tags.js')}}"></script>
	<style>
		#chartdiv {
		  width: 100%;
		  height: 500px;
		}

		.amcharts-export-menu-top-right {
		  top: 10px;
		  right: 0;
		}
		@import url(https://fonts.googleapis.com/css?family=Lato);

		html, body {
		  font-family: Lato;
		  background: #eee;
		}

		.main {
		  width: 800px;
		  height: 100%;
		  margin: auto;
		  background: #fff;
		  padding: 20px;
		  overflow: hidden;
		}

		.main h2 {
		  margin: 35px 0 10px 0;
		  clear: both;
		}

		.main p {
		  margin-bottom: 25px;
		}

		.main input[type=button] {
		  float: right;
		  font-size: 18px;
		  padding: 8px 18px;
		  margin-top: 25px;
		}

		.main table {
		  width: 100%;
		  border: 1px solid #ccc;
		  border-collapse: collapse;
		}

		.main table td, .main table th {
		  padding: 5px 8px;
		  border: 1px solid #ccc;
		  text-align: center;
		}

		.chartdiv {
		  width: 47%;
		  height: 200px;
		  border: 1px solid #ccc;
		  margin: 0 15px 25px 0;
		  font-family: Lato;
		}

		.chartdiv.float {
		  float: left;
		}

		.chartdiv.wide {
		  width: 100%;
		  margin: 10px 0;
		  float: none;
		}

		.chartdiv.narrow {
		  width: 25%;
		}
	</style>

@endsection
@section('content')
<div class="col-md-12">
	@include('partials.flash')
	<div class="row" >
		<div class="main">
  
  <input type="button" value="Export to PDF" onclick="exportReport();" />
  <h1>Lorem ipsum dolor sit amet, consectetur adipiscing</h1>
  
  <p id="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non elit ac augue vestibulum convallis. Integer at dignissim lorem. Nam semper ante eget ante molestie, et consequat magna tristique. Proin vel orci facilisis, pharetra mi non, auctor odio. Vestibulum in lacinia ex, sit amet laoreet justo. Sed faucibus lectus nisl, et auctor mauris tempus quis. Proin placerat sem sit amet efficitur rhoncus. Aliquam semper aliquet lacinia.</p>

<img id="imagen" src="https://banner2.kisspng.com/20180418/ltq/kisspng-food-truck-street-food-food-court-logo-court-5ad7c95374e970.3048581215240912194789.jpg"  height="42" width="42">
  
  <div id="chartdiv1" class="chartdiv wide"></div>
  
  <h2>Mauris ultrices enim eget augue</h2>
  <table>
    <tr>
      <th>USA</th>
      <th>United Kingdom</th>
      <th>Canada</th>
      <th>Japan</th>
      <th>France</th>
      <th>Brazil</th>
    </tr>
    <tr>
      <td>5000</td>
      <td>4500</td>
      <td>5100</td>
      <td>1500</td>
      <td>9600</td>
      <td>2500</td>
    </tr>
    <tr>
      <td>5000</td>
      <td>4500</td>
      <td>5100</td>
      <td>1500</td>
      <td>9600</td>
      <td>2500</td>
    </tr>
    <tr>
      <td>5000</td>
      <td>4500</td>
      <td>5100</td>
      <td>1500</td>
      <td>9600</td>
      <td>2500</td>
    </tr>
  </table>

  
  <h2>Nam eget arcu sed nisl dignissim</h2>
  <div id="chartdiv4" class="chartdiv narrow float"></div>
  
  <p id="note1">Aliquam erat volutpat. Vivamus orci ipsum, malesuada vel felis id, ultrices dictum velit. Aenean maximus risus sed metus aliquet luctus. Suspendisse efficitur magna nisl, quis maximus enim imperdiet vel. Aliquam aliquet velit lacinia, facilisis nisi quis, placerat sem. Etiam elementum gravida nulla, non accumsan diam porttitor et. Phasellus finibus ullamcorper vestibulum. In dictum posuere ex iaculis semper. Etiam dolor leo, sollicitudin sed nisi in, viverra vehicula lacus.</p>
  
  <p id="note2">Maecenas congue, justo a vestibulum condimentum, purus sapien scelerisque ex, nec tincidunt ante enim ut turpis. Phasellus quis mi pellentesque, vehicula turpis sit amet, viverra ante. Cras hendrerit neque arcu, et dapibus purus consequat eu. Praesent maximus rutrum purus pellentesque tempus.</p>
  
  
</div>
	</div>	
</div>
<script type="text/javascript">
/**
 * First chart
 */
var chart = AmCharts.makeChart("chartdiv1", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [{
    "country": "USA",
    "visits": 3025,
    "color": "#FF0F00"
  }, {
    "country": "China",
    "visits": 1882,
    "color": "#FF6600"
  }, {
    "country": "Japan",
    "visits": 1809,
    "color": "#FF9E01"
  }, {
    "country": "Germany",
    "visits": 1322,
    "color": "#FCD202"
  }, {
    "country": "UK",
    "visits": 1122,
    "color": "#F8FF01"
  }, {
    "country": "France",
    "visits": 1114,
    "color": "#B0DE09"
  }, {
    "country": "India",
    "visits": 984,
    "color": "#04D215"
  }, {
    "country": "Spain",
    "visits": 711,
    "color": "#0D8ECF"
  }, {
    "country": "Netherlands",
    "visits": 665,
    "color": "#0D52D1"
  }, {
    "country": "Russia",
    "visits": 580,
    "color": "#2A0CD0"
  }, {
    "country": "South Korea",
    "visits": 443,
    "color": "#8A0CCF"
  }, {
    "country": "Canada",
    "visits": 441,
    "color": "#CD0D74"
  }],
  "startDuration": 1,
  "graphs": [{
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "categoryField": "country",
  "categoryAxis": {
    "labelsEnabled": false
  },
  "titles": [{
    "text": "First chart"
  }],
  "export": {
    "enabled": true,
  }
});

/**
 * Second chart
 */

/**
 * Third chart
 */

/**
 * Fourth chart
 */
AmCharts.makeChart("chartdiv4", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [{
    "country": "Lithuania",
    "litres": 501.9
  }, {
    "country": "Czech Republic",
    "litres": 301.9
  }, {
    "country": "Ireland",
    "litres": 201.1
  }, {
    "country": "Germany",
    "litres": 165.8
  }, {
    "country": "Australia",
    "litres": 139.9
  }, {
    "country": "Austria",
    "litres": 128.3
  }, {
    "country": "UK",
    "litres": 99
  }, {
    "country": "Belgium",
    "litres": 60
  }, {
    "country": "The Netherlands",
    "litres": 50
  }],
  "valueField": "litres",
  "titleField": "country",
  "pullOutRadius": 10,
  "labelsEnabled": false,
  "titles": [{
    "text": "Fourth chart"
  }],
  "export": {
    "enabled": true,
    "menu": []
  }
});

/**
 * Define export function
 */
function exportReport() {

  // So that we know export was started
  console.log("Starting export...");

  // Define IDs of the charts we want to include in the report
  var ids = ["chartdiv1", "chartdiv4"];

  // Collect actual chart objects out of the AmCharts.charts array
  var charts = {},
    charts_remaining = ids.length;
  for (var i = 0; i < ids.length; i++) {
    for (var x = 0; x < AmCharts.charts.length; x++) {
      if (AmCharts.charts[x].div.id == ids[i])
        charts[ids[i]] = AmCharts.charts[x];
    }
  }

  // Trigger export of each chart
  for (var x in charts) {
    if (charts.hasOwnProperty(x)) {
      var chart = charts[x];
      chart["export"].capture({}, function() {
        this.toJPG({}, function(data) {

          // Save chart data into chart object itself
          this.setup.chart.exportedImage = data;

          // Reduce the remaining counter
          charts_remaining--;

          // Check if we got all of the charts
          if (charts_remaining == 0) {
            // Yup, we got all of them
            // Let's proceed to putting PDF together
            generatePDF();
          }

        });
      });
    }
  }

  function generatePDF() {

    // Log
    console.log("Generating PDF...");

    // Initiliaze a PDF layout
    var layout = {
      "content": []
    };

    // Let's add a custom title
    layout.content.push({
      "text": "Lorem ipsum dolor sit amet, consectetur adipiscing",
      "fontSize": 15
    });

    // Now let's grab actual content from our <p> intro tag
    layout.content.push({
      "text": document.getElementById("intro").innerHTML
    });
 	// layout.content.push({
  //     "image": document.getElementById("imagen").src,
  //     "fit": [100, 100]
  //   });
    // Add bigger chart
    layout.content.push({
      "image": charts["chartdiv1"].exportedImage,
      "fit": [523, 300]
    });

    // Let's add a table
    layout.content.push({
      "table": {
        // headers are automatically repeated if the table spans over multiple pages
        // you can declare how many rows should be treated as headers
        "headerRows": 1,
        "widths": ["16%", "16%", "16%", "16%", "16%", "*"],
        "body": [
          ["USA", "UK", "Canada", "Japan", "France", "Brazil"],
          ["5000", "4500", "5100", "1500", "9600", "2500"],
          ["5000", "4500", "5100", "1500", "9600", "2500"],
          ["5000", "4500", "5100", "1500", "9600", "2500"]
        ]
      }
    });

    
    // Add chart and text next to each other
    layout.content.push({
      "columns": [{
        "width": "25%",
        "image": charts["chartdiv4"].exportedImage,
        "fit": [125, 300]
      }, {
        "width": "*",
        "stack": [
          document.getElementById("note1").innerHTML,
          "\n\n",
          document.getElementById("note2").innerHTML
        ]
      }],
      "columnGap": 10
    });

    // Trigger the generation and download of the PDF
    // We will use the first chart as a base to execute Export on
    chart["export"].toPDF(layout, function(data) {
      this.download(data, "application/pdf", "amCharts.pdf");
    });

  }
}

</script>
@endsection
