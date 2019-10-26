<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BNN - Kab. Gorontalo Utara</title>
    <!-- Font Awesome Icons -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- Theme CSS - Includes Bootstrap -->
    <link href=<?php echo base_url("assets/main/css/creative.css") ?> rel="stylesheet">
</head>

<body id="body-form"><br>

    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="JavaScript:;"><img style="width:60%" src="<?php echo base_url("assets/main/img/logo_black.png") ?>"></a>
    </div><br>
    <div class="container">
        <form method="post" action="javascript:;" id="form-entry" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label>IDENTITAS PELAPOR</label>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="NAMA LENGKAP">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ttl" class="form-control" id="ttl" placeholder="TEMPAT TANGGAL LAHIR">
                        <small class="hint">Cth: Jakarta, 26 Juni 1996</small>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="alamat" placeholder="ALAMAT"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pekerjaan" class="form-control" placeholder="PEKERJAAN">
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <input type="number" name="nohp" class="form-control" placeholder="NO. HP">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="EMAIL">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>URAIAN LAPORAN</label>
                    <div class="form-group">
                        <textarea class="form-control" rows="10" name="laporan" placeholder="URAIAN LAPORAN"></textarea>
                    </div>
                    <label>BUKTI FOTO</label>
                    <div class="form-group">
                        <button type="button" class="btn" style="background-color:#ebe9e9">
                            <input type="file" name="files[]" multiple />
                        </button>
                    </div>
                    <small class="hint">Silahkan pilih beberapa file sekaligus jika file lebih dari satu. format gambar: 'jpg | jpeg | png'</small>
                </div>
                <div class="col-md-12 text-center">
                    <small class="validation"></small><br>
                    <a href="<?php echo site_url("") ?>"><button type="button" class="btn btn-form btn-sm text-white" style="background-color:#0384dd;">BATALKAN</button></a>
                    <button type="button" class="btn btn-form btn-sm text-white btn-submit" style="background-color:#0384dd;">KIRIM LAPORAN</button>
                </div>
            </div>
        </form>
    </div>
    <footer>
        <div style="position: relative; text-align: center">
            <p style="position: fixed; bottom: 0; width:100%;">Hidup Sehat Tanpa Narkoba</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script>

        function validation(){
            var valid = true;
            if ($("input[name='nama']").val() == ""){
               valid = false;
            }
            if ($("input[name='ttl']").val() == ""){
                valid = false;
            }
            if ($("textarea[name='alamat']").val() == ""){
                valid = false;
            }
            if ($("input[name='pekerjaan']").val() == ""){
                valid = false;
            }
            if ($("select[name='agama']").val() == undefined){
                valid = false;
            }
            if ($("input[name='nohp']").val() == ""){
                valid = false;
            }
            if ($("input[name='email']").val() == ""){
                valid = false;
            }
            if ($("textarea[name='alamat']").val() == ""){
                valid = false;
            }
            if ($("textarea[name='laporan']").val() == ""){
                valid = false;
            }
            return valid;
        }
        $(".btn-submit").click(function() {
            var nama = $("input[name='nama']").val();
            var ttl = $("input[name='ttl']").val();
            var alamat = $("textarea[name='alamat']").val();
            var pekerjaan = $("input[name='pekerjaan']").val();
            var agama = $("select[name='agama']").val();
            var nohp = $("input[name='nohp']").val();
            var email = $("input[name='email']").val();
            var uraian = $("textarea[name='laporan']").val();
            var bukti = $("input[name='files[]']").val();

            var topost
            if (validation() == false){
                $(".validation").html("Pastikan semua form terisi dengan benar !");
            } else {
                $(".validation").html("");

                var url = '<?php echo base_url('operation/addPengaduan');?>';
                $("#form-entry").attr("method", "post");
                $('#form-entry').attr('action', url).submit();
                }
        });
    </script>
    
</body>


</html>