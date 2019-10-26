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
            <a href="javascript:;" class="btn btn-circle green btn-submit"> <i class="fa fa-save"></i> Update </a>
            <a href="<?php echo site_url('admin/peta_rawan') ?>" class="btn btn-circle red"> <i class="fa fa-remove"></i> Batal </a>
        </div>
    </div>
    <div class="portlet-body">
        <form action="javascript:;" id="form-add" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" class="form-control input-sm" name="id" value="<?php echo $listData->id ?>">
                        <input type="text" class="form-control input-sm" name="nama" value="<?php echo $listData->nama ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" class="form-control input-sm" name="nik" value="<?php echo $listData->nik ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                    <?php
                                    $date = str_replace('/', '-', $listData->tgl_lahir);
                                    $tgl_lahir = date("d/m/Y", strtotime($date));
                                    ?>
                                    <input type="text" class="form-control form-filter input-sm" readonly name="tgl_lahir" value="<?php echo $tgl_lahir ?>">
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
                                        <input type="radio" name="jkel" id="optionsRadios4" value="laki-laki" <?php echo $listData->jkel == 'laki-laki' ? 'checked' : '';?> > Laki-laki
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input type="radio" name="jkel" id="optionsRadios5" value="Perempuan" <?php echo $listData->jkel == 'Perempuan' ? 'checked' : '';?> > Perempuan
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
                                    <option value="islam" <?php echo $listData->agama == 'islam' ? 'selected' : '';?>>ISLAM</option>
                                    <option value="katolik" <?php echo $listData->agama == 'katolik' ? 'selected' : '';?>>KATOLIK</option>
                                    <option value="kristen" <?php echo $listData->agama == 'kristen' ? 'selected' : '';?>>KRISTEN</option>
                                    <option value="hindu" <?php echo $listData->agama == 'hindu' ? 'selected' : '';?>>HINDU</option>
                                    <option value="budha" <?php echo $listData->agama == 'budha' ? 'selected' : '';?>>BUDHA</option>
                                    <option value="konghucu" <?php echo $listData->agama == 'konghucu' ? 'selected' : '';?>>KONGHUCU</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control input-sm" name="pekerjaan" value="<?php echo $listData->pekerjaan?>">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="kecamatan">
                            <option value="" selected disabled>Kecamatan</option>
                            <option value="Tolinggula" <?php echo $listData->kecamatan == 'Tolinggula' ? 'selected' : '';?> >Tolinggula</option>
                            <option value="Biau" <?php echo $listData->kecamatan == 'Biau' ? 'selected' : '';?>>Biau</option>
                            <option value="Sumalata" <?php echo $listData->kecamatan == 'Sumalata' ? 'selected' : '';?>>Sumalata</option>
                            <option value="Sumalata Timur" <?php echo $listData->kecamatan == 'Sumalata Timur' ? 'selected' : '';?>>Sumalata Timur</option>
                            <option value="Monano" <?php echo $listData->kecamatan == 'Monano' ? 'selected' : '';?>>Monano</option>
                            <option value="Anggrek" <?php echo $listData->kecamatan == 'Anggrek' ? 'selected' : '';?>>Anggrek</option>
                            <option value="Kwandang" <?php echo $listData->kecamatan == 'Kwandang' ? 'selected' : '';?>>Kwandang</option>
                            <option value="Tomilito" <?php echo $listData->kecamatan == 'Tomilito' ? 'selected' : '';?>>Tomilito</option>
                            <option value="Gentuma Raya" <?php echo $listData->kecamatan == 'Gentuma Raya' ? 'selected' : '';?>>Gentuma Raya</option>
                            <option value="Atinggola" <?php echo $listData->kecamatan == 'Atinggola' ? 'selected' : '';?>>Atinggola</option>
                            <option value="Ponelo Kepulauan" <?php echo $listData->kecamatan == 'Ponelo Kepulauan' ? 'selected' : '';?>>Ponelo Kepulauan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile1">Foto</label>
                        <input type="file" id="exampleInputFile1" name="photo" value="<?php echo base_url("uploads/petarawan/").$listData->foto?>" >
                        <i style="font-size:11px">Format .jpg, .jpeg </i>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan" ><?php echo $listData->keterangan?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea class="form-control" rows="3" name="alamat"><?php echo $listData->alamat?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Lokasi</label><br>
                    <div class="form-group col-md-2">
                        <label>Latitude</label>
                        <input type="text" class="form-control input-sm" name='latitude' id='latbox' readonly value="<?php echo $listData->latitude?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Longitude</label>
                        <input type="text" class="form-control input-sm" name='longitude' id='lngbox' readonly value="<?php echo $listData->longitude?>">
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
            valid = false;
        }
        if ($("input[name='nik']").val() == '') {
            valid = false
        }
        if ($("input[name='jkel']:checked").val() == undefined) {
            valid = false
        }
        if ($("select[name='agama']").val() == null) {
            valid = false
        }
        if ($("select[name='kecamatan']").val() == null) {
            valid = false
        }
        if ($("input[name='photo']").val() == '') {
            valid = false;
            var detail_msg = "Photo Kosong!";
        }
        if ($("input[name='latitude']").val() == '') {
            valid = false;
            var detail_msg = "Lokasi belum dipilih!";
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
            $(".alert-warning").html("Gagal, Pastikan semua form terisi dengan lengkap! <br> "+ detail_msg +" ");
        }

    })


    var pos = ol.proj.fromLonLat([<?php echo $listData->longitude?>,<?php echo $listData->latitude?>]);
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