<?php

/*
  Template name: Home
*/

get_header();

?>

<style>
	.league-title {
		padding-bottom: 0.5rem;
		border-bottom: 3px solid #007bff;
		margin-top: 2.5rem;
		margin-bottom: 1rem;
		font-weight: bold;
	}

	.table {
		background-color: #fff;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
	}

	.live-badge {
		font-weight: bold;
		color: #dc3545;
		animation: pulse 1.5s infinite;
	}

	@keyframes pulse {
		0% {
			opacity: 1;
		}

		50% {
			opacity: 0.4;
		}

		100% {
			opacity: 1;
		}
	}
</style>

<section id="" class="d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="text-capitalize text-yellow">Welcome to Innwa Bet</h1>
				<p class="">
					<i class="fas fa-bell mr-1" style="color:#E19517;"></i>
					<span>Play button will only appeared if the football match LIVE streaming is available for watching.</span>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center my-3">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/Innwa-Ads-Banner-1-1170X200.gif' ?>" alt="Innwa-Ads-Banner-1-1170X200" class="img-fluid">
			</div>
			<div class="col-12 text-center my-3">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/Innwa-Ads-Banner-2-1170X200.gif' ?>" alt="Innwa-Ads-Banner-2-1170X200" class="img-fluid">
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<h2 class="head_day" id="head_dayYtd">Yesterday's match between 22:00 to 23:59</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center my-3">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/Innwa-Ads-Banner-3-1170X200.gif' ?>" alt="Innwa-Ads-Banner-3-1170X200" class="img-fluid">
			</div>
			<div class="col-12 text-center my-3">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/Innwa-Ads-Banner-4-1170X200.gif' ?>" alt="Innwa-Ads-Banner-4-1170X200" class="img-fluid">
			</div>
		</div>
	</div>

</section>

<main id="main">

	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
				<div id="player-container"></div>
			</div>
		</div>
	</div>

	<div id="glive-match-container" class="container">
		<h1 class="text-center">Today's Matches</h1>
		<p class="text-center text-muted">Loading...</p>
	</div>

	<template id="match-row-template">
		<tr>
			<td style="width: 15%;" class="font-weight-bold match-time"></td>
			<td style="width: 35%;" class="text-right match-home"></td>
			<td style="width: 10%;" class="text-center text-muted">vs</td>
			<td style="width: 35%;" class="match-away"></td>
			<td style="width: 5%;" class="text-center match-live-status"></td>
		</tr>
	</template>



	<div class="modal fade" id="popupAds" tabindex="-1" role="dialog" aria-labelledby="popupAdsTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<img class="border" src="<?php echo get_template_directory_uri() . '/assets/img/Innwa-Ads-Banner-1-1920x1080F2.gif' ?>"
					alt="Innwa-Ads-Banner">
			</div>
		</div>
	</div>


</main>
<script>

</script>
<?php
get_footer();
