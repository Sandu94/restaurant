<?php

$informations = mysqli_query($con, "SELECT * FROM informations WHERE contact_id='1'") or trigger_error("Query Failed: " . mysqli_error($con));
$information = mysqli_fetch_array($informations);


//Contact Open Hours
$contact_monday_hours = $information['contact_monday_hours'];
$contact_tuesday_hours = $information['contact_tuesday_hours'];
$contact_wednesday_hours = $information['contact_wednesday_hours'];
$contact_thursday_hours = $information['contact_thursday_hours'];
$contact_friday_hours = $information['contact_friday_hours'];
$contact_saturday_hours = $information['contact_saturday_hours'];
$contact_sunday_hours = $information['contact_sunday_hours'];
$wysiwyg_contact = $information['wysiwyg_contact'];
?>


<!-- IMPORT GOOGLE MAPS JS -->
<div class="row contact_infos high-padding">
	<div class="container">
		<h1 class="page-title text-center"><?php echo $lang['Contact_us_title']; ?></h1>
        <?php echo htmlspecialchars_decode( $information['wysiwyg_contact'] ); ?>
		<div class="col-md-6">
			<div class="row">
			<h3><strong class=""><?php echo $lang['OpenBetween']; ?></strong></h3>
                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Monday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_monday_hours; ?></label>
                </div>

                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Tuesday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_tuesday_hours; ?></label>
                </div>

                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Wednesday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_wednesday_hours; ?></label>
                </div>

                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Thursday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_thursday_hours; ?></label>
                </div>

                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Friday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_friday_hours; ?></label>
                </div>

                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Saturday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_saturday_hours; ?></label>
                </div>

                <div class="row">
                    <label class="col-md-4"><?php echo $lang['Sunday']; ?></label>
                    <label class="col-md-6"><?php echo $contact_sunday_hours; ?></label>
                </div>
			</div>


			<div class="clearfix"></div>
			<div class="contact_left_top right pull-left row">
				<h3><strong class=""><?php echo $lang['Contact_us_form']; ?></strong></h3>
				<form method="POST" class="contact_us_now row">
					<div class="group col-md-10">
						<input required class="form-control" type="text" name="contact_name" placeholder="<?php echo $lang['Name_and_surname']; ?>" />
					</div>

					<div class="group col-md-10">
						<input required class="form-control" type="text" name="contact_email" placeholder="<?php echo $lang['Email']; ?>" />
					</div>

					<div class="group col-md-10">
						<input required class="form-control" type="text" name="contact_subject" placeholder="<?php echo $lang['Subject']; ?>" />
					</div>

                    <div class="group col-md-10">
                        <textarea rows="4" class="form-control" name="contact_message" placeholder="<?php echo $lang['Message']; ?>"></textarea>
                    </div>

					<div class="group col-md-10">
						<input class="col-md-10 btn btn-success" type="submit" name="contact_us" value="<?php echo $lang['Send_message']; ?>" />
					</div>
				</form>
				<span class="hidden-contact-message"><?php echo $lang['Message_was_send']; ?></span>

                <?php include('../../system/functions_mail.php'); ?>
                
			</div>
		</div>
		<div id="googleMap" class="col-md-6"></div>
	</div>
</div>


<script type="text/javascript">
	function initialize() {
		var myLatLng = new google.maps.LatLng(<?php echo $information['contact_latitude']; ?>,<?php echo $information['contact_longitude']; ?> )
		var mapProp = {
		center:myLatLng,
		zoom:15,
		zoomControl: false,
		scaleControl: false,
		scrollwheel: false,
		navigationControl: false,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>	
