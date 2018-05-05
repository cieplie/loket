<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?=base_url('twitter/reset_session'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    
    <script src="<?= base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('asset/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?= base_url('asset/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('asset/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('asset/js/sb-admin.min.js'); ?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?= base_url('asset/js/sb-admin-datatables.min.js'); ?>"></script>
    <script src="<?= base_url('asset/js/sb-admin-charts.min.js'); ?>"></script>
	<script src="<?= base_url('asset/dist/js/jquery.validate.js?version=1')?>"></script>
	<script src="<?= base_url('asset/js/bootstrap-datetimepicker.js')?>"></script>
  </div>
</body>
	<script>
		$(document).ready(function () {
		
			$('form').validate();
			
			$('.validate_mandatory').each(function () {
				$(this).rules('add', {
					required: true,
					messages: {
						required: $(this).attr('name').replace("_", " ")+" is required"
					}
				});
			});
			
			$('.validate_number').each(function () {
				$(this).val($(this).val().replace(/,/g, ""));
				$(this).rules('add', {
					number: true,
					messages: {
						number: $(this).attr('name').replace("_", " ")+" is must be filled by number",
					}
					
				});
			});
			
			$('.validate_int').each(function () {
                $(this).rules('add', {
					digits: true,
					messages: {
						digits: $(this).attr('name').replace("_", " ")+" is must be filled by digit",
					}
				});
			});
			
			$('.validate_email').each(function () {
				$(this).rules('add', {
					email: true,
					messages: {
						email: $(this).attr('name').replace("_", " ")+" is must be filled by valid email",
					}
				});
			});
			
			$('.retype_password').each(function () {
				$(this).rules('add', {
					required: true,
					equalTo: ".password",
					messages: {
						equalTo: $(this).attr('name').replace("_", " ")+" is must be filled equal to "+$('.password').attr('name').replace("_", " "),
					}
				});
			});
			
			$('.validate_radio').each(function () {
				$(this).rules('add', {
					required: true,
					messages: {
						required: $(this).attr('name').replace("_", " ")+" is required",
					}
				});
			});
			
			$('.notbigger').each(function () {
				$(this).rules('add', {
					notBiggerThan: ".minimal",
					messages: {
						notBiggerThan:$(this).attr('name').replace("_", " ")+" is must be filled not bigger than "+$('.minimal').val(),
					}
				});
			});

		});

	</script>
	
	<script>
		$(document).ready( function() {
			$(document).on('change', '.btn-file :file', function() {
			var input = $(this),
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [label]);
			});

			$('.btn-file :file').on('fileselect', function(event, label) {
				
				var input = $(this).parents('.input-group').find(':text'),
					log = label;
				
				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}
			
			});
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					
					reader.onload = function (e) {
						$('#img-upload').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				$('#img_lama').css("display", "none");
				readURL(this);
			}); 	
		});
	</script>

</html>