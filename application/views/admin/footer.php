 <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php 
            $lien="<a href='https://www.vitafoam.mg/'>vitafoam.mg</a>";
            ?>
            <footer class="footer"> © Copyright <?php echo $lien; ?>  <?php echo date("Y"); ?></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
     <?php 
        $base_url_js = base_url("assets/js/page/");
        $base_url_js_datatable = base_url("assets/js/page/datatable/");
        $base_url_myjs = base_url("assets/js/my_js/");
     ?>


    <!-- End Wrapper -->
     <script src="<?php echo $base_url_js; ?>lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo $base_url_js; ?>lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo $base_url_js; ?>lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo $base_url_js; ?>jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo $base_url_js; ?>sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo $base_url_js; ?>lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo $base_url_js; ?>custom.min.js"></script>

     <script src="<?php echo $base_url_js_datatable; ?>jquery-3.3.1.js"></script>
     <script src="<?php echo $base_url_js_datatable; ?>jquery.dataTables.min.js"></script>
     <script src="<?php echo $base_url_js_datatable; ?>dataTables.bootstrap4.min.js"></script>
     <script src="<?php echo $base_url_myjs; ?>monjs.js"></script>

     <script type="text/javascript">
         $(document).ready(function() {
    $('#tablesorte').DataTable({
      language: {

            url: "<?php echo base_url("assets/js/my_js/French.json") ?>"

        }
    });
} );



     </script>

</body>

</html>