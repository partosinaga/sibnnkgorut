<link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
<script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
<div class="alert alert-warning hide">
    <span class="login-msg"></span>
</div>
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Tambah Peta Rawan</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->



<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="actions">
            <a href="javascript:;" class="btn btn-circle green btn-submit"> <i class="fa fa-save"></i> Save </a>
            <a href="<?php echo site_url('admin/peta_rawan') ?>" class="btn btn-circle red"> <i class="fa fa-remove"></i> Batal </a>
        </div>
    </div>
    <div class="portlet-body">
        <form action="javascript:;" id="form-add" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control input-sm" name="nama">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" class="form-control input-sm" name="nik">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control form-filter input-sm" readonly name="tgl_lahir">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm default" type="button">
                                            <i class="fa fa-calendar"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Jenis Kelamin</label>
                                <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                        <input type="radio" name="jkel" id="optionsRadios4" value="laki-laki" > Laki-laki
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="jkel" id="optionsRadios5" value="Perempuan"> Perempuan
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama">
                                    <option value="" selected disabled>AGAMA</option>
                                    <option value="islam">ISLAM</option>
                                    <option value="katolik">KATOLIK</option>
                                    <option value="kristen">KRISTEN</option>
                                    <option value="hindu">HINDU</option>
                                    <option value="budha">BUDHA</option>
                                    <option value="konghucu">KONGHUCU</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control input-sm" name="pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan">
                            <option value="" selected disabled>Kecamatan</option>
                            <option value="Tolinggula">Tolinggula</option>
                            <option value="Biau">Biau</option>
                            <option value="Sumalata">Sumalata</option>
                            <option value="Sumalata Timur">Sumalata Timur</option>
                            <option value="Monano">Monano</option>
                            <option value="Anggrek">Anggrek</option>
                            <option value="Kwandang">Kwandang</option>
                            <option value="Tomilito">Tomilito</option>
                            <option value="Gentuma Raya">Gentuma Raya</option>
                            <option value="Atinggola">Atinggola</option>
                            <option value="Ponelo Kepulauan">Ponelo Kepulauan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile1">Foto</label>
                        <input type="file" id="exampleInputFile1" name="photo">
                        <i style="font-size:11px">Format .jpg, .jpeg </i>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea class="form-control" rows="3" name="alamat"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Lokasi</label><br>
                    <div class="form-group col-md-2">
                        <label>Latitude</label>
                        <input type="text" class="form-control input-sm" name='latitude' id='latbox' readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Longitude</label>
                        <input type="text" class="form-control input-sm" name='longitude' id='lngbox' readonly>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>

<div class="portlet light">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-helper"><i style="font-size:11px">Drag picker untuk memindahkan titik lokasi</i></span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body" style="height: auto;">
        <div id="map" class="map"></div>
        <div id="marker" title="Marker"></div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var initPickers = function() {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                autoclose: true
            });
        }
        initPickers();
    })

    $(".btn-submit").click(function() {
        console.log($("select[name='kecamatan']").val());

        var valid = true;
        if ($("input[name='nama']").val() == '') {
            valid = false
        }
        if ($("input[name='tgl_lahir']").val() == '') {
            valid = false
        }
        if ($("textarea[name='keterangan']").val() == '') {
            valid = false
        }
        if ($("input[name='foto']").val() == '') {
            valid = false
        }
        if ($("textarea[name='alamat']").val() == '') {
            valid = false
        }
        if ($("input[name='nik']").val() == '') {
            valid = false
        }
        if ($("input[name='jkel']:checked").val() == undefined) {
            valid = false
        }
        if ($("select[name='agama']").val() == null ) {
            valid = false
        }
        if ($("select[name='kecamatan']").val() == null ) {
            valid = false
        }

        if ($("input[name='latitude']").val() == '') {
            valid = false
        }

        if ($("input[name='longitude']").val() == '') {
            valid = false
        }

        if (valid == true) {
        var url = '<?php echo site_url("admin/addPeta") ?>';
        $("#form-add").attr("method", "post");
        $('#form-add').attr('action', url).submit();
        } else {
            $(".alert-warning").removeClass("hide");
            $(".alert-warning").html("Gagal, Pastikan semua form terisi dengan lengkap dan lokasi sudah dipilih!");
        }

    })


    var pos = ol.proj.fromLonLat([122.86881206118748, 0.7907467593118866]);
    var map = new ol.Map({
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: pos,
            zoom: 15
        }),
        target: 'map'
    });
    var marker_el = document.getElementById('marker');
    var marker = new ol.Overlay({
        position: pos,
        positioning: 'center-center',
        element: marker_el,
        stopEvent: false,
        dragging: true
    });
    map.addOverlay(marker);


    var dragPan;
    map.getInteractions().forEach(function(interaction) {
        if (interaction instanceof ol.interaction.DragPan) {
            dragPan = interaction;
        }
    });

    marker_el.addEventListener('mousedown', function(evt) {
        dragPan.setActive(false);
        marker.set('dragging', true);
        // console.info('start dragging');
    });

    map.on('pointermove', function(evt) {
        if (marker.get('dragging') === true) {
            marker.setPosition(evt.coordinate);
        }
    });

    map.on('pointerup', function(evt) {
        if (marker.get('dragging') === true) {
            // console.info('stop dragging');

            //get selected location
            console.info(evt.pixel);
            console.info(map.getPixelFromCoordinate(evt.coordinate));
            console.info(ol.proj.toLonLat(evt.coordinate));
            var coords = ol.proj.toLonLat(evt.coordinate);
            var lat = coords[1];
            var lon = coords[0];
            // var locTxt = "Latitude: " + lat + " Longitude: " + lon;
            // coords is a div in HTML below the map to display
            // alert(locTxt);
            document.getElementById("latbox").value = lat;
            document.getElementById("lngbox").value = lon;
            //end of get selected location
            dragPan.setActive(true);
            marker.set('dragging', false);
        }
    });
</script>
<style>
    #map {
        width: 100%;
        height: 100%;
        border: 1px solid;
    }

    /* #map {
            position: absolute;
            z-index: 5;
        }  */
    #marker {
        width: 15px;
        height: 15px;
        border: 2px solid;
        background-color: red;
        /* opacity: 0.5; */
        cursor: move;
    }
</style>