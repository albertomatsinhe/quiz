	<!-- core:js -->
	<script src="{{ asset('public/template/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
	<!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ asset('public/template/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/js/template.js')}}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
  <!-- end custom js for this page -->

  <!-- plugin js for this page -->
  <script src="{{ asset('public/template/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('public/template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

    <script src="{{ asset('public/template/assets/vendors/select2/select2.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/vendors/dropzone/dropzone.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/vendors/dropify/dist/dropify.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{ asset('public/template/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

  <!-- end plugin js for this page -->
  <script src="{{ asset('public/template/assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>	
  <script src="{{ asset('public/template/assets/js/data-table.js')}}"></script>
  <script src="{{ asset('public/template/assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
  <script src="{{ asset('public/template/assets/vendors/promise-polyfill/polyfill.min.js')}}"></script> <!-- Optional:  polyfill for ES6 Promises for IE11 and Android browser -->
  <script src="{{ asset('public/template/assets/js/sweet-alert.js')}}"></script>
  
  <script src="{{ asset('public/template/assets/js/select2.js')}}"></script>
  

  <script type="text/javascript">
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });
</script>
  