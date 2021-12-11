<?php 
if(empty(check_covid_screening())){?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
		
    });
</script>
<?php } ?>
<?php if($this->session->flashdata('success_covid') == "success"){ ?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModalSuccess').modal('show');
		
    });
</script>
<?php } ?>
<?php if(empty(get_monthly_info($_SESSION['student']['student_id']))){?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModalmonthly').modal('show');
		
    });
</script>
<?php } ?>
<?php if(fees_arrear($_SESSION['student']['student_id'])){ ?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModalArrear').modal('show');
		$('#myModalArrear').modal({backdrop: 'static', keyboard: false})  
    });
</script>
<?php } ?>
<style>
img.image_width {
	width: 34% !important;
    padding: 22px;
}
.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px; /* Adjusts for spacing */
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
</style>

	<!-- Modal -->
  <div class="modal fade" id="myModalArrear" data-backdrop="static" data-keyboard="false"  role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="form-top">
        <div class="text-center covid_header">
			<img class="image_width" src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo();?>" />
		</div>
		</div>
        <div class="modal-body p-3 mb-2 text-center success" style="background:#438044">
          <p style="color:#ffff">Your account is in arrear.</p>
          <p style="color:#ffff">Please contact the finnace department at 015 491 1226</p>
          <p style="color:#ffff">or whatsapp at 066 008 6821</p>
          <p style="color:#ffff"><?php $data = fees_arrear($_SESSION['student']['student_id']);
				echo "R ".$data['amount'];
			?></p>
		   <a href="mailto:" class="btn btn-primary" style="background:white;color:#438044">Send Mail</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModalmonthly" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="form-top">
        <div class="text-center covid_header">
			<img class="image_width" src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo();?>" />
		</div>
		</div>
        <div class="modal-body p-3 mb-2 text-center success" style="background:#438044">
          <p style="color:#ffff">Is your information up to date?</p>
		   
			  <a href="<?= base_url();?>/user/user/updateMonthlyinfo" class="btn btn-default" >Yes</a>
			  <a href="mailto:<?= $sch_setting->email; ?>" class="btn btn-default" >No</a>
			
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"  data-backdrop="static" data-keyboard="false" data-toggle="modal" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="form-top">
        <div class="text-center covid_header">
			<img class="image_width" src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo();?>" />
		</div>
		</div>
	  <form action="<?= base_url('user/user/add_covid_screening');?>" method="POST">
      <div class="modal-body covid">
	  <div class="row">
	  <div id="hero_intro">
		<div class="quote">COVID-19 Daily Screening Form</div>
		</div>
		
	  <?php $question =array(
				"Do you have a fever today?",
				"Do you have a cough today?",
				"Do you have a sore throat today?",
				"Do you have muscle or body aches today?",
				"Experiencing shortness of breath?",
				"Experience any loss of taste and smell?",
				"Are you experiencing any of the following symptoms : Vomiting, diarrhea, nausea, Fatigue, Weakness and Tiredness?",
				"Have you been in contact with someone that shows COVID-19 Symptoms?",
				"Were you in contact with someone that has COVID-19?",				
				);
			foreach($question as $key=>$row){ ?>
		
			<div class="form-group row">
				 <label class="col-sm-9"><?= $row;?></label>
				 <div class="col-sm-3">
					<label class="radio-inline custom-control-label red">
					<input type="radio" name="covid[question<?= $key;?>]" class="custom-control-input" value="Yes" >Yes</label>
					<label class="radio-inline custom-control-label green">
					<input type="radio" name="covid[question<?= $key;?>]" class="custom-control-input" value="No" required>No</label>
				 </div>
			 </div>
			 <?php } ?>
			
		</div>
 <div class="text-right">
        <input type="submit" value="Submit" name="covid_screening" class="btn btn-success" >
      </div>		
      </div>
      
	  </form>
    </div>

  </div>
</div>

<div id="myModalSuccess" class="modal fade" role="dialog"  data-backdrop="static" data-keyboard="false" data-toggle="modal" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <div class="text-center covid_header">
			<h4>HOW TO UNDERSTAND YOUR RESULTS</h4>
		</div>
      <div class="modal-body covid">
	  <div class="row">
	 

<p>If you answered NO to all questions then you may attend classes at 
your respective campus today.</p>


<p>If you answered YES to 2 or more of these questions, please report
to your lecturer for further instructions.</p>


<p>Thank you for your co-operation in this regard.</p>
		</div>
 <div class="text-center">
       <a href="#" data-dismiss="modal" class="btn btn-primary">FINISH</a>
      </div>		
      </div>
      
	  </form>
    </div>

  </div>
</div>

<footer class="main-footer">
    &copy;  <?php echo date('Y'); ?> 
    <?php echo $this->customlib->getAppName(); ?> <?php echo $this->customlib->getAppVersion(); ?>
</footer>
<div class="control-sidebar-bg"></div>
</div>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<link href="<?php echo base_url(); ?>backend/toast-alert/toastr.css" rel="stylesheet"/>
<script src="<?php echo base_url(); ?>backend/toast-alert/toastr.js"></script>

<script src="<?php echo base_url(); ?>backend/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>backend/dist/js/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/fastclick/fastclick.min.js"></script>

<!--language js-->
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/bootstrap-select.min.js"></script>

 <script type="text/javascript">
    $(function(){
      $('.languageselectpicker').selectpicker();
   });
</script>

<script src="<?php echo base_url(); ?>backend/dist/js/app.min.js"></script>
<!--nprogress-->
<script src="<?php echo base_url(); ?>backend/dist/js/nprogress.js"></script>
<!--file dropify-->
<script src="<?php echo base_url(); ?>backend/dist/js/dropify.min.js"></script>
<script src="<?php echo base_url(); ?>backend/dist/js/demo.js"></script>

<!--print table-->
<!--print table-->
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.print.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/buttons.colVis.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/dataTables.responsive.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/datatables/js/ss.custom.js" ></script>
</body>
</html>


<!-- Modal -->
<div id="classSwitchModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <form action="<?php echo site_url('common/getStudentClass') ?>" method="POST" id="frmclschg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo $this->lang->line('switch')." ".$this->lang->line('class');?></h4>
                </div>
                <div class="modal-body classSwitchbody">

                </div>
                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait"><?php echo $this->lang->line('update');?></button>
                </div>
            </div>

        </form>
    </div>
</div>
<script type="text/javascript">
     var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy','M' => 'M']) ?>';

    $(document).ready(function () {      
        $('body').on('focus',".date", function(){
            $(this).datepicker({
                todayHighlight: false,
                format: date_format,
                autoclose: true,
                weekStart : start_week
            });
        });
        });
</script>

<script type="text/javascript">

    $("#frmclschg").on('submit', (function (e) {
        e.preventDefault();

         var form = $(this);
        var $this = $(this).find("button[type=submit]:focus");
        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: form.serialize(), // serializes the form's elements.
            dataType: 'json',
          
            beforeSend: function () {
                $this.button('loading');

            },
            success: function (res)
            {
                    if (res.status) {

                     
                        successMsg(res.message);

                           window.location.href = baseurl + "user/user/dashboard";

                    } else {

                        errorMsg(res.message);

                    }
            },
            error: function (xhr) { // if error occured
                alert("Error occured.please try again");
                $this.button('reset');
            },
            complete: function () {
                $this.button('reset');
            }

        });
    }));



    $(document).on('change', '.clschg', function () {
        if ($(this).is(":checked")) {

            $('input.clschg').not(this).prop('checked', false);
        } else {
            $(this).prop("checked", true);
        }

    });

    $('#classSwitchModal').on('show.bs.modal', function (event) {
        var $modalDiv = $(event.delegateTarget);
        $('.classSwitchbody').html("");
        $.ajax({
            type: "POST",
            url: baseurl + "common/getStudentSessionClasses",
            dataType: 'JSON',
            data: {},
            beforeSend: function () {
                $modalDiv.addClass('modal_loading');
            },
            success: function (data) {
                $('.classSwitchbody').html(data.page);
            },
            error: function (xhr) { // if error occured
                $modalDiv.removeClass('modal_loading');
            },
            complete: function () {
                $modalDiv.removeClass('modal_loading');
            },
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
<?php
if ($this->session->flashdata('success_msg')) {
    ?>
            successMsg("<?php echo $this->session->flashdata('success_msg'); ?>");
    <?php
} else if ($this->session->flashdata('error_msg')) {
    ?>
            errorMsg("<?php echo $this->session->flashdata('error_msg'); ?>");
    <?php
} else if ($this->session->flashdata('warning_msg')) {
    ?>
            infoMsg("<?php echo $this->session->flashdata('warning_msg'); ?>");
    <?php
} else if ($this->session->flashdata('info_msg')) {
    ?>
            warningMsg("<?php echo $this->session->flashdata('info_msg'); ?>");
    <?php
}
?>
    });
</script>



<script type="text/javascript">


    function complete_event(id, status) {

        $.ajax({
            url: "<?php echo site_url("user/calendar/markcomplete/") ?>" + id,
            type: "POST",
            data: {id: id, active: status},
            dataType: 'json',

            success: function (res)
            {

                if (res.status == "fail") {

                    var message = "";
                    $.each(res.error, function (index, value) {

                        message += value;
                    });
                    errorMsg(message);

                } else {

                    successMsg(res.message);

                    window.location.reload(true);
                }

            }

        });
    }

    function markc(id) {

        $('#newcheck' + id).change(function () {

            if (this.checked) {

                complete_event(id, 'yes');
            } else {

                complete_event(id, 'no');
            }

        });
    }

</script>


<!-- Button trigger modal -->
<!-- Modal -->

<div class="modal fade" id="user_sessionModal" tabindex="-1" role="dialog" aria-labelledby="sessionModalLabel">
    <form action="#" id="form_modal_usersession" class="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="sessionModalLabel"><?php echo $this->lang->line('session'); ?></h4>
                </div>
                <div class="modal-body user_sessionmodal_body pb0">

                </div>
                <div class="modal-footer">
                   <div class="col-md-12">  
                    <button type="button" class="btn btn-primary submit_usersession" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait.."><?php echo $this->lang->line('save'); ?></button>
                  </div>  
                </div>
            </div>
        </div>
    </form>
</div>

