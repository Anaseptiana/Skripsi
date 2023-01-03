 <!-- Footer Starts Here -->


 <div class="sub-footer">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <p>
                     Copyright © <?= date('Y'); ?> <?= $setting['nama_website']; ?>
                 </p>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript -->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Additional Scripts -->
 <script src="<?= base_url('assets/'); ?>js/custom.js"></script>
 <script src="<?= base_url('assets/'); ?>js/owl.js"></script>
 <script src="<?= base_url('assets/'); ?>js/slick.js"></script>
 <script src="<?= base_url('assets/'); ?>js/accordions.js"></script>

 <script language="text/Javascript">
     cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
     function clearField(t) { //declaring the array outside of the
         if (!cleared[t.id]) { // function makes it static and global
             cleared[t.id] = 1; // you could use true and false, but that's more typing
             t.value = ''; // with more chance of typos
             t.style.color = '#fff';
         }
     }
 </script>

 <script>
     $('.product-thumbs-track .pt').on('click', function() {
         $('.product-thumbs-track .pt').removeClass('active');
         $(this).addClass('active');
         var imgurl = $(this).data('imgbigurl');
         var bigImg = $('.product-big-img').attr('src');
         if (imgurl != bigImg) {
             $('.product-big-img').attr({
                 src: imgurl
             });
             $('.zoomImg').attr({
                 src: imgurl
             });
         }
     });
 </script>

 <script>
     $(document).ready(function(){
       $('.input-supir').click(function(){
        $('#harga_mobil').val($(this).data('harga-mobil'))
        $('#harga_sewa_mobil').val($(this).data('text-harga'))

        if($('#check-supir:checked').val()){
            if($('.input-supir:checked').val() == 1){
                $('#harga_supir').val($('#check-supir').data('harga-dalam-kota'))
                $('#lokasiJemput').show()
            }else{
                $('#harga_supir').val($('#check-supir').data('harga-luar-kota'))
                $('#lokasiJemput').hide()
            }

            let tanggal_mulai = $('#tanggal_mulai').val()
                let tanggal_selesai = $('#tanggal_selesai').val()
                if(tanggal_mulai && tanggal_selesai){
                    let from = new Date(tanggal_mulai)
                    let to = new Date(tanggal_selesai)
                    let diff = to.getTime() - from.getTime()
                    let day = diff / (1000 * 3600 * 24);

                    let total_harga_sewa_mobil = parseInt($('#harga_mobil').val() * day)
                    let total_harga_sewa_supir = parseInt($('#harga_supir').val() * day)
                    let total = total_harga_sewa_mobil + total_harga_sewa_supir
                    $('#total_harga_sewa_mobil').val(total_harga_sewa_mobil)
                    $('#total_harga_sewa_supir').val(total_harga_sewa_supir)
                    $('#total').val(total)
                }
        }else{
            $('#lokasiJemput').hide()
            $('#harga_supir').val('')
            let tanggal_mulai = $('#tanggal_mulai').val()
                let tanggal_selesai = $('#tanggal_selesai').val()
                if(tanggal_mulai && tanggal_selesai){
                    let from = new Date(tanggal_mulai)
                    let to = new Date(tanggal_selesai)
                    let diff = to.getTime() - from.getTime()
                    let day = diff / (1000 * 3600 * 24);

                    let total_harga_sewa_mobil = parseInt($('#harga_mobil').val() * day)
                    let total_harga_sewa_supir = parseInt($('#harga_supir').val() * day)
                    let total = total_harga_sewa_mobil + total_harga_sewa_supir
                    $('#total_harga_sewa_mobil').val(total_harga_sewa_mobil)
                    $('#total_harga_sewa_supir').val(total_harga_sewa_supir)
                    $('#total').val(total)
                }
        }
       })
     });
 </script>
 
 <script>
     $(document).ready(function(){
        $('#check-supir').change(function(){
            if($('#check-supir:checked').val()){
                if($('.input-supir:checked').val() == 1){
                    $('#harga_supir').val($('#check-supir').data('harga-dalam-kota'))
                    $('#lokasiJemput').show()
                }else{
                    $('#harga_supir').val($('#check-supir').data('harga-luar-kota'))
                    $('#lokasiJemput').hide()
                }

                let tanggal_mulai = $('#tanggal_mulai').val()
                let tanggal_selesai = $('#tanggal_selesai').val()
                if(tanggal_mulai && tanggal_selesai){
                    let from = new Date(tanggal_mulai)
                    let to = new Date(tanggal_selesai)
                    let diff = to.getTime() - from.getTime()
                    let day = diff / (1000 * 3600 * 24);

                    let total_harga_sewa_mobil = parseInt($('#harga_mobil').val() * day)
                    let total_harga_sewa_supir = parseInt($('#harga_supir').val() * day)
                    let total = total_harga_sewa_mobil + total_harga_sewa_supir
                    $('#total_harga_sewa_mobil').val(total_harga_sewa_mobil)
                    $('#total_harga_sewa_supir').val(total_harga_sewa_supir)
                    $('#total').val(total)
                }
            }else{
                $('#lokasiJemput').hide()
                $('#harga_supir').val('')
                let tanggal_mulai = $('#tanggal_mulai').val()
                let tanggal_selesai = $('#tanggal_selesai').val()
                if(tanggal_mulai && tanggal_selesai){
                    let from = new Date(tanggal_mulai)
                    let to = new Date(tanggal_selesai)
                    let diff = to.getTime() - from.getTime()
                    let day = diff / (1000 * 3600 * 24);

                    let total_harga_sewa_mobil = parseInt($('#harga_mobil').val() * day)
                    let total_harga_sewa_supir = parseInt($('#harga_supir').val() * day)
                    let total = total_harga_sewa_mobil + total_harga_sewa_supir
                    $('#total_harga_sewa_mobil').val(total_harga_sewa_mobil)
                    $('#total_harga_sewa_supir').val(total_harga_sewa_supir)
                    $('#total').val(total)
                }
            }
        })
     })

     $(document).ready(function(){
        $('#tanggal_mulai').change(function(){
            let tanggal_mulai = $(this).val()
            let tanggal_selesai = $('#tanggal_selesai').val()
            if(tanggal_mulai && tanggal_selesai){
                let from = new Date(tanggal_mulai)
                let to = new Date(tanggal_selesai)
                let diff = to.getTime() - from.getTime()
                let day = diff / (1000 * 3600 * 24);
                $('#jumlah_hari').val(day)

                let total_harga_sewa_mobil = parseInt($('#harga_mobil').val() * day)
                let total_harga_sewa_supir = parseInt($('#harga_supir').val() * day)
                let total = total_harga_sewa_mobil + total_harga_sewa_supir
                $('#total_harga_sewa_mobil').val(total_harga_sewa_mobil)
                $('#total_harga_sewa_supir').val(total_harga_sewa_supir)
                $('#total').val(total)
            }
        });

        $('#tanggal_selesai').change(function(){
            let tanggal_selesai = $(this).val()
            let tanggal_mulai = $('#tanggal_mulai').val()
            if(tanggal_mulai && tanggal_selesai){
                let from = new Date(tanggal_mulai)
                let to = new Date(tanggal_selesai)
                let diff = to.getTime() - from.getTime()
                let day = diff / (1000 * 3600 * 24);
                $('#jumlah_hari').val(day)

                let total_harga_sewa_mobil = parseInt($('#harga_mobil').val() * day)
                let total_harga_sewa_supir = parseInt($('#harga_supir').val() * day)
                let total = total_harga_sewa_mobil + total_harga_sewa_supir
                $('#total_harga_sewa_mobil').val(total_harga_sewa_mobil)
                $('#total_harga_sewa_supir').val(total_harga_sewa_supir)
                $('#total').val(total)
            }
        });
     })
 </script>

 <script>
     <?= $this->session->flashdata('pesan-sukses'); ?>
 </script>

 </body>

 </html>