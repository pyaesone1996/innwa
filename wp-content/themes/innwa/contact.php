<?php

/*
  Template name: Contact
*/

get_header();
?>
<style>
	#contact .contact-container {
		margin: 0 auto;
		background: linear-gradient(90deg, #FFFFFF 0%, #5B61E2 100%);
		padding: 40px;
		border-radius: 20px;
		text-align: center;
		color: #fff;
		width: 90%;
		max-width: 700px;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
	}

	#contact h1 {
		font-weight: bold;
		margin: 15px 0px;
	}

	#contact .logo {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-bottom: 30px;
	}

	#contact .logo img {
		height: 40px;
		margin-right: 15px;
	}

	#contact .logo span {
		font-size: 2em;
		font-weight: bold;
	}

	#contact .logo .play-with {
		font-size: 1.2em;
		font-weight: normal;
		margin-left: 10px;
		color: #fff;
	}

	#contact .contact-grid {
		display: grid;
		grid-template-columns: 1fr;
		gap: 30px;
	}

	@media (min-width: 768px) {
		#contact .contact-grid {
			grid-template-columns: 1fr 1fr;
		}
	}

	#contact .contact-card {
		background-color: #111;
		border-radius: 15px;
		overflow: hidden;
		display: flex;
		flex-direction: column;
	}

	#contact .info-box {
		padding: 20px;
	}

	#contact .info-box h2 {
		font-size: 1.2em;
		color: #aaa;
		margin: 0 0 10px;
	}

	#contact .info-box p {
		font-size: 1.5em;
		font-weight: bold;
		margin: 0;
	}

	#contact .contact-button {
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 15px;
		text-decoration: none;
		color: white;
		font-size: 1.2em;
		font-weight: bold;
		border-top: 1px solid #333;
	}

	#contact .contact-button i {
		font-size: 1.5em;
		margin-right: 15px;
	}

	#contact .contact-button.viber {
		background-color: #6c4de5;
	}

	#contact .contact-button.line {
		background-color: #00B900;
	}

	#contact .contact-button.telegram {
		background-color: #2aabee;
	}

	#contact .contact-button:hover {
		opacity: 0.9;
	}
</style>

<section id="contact" class="d-flex align-items-left flex-column ">

	<div class="contact-container my-5">
		<h1>Contact Us</h1>
		<div class="logo">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/image-4.jpg' ?>" alt="InnwaBet Logo">
			<span style="color:#000;">InnwaBet</span>
			<span class="play-with">play with (MMK)</span>
		</div>
		<div class="contact-grid">
			<div class="contact-card">
				<div class="info-box">
					<h2>Viber No.</h2>
					<p>+95-9662-7143-53</p>
				</div>
				<a href="viber://chat?number=%2B959662714353" class="contact-button viber">
					<i class="fab fa-viber"></i>
					<span>Contact On Viber</span>
				</a>
			</div>
			<div class="contact-card">
				<div class="info-box">
					<h2>Telegram No.</h2>
					<p>09897003535</p>
				</div>
				<a href="https://t.me/innwabet" class="contact-button telegram">
					<i class="fab fa-telegram-plane"></i>
					<span>Contact On Telegram</span>
				</a>
			</div>
		</div>
	</div>

	<div class="contact-container my-5">
		<h1>Contact Us</h1>
		<div class="logo">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/image-6.jpg' ?>" alt="InnwaBet Logo">
			<span style="color:#000;">InnwaBet</span>
			<span class="play-with">play with (THB)</span>
		</div>
		<div class="contact-grid">
			<div class="contact-card">
				<div class="info-box">
					<h2>Line ID</h2>
					<p>@innwa</p>
				</div>
				<a href="https://line.me/R/ti/p/@912edlgi?from=page&searchId=912edlgi" class="contact-button line">
					<i class="fab fa-line"></i>
					<span>Contact On Line</span>
				</a>
			</div>
			<div class="contact-card">
				<div class="info-box">
					<h2>Telegram No.</h2>
					<p>09777559181</p>
				</div>
				<a href="https://t.me/innwabet" class="contact-button telegram">
					<i class="fab fa-telegram-plane"></i>
					<span>Contact On Telegram</span>
				</a>
			</div>
		</div>
	</div>

	<div class="contact-container my-5">
		<h1>Contact Us</h1>
		<div class="logo">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/image-4.jpg' ?>" alt="InnwaBet Logo">
			<span style="color:#000;">Innwa iBet 789</span>

		</div>
		<div class="contact-grid">
			<div class="contact-card">
				<div class="info-box">
					<h2>Viber No.</h2>
					<p>09443330070</p>
				</div>
				<a href="https://msng.link/o?959443330070=vi" class="contact-button viber">
					<i class="fab fa-viber"></i>
					<span>Contact On Viber</span>
				</a>
			</div>
			<div class="contact-card">
				<div class="info-box">
					<h2>Telegram No.</h2>
					<p>09783386699</p>
				</div>
				<a href="https://t.me/innwanibet789" class="contact-button telegram">
					<i class="fab fa-telegram-plane"></i>
					<span>Contact On Telegram</span>
				</a>
			</div>
		</div>
	</div>

	<div class="social-container my-5">
		<p class="subtitle">Like & Follow</p>
		<h1 class="title">OFFICIAL ACCOUNTS</h1>

		<!-- The social media links -->
		<div class="social-links my-5">
			<!-- Facebook -->
			<a href="https://www.facebook.com/innwaapp" target="_blank" class="social-link facebook" aria-label="Facebook">
				<i class="fab fa-facebook-f"></i>
			</a>

			<!-- YouTube -->
			<a href="https://www.youtube.com/@InnwaFootBallNews" target="_blank" class="social-link youtube" aria-label="YouTube">
				<i class="fab fa-youtube"></i>
			</a>

			<!-- Telegram -->
			<a href="https://t.me/+4dcJYWAI1zI1Yzg1" target="_blank" class="social-link telegram" aria-label="Telegram">
				<i class="fab fa-telegram"></i>
			</a>
		</div>
	</div>

</section>

<?php
get_footer();
