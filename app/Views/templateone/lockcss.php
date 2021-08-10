<style>
	/******************************************************************
  Theme Name: Locksmith
  Description: Locksmith - Template
  Author: Colorib
  Author URI: https://www.colorib.com/
  Version: 1.0
  Created: Colorib 
******************************************************************/

	/*------------------------------------------------------------------
[Table of contents]

1.  Template default CSS
	1.1	Variables
	1.2	Mixins
	1.3	Flexbox
	1.4	Reset
2.  Helper Css
3.  header_lock Section
4.  Hero Section
5.  Banner Section
6.  Product Section
7.  Intagram Section
8.  Latest Section
9.  Contact
10.  Footer Style
-------------------------------------------------------------------*/

	/*----------------------------------------*/

	/* Template default CSS
/*----------------------------------------*/


	/*---------------------
  Helper CSS
-----------------------*/
	:root {
		--themecolor: <?= $color ?>;
		--secondary-color: <?= $color_2 ?>;
	}

	.section-title {
		margin-bottom: 65px;
	}

	.section-title.center-title h2:after {
		right: 0;
		margin: 0 auto;
	}

	.section-title span {
		font-size: 15px;
		display: block;
		font-weight: 700;
		letter-spacing: 4px;
		color: var(--themecolor);
		text-transform: uppercase;
		margin-bottom: 18px;
	}

	.section-title h2 {
		font-size: 40px;
		font-weight: 600;
		color: #0e1f24;
		text-transform: uppercase;
		position: relative;
	}

	.section-title h2:after {
		position: absolute;
		left: 0;
		bottom: -18px;
		height: 2px;
		width: 70px;
		background: #e1e1e1;
		content: "";
	}

	.set-bg {
		background-repeat: no-repeat;
		background-size: cover;
		background-position: top center;
	}

	.spad {
		padding-top: 100px;
		padding-bottom: 100px;
	}

	.text-white h1,
	.text-white h2,
	.text-white h3,
	.text-white h4,
	.text-white h5,
	.text-white h6,
	.text-white p,
	.text-white span,
	.text-white li,
	.text-white a {
		color: #fff;
	}

	/* buttons */

	.primary-btn {
		display: inline-block;
		font-size: 16px;
		color: #ffffff;
		font-weight: 600;

		font-family: "Rajdhani", sans-serif;
		letter-spacing: 2px;
		text-transform: uppercase;
		background: var(--themecolor);
		padding: 12px 30px 10px;
	}

	.primary-btn.border_btn {
		background: transparent;
		border: 2px solid var(--themecolor);
		color: #11123a;
	}

	.site-btn {
		font-size: 15px;
		color: #ffffff;
		border-radius: 10px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		letter-spacing: 2px;
		text-transform: uppercase;
		border: none;
		background: var(--secondary_color);
		padding: 0.5rem 3rem;
	}

	.site-btn:hover {
		background-color: var(--themecolor);
	}

	/* Preloder */

	#preloder {
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		z-index: 999999;
		background: #000;
	}

	.loader {
		width: 40px;
		height: 40px;
		position: absolute;
		top: 50%;
		left: 50%;
		margin-top: -13px;
		margin-left: -13px;
		border-radius: 60px;
		animation: loader 0.8s linear infinite;
		-webkit-animation: loader 0.8s linear infinite;
	}

	@keyframes loader {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
			border: 4px solid #f44336;
			border-left-color: transparent;
		}

		50% {
			-webkit-transform: rotate(180deg);
			transform: rotate(180deg);
			border: 4px solid #673ab7;
			border-left-color: transparent;
		}

		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
			border: 4px solid #f44336;
			border-left-color: transparent;
		}
	}

	@-webkit-keyframes loader {
		0% {
			-webkit-transform: rotate(0deg);
			border: 4px solid #f44336;
			border-left-color: transparent;
		}

		50% {
			-webkit-transform: rotate(180deg);
			border: 4px solid #673ab7;
			border-left-color: transparent;
		}

		100% {
			-webkit-transform: rotate(360deg);
			border: 4px solid #f44336;
			border-left-color: transparent;
		}
	}

	/*---------------------
  header_lock
-----------------------*/

	.offcanvas-menu-wrapper {
		display: none;
	}

	.canvas__open {
		display: none;
	}

	/*---------------------
  Hero
-----------------------*/

	.hero {
		overflow: hidden;
	}

	.hero .container {
		position: relative;
		z-index: 5;
	}

	.hero__items {
		padding-top: 160px;
		padding-bottom: 222px;
	}

	.hero__text {
		background: rgba(17, 17, 17, 0.4);
		text-align: center;
		padding: 50px 90px;
		overflow: hidden;
	}

	.hero__text span {
		color: var(--themecolor);
		font-size: 15px;
		font-weight: 700;
		display: block;
		letter-spacing: 4px;
		text-transform: uppercase;
		margin-bottom: 20px;
		position: relative;
		top: 100px;
		opacity: 0;
		-webkit-transition: all, 0.3s;
		-o-transition: all, 0.3s;
		transition: all, 0.3s;
	}

	.hero__text h2 {
		color: #ffffff;
		font-size: 50px;
		font-weight: 600;
		line-height: 55px;
		margin-bottom: 30px;
		position: relative;
		top: 100px;
		opacity: 0;
		-webkit-transition: all, 0.6s;
		-o-transition: all, 0.6s;
		transition: all, 0.6s;
	}

	.hero__text .primary-btn {
		position: relative;
		top: 100px;
		opacity: 0;
		-webkit-transition: all, 0.9s;
		-o-transition: all, 0.9s;
		transition: all, 0.9s;
	}

	.hero__slider.owl-carousel .owl-item.active .hero__text span {
		top: 0;
		opacity: 1;
	}

	.hero__slider.owl-carousel .owl-item.active .hero__text h2 {
		top: 0;
		opacity: 1;
	}

	.hero__slider.owl-carousel .owl-item.active .hero__text .primary-btn {
		top: 0;
		opacity: 1;
	}

	.hero__slider.owl-carousel .owl-nav button {
		font-size: 36px;
		color: #ffffff;
		height: 100px;
		width: 100px;
		background: rgba(5, 35, 54, 0.5);
		border-radius: 50%;
		line-height: 100px;
		position: absolute;
		left: -50px;
		top: 50%;
		margin-top: -50px;
	}

	.hero__slider.owl-carousel .owl-nav button.owl-next {
		left: auto;
		right: -50px;
	}

	.hero__slider.owl-carousel .owl-nav button.owl-next i {
		left: -18px;
	}

	.hero__slider.owl-carousel .owl-nav button i {
		position: relative;
		left: 18px;
		top: 0;
	}

	/*---------------------
  Filter
-----------------------*/

	.filter__form {
		background: #ffffff;
		-webkit-box-shadow: 0px 0px 30px rgba(45, 67, 100, 0.15);
		box-shadow: 0px 0px 30px rgba(45, 67, 100, 0.15);
		padding: 40px 50px 30px;
		margin-top: -60px;
		position: relative;
		z-index: 1;
	}

	.filter__form h2 {
		font-size: 40px;
		color: #1b2839;
		font-weight: 600;
		text-transform: uppercase;
	}

	.filter__form form {
		margin-right: -20px;
	}

	.filter__form form .input__item {
		width: calc(27% - 20px);
		float: left;
		margin-right: 20px;
	}

	.filter__form form .input__item input {
		height: 45px;
		width: 100%;
		border: none;
		font-size: 14px;
		color: #888888;
		background: #f2f2f2;
		padding-left: 20px;
	}

	.filter__form form .input__item input::-webkit-input-placeholder {
		color: #888888;
	}

	.filter__form form .input__item input::-moz-placeholder {
		color: #888888;
	}

	.filter__form form .input__item input:-ms-input-placeholder {
		color: #888888;
	}

	.filter__form form .input__item input::-ms-input-placeholder {
		color: #888888;
	}

	.filter__form form .input__item input::placeholder {
		color: #888888;
	}

	.filter__form form .input__item .nice-select {
		height: 45px;
		line-height: 45px;
		float: none;
		border: none;
		border-radius: 0;
		background: #f2f2f2;
		padding-left: 20px;
	}

	.filter__form form .input__item .nice-select:after {
		border-bottom: 1.5px solid #888888;
		border-right: 1.5px solid #888888;
		height: 7px;
		right: 20px;
		width: 7px;
	}

	.filter__form form .input__item .nice-select .list {
		width: 100%;
		margin-top: 0;
		border-radius: 0;
	}

	.filter__form form .input__item .nice-select span {
		font-size: 14px;
		color: #888888;
	}

	.filter__form form .form__btn {
		width: calc(19% - 20px);
		float: left;
	}

	.filter__form form .form__btn button {
		font-size: 14px;
		color: #ffffff;
		font-weight: 600;
		letter-spacing: 2px;
		text-transform: uppercase;
		height: 45px;
		width: 100%;
		border: none;
		background: #1b2839;
	}

	/*---------------------
  Services
-----------------------*/

	.services {
		padding-bottom: 50px;
	}

	.services__item {
		margin-bottom: 45px;
	}

	.services__item:hover .services__item__icon {
		background: var(--themecolor);
	}

	.services__item:hover .services__item__icon i {
		color: #ffffff;
	}

	.services__item__icon {
		height: 85px;
		width: 85px;
		border: 1px solid var(--themecolor);
		line-height: 85px;
		text-align: center;
		border-radius: 10px;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
		float: left;
		margin-right: 42px;
		margin-top: 15px;
		margin-left: 13px;
		-webkit-transition: all, 0.3s;
		-o-transition: all, 0.3s;
		transition: all, 0.3s;
	}

	.services__item__icon i {
		color: var(--themecolor);
		display: inline-block;
		-webkit-transform: rotate(-45deg);
		-ms-transform: rotate(-45deg);
		transform: rotate(-45deg);
		position: relative;
		top: 10px;
		left: 0px;
		-webkit-transition: all, 0.3s;
		-o-transition: all, 0.3s;
		transition: all, 0.3s;
	}

	.services__item__text {
		overflow: hidden;
	}

	.services__item__text h4 {
		color: #0e1f24;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 10px;
	}

	.services__item__text p {
		font-weight: 300;
		margin-bottom: 0;
		line-height: 27px;
	}

	/*---------------------
  Chooseus
-----------------------*/

	.chooseus {
		background: #f6f6f9;
		margin-bottom: -290px;
		padding-bottom: 0;
	}

	.chooseus.about-chooseus {
		background: transparent;
		padding: 0;
	}

	.chooseus__content {
		background: #ffffff;
		padding: 20px 70px 0 35px;
		position: relative;
		z-index: 1;
	}

	.chooseus__pic__item {
		height: 270px;
		margin-right: 20px;
		margin-bottom: 20px;
	}

	.chooseus__pic__item.large__item {
		height: 560px;
	}

	.chooseus__text {
		padding-left: 30px;
		padding-top: 60px;
		padding-bottom: 77px;
	}

	.chooseus__text .section-title {
		margin-bottom: 50px;
	}

	.chooseus__text p {
		font-weight: 300;
	}

	.chooseus__text ul {
		margin-bottom: 30px;
	}

	.chooseus__text ul li {
		list-style: none;
		font-size: 15px;
		font-weight: 300;
		color: #444444;
		line-height: 32px;
	}

	.chooseus__text ul li i {
		color: var(--themecolor);
		margin-right: 10px;
	}

	.chooseus__text .primary-btn {
		background: #1b2839;
	}

	/*---------------------
  Counter
-----------------------*/

	.counter {
		background: #1b2839;
		padding-top: 390px;
		padding-bottom: 60px;
	}

	.counter__item {
		width: 20%;
		float: left;
		text-align: center;
		margin-bottom: 30px;
	}

	.counter__item p {
		color: #888888;
		margin-bottom: 0;
	}

	.counter__item__num {
		margin-bottom: 5px;
		margin-top: 16px;
	}

	.counter__item__num h2 {
		font-size: 50px;
		color: #ffffff;
		font-weight: 600;
		display: inline-block;
	}

	.counter__item__num span {
		font-size: 50px;
		color: #ffffff;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		display: inline-block;
	}

	/*---------------------
  Testimonial
-----------------------*/

	.testimonial__left {
		height: 456px;
	}

	.testimonial__left .testimonial__left__text {
		padding: 136px 15px 140px 90px;
		max-width: 550px;
	}

	.testimonial__left .testimonial__left__text h2 {
		color: #ffffff;
		font-size: 40px;
		line-height: 55px;
		margin-bottom: 25px;
	}

	.testimonial__left .testimonial__left__text .phone__number {
		font-size: 60px;
		color: var(--themecolor);
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		line-height: 45px;
	}

	.testimonial__content {
		background: #1b2839;
		height: 456px;
		padding: 84px 160px 80px 90px;
	}

	.testimonial__content h4 {
		color: #ffffff;
		font-weight: 500;
		margin-bottom: 34px;
	}

	.testimonial__content h4 i {
		font-size: 30px;
		color: var(--themecolor);
		margin-right: 5px;
	}

	.testimonial__item p {
		font-size: 40px;
		color: #ffffff;
		font-family: "Rajdhani", sans-serif;
		line-height: 55px;
		margin-bottom: 32px;
	}

	.testimonial__item h5 {
		color: #888888;
		font-family: "Open Sans", sans-serif;
		font-weight: 600;
		text-transform: uppercase;
	}

	.testimonial__item h5 span {
		font-size: 13px;
		font-weight: 400;
		margin-left: 15px;
	}

	.testimonial__slider.owl-carousel .owl-dots {
		position: absolute;
		right: -125px;
		top: 30%;
		-webkit-transform: rotate(90deg);
		-ms-transform: rotate(90deg);
		transform: rotate(90deg);
	}

	.testimonial__slider.owl-carousel .owl-dots button {
		height: 3px;
		width: 20px;
		background: rgba(255, 255, 255, 0.4);
		margin-right: 15px;
	}

	.testimonial__slider.owl-carousel .owl-dots button.active {
		background: #ffffff;
		width: 30px;
	}

	.testimonial__slider.owl-carousel .owl-dots button:last-child {
		margin-right: 0;
	}

	/*---------------------
  Latest
-----------------------*/

	.latest {
		padding-bottom: 70px;
	}

	/*---------------------
  Call To Action
-----------------------*/

	.callto {
		background: #e7ebf0;
		height: 540px;
		position: relative;
		z-index: 1;
		padding: 88px 0;
	}

	.callto .callto__pic {
		position: absolute;
		right: 0;
		top: 0;
		height: 540px;
		width: 50%;
		z-index: -1;
	}

	.callto__text {
		background: #ffffff;
		padding: 90px;
	}

	.callto__text h2 {
		color: #11123a;
		font-size: 50px;
		font-weight: 600;
		line-height: 55px;
		margin-bottom: 26px;
	}

	/*---------------------
  Footer
-----------------------*/

	.footer {
		background: #1b2839;
		padding-top: 60px;
	}

	.footer__about {
		margin-bottom: 35px;
	}

	.footer__about .footer__logo {
		margin-bottom: 34px;
	}

	.footer__about .footer__logo a {
		display: inline-block;
	}

	.footer__about ul li {
		list-style: none;
		font-size: 14px;
		color: #ffffff;
		line-height: 26px;
		margin-bottom: 10px;
	}

	.footer__about ul li i {
		color: var(--themecolor);
		margin-right: 5px;
	}

	.footer__about ul li:last-child {
		margin-bottom: 0;
	}

	.footer__widget {
		margin-bottom: 35px;
	}

	.footer__widget h5 {
		color: var(--themecolor);
		font-size: 20px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 24px;
	}

	.footer__widget ul li {
		list-style: none;
	}

	.footer__widget ul li a {
		font-size: 14px;
		color: #ffffff;
		line-height: 32px;
		opacity: 0.7;
	}

	.footer__widget p {
		font-size: 14px;
		color: #ffffff;
		line-height: 29px;
		margin-bottom: 10px;
		opacity: 0.7;
	}

	.footer__widget form {
		position: relative;
	}

	.footer__widget form input {
		width: 100%;
		height: 46px;
		color: #ffffff;
		font-size: 14px;
		background: transparent;
		border: none;
		border-bottom: 2px solid rgba(255, 255, 255, 0.3);
	}

	.footer__widget form input::-webkit-input-placeholder {
		color: #ffffff;
		opacity: 0.3;
	}

	.footer__widget form input::-moz-placeholder {
		color: #ffffff;
		opacity: 0.3;
	}

	.footer__widget form input:-ms-input-placeholder {
		color: #ffffff;
		opacity: 0.3;
	}

	.footer__widget form input::-ms-input-placeholder {
		color: #ffffff;
		opacity: 0.3;
	}

	.footer__widget form input::placeholder {
		color: #ffffff;
		opacity: 0.3;
	}

	.footer__widget form button {
		border: none;
		background: transparent;
		color: var(--themecolor);
		font-size: 16px;
		font-weight: 600;
		font-family: "Rajdhani", sans-serif;
		text-transform: uppercase;
		position: absolute;
		right: 0;
		top: 0;
		height: 100%;
	}

	.footer__copyright {
		margin-top: 35px;
		border-top: 1px solid rgba(255, 255, 255, 0.2);
		padding: 25px 0;
	}

	.footer__copyright .footer__copyright__text {
		margin-bottom: 0;
		color: #ffffff;
		font-size: 14px;
		opacity: 0.7;
	}

	.footer__copyright .footer__copyright__text i {
		color: var(--themecolor);
	}

	.footer__copyright .footer__copyright__text a {
		color: var(--themecolor);
	}

	.footer__copyright .footer__copyright__links {
		text-align: right;
	}

	.footer__copyright .footer__copyright__links a {
		color: #ffffff;
		font-size: 20px;
		display: inline-block;
		margin-right: 26px;
	}

	.footer__copyright .footer__copyright__links a:last-child {
		margin-right: 0;
	}

	/*---------------------
  About
-----------------------*/

	.about {
		padding-bottom: 40px;
	}

	.about__text {
		margin-bottom: 40px;
		padding-top: 20px;
	}

	.about__text .label {
		font-size: 15px;
		color: var(--themecolor);
		font-weight: 700;
		letter-spacing: 4px;
		text-transform: uppercase;
		margin-bottom: 20px;
	}

	.about__text h2 {
		font-size: 40px;
		color: #444444;
		font-weight: 500;
		text-transform: uppercase;
		margin-bottom: 20px;
	}

	.about__text h2 span {
		font-weight: 600;
		color: #170e02;
	}

	.about__text p {
		color: #424242;
		font-size: 17px;
		line-height: 30px;
		margin-bottom: 30px;
	}

	.about__text .primary-btn {
		background: #292621;
	}

	.about__video {
		height: 440px;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		margin-bottom: 100px;
		margin-bottom: 40px;
	}

	.about__video .play-btn {
		display: inline-block;
		font-size: 30px;
		color: var(--themecolor);
		height: 70px;
		width: 70px;
		background: #ffffff;
		line-height: 70px;
		text-align: center;
		border-radius: 50%;
	}

	/*---------------------
  Team
-----------------------*/

	.team {
		padding-bottom: 65px;
	}

	.team__item {
		margin-bottom: 35px;
	}

	.team__item__pic img {
		min-width: 100%;
	}

	.team__item__text {
		text-align: center;
		background: #ffffff;
		margin: 0 40px;
		padding: 20px 25px 0;
		margin-top: -20px !important;
		position: relative;
		z-index: 1;
	}

	.team__item__text .team__item__social {
		margin-bottom: 14px;
	}

	.team__item__text .team__item__social a {
		display: inline-block;
		font-size: 16px;
		color: #888888;
		margin-right: 7px;
	}

	.team__item__text .team__item__social a:last-child {
		margin-bottom: 0;
	}

	.team__item__text h4 {
		color: #292621;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 5px;
	}

	.team__item__text span {
		color: var(--themecolor);
		display: block;
		font-size: 14px;
	}

	/*---------------------
  Breadcrumb
-----------------------*/

	.breadcrumb-option {
		padding: 45px 0;
	}

	.breadcrumb__text h2 {
		font-size: 40px;
		color: #ffffff;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 6px;
	}

	.breadcrumb__links a {
		font-size: 16px;
		color: #ffffff;
		display: inline-block;
		margin-right: 26px;
		position: relative;
		text-transform: uppercase;
	}

	.breadcrumb__links a:after {
		position: absolute;
		right: -20px;
		top: -1px;
		content: "|";
		color: #ffffff;
	}

	.breadcrumb__links span {
		font-size: 16px;
		color: #ffffff;
		display: inline-block;
		text-transform: uppercase;
	}

	/*---------------------
  Product
-----------------------*/

	.product {
		padding-bottom: 50px;
	}

	.product-page {
		padding-bottom: 80px;
	}

	.product__item {
		display: block;
		margin-bottom: 45px;
	}

	.border__btn {
		text-align: right;
		margin-bottom: 50px;
	}

	.dc-flex {
		max-width: 20%;
		width: 100%;
		float: left;
		padding-left: 15px;
		padding-right: 15px;
	}

	.product__item__pic img {
		min-width: 100%;
		border: 1px solid #f2f2f2;
	}

	.product__item__text {
		padding-top: 22px;
		position: relative;
	}

	.product__item__text h5 {
		color: #0e1f24;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 10px;
	}

	.product__item__text h6 {
		color: #888888;
		font-size: 15px;
		font-family: "Open Sans", sans-serif;
	}

	.product__item__text .rating {
		position: absolute;
		right: 5px;
		top: 15px;
	}

	.product__item__text .rating i {
		color: #e5b84d;
		font-size: 12px;
		margin-right: -5px;
	}

	.product__pag {
		margin-bottom: 20px;
	}

	.product__pag button {
		display: inline-block;
		color: #1b2839;
		border-radius: 20px;
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		height: 45px;
		width: 45px;
		border: 1px solid #e1e1e1;
		line-height: 45px;
		text-align: center;
		-webkit-transition: all, 0.3s;
		-o-transition: all, 0.3s;
		transition: all, 0.3s;
		margin-right: 10px;
		cursor: pointer;
	}

	.product__pag button:last-child {
		margin-right: 0;
	}

	.product__pag button:hover {
		background: #1b2839;
		border-color: #1b2839;
		color: #ffffff;
	}


	.product__pag {
		margin-bottom: 20px;
	}

	.product__pag a {
		border-radius: 20px;
		display: inline-block;
		color: #1b2839;
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		height: 45px;
		width: 45px;
		border: 1px solid #e1e1e1;
		line-height: 45px;
		text-align: center;
		-webkit-transition: all, 0.3s;
		-o-transition: all, 0.3s;
		transition: all, 0.3s;
		margin-right: 10px;
		cursor: pointer;
	}

	.product__pag a:last-child {
		margin-right: 0;
	}

	.product__pag a:hover {
		background: #1b2839;
		border-color: #1b2839;
		color: #ffffff;
	}

	.product__show {
		text-align: right;
		margin-bottom: 20px;
	}

	.product__show p {
		color: #1b2839;
		margin-bottom: 0;
	}

	.product__sidebar__search {
		margin-bottom: 55px;
	}

	.product__sidebar__search form {
		position: relative;
	}

	.product__sidebar__search form input {
		height: 50px;
		width: 100%;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		font-weight: 300;
		padding-left: 20px;
	}

	.product__sidebar__search form input::-webkit-input-placeholder {
		color: #888888;
		font-weight: 300;
	}

	.product__sidebar__search form input::-moz-placeholder {
		color: #888888;
		font-weight: 300;
	}

	.product__sidebar__search form input:-ms-input-placeholder {
		color: #888888;
		font-weight: 300;
	}

	.product__sidebar__search form input::-ms-input-placeholder {
		color: #888888;
		font-weight: 300;
	}

	.product__sidebar__search form input::placeholder {
		color: #888888;
		font-weight: 300;
	}

	.product__sidebar__search form button {
		border: none;
		background: transparent;
		font-size: 22px;
		color: #1b2839;
		position: absolute;
		right: 0;
		top: 0;
		height: 100%;
		padding: 0 15px;
	}

	.product__sidebar__categories {
		margin-bottom: 45px;
	}

	.product__sidebar__categories h4 {
		color: #1b2839;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 12px;
	}

	.product__sidebar__categories ul li {
		list-style: none;
	}

	.product__sidebar__categories ul li a {
		font-size: 15px;
		color: #888888;
		line-height: 34px;
	}

	.product__sidebar__price__filter h4 {
		color: #1b2839;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 12px;
	}

	.product__sidebar__price__filter .input__filter {
		position: relative;
	}

	.product__sidebar__price__filter .input__filter:after {
		position: absolute;
		left: 75px;
		bottom: 10px;
		content: ":";
		font-size: 22px;
		color: #1b2839;
		font-weight: 600;
	}

	.product__sidebar__price__filter .input__filter input {
		color: var(--themecolor);
		font-size: 22px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		border: none;
		border-bottom: 2px solid #e1e1e1;
		height: 44px;
		width: 55px;
		text-align: center;
		margin-right: 45px;
	}

	.product__sidebar__price__filter .input__filter input:last-child {
		margin-right: 0;
	}

	.product__sidebar__price__filter .input__filter input::-webkit-input-placeholder {
		color: var(--themecolor);
	}

	.product__sidebar__price__filter .input__filter input::-moz-placeholder {
		color: var(--themecolor);
	}

	.product__sidebar__price__filter .input__filter input:-ms-input-placeholder {
		color: var(--themecolor);
	}

	.product__sidebar__price__filter .input__filter input::-ms-input-placeholder {
		color: var(--themecolor);
	}

	.product__sidebar__price__filter .input__filter input::placeholder {
		color: var(--themecolor);
	}

	/*---------------------
  Product Details
-----------------------*/

	.product-details {
		padding-bottom: 55px;
	}

	.product__details__pic {
		margin-right: -20px;
		overflow: hidden;
		margin-bottom: 50px;
	}

	.product__details__pic__item {
		float: left;
		width: calc(79.4% - 20px);
		border: 1px solid #e1e1e1;
		margin-right: 20px;
		height: 536px;
	}

	.product__details__pic__item img {
		min-width: 100%;
		height: 100%;
	}

	.product__details__thumb {
		float: left;
		width: calc(20.6% - 30px);
	}

	.pt__item {
		border: 1px solid #e1e1e1;
		margin-bottom: 28px;
		cursor: pointer;
	}

	.pt__item.active {
		border-color: var(--themecolor);
	}

	.pt__item:last-child {
		margin-bottom: 0;
	}

	.pt__item img {
		min-width: 100%;
	}

	.product__details__text {
		margin-bottom: 50px;
	}

	.product__details__text__title {
		position: relative;
		border-bottom: 1px solid #e1e1e1;
		padding-bottom: 30px;
	}

	.product__details__text__title .label {
		font-size: 14px;
		font-weight: 700;
		color: var(--themecolor);
		letter-spacing: 2px;
		text-transform: uppercase;
		margin-bottom: 10px;
	}

	.product__details__text__title h3 {
		color: #1b2839;
		line-height: 35px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 5px;
	}

	.product__details__text__title .price {
		font-size: 30px;
		color: var(--themecolor);
		font-weight: 600;
		font-family: "Rajdhani", sans-serif;
	}

	.product__details__widget {
		overflow: hidden;
		padding-top: 50px;
		margin-bottom: 35px;
	}

	.product__details__widget .quantity {
		overflow: hidden;
		float: left;
		margin-right: 20px;
	}

	.product__details__widget .quantity .pro-qty {
		width: 140px;
		height: 50px;
		border: 1px solid #e1e1e1;
		padding: 0 13px;
	}

	.product__details__widget .quantity .pro-qty .qtybtn {
		font-size: 16px;
		color: #ffffff;
		width: 25px;
		float: left;
		text-align: center;
		height: 100%;
		line-height: 46px;
		cursor: pointer;
	}

	.product__details__widget .quantity .pro-qty input {
		font-size: 22px;
		color: #111111;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		width: 61px;
		float: left;
		background: transparent;
		border: none;
		height: 100%;
		text-align: center;
	}

	.product__details__widget .primary-btn {
		background: #111111;
		float: left;
		margin-right: 20px;
		height: 50px;
		padding: 14px 30px 10px;
	}

	.product__details__widget .heart__btn {
		width: 50px;
		height: 50px;
		border: 1px solid #e1e1e1;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
	}

	.product__details__widget .heart__btn i {
		font-size: 25px;
		color: #111111;
	}

	.product__details__info p {
		line-height: 28px;
	}

	.product__details__info ul li {
		list-style: none;
		font-size: 15px;
		color: #888888;
		line-height: 32px;
	}

	.product__details__info ul li span {
		color: #1b2839;
		font-weight: 500;
		text-transform: uppercase;
	}

	.product__details__desc__tab {
		padding-top: 30px;
	}

	.product__details__desc__tab .nav {
		border: none;
		margin-bottom: 40px;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		border-bottom: 1px solid #e1e1e1;
		padding-bottom: 12px;
	}

	.product__details__desc__tab .nav-item {
		margin-right: 55px;
		position: relative;
	}

	.product__details__desc__tab .nav-item:after {
		position: absolute;
		right: -32px;
		top: 0;
		content: "|";
		color: #ababab;
		font-size: 18px;
	}

	.product__details__desc__tab .nav-item:last-child {
		margin-right: 0;
	}

	.product__details__desc__tab .nav-item:last-child:after {
		display: none;
	}

	.product__details__desc__tab .nav-link {
		font-size: 22px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		color: #1b2839;
		padding: 0;
		border: none;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
		position: relative;
	}

	.product__details__desc__tab .nav-link:after {
		position: absolute;
		left: 0;
		bottom: -12px;
		height: 2px;
		width: 100%;
		background: var(--themecolor);
		content: "";
		opacity: 0;
	}

	.product__details__desc__tab .nav-link.active {
		color: var(--themecolor);
		background-color: transparent;
		border-color: transparent;
	}

	.product__details__desc__tab .nav-link.active:after {
		opacity: 1;
	}

	.product__details__desc__tab .tab-content {
		text-align: center;
	}

	.product__details__desc__tab .tab-content p {
		line-height: 30px;
		margin-bottom: 0;
	}

	/*---------------------
  Related Products
-----------------------*/

	.related__products {
		padding-top: 75px;
	}

	/*---------------------
  Services
-----------------------*/

	.services__page__widget {
		margin-top: 45px;
	}

	.services__page__widget__form {
		padding: 50px 130px 50px 50px;
	}

	.services__page__widget__form form input {
		height: 45px;
		width: 100%;
		border: 1px solid #f2f2f2;
		font-size: 14px;
		color: #ffffff;
		background: transparent;
		padding-left: 20px;
		margin-bottom: 15px;
	}

	.services__page__widget__form form input::-webkit-input-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form form input::-moz-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form form input:-ms-input-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form form input::-ms-input-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form form input::placeholder {
		color: #ffffff;
	}

	.services__page__widget__form form .nice-select {
		height: 45px;
		line-height: 45px;
		float: none;
		border: 1px solid #f2f2f2;
		border-radius: 0;
		background: transparent;
		padding-left: 20px;
		margin-bottom: 15px;
	}

	.services__page__widget__form form .nice-select:after {
		border-bottom: 1.5px solid #888888;
		border-right: 1.5px solid #888888;
		height: 7px;
		right: 20px;
		width: 7px;
	}

	.services__page__widget__form form .nice-select .list {
		width: 100%;
		margin-top: 0;
		border-radius: 0;
	}

	.services__page__widget__form form .nice-select span {
		font-size: 14px;
		color: #ffffff;
	}

	.services__page__widget__form textarea {
		height: 100px;
		width: 100%;
		border: 1px solid #f2f2f2;
		font-size: 14px;
		color: #ffffff;
		background: transparent;
		padding-left: 20px;
		margin-bottom: 9px;
		padding-top: 12px;
		resize: none;
	}

	.services__page__widget__form textarea::-webkit-input-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form textarea::-moz-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form textarea:-ms-input-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form textarea::-ms-input-placeholder {
		color: #ffffff;
	}

	.services__page__widget__form textarea::placeholder {
		color: #ffffff;
	}

	.services__page__widget__text {
		background: #f6f6f9;
		padding: 115px 120px;
		margin-left: -120px;
		margin-top: 50px;
	}

	.services__page__widget__text p {
		color: #424242;
		font-size: 45px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		line-height: 50px;
		margin-bottom: 0;
	}

	.services__page__widget__text p span {
		color: var(--themecolor);
	}

	/*---------------------
  Cart
-----------------------*/

	.cart__table table {
		width: 100%;
	}

	.cart__table thead {
		border-bottom: 1px solid #f2f2f2;
	}

	.items-img {
		border-radius: 10px;
	}

	.radio {
		padding: 0.5rem 1rem;
		border-radius: 10px;
		margin: 1rem 0;
		cursor: pointer;
		box-shadow: 0px 10px 15px 0px rgb(13 12 13 / 20%);
		-webkit-box-shadow: 0px 10px 15px 0px rgb(13 12 13 / 20%);
		-moz-box-shadow: 0px 10px 15px 0px rgb(13 12 13 / 20%);
	}

	.payment_label {
		cursor: pointer;
		margin-bottom: 0;
		width: 100%;
	}
	.btn-payment{
		background: var(--secondary-color);
	}

	.payment_label .c-single {
		display: none;
		margin-left: 0;
	}

	.cart__table thead tr th {
		font-family: "Jost", sans-serif;
		color: #1b2839;
		text-transform: uppercase;
		padding-bottom: 25px;
	}

	.cart__table tbody tr {
		border-bottom: 1px solid #f2f2f2;
	}

	.cart__table tbody tr td {
		padding-top: 30px;
		padding-bottom: 30px;
	}

	.cart__table tbody tr td.cart__item {
		width: 485px;
	}

	.cart__table tbody tr td.cart__item .cart__item__pic {
		float: left;
		margin-right: 20px;
	}

	.cart__table tbody tr td.cart__item .cart__item__pic img {
		border: 1px solid #e8eff4;
	}

	.cart__table tbody tr td.cart__item .cart__item__text {
		overflow: hidden;
		padding-top: 20px;
		color: black;

	}

	.cart__table tbody tr td.cart__item .cart__item__text h6 {
		font-size: 15px;
		font-weight: bold;
		color: black;
		font-family: "Open Sans", sans-serif;
		margin-bottom: 6px;
	}

	.cart__table tbody tr td.cart__item .cart__item__text span {
		color: #111111;
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		display: block;
	}

	.cart__quantity {
		width: 220px;
	}

	.cart__quantity .quantity .pro-qty {
		width: 90px;
		height: 46px;
	}

	.cart__quantity .quantity .pro-qty input {
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		color: #111111;
		float: left;
		text-align: center;
		border: none;
		background: transparent;
		width: 56px;
		height: 48px;
	}

	.cart__quantity .quantity .pro-qty .qtybtn {
		font-size: 16px;
		color: #888888;
		float: left;
		height: 100%;
		line-height: 46px;
		cursor: pointer;
	}

	.cart__price {
		color: #111111;
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		width: 220px;
	}

	.cart__close {
		text-align: right;
	}

	.cart__close span {
		font-size: 18px;
		color: #111111;
		cursor: pointer;
		text-align: center;
		height: 40px;
		width: 40px;
		line-height: 40px;
		background: #f2f2f2;
		display: inline-block;
		border-radius: 50%;
	}

	.cart__btn {
		padding-top: 30px;
	}

	.cart__btn__continue .primary-btn {
		color: #111111;
		border: 1px solid var(--themecolor);
		background: transparent;
	}

	.cart__btn__right {
		text-align: right;
	}

	.cart__btn__right .primary-btn {
		color: #111111;
		font-weight: 600;
		border: 1px solid var(--themecolor);
		background: transparent;

	}

	.cart__right {
		padding-left: 40px;
	}

	.cart__coupon {
		margin-bottom: 60px;
	}

	.cart__coupon h4 {
		color: #1b2839;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 35px;
	}

	.cart__coupon form {
		position: relative;
	}

	.cart__coupon form input {
		height: 50px;
		width: 100%;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		padding-left: 20px;
		background: transparent;
		border-top-right-radius: 25px;
		border-bottom-right-radius: 25px;
	}

	.cart__coupon form input::-webkit-input-placeholder {
		color: #888888;
	}

	.cart__coupon form input::-moz-placeholder {
		color: #888888;
	}

	.cart__coupon form input:-ms-input-placeholder {
		color: #888888;
	}

	.cart__coupon form input::-ms-input-placeholder {
		color: #888888;
	}

	.cart__coupon form input::placeholder {
		color: #888888;
	}

	.cart__coupon form button {
		color: #ffffff;
		font-size: 16px;
		font-weight: 600;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-family: "Rajdhani", sans-serif;
		background: #111111;
		border: none;
		position: absolute;
		right: 0;
		top: 0;
		height: 100%;
		padding: 0 30px;
	}

	.primary-btn {
		border-radius: 25px;

		cursor: pointer;
	}

	.cart__coupon form a {
		color: #ffffff;
		font-size: 16px;
		border-top-right-radius: 25px;
		border-bottom-right-radius: 25px;
		font-weight: 600;
		letter-spacing: 2px;
		text-transform: uppercase;
		font-family: "Rajdhani", sans-serif;
		background: var(--secondary-color);
		border: none;
		position: absolute;
		padding-top: 12px;
		cursor: pointer;
		right: 0;
		top: 0;
		height: 100%;
		padding: 0 30px;
	}

	.cart__coupon form a:hover {
		background-color: var(--themecolor);
	}

	.cart__total {
		background: #f6f6f9;
		padding: 35px 40px 40px;
	}

	.cart__total h4 {
		color: #1b2839;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 14px;
	}

	.cart__total ul {
		margin-bottom: 30px;
	}

	.cart__total ul li {
		list-style: none;
		font-size: 15px;
		color: #292621;
		line-height: 36px;
		overflow: hidden;
	}

	.cart__total ul li span {
		float: right;
	}

	.cart__total a {
		color: #ffffff;
		display: block;
		background: #292621;
		font-size: 16px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		letter-spacing: 2px;
		padding: 14px 20px 12px;
		text-align: center;
	}

	.billing_details input {
		border-radius: 4.25rem !important;
	}

	.cart__total button {
		border: 0;
		color: #ffffff;
		display: block;
		border-radius: 25px;
		background: var(--secondary-color);
		font-size: 16px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		letter-spacing: 2px;
		padding: 14px 20px 12px;
		text-align: center;
	}

	.cart__total button:hover {
		background-color: var(--themecolor);
	}

	/*---------------------
  Checkout
-----------------------*/

	.checkout__form__top {
		padding-bottom: 25px;
	}

	.checkout__form__top h4 {
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		color: #111111;
	}

	.checkout__form__top h6 {
		font-size: 15px;
		font-family: "Open Sans", sans-serif;
		color: #111111;
		text-align: right;
	}

	.checkout__form__top h6 a {
		color: var(--themecolor);
	}

	.checkout__form form .input__top {
		margin-bottom: 45px;
	}

	.checkout__form form .input__top input {
		height: 46px;
		width: 100%;
		padding-left: 20px;
		font-size: 14px;
		color: #888888;
		border: 1px solid #e1e1e1;
		margin-bottom: 15px;
	}

	.checkout__form form .input__top input::-webkit-input-placeholder {
		color: #888888;
	}

	.checkout__form form .input__top input::-moz-placeholder {
		color: #888888;
	}

	.checkout__form form .input__top input:-ms-input-placeholder {
		color: #888888;
	}

	.checkout__form form .input__top input::-ms-input-placeholder {
		color: #888888;
	}

	.checkout__form form .input__top input::placeholder {
		color: #888888;
	}

	.checkout__form form label {
		position: relative;
		font-size: 15px;
		color: #000000;
		cursor: pointer;
		padding-left: 30px;
		margin-bottom: 0;
	}

	.checkout__form form label input {
		position: absolute;
		visibility: hidden;
	}

	.checkout__form form label input:checked~.checkmark {
		background: var(--themecolor);
		border-color: var(--themecolor);
	}

	.checkout__form form label input:checked~.checkmark:after {
		opacity: 1;
	}

	.checkout__form form label .checkmark {
		position: absolute;
		left: 0;
		top: 5px;
		height: 12px;
		width: 12px;
		border: 1px solid #000000;
		border-radius: 2px;
		content: "";
	}

	.checkout__form form label .checkmark:after {
		position: absolute;
		left: 0px;
		top: -1px;
		width: 13px;
		height: 7px;
		border: solid #ffffff;
		border-width: 2px 2px 0px 0px;
		-webkit-transform: rotate(127deg);
		-ms-transform: rotate(127deg);
		transform: rotate(127deg);
		content: "";
		opacity: 0;
	}

	.checkout__form .site-btn {
		width: 100%;
	}

	.checkout__address h4 {
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		color: #111111;
		margin-bottom: 28px;
	}

	.checkout__address .input__item {
		margin-bottom: 32px;
	}

	.checkout__address .input__item.double__input input {
		margin-bottom: 15px;
	}

	.checkout__address .input__item.double__input input:last-child {
		margin-bottom: 0;
	}

	.checkout__address .input__item p {
		margin-bottom: 10px;
	}

	.checkout__address .input__item input {
		height: 46px;
		width: 100%;
		padding-left: 20px;
		font-size: 15px;
		color: #888888;
		border: 1px solid #dddddd;
	}

	.checkout__address .input__item input::-webkit-input-placeholder {
		color: #888888;
	}

	.checkout__address .input__item input::-moz-placeholder {
		color: #888888;
	}

	.checkout__address .input__item input:-ms-input-placeholder {
		color: #888888;
	}

	.checkout__address .input__item input::-ms-input-placeholder {
		color: #888888;
	}

	.checkout__address .input__item input::placeholder {
		color: #888888;
	}

	.checkout__proceed {
		background: #f0f2f5;
		padding: 35px 40px 40px;
		margin-left: 40px;
	}

	.checkout__proceed .checkout__proceed__title h4 {
		color: #292621;
		font-size: 22px;
		font-weight: 600;
		text-transform: uppercase;
		padding-bottom: 35px;
		border-bottom: 1px solid #e1e1e1;
	}

	.checkout__proceed .proceed__btn {
		font-size: 16px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		color: #ffffff;
		background: #292621;
		padding: 12px 20px 10px;
		letter-spacing: 2px;
		border: none;
		width: 100%;
		text-transform: uppercase;
	}

	.checkout__proceed__product {
		border-bottom: 1px solid #e1e1e1;
		padding-top: 28px;
		padding-bottom: 25px;
	}

	.checkout__proceed__product ul li {
		list-style: none;
		font-size: 14px;
		font-weight: 500;
		color: #292621;
		overflow: hidden;
		line-height: 36px;
	}

	.checkout__proceed__product ul li span {
		float: right;
		font-weight: 700;
	}

	.checkout__proceed__coupon {
		border-bottom: 1px solid #e1e1e1;
		padding: 35px 0 40px;
	}

	.checkout__proceed__coupon p {
		color: #292621;
		font-size: 14px;
		line-height: 24px;
		font-weight: 500;
	}

	.checkout__proceed__coupon .coupon__input {
		position: relative;
	}

	.checkout__proceed__coupon .coupon__input input {
		height: 46px;
		width: 100%;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		padding-left: 20px;
		background: #ffffff;
	}

	.checkout__proceed__coupon .coupon__input input::-webkit-input-placeholder {
		color: #888888;
	}

	.checkout__proceed__coupon .coupon__input input::-moz-placeholder {
		color: #888888;
	}

	.checkout__proceed__coupon .coupon__input input:-ms-input-placeholder {
		color: #888888;
	}

	.checkout__proceed__coupon .coupon__input input::-ms-input-placeholder {
		color: #888888;
	}

	.checkout__proceed__coupon .coupon__input input::placeholder {
		color: #888888;
	}

	.checkout__proceed__coupon .coupon__input button {
		color: #ffffff;
		font-size: 16px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		letter-spacing: 2px;
		text-transform: uppercase;
		background: #292621;
		border: none;
		position: absolute;
		right: 0;
		top: 0;
		height: 100%;
		padding: 0 25px;
	}

	.checkout__proceed__subtotal {
		border-bottom: 1px solid #e1e1e1;
		padding: 36px 0 35px;
	}

	.checkout__proceed__subtotal li {
		list-style: none;
		font-size: 14px;
		color: #111111;
		overflow: hidden;
		font-weight: 500;
		margin-bottom: 14px;
	}

	.checkout__proceed__subtotal li span {
		font-size: 15px;
		font-weight: 700;
		float: right;
	}

	.checkout__proceed__subtotal li:last-child {
		margin-bottom: 0;
	}

	.checkout__proceed__total {
		overflow: hidden;
		padding: 34px 0;
	}

	.checkout__proceed__total span {
		font-size: 15px;
		color: #292621;
		font-weight: 600;
	}

	.checkout__proceed__total .price {
		font-size: 20px;
		color: var(--themecolor);
		font-weight: 600;
		float: right;
	}

	/*---------------------
  Wishlist
-----------------------*/

	.wishlist__table table {
		width: 100%;
	}

	.wishlist__table thead {
		border-bottom: 1px solid #f2f2f2;
	}

	.wishlist__table thead tr th {
		font-size: 22px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		color: #1b2839;
		text-transform: uppercase;
		padding-bottom: 25px;
	}

	.wishlist__table tbody tr {
		border-bottom: 1px solid #f2f2f2;
	}

	.wishlist__table tbody tr td {
		padding-top: 30px;
		padding-bottom: 30px;
	}

	.wishlist__table tbody tr td.wishlist__item {
		width: 745px;
	}

	.wishlist__table tbody tr td.wishlist__item .wishlist__item__pic {
		float: left;
		margin-right: 20px;
	}

	.wishlist__table tbody tr td.wishlist__item .wishlist__item__pic img {
		border: 1px solid #e8eff4;
	}

	.wishlist__table tbody tr td.wishlist__item .wishlist__item__text {
		overflow: hidden;
		padding-top: 20px;
	}

	.wishlist__table tbody tr td.wishlist__item .wishlist__item__text h6 {
		font-size: 15px;
		font-family: "Open Sans", sans-serif;
		color: #888888;
		margin-bottom: 6px;
	}

	.wishlist__table tbody tr td.wishlist__item .wishlist__item__text span {
		color: #111111;
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		display: block;
	}

	.wishlist__quantity {
		width: 215px;
	}

	.wishlist__quantity .quantity .pro-qty {
		width: 90px;
		height: 46px;
	}

	.wishlist__quantity .quantity .pro-qty input {
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		color: #111111;
		float: left;
		text-align: center;
		border: none;
		background: transparent;
		width: 56px;
		height: 48px;
	}

	.wishlist__quantity .quantity .pro-qty .qtybtn {
		font-size: 16px;
		color: #888888;
		float: left;
		height: 100%;
		line-height: 46px;
		cursor: pointer;
	}

	.wishlist__price {
		color: #111111;
		font-size: 18px;
		font-family: "Rajdhani", sans-serif;
		font-weight: 600;
		width: 215px;
	}

	.wishlist__cart {
		width: 200px;
	}

	.wishlist__cart .primary-btn {
		border: 1px solid var(--themecolor);
		color: #111111;
		background: transparent;
	}

	.wishlist__close {
		text-align: right;
	}

	.wishlist__close span {
		font-size: 18px;
		color: #111111;
		cursor: pointer;
		text-align: center;
		height: 40px;
		width: 40px;
		line-height: 40px;
		background: #f2f2f2;
		display: inline-block;
		border-radius: 50%;
	}

	/*---------------------
  Blog
-----------------------*/

	.blog__item {
		overflow: hidden;
		margin-bottom: 30px;
	}

	.blog__item__pic {
		float: left;
	}

	.blog__item__pic img {
		height: 100%;
	}

	.blog__item__text {
		overflow: hidden;
		border: 1px solid #f2f2f2;
		padding: 40px 60px 38px 30px;
		height: 180px;
	}

	.blog__item__text span {
		font-size: 12px;
		display: block;
		color: var(--themecolor);
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 6px;
	}

	.blog__item__text h5 a {
		color: #11123a;
		font-size: 20px;
		font-weight: 600;
		line-height: 26px;
	}

	.blog__item__text ul li {
		list-style: none;
		font-size: 13px;
		color: #888888;
		display: inline-block;
		margin-right: 25px;
		position: relative;
	}

	.blog__item__text ul li:after {
		position: absolute;
		right: -17px;
		top: -1px;
		content: "|";
	}

	.blog__item__text ul li:last-child {
		margin-right: 0;
	}

	.blog__item__text ul li:last-child:after {
		display: none;
	}

	.blog__item__large {
		margin-bottom: 35px;
	}

	.blog__item__large img {
		min-width: 100%;
		margin-bottom: 25px;
	}

	.blog__item__large span {
		font-size: 12px;
		display: block;
		color: var(--themecolor);
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 12px;
	}

	.blog__item__large h2 {
		color: #070a37;
		font-size: 32px;
		font-weight: 600;
		line-height: 37px;
		margin-bottom: 6px;
	}

	.blog__item__large ul li {
		list-style: none;
		font-size: 13px;
		color: #888888;
		display: inline-block;
		margin-right: 25px;
		position: relative;
	}

	.blog__item__large ul li:after {
		position: absolute;
		right: -17px;
		top: -1px;
		content: "|";
	}

	.blog__item__large ul li:last-child {
		margin-right: 0;
	}

	.blog__item__large ul li:last-child:after {
		display: none;
	}

	.load__more {
		padding-top: 10px;
	}

	.load__more .primary-btn {
		background: #292621;
		padding: 12px 40px 10px;
	}

	/*---------------------
  Blog Details Hero
-----------------------*/

	.blog-hero {
		padding-top: 218px;
		padding-bottom: 218px;
	}

	.blog__hero__text {
		text-align: center;
		background: #ffffff;
		padding: 35px 85px;
	}

	.blog__hero__text img {
		min-width: 100%;
		margin-bottom: 25px;
	}

	.blog__hero__text span {
		font-size: 12px;
		display: block;
		color: var(--themecolor);
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 12px;
	}

	.blog__hero__text h2 {
		color: #070a37;
		font-size: 32px;
		font-weight: 600;
		line-height: 37px;
		margin-bottom: 6px;
	}

	.blog__hero__text ul li {
		list-style: none;
		font-size: 13px;
		color: #888888;
		display: inline-block;
		margin-right: 25px;
		position: relative;
	}

	.blog__hero__text ul li:after {
		position: absolute;
		right: -17px;
		top: -1px;
		content: "|";
	}

	.blog__hero__text ul li:last-child {
		margin-right: 0;
	}

	.blog__hero__text ul li:last-child:after {
		display: none;
	}

	/*---------------------
  Blog Details
-----------------------*/

	.blog-details {
		padding-top: 65px;
		padding-bottom: 90px;
	}

	.blog__details__text {
		margin-bottom: 45px;
	}

	.blog__details__text p {
		font-size: 17px;
		line-height: 32px;
		margin-bottom: 30px;
	}

	.blog__details__text p:last-child {
		margin-bottom: 0;
	}

	.blog__details__text ul {
		margin-bottom: 35px;
	}

	.blog__details__text ul li {
		list-style: none;
		font-size: 17px;
		color: #424242;
		margin-bottom: 12px;
	}

	.blog__details__text ul li:last-child {
		margin-bottom: 0;
	}

	.blog__details__text ul li i {
		color: var(--themecolor);
		margin-right: 8px;
	}

	.blog__details__quote {
		border: 1px solid var(--themecolor);
		padding: 50px 48px 40px;
		margin-bottom: 45px;
	}

	.blog__details__quote h5 {
		font-size: 17px;
		color: #292621;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 14px;
	}

	.blog__details__quote h5 img {
		margin-right: 10px;
	}

	.blog__details__quote p {
		font-size: 30px;
		font-family: "Rajdhani", sans-serif;
		line-height: 40px;
		margin-bottom: 0;
	}

	.blog__details__tags {
		border-bottom: 1px solid #e1e1e1;
		padding-bottom: 35px;
	}

	.blog__details__tags h5 {
		color: #292621;
		font-weight: 600;
		display: inline-block;
		margin-right: 20px;
		margin-bottom: 15px;
	}

	.blog__details__tags a {
		color: #292621;
		display: inline-block;
		font-size: 14px;
		background: #f2f2f2;
		padding: 9px 16px 7px;
		margin-right: 10px;
		margin-bottom: 15px;
	}

	.blog__details__tags a:last-child {
		margin-right: 0;
	}

	.blog__details__btns {
		padding-bottom: 40px;
		padding-top: 45px;
	}

	.blog__details__btns__list {
		margin-bottom: 30px;
	}

	.blog__details__btns__list.blog__details__btns__list--next h6 {
		text-align: right;
	}

	.blog__details__btns__list.blog__details__btns__list--next h6 i {
		margin-right: 0;
		margin-left: 10px;
	}

	.blog__details__btns__list.blog__details__btns__list--next .blog__details__btn__item__pic {
		float: right;
		margin-right: 0;
		margin-left: 25px;
	}

	.blog__details__btns__list.blog__details__btns__list--next .blog__details__btn__item__text {
		text-align: right;
	}

	.blog__details__btns__list h6 {
		font-size: 15px;
		color: #292621;
		font-weight: 700;
		text-transform: uppercase;
		margin-bottom: 25px;
	}

	.blog__details__btns__list h6 i {
		font-size: 16px;
		color: #292621;
		font-weight: 600;
		position: relative;
		top: -1px;
		margin-right: 10px;
	}

	.blog__details__btn__item {
		display: block;
		overflow: hidden;
	}

	.blog__details__btn__item__pic {
		float: left;
		margin-right: 25px;
	}

	.blog__details__btn__item__text {
		overflow: hidden;
	}

	.blog__details__btn__item__text h4 {
		color: #292621;
		font-size: 22px;
		line-height: 21px;
		font-weight: 600;
		margin-bottom: 6px;
	}

	.blog__details__btn__item__text span {
		font-size: 13px;
		color: #777777;
		display: block;
	}

	.blog__details__comment {
		background: #f6f6f9;
		padding: 45px 50px 50px;
	}

	.blog__details__comment h3 {
		color: #292621;
		font-weight: 600;
		text-transform: uppercase;
		margin-bottom: 30px;
		text-align: center;
	}

	.blog__details__comment form input {
		width: 100%;
		height: 50px;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		padding-left: 20px;
		margin-bottom: 30px;
	}

	.blog__details__comment form input::-webkit-input-placeholder {
		color: #888888;
	}

	.blog__details__comment form input::-moz-placeholder {
		color: #888888;
	}

	.blog__details__comment form input:-ms-input-placeholder {
		color: #888888;
	}

	.blog__details__comment form input::-ms-input-placeholder {
		color: #888888;
	}

	.blog__details__comment form input::placeholder {
		color: #888888;
	}

	.blog__details__comment form textarea {
		width: 100%;
		height: 120px;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		padding-left: 20px;
		padding-top: 12px;
		resize: none;
		margin-bottom: 24px;
	}

	.blog__details__comment form textarea::-webkit-input-placeholder {
		color: #888888;
	}

	.blog__details__comment form textarea::-moz-placeholder {
		color: #888888;
	}

	.blog__details__comment form textarea:-ms-input-placeholder {
		color: #888888;
	}

	.blog__details__comment form textarea::-ms-input-placeholder {
		color: #888888;
	}

	.blog__details__comment form textarea::placeholder {
		color: #888888;
	}

	.blog__details__comment form button {
		width: 100%;
	}

	/*---------------------
  Contact
-----------------------*/

	.contact {
		padding-bottom: 70px;
	}

	.contact__map {
		height: 500px;
		margin-bottom: 50px;
	}

	.contact__map iframe {
		width: 100%;
	}

	.contact__widget {
		margin-bottom: 30px;
	}

	.contact__widget__item {
		margin-bottom: 45px;
	}

	.contact__widget__item:last-child {
		margin-bottom: 0;
	}

	.contact__widget__item__icon {
		height: 46px;
		width: 46px;
		border: 1px solid var(--themecolor);
		border-radius: 5px;
		line-height: 46px;
		text-align: center;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
		float: left;
		margin-right: 38px;
		position: relative;
		top: 8px;
	}

	.contact__widget__item__icon span {
		font-size: 24px;
		color: #1b2839;
		display: inline-block;
		-webkit-transform: rotate(-45deg);
		-ms-transform: rotate(-45deg);
		transform: rotate(-45deg);
		position: relative;
		left: -1px;
		top: 2px;
	}

	.contact__widget__item__text {
		overflow: hidden;
		padding-left: 10px;
	}

	.contact__widget__item__text h4 {
		color: #111111;
		font-weight: 600;
		margin-bottom: 4px;
	}

	.contact__widget__item__text p {
		margin-bottom: 0;
	}

	.contact__form {
		margin-bottom: 30px;
	}

	.contact__form form input {
		width: 100%;
		height: 46px;
		border-radius: 15px;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		padding-left: 20px;
		margin-bottom: 20px;
	}

	.contact__form form input::-webkit-input-placeholder {
		color: #888888;
	}

	.contact__form form input::-moz-placeholder {
		color: #888888;
	}

	.contact__form form input:-ms-input-placeholder {
		color: #888888;
	}

	.contact__form form input::-ms-input-placeholder {
		color: #888888;
	}

	.contact__form form input::placeholder {
		color: #888888;
	}

	.contact__form form textarea {
		width: 100%;
		height: 110px;
		border: 1px solid #e1e1e1;
		font-size: 14px;
		color: #888888;
		padding-left: 20px;
		padding-top: 12px;
		resize: none;
		margin-bottom: 14px;
	}

	.contact__form form textarea::-webkit-input-placeholder {
		color: #888888;
	}

	.contact__form form textarea::-moz-placeholder {
		color: #888888;
	}

	.contact__form form textarea:-ms-input-placeholder {
		color: #888888;
	}

	.contact__form form textarea::-ms-input-placeholder {
		color: #888888;
	}

	.contact__form form textarea::placeholder {
		color: #888888;
	}

	.contact__form form button {
		width: 100%;
	}


	.contact__form form .button_b {
		width: auto !important;
	}

	/*--------------------------------- Responsive Media Quaries -----------------------------*/

	@media only screen and (min-width: 1200px) {
		.container {
			max-width: 1170px;
		}
	}

	@media only screen and (min-width: 1200px) and (max-width: 1449px) {
		.filter__form {
			padding: 40px 30px 30px;
		}

		.hero__text {
			padding: 50px 50px;
		}

		.chooseus__text {
			padding-bottom: 51px;
		}

		.testimonial__content {
			padding: 84px 90px 80px 90px;
		}

		.testimonial__item p {
			font-size: 32px;
			line-height: 42px;
		}

		.testimonial__slider.owl-carousel .owl-dots {
			right: -100px;
		}

		.blog__item__text {
			padding: 30px 25px 25px 30px;
		}

		.callto__text {
			padding: 60px;
		}

		.team__item__text {
			margin: 0 20px;
			padding: 20px 15px 0;
		}

		.services__page__widget__text {
			padding: 100px 90px;
		}

		.wishlist__table tbody tr td.wishlist__item {
			width: 600px;
		}

		.product__details__pic__item img {
			height: auto;
		}

		.product__details__pic__item {
			height: auto;
		}

		.blog__details__comment {
			padding: 30px 30px 30px;
		}
	}

	@media only screen and (min-width: 1450px) {
		.container {
			max-width: 1410px;
		}
	}

	/* Medium Device = 1200px */

	@media only screen and (min-width: 992px) and (max-width: 1199px) {
		.hero__text {
			padding: 50px 50px;
		}

		.filter__form {
			padding: 40px 30px 30px;
		}

		.filter__form h2 {
			font-size: 36px;
		}

		.filter__form form .form__btn button {
			font-size: 12px;
			letter-spacing: 0px;
		}

		.chooseus__text {
			padding-bottom: 51px;
		}

		.testimonial__left .testimonial__left__text {
			padding: 136px 15px 140px 35px;
		}

		.testimonial__content {
			padding: 84px 60px 80px 60px;
		}

		.testimonial__item p {
			font-size: 28px;
			line-height: 42px;
		}

		.testimonial__slider.owl-carousel .owl-dots {
			right: -90px;
		}

		.blog__item__pic {
			float: none;
		}

		.blog__item__pic img {
			width: 100%;
			height: auto;
		}

		.callto__text {
			padding: 60px;
		}

		.about__text {
			padding-top: 0;
		}

		.team__item__text {
			margin: 0px 10px;
			padding: 20px 15px 0;
		}

		.services__page__widget__text {
			padding: 80px 75px;
			margin-left: -80px;
		}

		.services__page__widget__form {
			padding: 50px 90px 50px 50px;
		}

		.product__sidebar__price__filter .input__filter input {
			width: 26%;
		}

		.cart__right {
			padding-left: 0;
		}

		.cart__table tbody tr td.cart__item .cart__item__text {
			padding-top: 10px;
		}

		.cart__total a {
			letter-spacing: 1px;
			padding: 14px 15px 12px;
		}

		.checkout__proceed {
			padding: 35px 30px 30px;
			margin-left: 0;
		}

		.wishlist__cart .primary-btn {
			padding: 12px 15px 10px;
		}

		.wishlist__table tbody tr td.wishlist__item {
			width: 600px;
		}

		.product__details__pic__item img {
			height: auto;
		}

		.product__details__pic__item {
			height: auto;
		}

		.blog__details__comment {
			padding: 25px 30px 30px;
		}
	}

	/* Tablet Device = 768px */

	@media only screen and (min-width: 768px) and (max-width: 991px) {
		.canvas__open {
			display: block;
			font-size: 22px;
			color: #111111;
			height: 35px;
			width: 35px;
			line-height: 34px;
			text-align: center;
			border: 1px solid #111111;
			border-radius: 2px;
			cursor: pointer;
			position: absolute;
			right: 15px;
			top: 28px;
			z-index: 9;
		}

		.offcanvas-menu-overlay {
			position: fixed;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			background: rgba(0, 0, 0, 0.7);
			content: "";
			z-index: 98;
			-webkit-transition: all, 0.5s;
			-o-transition: all, 0.5s;
			transition: all, 0.5s;
			visibility: hidden;
		}

		.offcanvas-menu-overlay.active {
			visibility: visible;
		}

		.offcanvas-menu-wrapper {
			position: fixed;
			left: -300px;
			width: 300px;
			height: 100%;
			background: #ffffff;
			padding: 50px 20px 30px 30px;
			display: block;
			z-index: 99;
			overflow-y: auto;
			-webkit-transition: all, 0.5s;
			-o-transition: all, 0.5s;
			transition: all, 0.5s;
			opacity: 0;
		}

		.offcanvas-menu-wrapper.active {
			opacity: 1;
			left: 0;
		}

		.offcanvas__logo {
			margin-bottom: 30px;
		}

		.hero__text {
			padding: 50px 40px;
		}

		.filter__form form .input__item {
			width: calc(50% - 20px);
			margin-bottom: 20px;
		}

		.filter__form form .form__btn {
			width: calc(50% - 20px);
			margin-bottom: 20px;
		}

		.filter__form h2 {
			margin-bottom: 25px;
		}

		.chooseus__content {
			padding: 20px 20px 0 35px;
		}

		.chooseus__text {
			padding-left: 0px;
			padding-top: 20px;
			padding-bottom: 40px;
		}

		.counter__item {
			width: 33.33%;
		}

		.dc-flex {
			max-width: 50%;
		}

		.testimonial__content {
			height: auto;
		}

		.testimonial__left .testimonial__left__text {
			padding: 136px 90px 140px 90px;
			max-width: initial;
		}

		.callto__text {
			padding: 80px;
		}

		.services__page__widget__text {
			margin-left: 0;
			margin-top: 0;
		}

		.services__page__widget__form {
			padding: 50px;
		}

		.product__sidebar {
			padding-top: 30px;
		}

		.cart__right {
			padding-left: 0;
			padding-top: 40px;
		}

		.checkout__proceed {
			margin-top: 40px;
			margin-left: 0;
		}

		.wishlist__table tbody tr td {
			width: 280px;
		}

		.wishlist__table tbody tr td .primary-btn {
			letter-spacing: 0px;
			padding: 12px 13px 10px;
		}

		.wishlist__table tbody tr td.wishlist__item .wishlist__item__text {
			padding-top: 0;
		}
	}

	/* Wide Mobile = 480px */

	@media only screen and (max-width: 767px) {
		.canvas__open {
			display: block;
			font-size: 22px;
			color: #111111;
			height: 35px;
			width: 35px;
			line-height: 34px;
			text-align: center;
			border: 1px solid #111111;
			border-radius: 2px;
			cursor: pointer;
			position: absolute;
			right: 15px;
			top: 28px;
			z-index: 9;
		}

		.offcanvas-menu-overlay {
			position: fixed;
			left: 0;
			top: 0;
			height: 100%;
			width: 100%;
			background: rgba(0, 0, 0, 0.7);
			content: "";
			z-index: 98;
			-webkit-transition: all, 0.5s;
			-o-transition: all, 0.5s;
			transition: all, 0.5s;
			visibility: hidden;
		}

		.offcanvas-menu-overlay.active {
			visibility: visible;
		}

		.offcanvas-menu-wrapper {
			position: fixed;
			left: -300px;
			width: 300px;
			height: 100%;
			background: #ffffff;
			padding: 50px 20px 30px 30px;
			display: block;
			z-index: 99;
			overflow-y: auto;
			-webkit-transition: all, 0.5s;
			-o-transition: all, 0.5s;
			transition: all, 0.5s;
			opacity: 0;
		}

		.offcanvas-menu-wrapper.active {
			opacity: 1;
			left: 0;
		}

		.offcanvas__logo {
			margin-bottom: 30px;
		}

		.hero__text {
			padding: 50px 35px;
		}

		.filter__form h2 {
			margin-bottom: 25px;
		}

		.filter__form {
			padding: 35px 30px 30px;
		}

		.filter__form form {
			margin-right: 0;
		}

		.filter__form form .input__item {
			width: 100%;
			margin-bottom: 20px;
		}

		.filter__form form .form__btn {
			width: 100%;
		}

		.chooseus__content {
			padding: 20px 20px 0 35px;
		}

		.chooseus__text {
			padding-left: 0px;
			padding-top: 20px;
			padding-bottom: 40px;
		}

		.counter__item {
			width: 50%;
			height: 190px;
		}

		.dc-flex {
			max-width: 100%;
		}

		.testimonial__content {
			height: auto;
			padding: 84px 40px 80px 40px;
		}

		.testimonial__slider.owl-carousel .owl-dots {
			right: -70px;
		}

		.testimonial__left .testimonial__left__text {
			padding: 136px 30px 140px 30px;
			max-width: initial;
		}

		.border__btn {
			text-align: left;
		}

		.blog__item__pic {
			float: none;
		}

		.blog__item__pic img {
			width: 100%;
			height: auto;
		}

		.blog__item__text {
			padding: 40px 30px 38px 30px;
			height: auto;
		}

		.callto__text {
			padding: 80px;
		}

		.callto__text {
			padding: 50px;
			margin-bottom: 80px;
		}

		.callto {
			height: auto;
			padding-bottom: 0;
		}

		.callto .callto__pic {
			position: relative;
			width: 100%;
		}

		.footer__copyright .footer__copyright__text {
			text-align: center;
			margin-bottom: 20px;
		}

		.footer__copyright .footer__copyright__links {
			text-align: center;
		}

		.services__page__widget__form {
			padding: 40px;
		}

		.services__page__widget__text {
			padding: 60px 40px;
			margin-left: 0;
			margin-top: 0;
		}

		.product__pag {
			text-align: center;
		}

		.product__show {
			text-align: center;
		}

		.product__sidebar {
			padding-top: 30px;
		}

		.cart__table {
			overflow-x: auto;
		}

		.cart__table tbody tr td.cart__item .cart__item__pic {
			float: none;
			margin-right: 0;
		}

		.cart__table tbody tr td.cart__item {
			width: auto;
		}

		.cart__quantity {
			width: auto;
		}

		.cart__price {
			width: auto;
		}

		.cart__btn__right {
			text-align: left;
			padding-top: 30px;
		}

		.cart__right {
			padding-left: 0;
			padding-top: 40px;
		}

		.checkout__form__top h6 {
			text-align: left;
			margin-top: 15px;
		}

		.checkout__proceed {
			margin-top: 40px;
			margin-left: 0;
		}

		.checkout {
			overflow: hidden;
		}

		.wishlist__table tbody tr td.wishlist__item .wishlist__item__pic {
			float: none;
			margin-right: 0;
		}

		.wishlist__table tbody tr td.wishlist__item {
			width: auto;
		}

		.wishlist__quantity {
			width: auto;
		}

		.wishlist__price {
			width: 100px;
		}

		.wishlist__close {
			width: 50px;
		}

		.wishlist__cart {
			width: auto;
		}

		.wishlist__table {
			overflow-x: auto;
		}

		.wishlist__cart .primary-btn {
			padding: 12px 10px 10px;
		}

		.product__details__pic__item img {
			height: auto;
		}

		.product__details__pic__item {
			height: auto;
		}

		.product__details__desc__tab .nav-item {
			margin-right: 20px;
		}

		.product__details__desc__tab .nav-item:after {
			right: -16px;
		}

		.blog__hero__text {
			padding: 35px 35px;
		}

		.blog__details__comment {
			padding: 25px 30px 30px;
		}

		.product-details {
			overflow: hidden;
		}
	}

	/* Small Device = 320px */

	@media only screen and (max-width: 479px) {
		.hero__text h2 {
			font-size: 32px;
			line-height: 42px;
		}

		.counter__item {
			width: 100%;
			height: auto;
		}

		.testimonial__item p {
			font-size: 28px;
			line-height: 44px;
		}

		.testimonial__left {
			height: auto;
		}

		.callto__text {
			padding: 25px;
		}

		.services__page__widget__form {
			padding: 30px;
		}

		.services__page__widget__text {
			padding: 40px 30px;
		}

		.services__page__widget__text p {
			font-size: 28px;
			line-height: 42px;
		}

		.cart__total a {
			letter-spacing: 1px;
			padding: 14px 15px 12px;
		}

		.checkout__proceed {
			padding: 30px 25px 30px;
		}

		.product__details__widget .quantity {
			float: none;
			margin-right: 0;
			margin-bottom: 20px;
		}

		.product__details__desc__tab .nav-item {
			margin-right: 0;
			margin-bottom: 20px;
		}

		.product__details__desc__tab .nav-link:after {
			display: none;
		}

		.product__details__desc__tab .nav {
			display: block;
			text-align: center;
		}

		.blog__details__quote {
			padding: 50px 30px 40px;
		}

		.blog__details__comment {
			padding: 25px 25px 30px;
		}
	}

	@media only screen and (max-width: 768px) {
		.c-container {
			padding-left: 2rem;
			padding-right: 2rem;
		}
	}
</style>