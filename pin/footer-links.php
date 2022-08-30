   <!-- error toast -->
   <div class="position-fixed toast hide alert alert-dismissible fade show mb-3 wow fadeInDown rounded-3" role="alert" id="liveToastError" style="top: 14%; right: 20px; color: #842029; background-color: #f8d7da; border-color:#f5c2c7; z-index:99; display:none;">
       <span id="errorMsg">Some Error Equired.</span>
       <button type="button" class="btn-close" onclick="closeToast('liveToastError');"></button>
   </div>
   <!-- success toast -->
   <div class="position-fixed toast hide alert alert-dismissible fade show mb-3 wow fadeInDown rounded-3" role="alert" id="liveToastSuccess" style="top: 14%; right: 20px; color: #0f5132; background-color: #d1e7dd; border-color:#badbcc; z-index:99; display:none;">
       <span id="successMsg">Successfull.</span>
       <button type="button" class="btn-close" onclick="closeToast('liveToastSuccess');"></button>
   </div>


   <!-- JavaScript Libraries -->
   <!-- jquery cdn -->
   <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
   <!-- bootstrap cdn -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

   <script src="<?php echo ($page == 'template') ? '../' : ''; ?>lib/wow/wow.min.js"></script>
   <script src="<?php echo ($page == 'template') ? '../' : ''; ?>lib/easing/easing.min.js"></script>
   <script src="<?php echo ($page == 'template') ? '../' : ''; ?>lib/waypoints/waypoints.min.js"></script>
   <script src="<?php echo ($page == 'template') ? '../' : ''; ?>lib/owlcarousel/owl.carousel.min.js"></script>

   <!-- Template Javascript -->
   <script src="<?php echo ($page == 'template') ? '../' : ''; ?>js/main.js"></script>

   <!-- cropper js -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



   <!-- for toast alerts -->
   <script>
       // for close toast
       function closeToast(id) {
           $("#"+id).fadeOut();
       }
       // for show error msg
       function errorMsg(text) {
           $('#errorMsg').html(text);
           $('#liveToastError').show();
           setTimeout(() => {
               $('#liveToastError').fadeOut();
           }, 2000);
       }
       // for show success msg
       function successMsg(text) {
           $('#successMsg').html(text);
           $('#liveToastSuccess').show();
           setTimeout(() => {
               $('#liveToastSuccess').fadeOut();
           }, 2000);
       }
   </script>

   <!-- for tooltip bootstrap script -->
   <script>
       var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
       var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
           return new bootstrap.Tooltip(tooltipTriggerEl)
       })
   </script>



   </body>

   </html>