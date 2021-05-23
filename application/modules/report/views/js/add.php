
<script>
var id = window.location.pathname.split('/').pop();
	$(document).ready(function() {
		 
		if($.isNumeric(id)){
			loadData();
			 
		}
	});
	
$('.btnstep1').hide();

    function getListTypeDokumen() {
        $.ajax({
            url: ServeUrl+"typedokumen/api_list_all",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Pilih Type Dokumen ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#typeDokumen').html(html);
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
    
	getListTypeDokumen()

    function getListTypeDokumenTurunan(id, div, def) {
        $.ajax({
            data: {'id' : id},
            url: ServeUrl+"typedokumen/api_list_all_turunan",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Jenis Peraturan ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].second_id+' '+data[i].name+'</option>';
                    }
                    $('#'+div).html(html);
					$("select[name="+div+"]").val(def);
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
	
	function getListBidangHukum(div, def) {
        $.ajax({
            data: "",
            url: ServeUrl+"bidanghukum/api_list_all",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Bidang Hukum ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#'+div).html(html);
					$("select[name="+div+"]").val(def);
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
	
	function getListBahasa(div, def) {
        $.ajax({
            data: "",
            url: ServeUrl+"bahasa/api_list_all",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Bahasa ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#'+div).html(html);
					$("select[name="+div+"]").val(def);
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
	
	function getListPenerbit(div, def) {
        $.ajax({
            data: "",
            url: ServeUrl+"penerbit/api_list_all",
            timeout: 600000,
            type: 'GET',
            dataType: 'json',
            complete: function(response) {
                var data = response.responseJSON.data
                if(response.status == 200){
                    var html = '';
                    html += '<option selected disabled>Penerbit ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#'+div).html(html);
					$("select[name="+div+"]").val(def);
                } else {
                    console.log(`Error`)
                }

            },error: function(xhr, status, error) {
                console.log("xhr", xhr);
                console.log("status", status);
                console.log("error", error);
            },
        })
    }
	
	//Tipe document
    $('#typeDokumen').change(function () {
      $('.subjenis').hide();
        if ($('#typeDokumen').val() != "") {
    
                if ($('#typeDokumen').val() == 1) {
                    if ($('#typeDokumen').val() != 1) {
                       $('#kokwok')[0].reset()
                    }
					
					
					if($.isNumeric(id) == false){
					getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan1');
					getListBahasa('bahasa1');
					getListBidangHukum('bidang_hukum1');
					}
                    $('.labelku').text(' T.E.U Badan');
                    $('.labellamp').text(' Lampiran');
                    $('#step2p').show();
                    $('#step3').show();
                    $('#step4').show();
                    $('#step4a').show();
                    $('#step4b').show();
                    $('#step4c').show();
                    $('#step5').show();
                    $('#step5a').hide();
                    $('#step2').hide();
                    $('#divdivan').show();
                    $('#divdivanah').hide();
                    $('#divdivanmh').hide();
                    $('#divdivanpp').hide();
					$('.btnstep1').show();
                    
                    $('#button_lampiran').html('<div class="col-sm-6"><button id="submit" style="background-color: #293a80; border-color: #293a80;" type="submit" class="btn btn-success btn-sm pull-right" name="submit" value="draft"><i class="fa fa-save"></i> Draft</button></div><div class="col-sm-5"><button id="btnstep4" type="button" class="btn btn-primary btn-sm pull-right draft4" name="submit" value="draft4"><i class="fa fa-arrow-right"></i> Selanjutnya</button></div>');
                } else if ($('#typeDokumen').val() == 2) {
					if ($('#typeDokumen').val() != 2) {
                        $('#kokwok')[0].reset();
                    }
					if($.isNumeric(id) == false){
					getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan2');
					getListBahasa('bahasa2');
					getListPenerbit('penerbit');
					}
                    $('.labelku').text(' T.E.U Pengarang');
                    $('.labellamp').text(' Lampiran');
                    $('#step2p').show();
                    $('#step3').show();
                    $('#step4').show();
                    $('#step4a').hide();
                    $('#step4b').hide();
                    $('#step4c').hide();
                    $('#step5').hide();
                    $('#step5a').hide();
                    $('#step2').hide();
                    $('#divdivan').hide();
                    $('#divdivanah').hide();
                    $('#divdivanmh').show();
                    $('#divdivanpp').hide();
                    $('.btnstep1').show();
                    $('#theadteup tbody').empty();
                   
                    $('#button_lampiran').html('<div class="col-sm-6"><button id="submit" type="submit" style="background-color: #293a80; border-color: #293a80;" class="btn btn-success btn-sm pull-right" name="submit" value="draft"><i class="fa fa-save"></i> Draft</button></div><div class="col-sm-4"><button id="submit" type="submit" class="btn btn-success btn-sm pull-right" name="submit" value="save"><i class="fa fa-save"></i> Simpan</button></div>');
                } else if ($('#typeDokumen').val() == 3) {
                    if ($('#typeDokumen').val() != 3) {
                        $('#kokwok')[0].reset();
                    }
					if($.isNumeric(id) == false){
					getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan3');
					getListBahasa('bahasa3');
					getListBidangHukum('bidang_hukum3');
					}
                    $('.labelku').text(' T.E.U Pengarang');
                    $('.labellamp').text(' Lampiran');
                    $('#step2p').show();
                    $('#step3').show();
                    $('#step4').show();
                    $('#step4a').hide();
                    $('#step4b').hide();
                    $('#step4c').hide();
                    $('#step5').hide();
                    $('#step5a').hide();
                    $('#divdivan').hide();
                    $('#divdivanmh').hide();
                    $('#divdivanah').show();
                    $('#divdivanpp').hide();
                    $('.btnstep1').show();
                    $('#theadteup tbody').empty();
                   
                    $('#button_lampiran').html('<div class="col-sm-6"><button id="submit" type="submit" style="background-color: #293a80; border-color: #293a80;" class="btn btn-success btn-sm pull-right" name="submit" value="draft"><i class="fa fa-save"></i> Draft</button></div><div class="col-sm-4"><button id="submit" type="submit" class="btn btn-success btn-sm pull-right" name="submit" value="save"><i class="fa fa-save"></i> Simpan</button></div>');
                } else if ($('#typeDokumen').val() == 4) {

                    if ($('#typeDokumen').val() != 4) {
                        $('#kokwok')[0].reset();
                    }
					if($.isNumeric(id) == false){
					getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan4');
					getListBahasa('bahasa4');
					}
                    $('.labelku').text(' T.E.U Badan');
                    $('.labellamp').text(' Dokumen Putusan');
                    $('#step2p').show();
                    $('#step3').show();
                    $('#step4').show();
                    $('#step4a').hide();
                    $('#step4b').hide();
                    $('#step4c').hide();
                    $('#step5').hide();
                    $('#step5a').show();
                    $('#divdivan').hide();
                    $('#divdivanmh').hide();
                    $('#divdivanah').hide();
                    $('#divdivanpp').show();
                    $('.btnstep1').show();
                    $('#theadteup tbody').empty();
                   
                    $('#button_lampiran').html('<div class="col-sm-6"><button id="submit" style="background-color: #293a80; border-color: #293a80;" type="submit" class="btn btn-success btn-sm pull-right" name="submit" value="draft"><i class="fa fa-save"></i> Draft</button></div><div class="col-sm-5"><button id="btnstep4" type="button" class="btn btn-primary btn-sm pull-right draft4" name="submit" value="draft4"><i class="fa fa-arrow-right"></i> Selanjutnya</button></div>');
                }
  
        }
    });
    
	navbut1();
	navbut2p();
	navbut3();
	navbut4();
	navbut5();
	step1();
	step2p();
	step3();
	step4();
	step4a();
	step4b();
	step4c();
		
	function navbut1(){
      $("#step1").click(function(){
        $("#tab1").attr('hidden', false);
        $("#tab2p").attr('hidden', true);
        $("#tab3").attr('hidden', true);
        $("#tab4").attr('hidden', true);
        $("#tab5").attr('hidden', true);
        $("#submitdong").hide();
      })
    }

    function navbut2p(){
      $("#step2p").click(function(){
		if($.isNumeric(id) == false){
			swal({
				  text: 'Mohon isi Data Utama !!',
				  icon: "warning",
				  button: false,
				  timer: 1500
			  }); 
			 
		}else{
		loadTeu();		
        $("#tab1").attr('hidden', true);
        $("#tab2p").attr('hidden', false);
        $("#tab3").attr('hidden', true);
        $("#tab4").attr('hidden', true);
        $("#tab5").attr('hidden', true);
        $("#submitdong").hide();
		}
      })
	 
	 
    }

    function navbut3(){
      $("#step3").click(function(){
		  if($.isNumeric(id) == false){
			swal({
				  text: 'Mohon isi Data Utama !!',
				  icon: "warning",
				  button: false,
				  timer: 1500
			  }); 
			 
		}else{
		loadSubjek();
		
        $("#tab1").attr('hidden', true);
        $("#tab2p").attr('hidden', true);
        $("#tab3").attr('hidden', false);
        $("#tab4").attr('hidden', true);
        $("#tab5").attr('hidden', true);
        $("#submitdong").hide();
		}
      })
    }

    function navbut4(){
      $("#step4").click(function(){
		if($.isNumeric(id) == false){
			swal({
				  text: 'Mohon isi Data Utama !!',
				  icon: "warning",
				  button: false,
				  timer: 1500
			  }); 
			 
		}else{
        if($('#typeDokumen').val() == 2 || $('#typeDokumen').val() == 3){
          $('#step4a').hide();
          $('#step4b').hide();
          $('#step4c').hide();
          // $('#step5').hide();
          $('#step5a').hide();
          $("#tab1").attr('hidden', true);
          $("#tab2p").attr('hidden', true);
          $("#tab3").attr('hidden', true);
          $("#tab4").attr('hidden', false);
          $("#tab5").attr('hidden', true);
          $("#submitdong").hide();
        }else if($('#typeDokumen').val() == 1){
          $('#step5a').hide();
		  loadLampiran();	
          $("#tab1").attr('hidden', true);
          $("#tab2p").attr('hidden', true);
          $("#tab3").attr('hidden', true);
          $("#tab4").attr('hidden', false);
          $("#tab5").attr('hidden', true);
          $("#submitdong").hide();
        }else{
          $('#step4a').hide();
          $('#step4b').hide();
          $('#step4c').hide();
          $('#step5').hide();
          // $('#step5a').hide();
          $("#tab1").attr('hidden', true);
          $("#tab2p").attr('hidden', true);
          $("#tab3").attr('hidden', true);
          $("#tab4").attr('active', false);
          $("#tab5").attr('hidden', true);
          $("#submitdong").hide();
        }
		}
      })
    }

    function navbut5(){
      $("#step5").click(function(){
		if($.isNumeric(id) == false){
			swal({
				  text: 'Mohon isi Data Utama !!',
				  icon: "warning",
				  button: false,
				  timer: 1500
			  }); 
			 
		}else{
		loadStatus();
        $("#tab1").attr('hidden', true);
        $("#tab2p").attr('hidden', true);
        $("#tab3").attr('hidden', true);
        $("#tab4").attr('hidden', true);
        $("#tab5").attr('hidden', false);
        $("#submitdong").hide();
		}
      })
    }

    

    function step1() {

        $("#btnstep1").click(function () {
			
            if ($('#typeDokumen').val() == 1) {
				
                var tipedoc = $("#tipe_dokumen").val();
                var jenisper = $("#turunanSatu").val();
                var juduldatautama = $("#juduldatautama").val();
                var bhukum = $("#bhukum").val();
                var noper = $("#noper").val();
                var taper = $("#taper").val();
                var sbper = $("#sbper").val();
                var tepen = $("#tepen").val();
                var tapen = $("#tapen").val();
                var bhsper = $("#bhsper").val();
                var sumper = $("#sumper").val();


				$("#step2p").trigger( "click" );
                // } else
                //     alert('Data tidak boleh kosong!')
            } else {
                $("#step2p").trigger( "click" );
				
            }
        });
    }

    function step2() {
	
        $("#btnstep2").click(function () {
			$("#step3").trigger( "click" );
        });
    }

    function step2p() {

        $("#btnstep2p").click(function () {

            $("#step3").trigger( "click" );
		
        });
    }

    function step3() {

        $("#btnstep3").click(function () {

            $("#step4").trigger( "click" );
        });
    }

    function step4() {

        $("#btnstep4").click(function () {
            if($('#typeDokumen').val() == 3 || $('#typeDokumen').val() == 2){
                $("#step5").trigger( "click" );
            }else if($('#typeDokumen').val() == 1){
                $("#step5").trigger( "click" );
            }else{
              
            }
        });
    }

    function step4a() {

        $("#btnstep4a").click(function () {

            $("#step4b").show();
            $("#tab4b").addClass('active');
            $("#tab4a").removeClass('active');
        });
    }

    function step4b() {

        $("#btnstep4b").click(function () {

            $("#step4c").show();
            $("#tab4c").addClass('active');
            $("#tab4b").removeClass('active');
        });
    }

    function step4c() {

        $("#btnstep4c").click(function () {

            $("#step5").show();
            $("#tab5").addClass('active');
            $("#tab4c").removeClass('active');
            $("#submitdong").show();
        });
    }
	
	$('#submit-dokumen').on('click',function(e){
          e.preventDefault();
			if($.isNumeric(id)){
				var path = ServeUrl+"perundangan/api_update";
			}else{
				var path = ServeUrl+"perundangan/api_save";
			}
		
          var form = $('#form-data')[0];
		  var data = new FormData(form);
          $.ajax({
              method: "POST",
              url: path,
              data: data,
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData: false,
			  complete: function(response) {
				if(response.status == 201){
					window.location.href = ServeUrl+'perundangan/edit/'+response.responseJSON.id
					//$(".perundangan_id").attr("value", response.responseJSON.id);
					//$("input[name=perundangan_id]").val(response.responseJSON.id);
					
					swal({
					  title: "Berhasil!",
					  text: "Pola eksemplar berhasil di tambahkan!",
					  icon: "success",
					  button: false,
					  timer: 1500
					});
					//loadData(response.responseJSON.id);
			  }
				  
			  }
          })
          .done(function(response){
			  
             
          });
        });
	
	
	function loadData(id){
		var id = window.location.pathname.split('/').pop();
		
		$.ajax({
					data: {"id": id},
					url: ServeUrl+"perundangan/api_view",
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
							 $("input[name=dokumen_id]").val(response.responseJSON.data.id);
							 $("input[name=perundangan_id]").val(id);
							 $("select[name=type_dokumen]").val(response.responseJSON.data.tipe_dokumen);
							 $('select[name=type_dokumen]').trigger('change'); 
							// $('select[name=type_dokumen]').attr('disabled', true); 
							
							if (response.responseJSON.data.tipe_dokumen == 1) {
							 getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan1', response.responseJSON.data.jenis_peraturan);
							 getListBidangHukum('bidang_hukum1', response.responseJSON.data.bidang_hukum);
							 getListBahasa('bahasa1', response.responseJSON.data.bahasa);
							 
							 //getListTypeDokumenTurunan(response.responseJSON.data.tipe_dokumen, 'jenis_peraturan1');
							 $("select[name=jenis_peraturan1]").val(response.responseJSON.data.jenis_peraturan);
							 $('select[name=jenis_peraturan1]').trigger('change');
							 
							 $("input[name=singkatan_bentuk1]").val(response.responseJSON.data.singkatan_bentuk);
							 $("input[name=judul1]").val(response.responseJSON.data.judul);
							 $("input[name=nomor_peraturan1]").val(response.responseJSON.data.nomor_peraturan);
							 $("input[name=tahun_terbit1]").val(response.responseJSON.data.tahun_terbit);
							 $("input[name=bidang_hukum1]").val(response.responseJSON.data.bidang_hukum);
							 $("input[name=tempat_terbit1]").val(response.responseJSON.data.tempat_terbit);
							 $("input[name=tanggal_penetapan]").val(response.responseJSON.data.tanggal_penetapan);
							 $("input[name=tanggal_pengundangan]").val(response.responseJSON.data.tanggal_pengundangan);
							 $("input[name=sumber1]").val(response.responseJSON.data.sumber);
							 $("input[name=pemrakarsa]").val(response.responseJSON.data.pemrakarsa);
							 $("input[name=penandatanganan]").val(response.responseJSON.data.penandatanganan);
							 $("select[name=bahasa1]").val(response.responseJSON.data.bahasa);
							 
							} else if (response.responseJSON.data.tipe_dokumen == 2) {
							 getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan2', response.responseJSON.data.jenis_peraturan);
							 getListBahasa('bahasa2', response.responseJSON.data.bahasa);
							 getListPenerbit('penerbit', response.responseJSON.data.penerbit);
							 //getListTypeDokumenTurunan(response.responseJSON.data.tipe_dokumen, 'jenis_peraturan1');
							 $("select[name=jenis_peraturan2]").val(response.responseJSON.data.jenis_peraturan);
							 $('select[name=jenis_peraturan2]').trigger('change');
							 
							 $("input[name=judul2]").val(response.responseJSON.data.judul);
							 $("input[name=tahun_terbit2]").val(response.responseJSON.data.tahun_terbit);
							 $("input[name=nomor_panggil]").val(response.responseJSON.data.nomor_panggil);
							 $("input[name=edisi]").val(response.responseJSON.data.edisi);
							 $("input[name=tempat_terbit2]").val(response.responseJSON.data.tempat_terbit);
							 $("select[name=penerbit]").val(response.responseJSON.data.penerbit);
							 
							 $("select[name=bahasa2]").val(response.responseJSON.data.bahasa);
							 $('select[name=bahasa2]').trigger('change');
							 
							 $("input[name=deskripsi_fisik]").val(response.responseJSON.data.deskripsi_fisik);
							 $("input[name=isbn]").val(response.responseJSON.data.isbn);
							 
							} else if (response.responseJSON.data.tipe_dokumen == 3) {
							 getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan3', response.responseJSON.data.jenis_peraturan);
							 getListBidangHukum('bidang_hukum3', response.responseJSON.data.bidang_hukum);
							 getListBahasa('bahasa3', response.responseJSON.data.bahasa);

							 //getListTypeDokumenTurunan(response.responseJSON.data.tipe_dokumen, 'jenis_peraturan1');
							 $("select[name=jenis_peraturan3]").val(response.responseJSON.data.jenis_peraturan);
							 $('select[name=jenis_peraturan3]').trigger('change');
							 
							 $("input[name=judul3]").val(response.responseJSON.data.judul);
							 $("input[name=sumber3]").val(response.responseJSON.data.sumber);
							 $("input[name=tahun_terbit3]").val(response.responseJSON.data.tahun_terbit);
				
							 $("select[name=bahasa3]").val(response.responseJSON.data.bahasa);
							 $('select[name=bahasa3]').trigger('change');
							 
							 $("input[name=judul_seri]").val(response.responseJSON.data.judul_seri);
							 
							} else if (response.responseJSON.data.tipe_dokumen == 4) {
							 getListTypeDokumenTurunan($('#typeDokumen').val(), 'jenis_peraturan4', response.responseJSON.data.jenis_peraturan);
							 getListBahasa('bahasa4', response.responseJSON.data.bahasa);

							 //getListTypeDokumenTurunan(response.responseJSON.data.tipe_dokumen, 'jenis_peraturan1');
							 $("select[name=jenis_peraturan3]").val(response.responseJSON.data.jenis_peraturan);
							 $('select[name=jenis_peraturan3]').trigger('change');
							 
							 $("input[name=judul3]").val(response.responseJSON.data.judul);
							 $("input[name=sumber3]").val(response.responseJSON.data.sumber);
							 $("input[name=tahun_terbit3]").val(response.responseJSON.data.tahun_terbit);
				
							 $("select[name=bahasa3]").val(response.responseJSON.data.bahasa);
							 $('select[name=bahasa3]').trigger('change');
							 
							 $("input[name=judul_seri]").val(response.responseJSON.data.judul_seri);
							 
							}
                        }else{
							 
							 //window.location.replace(ServeUrl);
						}
                    },
					dataType:'json',
					timeout: 3000
                })
		
	}
	
	//TAB TEU
	function loadTeu(){
		var id = window.location.pathname.split('/').pop();
		
		$.ajax({
					data: {"id": id},
					url: ServeUrl+"perundangan/api_list_teu",
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
						var tbody = '';
					
						$.each(response.responseJSON.data, function(x,y){
							
							
							tbody +='<tr role="row" class="">';
							tbody +='<td>'+y.nama_pengarang+'</td>';
							tbody +='<td>'+y.tipe_pengarang+'</td>';
							tbody +='<td>'+y.jenis_pengarang+'</td>';
							tbody +='<td><a class="btn btn-danger btn-xs" onClick="deleteTeu(`'+y.id+'`)" href="javascript:void(0)">Delete</a></td>';
							tbody +='</tr>';

						});
					$('#tablepengarang').html(tbody);
						
						}else{
							 
							 //window.location.replace(ServeUrl);
						}
                    },
					dataType:'json'
                })
		
	}
	
	$("#form-teu").submit(function(event) {
		event.preventDefault();
		$(":submit").prop("disabled", true);
      	var data = $(this).serialize();

		$.ajax({
			data: data,
			url: ServeUrl+"perundangan/api_save_teu",
			method: 'POST',
			complete: function(response){                
			  if(response.status == 201){
				  swal({
						  title: 'Saved!',
						  text: response.responseJSON.message,
						  icon: "success",
						  button: false,
						  timer: 1500
					  }); 
					 $(":submit").prop("disabled", false);
					 $("#modal-addteup").modal("hide");
					 loadTeu();
			  }else{
				  swal({
						  title: 'Aborted!',
						  text: response.responseJSON.message,
						  icon:'warning'
					  });	
					  $(":submit").prop("disabled", false);
					  $("#modal-addteup").modal("hide");
			  }
			},
			dataType:'json'
		});

				
	});
	
	function deleteTeu(id){
		
		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, delete it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
				if(value == "yes"){
				$.ajax({
							data: {"id" : id},
							url: ServeUrl+"perundangan/api_delete_teu",
							method: 'POST',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										button: false,
										timer: 1500
									}); 
									loadTeu()
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										button: false,
										timer: 1500
									}); 
									loadTeu()
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}
	
	//TAB SUBJEK
	
	function loadSubjek(){
		var id = window.location.pathname.split('/').pop();
		
		$.ajax({
					data: {"id": id},
					url: ServeUrl+"perundangan/api_list_subjek",
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
						var tbody = '';
					
						$.each(response.responseJSON.data, function(x,y){
							
							
							tbody +='<tr role="row" class="">';
							tbody +='<td>'+y.subyek+'</td>';
							tbody +='<td>'+y.tipe_subyek+'</td>';
							tbody +='<td>'+y.jenis_subyek+'</td>';
							tbody +='<td><a class="btn btn-danger btn-xs" onClick="deleteSubjek(`'+y.id+'`)" href="javascript:void(0)">Delete</a></td>';
							tbody +='</tr>';

						});
					$('#tablesubyek').html(tbody);
						
						}else{
							 
							 //window.location.replace(ServeUrl);
						}
                    },
					dataType:'json'
                })
		
	}
	
	$("#form-subjek").submit(function(event) {
		event.preventDefault();
		$(":submit").prop("disabled", true);
      	var data = $(this).serialize();

		$.ajax({
			data: data,
			url: ServeUrl+"perundangan/api_save_subjek",
			method: 'POST',
			complete: function(response){                
			  if(response.status == 201){
				  swal({
						  title: 'Saved!',
						  text: response.responseJSON.message,
						  icon: "success",
						  button: false,
						  timer: 1500
					  }); 
					 $(":submit").prop("disabled", false);
					 $("#modal-addsubjek").modal("hide");
					 loadSubjek();
			  }else{
				  swal({
						  title: 'Aborted!',
						  text: response.responseJSON.message,
						  icon:'warning'
					  });	
					  $(":submit").prop("disabled", false);
					  $("#modal-addsubjek").modal("hide");
			  }
			},
			dataType:'json'
		});

				
	});
	
	function deleteSubjek(id){
		
		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, delete it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
				if(value == "yes"){
				$.ajax({
							data: {"id" : id},
							url: ServeUrl+"perundangan/api_delete_subjek",
							method: 'POST',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										button: false,
										timer: 1500
									}); 
									loadSubjek()
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										button: false,
										timer: 1500
									}); 
									loadSubjek()
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}
	
	//TAB LAMPIRAN
	
	function loadLampiran(){
		var id = window.location.pathname.split('/').pop();
		
		$.ajax({
					data: {"id": id},
					url: ServeUrl+"perundangan/api_list_lampiran",
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
						var tbody = '';
					
						$.each(response.responseJSON.data, function(x,y){
							
							
							tbody +='<tr role="row" class="">';
							tbody +='<td>'+y.judul_lampiran+'</td>';
							tbody +='<td>'+y.dokumen_lampiran+'</td>';
							tbody +='<td><a class="btn btn-danger btn-xs" onClick="deleteLampiran(`'+y.id+'`)" href="javascript:void(0)">Delete</a></td>';
							tbody +='</tr>';

						});
					$('#tablelamp').html(tbody);
						
						}else{
							 
							 //window.location.replace(ServeUrl);
						}
                    },
					dataType:'json'
                })
		
	}
	
	$("#form-lampiran").submit(function(event) {
		event.preventDefault();
		$(":submit").prop("disabled", true);
		var form = $(this)[0]; 
		var data = new FormData(form);
      	 

		$.ajax({
			data: data,
			url: ServeUrl+"perundangan/api_save_lampiran",
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			method: 'POST',
			complete: function(response){                
			  if(response.status == 201){
				  swal({
						  title: 'Saved!',
						  text: response.responseJSON.message,
						  icon: "success",
						  button: false,
						  timer: 1500
					  }); 
					 $(":submit").prop("disabled", false);
					 $("#modal-addlampiran").modal("hide");
					 loadLampiran();
			  }else{
				  swal({
						  title: 'Aborted!',
						  text: response.responseJSON.message,
						  icon:'warning'
					  });	
					  $(":submit").prop("disabled", false);
					  $("#modal-addlampiran").modal("hide");
			  }
			},
			dataType:'json'
		});

				
	});
	
	function deleteLampiran(id){
		
		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, delete it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
				if(value == "yes"){
				$.ajax({
							data: {"id" : id},
							url: ServeUrl+"perundangan/api_delete_lampiran",
							method: 'POST',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										button: false,
										timer: 1500
									}); 
									loadLampiran()
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										button: false,
										timer: 1500
									}); 
									loadLampiran()
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}
	
	//TAB LAMPIRAN
	
	function loadStatus(){
		var id = window.location.pathname.split('/').pop();
		
		$.ajax({
					data: {"id": id},
					url: ServeUrl+"perundangan/api_list_status",
                    method: 'GET',
                    complete: function(response){ 		
                        if(response.status == 200){
						var tbody = '';
					
						$.each(response.responseJSON.data, function(x,y){
							
							
							tbody +='<tr role="row" class="">';
							tbody +='<td>'+y.name_status_peraturan+'</td>';
							tbody +='<td>'+y.judul_dokumen+'</td>';
							tbody +='<td>'+y.catatan_status_peraturan+'</td>';
							tbody +='<td><a class="btn btn-danger btn-xs" onClick="deleteStatus(`'+y.id+'`)" href="javascript:void(0)">Delete</a></td>';
							tbody +='</tr>';

						});
					$('#tablestatus').html(tbody);
						
						}else{
							 
							 //window.location.replace(ServeUrl);
						}
                    },
					dataType:'json'
                })
		
	}

	$("#form-status").submit(function(event) {
		event.preventDefault();
		$(":submit").prop("disabled", true);
		var data = $(this).serialize();
      	 

		$.ajax({
			data: data,
			url: ServeUrl+"perundangan/api_save_status",
			method: 'POST',
			complete: function(response){                
			  if(response.status == 201){
				  swal({
						  title: 'Saved!',
						  text: response.responseJSON.message,
						  icon: "success",
						  button: false,
						  timer: 1500
					  }); 
					 $(":submit").prop("disabled", false);
					 $("#modal-addstat").modal("hide");
					 loadStatus();
			  }else{
				  swal({
						  title: 'Aborted!',
						  text: response.responseJSON.message,
						  icon:'warning'
					  });	
					  $(":submit").prop("disabled", false);
					  $("#modal-addstat").modal("hide");
			  }
			},
			dataType:'json'
		});

				
	});
	
	function deleteStatus(id){
		
		swal("Are you sure?", {
                    buttons: {
                        cancel: "No, cancel!!",
                        catch: {
                            text: "Yes, delete it!",
                            value: "yes",
                        },
                        
                    },
                })
                .then((value) => {
				if(value == "yes"){
				$.ajax({
							data: {"id" : id},
							url: ServeUrl+"perundangan/api_delete_status",
							method: 'POST',
							complete: function(response){                
							  if(response.status == 200){ 
								  swal({
										title: response.status+' Removed!',
										text: response.responseJSON.message,
										type:'success',
										button: false,
										timer: 1500
									}); 
									loadStatus()
							  }else{
								    swal({
										title: response.status+' Aborted!',
										text: response.responseJSON.message,
										type:'warning',
										button: false,
										timer: 1500
									}); 
									loadStatus()
									 
							  }
							},
							dataType:'json'
				})
				}
            });
	}

	
	$(document).on('show.bs.modal','#modal-addstat', function () {
		$("input[name=juduldokumen]").val($("#juduldatautama").val());
		  $.ajax({
				data: "",
				url: ServeUrl+"status/api_list_all",
				method: 'POST',
				complete: function(response){                
				  if(response.status == 200){ 
				  var data = response.responseJSON.data
					var html = '';
                    html += '<option selected disabled>Pilih Status Dokumen ...</option>';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="'+data[i].id+'">'+data[i].status+'</option>';
                    }
                    $('#dokumenstatus').html(html);
				  }else{
					location.reload();	
				  }
				},
				dataType:'json'
		})
	})
</script>

