<script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol-debug.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol-debug.css" rel="stylesheet" />
<script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>

<!-- BEGIN PAGE TITLE-->
<h1 class="page-title"> Peta Rawan
  <small>Penyebaran pengguna narkotika</small>
  <?php echo $this->session->userdata('role') == 'admin' ?  '<a href="' . site_url('admin/add') . '" class="btn btn-sm btn-circle yellow pull-right"> <i class="fa fa-plus"></i> Tambah</a>' : ''; ?>
</h1>
<!-- END PAGE TITLE-->





<div class="row">
  <ul class="feeds">
    <?php foreach ($summarize as $summ) { ?>
      <div class="col-md-4">
        <li>
          <div class="col1">
            <div class="cont">
              <div class="cont-col1">
                <div class="label label-sm label-danger">
                  <i class="fa fa-users"></i>
                </div>
              </div>
              <div class="cont-col2">
                <div class="desc" style="color:black">Kecamatan <?php echo $summ->kecamatan ?></div>
              </div>
            </div>
          </div>
          <div class="col2">
            <div class="date" style="color:black"> <?php echo $summ->total ?> Orang </div>
          </div>
        </li>
      </div>
    <?php } ?><br>
  </ul>
</div>



<!-- END PAGE HEADER-->
<div class="portlet light">
  <div class="portlet-title">
    <div class="caption">
      <!-- <span class="caption-helper"><i style="font-size:11px">Scroll untuk zoom in/out</i></span> -->
    </div>
    <div class="actions">
      <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
    </div>
  </div>
  <div class="portlet-body" style="height: auto;">
    <div id="map" class="map"></div>

    <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>


  </div>
</div>
<!-- modal -->
<div class="modal fade bs-modal-lg period" id="basic" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Detail</h4>
      </div>
      <div class="modal-body">
        Loading...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn green btn-export">Export</button> -->
      </div>
    </div>
  </div>
</div>
<!-- end of modal -->
<script type="text/javascript">
  var jsonData = '';


  var raster = new ol.layer.Tile({
      source: new ol.source.OSM()
    }),

    vectorSource = new ol.source.Vector({
      wrapX: false
    }),


    /**
     * Elements that make up the popup.
     */
    container = document.getElementById('popup'),
    content = document.getElementById('popup-content'),
    closer = document.getElementById('popup-closer'),

    /**
     * Create an overlay to anchor the popup to the map.
     */
    overlay = new ol.Overlay({
      element: container,
      autoPan: true,
      autoPanAnimation: {
        duration: 250
      }
    });

  /**
   * Add a click handler to hide the popup.
   * @return {boolean} Don't follow the href.
   */
  closer.onclick = function() {
    overlay.setPosition(undefined);
    closer.blur();
    return false;
  };

  function styleFunction(feature) {
    var geometry = feature.getGeometry();
    console.log(feature);

    var styles = [
      new ol.style.Style({
        image: new ol.style.Circle({
          radius: 3,
          stroke: new ol.style.Stroke({
            color: [180, 0, 0, 1]
          }),
          fill: new ol.style.Fill({
            color: [180, 0, 0, 0.3]
          })
        })
      })
    ];
    return styles;
  }

  var vectorPoints = new ol.layer.Vector({
    source: vectorSource,
    style: styleFunction
  });

  const map = new ol.Map({
    layers: [raster, vectorPoints],
    target: 'map',
    view: new ol.View({
      center: ol.proj.fromLonLat([122.86881206118748, 0.7907467593118866]),
      zoom: 14
    }),

    overlays: [overlay]
  });




  /**
   * Add a click handler to the map to render the popup.
   */
  map.on('singleclick', function(evt) {

    let f = map.forEachFeatureAtPixel(
      evt.pixel,
      function(ft, layer) {
        return ft;
      }
    );

    if (f && f.get('type') == 'click') {
      let coordinate = evt.coordinate;
      // content.innerHTML = '<p>You clicked here:</p><code>' + f.get('desc');
      overlay.setPosition(coordinate);
      console.log("klicked");
      $('#basic').show();
      $.ajax({
        url: '<?php echo base_url("admin/getMarkersDetail") ?>',
        type: 'JSON',
        method: 'GET',
        data: {
          'id': f.get('desc')
        },
        success: function(data) {
          $(".modal-body").html(data);
          $("#basic").modal("show");
        },
        complete: function() {
          $('#basic').hide();
        }
      });

    }
  });


  function addMarker(data) {
    var features = data.map(item => { //iterate through array...
      iconFeature = new ol.Feature({

          geometry: new ol.geom.Point(ol.proj.fromLonLat([parseFloat(item.longitude), parseFloat(item.latitude)])),

          // geometry: new ol.geom.Point(ol.proj.transform([longitude, latitude], 'EPSG:4326',
          //   'EPSG:3857')),

          type: 'click',
          desc: item.id,
        }),

        iconStyle = new ol.style.Style({
          image: new ol.style.Icon( /** @type {module:ol/style/Icon~Options} */ ({
            anchor: [0.5, 46],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            src: '//openlayers.org/en/v3.20.1/examples/data/icon.png'
            // src: '<?php echo base_url('assets/admin/pin.png') ?>'
          })),
          text: new ol.style.Text({
            text: item.nama,
          })
        });


      iconFeature.setStyle(iconStyle);
      return iconFeature;
    });

    var vectorSource = new ol.source.Vector({
      features: features //add an array of features
    });

    var vectorLayer = new ol.layer.Vector({
      source: vectorSource
    });
    map.addLayer(vectorLayer);

  }


  $.ajax({
    url: '<?php echo site_url("admin/getMarkers") ?>',
    type: 'JSON',
    data: '',
    success: function(data) {
      var restJson = jQuery.parseJSON(data);

      addMarker(restJson);
    }
  });
</script>
<style>
  #map {
    width: 100%;
    height: 100%,
  }
</style>