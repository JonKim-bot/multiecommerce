<style>
    @import url("https://fonts.googleapis.com/css2?family=Clicker+Script&family=Jost:wght@200;300;400;500;600;700;800;900&display=swap");

    @font-face {
        font-family: HanYiChaoCuHeiJian-1;
        src: url("<?= base_url() ?>/assets/assetsecom/fonts/HanYiChaoCuHeiJian-1.ttf");
    }

    @font-face {
        font-family: msyh;
        src: url("<?= base_url() ?>/assets/assetsecom/fonts/msyh.ttc");
    }

    @font-face {
        font-family: msyhbold;
        src: url("<?= base_url() ?>/assets/assetsecom/fonts/msyhbold.ttc");

    }

    @font-face {
        font-family: msyhlight;
        src: url("<?= base_url() ?>/assets/assetsecom/fonts/msyhlight.ttc");


    }

    :root {
        --themecolor: <?= $color ?>;
        --secondary_color: <?= $color_2 ?>;
    }

    .login_image {
        /* margin:auto;min-width: 60% !important;max-width: 60% !important;border-radius:15px; */
    }

    .login_image img {
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .login_page_about {
        width: 80%;
        margin-top: 50px;
        margin-bottom: 60px;
    }

    .login_page_about h1 {
        margin-bottom: 20px;
    }

    .section-bg {
        background-color: #FEF4F4
    }

    .section-bg2 {
        background-color: #F3EAD8
    }

    .gray-bg {
        background: #F1FBFF
    }

    .white-bg {
        background: #fff
    }

    .black-bg {
        background: #16161a
    }

    .theme-bg {
        background: var(--themecolor)
    }

    .brand-bg {
        background: #f1f4fa
    }

    .testimonial-bg {
        background: #f9fafc
    }

    .white-color {
        color: #fff
    }

    .black-color {
        color: #16161a
    }

    .theme-color {
        color: var(--themecolor)
    }

    [data-overlay] {
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center
    }

    [data-overlay]::before {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;

        bottom: 0;
        content: ""
    }

    [data-opacity="1"]::before {
        opacity: 0.1
    }

    [data-opacity="2"]::before {
        opacity: 0.2
    }

    [data-opacity="3"]::before {
        opacity: 0.3
    }

    [data-opacity="4"]::before {
        opacity: 0.4
    }

    [data-opacity="5"]::before {
        opacity: 0.5
    }

    [data-opacity="6"]::before {
        opacity: 0.6
    }

    [data-opacity="7"]::before {
        opacity: 0.7
    }

    [data-opacity="8"]::before {
        opacity: 0.8
    }

    [data-opacity="9"]::before {
        opacity: 0.9
    }

    body {
        font-family: "Jost", sans-serif;
        font-weight: normal;
        font-style: normal;
        font-size: 16px
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Jost", sans-serif;
        color: #292621;
        margin-top: 0px;
        font-style: normal;
        font-weight: 500;
        text-transform: normal
    }

    p {
        font-family: "Jost", sans-serif;
        color: #301A22;
        font-size: 16px;
        line-height: 30px;
        margin-bottom: 15px;
        font-weight: 400;
        line-height: 1.6
    }

    .f-left {
        float: left
    }

    .f-right {
        float: right
    }

    .fix {
        overflow: hidden
    }

    .clear {
        clear: both
    }

    .mb-5 {
        margin-bottom: 5px
    }

    .mb-10 {
        margin-bottom: 10px
    }

    .mb-15 {
        margin-bottom: 15px
    }

    .mb-20 {
        margin-bottom: 20px
    }

    .mb-25 {
        margin-bottom: 25px
    }

    .mb-30 {
        margin-bottom: 30px
    }

    .mb-35 {
        margin-bottom: 35px
    }

    .mb-40 {
        margin-bottom: 40px
    }

    .mb-45 {
        margin-bottom: 45px
    }

    .mb-50 {
        margin-bottom: 50px
    }

    .mb-55 {
        margin-bottom: 55px
    }

    .mb-60 {
        margin-bottom: 60px
    }

    .mb-65 {
        margin-bottom: 65px
    }

    .mb-70 {
        margin-bottom: 70px
    }

    .mb-75 {
        margin-bottom: 75px
    }

    .mb-80 {
        margin-bottom: 80px
    }

    .mb-85 {
        margin-bottom: 85px
    }

    .mb-90 {
        margin-bottom: 90px
    }

    .mb-95 {
        margin-bottom: 95px
    }

    .mb-100 {
        margin-bottom: 100px
    }

    .mb-105 {
        margin-bottom: 105px
    }

    .mb-110 {
        margin-bottom: 110px
    }

    .mb-115 {
        margin-bottom: 115px
    }

    .mb-120 {
        margin-bottom: 120px
    }

    .mb-125 {
        margin-bottom: 125px
    }

    .mb-130 {
        margin-bottom: 130px
    }

    .mb-135 {
        margin-bottom: 135px
    }

    .mb-140 {
        margin-bottom: 140px
    }

    .mb-145 {
        margin-bottom: 145px
    }

    .mb-150 {
        margin-bottom: 150px
    }

    .mb-155 {
        margin-bottom: 155px
    }

    .mb-160 {
        margin-bottom: 160px
    }

    .mb-165 {
        margin-bottom: 165px
    }

    .mb-170 {
        margin-bottom: 170px
    }

    .mb-175 {
        margin-bottom: 175px
    }

    .mb-180 {
        margin-bottom: 180px
    }

    .mb-185 {
        margin-bottom: 185px
    }

    .mb-190 {
        margin-bottom: 190px
    }

    .mb-195 {
        margin-bottom: 195px
    }

    .mb-200 {
        margin-bottom: 200px
    }

    .ml-5 {
        margin-left: 5px
    }

    .ml-10 {
        margin-left: 10px
    }

    .ml-15 {
        margin-left: 15px
    }

    .ml-20 {
        margin-left: 20px
    }

    .ml-25 {
        margin-left: 25px
    }

    .ml-30 {
        margin-left: 30px
    }

    .ml-35 {
        margin-left: 35px
    }

    .ml-40 {
        margin-left: 40px
    }

    .ml-45 {
        margin-left: 45px
    }

    .ml-50 {
        margin-left: 50px
    }

    .ml-55 {
        margin-left: 55px
    }

    .ml-60 {
        margin-left: 60px
    }

    .ml-65 {
        margin-left: 65px
    }

    .ml-70 {
        margin-left: 70px
    }

    .ml-75 {
        margin-left: 75px
    }

    .ml-80 {
        margin-left: 80px
    }

    .ml-85 {
        margin-left: 85px
    }

    .ml-90 {
        margin-left: 90px
    }

    .ml-95 {
        margin-left: 95px
    }

    .ml-100 {
        margin-left: 100px
    }

    .ml-105 {
        margin-left: 105px
    }

    .ml-110 {
        margin-left: 110px
    }

    .ml-115 {
        margin-left: 115px
    }

    .ml-120 {
        margin-left: 120px
    }

    .ml-125 {
        margin-left: 125px
    }

    .ml-130 {
        margin-left: 130px
    }

    .ml-135 {
        margin-left: 135px
    }

    .ml-140 {
        margin-left: 140px
    }

    .ml-145 {
        margin-left: 145px
    }

    .ml-150 {
        margin-left: 150px
    }

    .ml-155 {
        margin-left: 155px
    }

    .ml-160 {
        margin-left: 160px
    }

    .ml-165 {
        margin-left: 165px
    }

    .ml-170 {
        margin-left: 170px
    }

    .ml-175 {
        margin-left: 175px
    }

    .ml-180 {
        margin-left: 180px
    }

    .ml-185 {
        margin-left: 185px
    }

    .ml-190 {
        margin-left: 190px
    }

    .ml-195 {
        margin-left: 195px
    }

    .ml-200 {
        margin-left: 200px
    }

    .mr-5 {
        margin-right: 5px
    }

    .mr-10 {
        margin-right: 10px
    }

    .mr-15 {
        margin-right: 15px
    }

    .mr-20 {
        margin-right: 20px
    }

    .mr-25 {
        margin-right: 25px
    }

    .mr-30 {
        margin-right: 30px
    }

    .mr-35 {
        margin-right: 35px
    }

    .mr-40 {
        margin-right: 40px
    }

    .mr-45 {
        margin-right: 45px
    }

    .mr-50 {
        margin-right: 50px
    }

    .mr-55 {
        margin-right: 55px
    }

    .mr-60 {
        margin-right: 60px
    }

    .mr-65 {
        margin-right: 65px
    }

    .mr-70 {
        margin-right: 70px
    }

    .mr-75 {
        margin-right: 75px
    }

    .mr-80 {
        margin-right: 80px
    }

    .mr-85 {
        margin-right: 85px
    }

    .mr-90 {
        margin-right: 90px
    }

    .mr-95 {
        margin-right: 95px
    }

    .mr-100 {
        margin-right: 100px
    }

    .mr-105 {
        margin-right: 105px
    }

    .mr-110 {
        margin-right: 110px
    }

    .mr-115 {
        margin-right: 115px
    }

    .mr-120 {
        margin-right: 120px
    }

    .mr-125 {
        margin-right: 125px
    }

    .mr-130 {
        margin-right: 130px
    }

    .mr-135 {
        margin-right: 135px
    }

    .mr-140 {
        margin-right: 140px
    }

    .mr-145 {
        margin-right: 145px
    }

    .mr-150 {
        margin-right: 150px
    }

    .mr-155 {
        margin-right: 155px
    }

    .mr-160 {
        margin-right: 160px
    }

    .mr-165 {
        margin-right: 165px
    }

    .mr-170 {
        margin-right: 170px
    }

    .mr-175 {
        margin-right: 175px
    }

    .mr-180 {
        margin-right: 180px
    }

    .mr-185 {
        margin-right: 185px
    }

    .mr-190 {
        margin-right: 190px
    }

    .mr-195 {
        margin-right: 195px
    }

    .mr-200 {
        margin-right: 200px
    }

    .pt-5 {
        padding-top: 5px
    }

    .pt-10 {
        padding-top: 10px
    }

    .pt-15 {
        padding-top: 15px
    }

    .pt-20 {
        padding-top: 20px
    }

    .pt-25 {
        padding-top: 25px
    }

    .pt-30 {
        padding-top: 30px
    }

    .pt-35 {
        padding-top: 35px
    }

    .pt-40 {
        padding-top: 40px
    }

    .pt-45 {
        padding-top: 45px
    }

    .pt-50 {
        padding-top: 50px
    }

    .pt-55 {
        padding-top: 55px
    }

    .pt-60 {
        padding-top: 60px
    }

    .pt-65 {
        padding-top: 65px
    }

    .pt-70 {
        padding-top: 70px
    }

    .pt-75 {
        padding-top: 75px
    }

    .pt-80 {
        padding-top: 80px
    }

    .pt-85 {
        padding-top: 85px
    }

    .pt-90 {
        padding-top: 90px
    }

    .pt-95 {
        padding-top: 95px
    }

    .pt-100 {
        padding-top: 100px
    }

    .pt-105 {
        padding-top: 105px
    }

    .pt-110 {
        padding-top: 110px
    }

    .pt-115 {
        padding-top: 115px
    }

    .pt-120 {
        padding-top: 120px
    }

    .pt-125 {
        padding-top: 125px
    }

    .pt-130 {
        padding-top: 130px
    }

    .pt-135 {
        padding-top: 135px
    }

    .pt-140 {
        padding-top: 140px
    }

    .pt-145 {
        padding-top: 145px
    }

    .pt-150 {
        padding-top: 150px
    }

    .pt-155 {
        padding-top: 155px
    }

    .pt-160 {
        padding-top: 160px
    }

    .pt-165 {
        padding-top: 165px
    }

    .pt-170 {
        padding-top: 170px
    }

    .pt-175 {
        padding-top: 175px
    }

    .pt-180 {
        padding-top: 180px
    }

    .pt-185 {
        padding-top: 185px
    }

    .pt-190 {
        padding-top: 190px
    }

    .pt-195 {
        padding-top: 195px
    }

    .pt-200 {
        padding-top: 200px
    }

    .pt-260 {
        padding-top: 260px
    }

    .pb-5 {
        padding-bottom: 5px
    }

    .pb-10 {
        padding-bottom: 10px
    }

    .pb-15 {
        padding-bottom: 15px
    }

    .pb-20 {
        padding-bottom: 20px
    }

    .pb-25 {
        padding-bottom: 25px
    }

    .pb-30 {
        padding-bottom: 30px
    }

    .pb-35 {
        padding-bottom: 35px
    }

    .pb-40 {
        padding-bottom: 40px
    }

    .pb-45 {
        padding-bottom: 45px
    }

    .pb-50 {
        padding-bottom: 50px
    }

    .pb-55 {
        padding-bottom: 55px
    }

    .pb-60 {
        padding-bottom: 60px
    }

    .pb-65 {
        padding-bottom: 65px
    }

    .pb-70 {
        padding-bottom: 70px
    }

    .pb-75 {
        padding-bottom: 75px
    }

    .pb-80 {
        padding-bottom: 80px
    }

    .pb-85 {
        padding-bottom: 85px
    }

    .pb-90 {
        padding-bottom: 90px
    }

    .pb-95 {
        padding-bottom: 95px
    }

    .pb-100 {
        padding-bottom: 100px
    }

    .pb-105 {
        padding-bottom: 105px
    }

    .pb-110 {
        padding-bottom: 110px
    }

    .pb-115 {
        padding-bottom: 115px
    }

    .pb-120 {
        padding-bottom: 120px
    }

    .pb-125 {
        padding-bottom: 125px
    }

    .pb-130 {
        padding-bottom: 130px
    }

    .pb-135 {
        padding-bottom: 135px
    }

    .pb-140 {
        padding-bottom: 140px
    }

    .pb-145 {
        padding-bottom: 145px
    }

    .pb-150 {
        padding-bottom: 150px
    }

    .pb-155 {
        padding-bottom: 155px
    }

    .pb-160 {
        padding-bottom: 160px
    }

    .pb-165 {
        padding-bottom: 165px
    }

    .pb-170 {
        padding-bottom: 170px
    }

    .pb-175 {
        padding-bottom: 175px
    }

    .pb-180 {
        padding-bottom: 180px
    }

    .pb-185 {
        padding-bottom: 185px
    }

    .pb-190 {
        padding-bottom: 190px
    }

    .pb-195 {
        padding-bottom: 195px
    }

    .pb-200 {
        padding-bottom: 200px
    }

    .pl-5 {
        padding-left: 5px
    }

    .pl-10 {
        padding-left: 10px
    }

    .pl-15 {
        padding-left: 15px
    }

    .pl-20 {
        padding-left: 20px
    }

    .pl-25 {
        padding-left: 25px
    }

    .pl-30 {
        padding-left: 30px
    }

    .pl-35 {
        padding-left: 35px
    }

    .pl-40 {
        padding-left: 40px
    }

    .pl-45 {
        padding-left: 45px
    }

    .pl-50 {
        padding-left: 50px
    }

    .pl-55 {
        padding-left: 55px
    }

    .pl-60 {
        padding-left: 60px
    }

    .pl-65 {
        padding-left: 65px
    }

    .pl-70 {
        padding-left: 70px
    }

    .pl-75 {
        padding-left: 75px
    }

    .pl-80 {
        padding-left: 80px
    }

    .pl-85 {
        padding-left: 85px
    }

    .pl-90 {
        padding-left: 90px
    }

    .pl-95 {
        padding-left: 95px
    }

    .pl-100 {
        padding-left: 100px
    }

    .pl-105 {
        padding-left: 105px
    }

    .pl-110 {
        padding-left: 110px
    }

    .pl-115 {
        padding-left: 115px
    }

    .pl-120 {
        padding-left: 120px
    }

    .pl-125 {
        padding-left: 125px
    }

    .pl-130 {
        padding-left: 130px
    }

    .pl-135 {
        padding-left: 135px
    }

    .pl-140 {
        padding-left: 140px
    }

    .pl-145 {
        padding-left: 145px
    }

    .pl-150 {
        padding-left: 150px
    }

    .pl-155 {
        padding-left: 155px
    }

    .pl-160 {
        padding-left: 160px
    }

    .pl-165 {
        padding-left: 165px
    }

    .pl-170 {
        padding-left: 170px
    }

    .pl-175 {
        padding-left: 175px
    }

    .pl-180 {
        padding-left: 180px
    }

    .pl-185 {
        padding-left: 185px
    }

    .pl-190 {
        padding-left: 190px
    }

    .pl-195 {
        padding-left: 195px
    }

    .pl-200 {
        padding-left: 200px
    }

    .pr-5 {
        padding-right: 5px
    }

    .pr-10 {
        padding-right: 10px
    }

    .pr-15 {
        padding-right: 15px
    }

    .pr-20 {
        padding-right: 20px
    }

    .pr-25 {
        padding-right: 25px
    }

    .pr-30 {
        padding-right: 30px
    }

    .pr-35 {
        padding-right: 35px
    }

    .pr-40 {
        padding-right: 40px
    }

    .pr-45 {
        padding-right: 45px
    }

    .pr-50 {
        padding-right: 50px
    }

    .pr-55 {
        padding-right: 55px
    }

    .pr-60 {
        padding-right: 60px
    }

    .pr-65 {
        padding-right: 65px
    }

    .pr-70 {
        padding-right: 70px
    }

    .pr-75 {
        padding-right: 75px
    }

    .pr-80 {
        padding-right: 80px
    }

    .pr-85 {
        padding-right: 85px
    }

    .pr-90 {
        padding-right: 90px
    }

    .pr-95 {
        padding-right: 95px
    }

    .pr-100 {
        padding-right: 100px
    }

    .pr-105 {
        padding-right: 105px
    }

    .pr-110 {
        padding-right: 110px
    }

    .pr-115 {
        padding-right: 115px
    }

    .pr-120 {
        padding-right: 120px
    }

    .pr-125 {
        padding-right: 125px
    }

    .pr-130 {
        padding-right: 130px
    }

    .pr-135 {
        padding-right: 135px
    }

    .pr-140 {
        padding-right: 140px
    }

    .pr-145 {
        padding-right: 145px
    }

    .pr-150 {
        padding-right: 150px
    }

    .pr-155 {
        padding-right: 155px
    }

    .pr-160 {
        padding-right: 160px
    }

    .pr-165 {
        padding-right: 165px
    }

    .pr-170 {
        padding-right: 170px
    }

    .pr-175 {
        padding-right: 175px
    }

    .pr-180 {
        padding-right: 180px
    }

    .pr-185 {
        padding-right: 185px
    }

    .pr-190 {
        padding-right: 190px
    }

    .pr-195 {
        padding-right: 195px
    }

    .pr-200 {
        padding-right: 200px
    }

    .mt-5 {
        margin-top: 5px
    }

    .mt-10 {
        margin-top: 10px
    }

    .mt-15 {
        margin-top: 15px
    }

    .mt-20 {
        margin-top: 20px
    }

    .mt-25 {
        margin-top: 25px
    }

    .mt-30 {
        margin-top: 30px
    }

    .mt-35 {
        margin-top: 35px
    }

    .mt-40 {
        margin-top: 40px
    }

    .mt-45 {
        margin-top: 45px
    }

    .mt-50 {
        margin-top: 50px
    }

    .mt-55 {
        margin-top: 55px
    }

    .mt-60 {
        margin-top: 60px
    }

    .mt-65 {
        margin-top: 65px
    }

    .mt-70 {
        margin-top: 70px
    }

    .mt-75 {
        margin-top: 75px
    }

    .mt-80 {
        margin-top: 80px
    }

    .mt-85 {
        margin-top: 85px
    }

    .mt-90 {
        margin-top: 90px
    }

    .mt-95 {
        margin-top: 95px
    }

    .mt-100 {
        margin-top: 100px
    }

    .mt-105 {
        margin-top: 105px
    }

    .mt-110 {
        margin-top: 110px
    }

    .mt-115 {
        margin-top: 115px
    }

    .mt-120 {
        margin-top: 120px
    }

    .mt-125 {
        margin-top: 125px
    }

    .mt-130 {
        margin-top: 130px
    }

    .mt-135 {
        margin-top: 135px
    }

    .mt-140 {
        margin-top: 140px
    }

    .mt-145 {
        margin-top: 145px
    }

    .mt-150 {
        margin-top: 150px
    }

    .mt-155 {
        margin-top: 155px
    }

    .mt-160 {
        margin-top: 160px
    }

    .mt-165 {
        margin-top: 165px
    }

    .mt-170 {
        margin-top: 170px
    }

    .mt-175 {
        margin-top: 175px
    }

    .mt-180 {
        margin-top: 180px
    }

    .mt-185 {
        margin-top: 185px
    }

    .mt-190 {
        margin-top: 190px
    }

    .mt-195 {
        margin-top: 195px
    }

    .mt-200 {
        margin-top: 200px
    }

    a,
    .button {
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    a:focus,
    .button:focus {
        text-decoration: none;
        outline: none
    }

    a {
        color: #635c5c;
        text-decoration: none
    }

    a:hover {
        color: #fff
    }

    a:focus,
    a:hover,
    .portfolio-cat a:hover,
    .footer -menu li a:hover {
        text-decoration: none
    }

    a,
    button {
        color: #fff;
        outline: medium none
    }

    button:focus,
    input:focus,
    input:focus,
    textarea,
    textarea:focus {
        outline: 0
    }

    .uppercase {
        text-transform: uppercase
    }

    input:focus::-moz-placeholder {
        opacity: 0;
        -webkit-transition: .4s;
        -o-transition: .4s;
        transition: .4s;
        outline: 0px
    }

    .capitalize {
        text-transform: capitalize
    }

    h1 a,
    h2 a,
    h3 a,
    h4 a,
    h5 a,
    h6 a {
        color: inherit
    }

    ul {
        margin: 0px;
        padding: 0px
    }

    li {
        list-style: none
    }

    hr {
        border-bottom: 1px solid #eceff8;
        border-top: 0 none;
        margin: 30px 0;
        padding: 0
    }

    .theme-overlay {
        position: relative
    }

    .theme-overlay::before {
        background: #1696e7 none repeat scroll 0 0;
        content: "";
        height: 100%;
        left: 0;
        opacity: 0.6;
        position: absolute;
        top: 0;
        width: 100%
    }

    .overlay2 {
        position: relative;
        z-index: 0
    }

    .overlay2::before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1
    }

    .overlay2 {
        position: relative;
        z-index: 0
    }

    .overlay2::before {
        position: absolute;
        content: "";
        background-color: #2E2200;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.5
    }

    .section-over1 {
        position: relative;
        z-index: 1
    }

    .section-over1::before {
        position: absolute;
        content: "";
        background-color: rgba(6, 7, 6, 0.6);
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: -1;
        background-repeat: no-repeat
    }

    .breadcrumb>.active {
        color: #888
    }

    #scrollUp {
        position: fixed;
        right: 40px;
        bottom: 40px;
        width: 50px;
        height: 50px;
        background: var(--themecolor);
        color: #fff;
        text-align: center;
        line-height: 50px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        font-size: 23px;
        cursor: pointer
    }

    #scrollUp,
    #back-top {
        background: var(--themecolor);
        height: 40px;
        width: 40px;
        right: 31px;
        bottom: 18px;
        position: fixed;
        color: #fff;
        font-size: 20px;
        text-align: center;
        border-radius: 50%;
        line-height: 40px;
        border: 2px solid transparent;
        box-shadow: 0 0 10px 3px rgba(108, 98, 98, 0.2)
    }

    @media (max-width: 575px) {

        #scrollUp,
        #back-top {
            right: 16px
        }
    }

    #scrollUp a i,
    #back-top a i {
        display: block;
        line-height: 50px
    }

    #scrollUp:hover {
        color: #fff
    }

    #back-top .wrapper {
        position: relative
    }

    #back-top .wrapper .arrows-container {
        position: absolute;
        text-align: center;
        bottom: -3px;
        margin: 0 auto;
        display: block;
        right: 7px
    }

    #back-top .wrapper .arrows-container .arrow {
        padding: 7px;
        box-shadow: 2px -2px #fff inset;
        transform: rotate(130deg);
        opacity: 0;
        position: absolute
    }

    #back-top .wrapper .arrows-container .arrow-one {
        animation: arrowMovement 3s ease-in-out infinite
    }

    #back-top .wrapper .arrows-container .arrow-two {
        animation: arrowMovement 3s 1s ease-in-out infinite
    }

    @keyframes arrowMovement {
        0% {
            top: 15px;
            opacity: 0
        }

        70% {
            opacity: 1
        }

        100% {
            top: 0px;
            opacity: 0
        }
    }

    #scrollUp:hover i {
        animation: none
    }

    @media (max-width: 767px) {
        #scrollUp {
            right: 20px;
            bottom: 20px
        }
    }

    .sticky-bar {
        left: 0;
        margin: auto;
        position: fixed;
        top: 0;
        width: 100%;
        -webkit-box-shadow: 0 10px 15px rgba(25, 25, 25, 0.1);
        box-shadow: 0 10px 15px rgba(25, 25, 25, 0.1);
        z-index: 20;
        -webkit-animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
        animation: 300ms ease-in-out 0s normal none 1 running fadeInDown;
        -webkit-box-shadow: 0 10px 15px rgba(25, 25, 25, 0.1)
    }

    .preloader {
        background-color: #f7f7f7;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 999999;
        -webkit-transition: .6s;
        -o-transition: .6s;
        transition: .6s;
        margin: 0 auto
    }

    .preloader .preloader-circle {
        width: 100px;
        height: 100px;
        position: relative;
        border-style: solid;
        border-width: 1px;
        border-top-color: var(--themecolor);
        border-bottom-color: transparent;
        border-left-color: transparent;
        border-right-color: transparent;
        z-index: 10;
        border-radius: 50%;
        -webkit-box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
        box-shadow: 0 1px 5px 0 rgba(35, 181, 185, 0.15);
        background-color: #fff;
        -webkit-animation: zoom 2000ms infinite ease;
        animation: zoom 2000ms infinite ease;
        -webkit-transition: .6s;
        -o-transition: .6s;
        transition: .6s
    }

    .preloader .preloader-circle2 {
        border-top-color: #0078ff
    }

    .preloader .preloader-img {
        position: absolute;
        top: 50%;
        z-index: 200;
        left: 0;
        right: 0;
        margin: 0 auto;
        text-align: center;
        display: inline-block;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        padding-top: 6px;
        -webkit-transition: .6s;
        -o-transition: .6s;
        transition: .6s
    }

    .preloader .preloader-img img {
        max-width: 55px
    }

    .preloader .pere-text strong {
        font-weight: 800;
        color: #dca73a;
        text-transform: uppercase
    }

    @-webkit-keyframes zoom {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: all .1s ease-out 0s;
            -moz-transition: all .1s ease-out 0s;
            -ms-transition: all .1s ease-out 0s;
            -o-transition: all .1s ease-out 0s;
            transition: all .1s ease-out 0s
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
            -webkit-transition: all .1s ease-out 0s;
            -moz-transition: all .1s ease-out 0s;
            -ms-transition: all .1s ease-out 0s;
            -o-transition: all .1s ease-out 0s;
            transition: all .1s ease-out 0s
        }
    }

    @keyframes zoom {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: all .1s ease-out 0s;
            -moz-transition: all .1s ease-out 0s;
            -ms-transition: all .1s ease-out 0s;
            -o-transition: all .1s ease-out 0s;
            transition: all .1s ease-out 0s
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
            -webkit-transition: all .1s ease-out 0s;
            -moz-transition: all .1s ease-out 0s;
            -ms-transition: all .1s ease-out 0s;
            -o-transition: all .1s ease-out 0s;
            transition: all .1s ease-out 0s
        }
    }

    .bounce-animate {
        animation-name: float-bob;
        animation-duration: 2s;
        animation-iteration-count: infinite;
        -moz-animation-name: float-bob;
        -moz-animation-duration: 2s;
        -moz-animation-iteration-count: infinite;
        -moz-animation-timing-function: linear;
        -ms-animation-name: float-bob;
        -ms-animation-duration: 2s;
        -ms-animation-iteration-count: infinite;
        -ms-animation-timing-function: linear;
        -o-animation-name: float-bob;
        -o-animation-duration: 2s;
        -o-animation-iteration-count: infinite;
        -o-animation-timing-function: linear
    }

    @-webkit-keyframes float-bob {
        0% {
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px)
        }

        50% {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        100% {
            -webkit-transform: translateY(-20px);
            transform: translateY(-20px)
        }
    }

    .heartbeat {
        animation: heartbeat 1s infinite alternate
    }

    @-webkit-keyframes heartbeat {
        to {
            -webkit-transform: scale(1.03);
            transform: scale(1.03)
        }
    }

    .rotateme {
        -webkit-animation-name: rotateme;
        animation-name: rotateme;
        -webkit-animation-duration: 30s;
        animation-duration: 30s;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear
    }

    @keyframes rotateme {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    @-webkit-keyframes rotateme {
        from {
            -webkit-transform: rotate(0deg)
        }

        to {
            -webkit-transform: rotate(360deg)
        }
    }

    .slick-initialized .slick-slide {
        outline: 0
    }

    .running {
        animation: nudge 10s linear infinite alternate
    }

    @keyframes nudge {

        0%,
        100% {
            transform: translate(0, 0)
        }

        50% {
            transform: translate(-100px, 0);

            @media (max-width: 575px) {
                transform: translate(-50px, 0) !important
            }
        }

        80% {
            transform: translate(100px, 0);

            @media (max-width: 575px) {
                transform: translate(50px, 0) !important
            }
        }
    }

    .nice-select {
        width: 100%;
        height: 45px;
        background: #fff;
        border-radius: 30px;
        padding: 11px 19px 11px 18px;
        color: #140C40;
        line-height: 20px;
        border: 1px solid #EEE1E0;
        margin-bottom: 30px
    }

    @media (max-width: 575px) {
        .nice-select {
            padding-left: 25px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .nice-select {
            padding-left: 25px
        }
    }

    .nice-select .list {
        width: 100%
    }

    .nice-select.open .list {
        width: 100%;
        border-radius: 0;
        border: 0
    }

    .nice-select::after {
        border-bottom: 3px solid #BBB9B5 !important;
        border-right: 3px solid #BBB9B5 !important;
        height: 9px;
        width: 9px;
        margin-top: -6px;
        right: 29px
    }

    .nice-select:focus {
        border-color: #EEE1E0
    }

    .section-padding {
        padding-top: 120px;
        padding-bottom: 120px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .section-padding {
            padding-top: 100px;
            padding-bottom: 100px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .section-padding {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    @media (max-width: 575px) {
        .section-padding {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    .top-padding {
        padding-top: 120px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .top-padding {
            padding-top: 100px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .top-padding {
            padding-top: 70px
        }
    }

    @media (max-width: 575px) {
        .top-padding {
            padding-top: 70px
        }
    }

    .top-padding2 {
        padding-top: 80px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .top-padding2 {
            padding-top: 70px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .top-padding2 {
            padding-top: 70px
        }
    }

    @media (max-width: 575px) {
        .top-padding2 {
            padding-top: 70px
        }
    }

    .bottom-padding {
        padding-bottom: 120px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .bottom-padding {
            padding-bottom: 100px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .bottom-padding {
            padding-bottom: 70px
        }
    }

    @media (max-width: 575px) {
        .bottom-padding {
            padding-bottom: 70px
        }
    }

    .bottom-padding2 {
        padding-bottom: 90px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .bottom-padding2 {
            padding-bottom: 70px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .bottom-padding2 {
            padding-bottom: 70px
        }
    }

    @media (max-width: 575px) {
        .bottom-padding2 {
            padding-bottom: 70px
        }
    }

    .testimonial-padding {
        padding-top: 80px;
        padding-bottom: 80px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .testimonial-padding {
            padding-top: 80px;
            padding-bottom: 80px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .testimonial-padding {
            padding-top: 80px;
            padding-bottom: 80px
        }
    }

    @media (max-width: 575px) {
        .testimonial-padding {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    .w-padding {
        padding-top: 85px;
        padding-bottom: 80px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .w-padding {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    @media (max-width: 575px) {
        .w-padding {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    .w-padding2 {
        padding: 40px 50px
    }

    @media (max-width: 575px) {
        .w-padding2 {
            padding: 40px 20px
        }
    }

    .footer-padding {
        padding-top: 63px;
        padding-bottom: 60px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .footer-padding {
            padding-top: 60px;
            padding-bottom: 20px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .footer-padding {
            padding-top: 60px;
            padding-bottom: 20px
        }
    }

    @media (max-width: 575px) {
        .footer-padding {
            padding-top: 60px;
            padding-bottom: 0px
        }
    }

    .footer-padding.footer-padding2 {
        padding-top: 0px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .section-tittle {
            margin-bottom: 50px
        }
    }

    @media (max-width: 575px) {
        .section-tittle {
            margin-bottom: 50px
        }
    }

    .section-tittle p {
        color: #6A6063;
        font-size: 18px;
        font-weight: 400;
        line-height: 1.5
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .section-tittle p br {
            display: none
        }
    }

    @media (max-width: 575px) {
        .section-tittle p br {
            display: none
        }
    }

    .section-tittle p a {
        text-decoration: underline
    }

    .section-tittle>span {
        color: #7EA0FF;
        font-size: 16px;
        font-weight: 400;
        margin-bottom: 10px;
        text-transform: capitalize;
        display: inline-block;
        letter-spacing: 0.05em
    }

    @media (max-width: 575px) {
        .section-tittle>span {
            font-size: 14px;
            padding-left: 0px
        }
    }

    .section-tittle h2 {
        font-size: 34px;
        display: block;
        font-weight: 500;
        line-height: 1.4;
        margin-bottom: 22px
    }

    @media only screen and (min-width: 1200px) and (max-width: 1400px) {
        .section-tittle h2 {
            font-size: 30px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .section-tittle h2 {
            font-size: 30px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .section-tittle h2 {
            font-size: 30px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .section-tittle h2 {
            font-size: 30px
        }
    }

    @media (max-width: 575px) {
        .section-tittle h2 {
            font-size: 24px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .section-tittle h2 br {
            display: none
        }
    }

    @media (max-width: 575px) {
        .section-tittle h2 br {
            display: none
        }
    }

    .section-tittle.section-tittle2 h2 {
        color: #fff;
        font-size: 44px;
        line-height: 1.3;
        font-weight: 500
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .section-tittle.section-tittle2 {
            margin-bottom: 0px
        }
    }

    @media (max-width: 575px) {
        .section-tittle.section-tittle2 {
            margin-bottom: 0px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .small-tittle {
            margin-bottom: 50px
        }
    }

    @media (max-width: 575px) {
        .small-tittle {
            margin-bottom: 50px
        }
    }

    .small-tittle h4 {
        font-size: 16px;
        display: block;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 22px
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .small-tittle h4 {
            font-size: 16px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .small-tittle h4 {
            font-size: 16px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .small-tittle h4 {
            font-size: 16px
        }
    }

    @media (max-width: 575px) {
        .small-tittle h4 {
            font-size: 16px
        }
    }

    .small-tittle p {
        color: #301A22;
        font-size: 18px;
        font-weight: 400;
        line-height: 1.5
    }

    .small-tittle p a {
        text-decoration: underline
    }

    .section-img-bg {
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed
    }

    .section-img-bg2 {
        background-size: cover !important;
        background-repeat: no-repeat !important
    }

    .btn {
        background: var(--themecolor);
        font-family: "Jost", sans-serif;
        text-transform: inherit !important;
        padding: 22px 32px;
        color: #fff !important;
        cursor: pointer;
        display: inline-block;
        font-size: 16px !important;
        font-weight: 500 !important;
        border-radius: 15px;
        line-height: 1;
        line-height: 0;
        cursor: pointer;
        -moz-user-select: none;
        transition: color 0.4s linear;
        position: relative;
        z-index: 1;
        border: 0;
        overflow: hidden
    }

    .btn::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 102%;
        height: 102%;
        background: #cf0f0f;
        z-index: 1;
        border-radius: 0px;
        transition: transform 0.5s;
        transition-timing-function: ease;
        transform-origin: 0 0;
        transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
        transform: scaleX(0);
        border-radius: 0px
    }

    .btn i {
        padding-right: 11px
    }

    .btn:hover {
        color: #fff !important
    }

    .btn:hover::before {
        transform: scaleX(1);
        z-index: -1
    }

    .btn.slider-btn {
        padding: 35px 60px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .btn.slider-btn {
            padding: 30px 30px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .btn.slider-btn {
            padding: 28px 25px
        }
    }

    @media (max-width: 575px) {
        .btn.slider-btn {
            padding: 24px 21px
        }
    }

    .btn.slider-btn:hover::before {
        background: var(--themecolor) !important
    }

    .btn_0 {
        border: none;
        padding: 14px 34px !important;
        text-transform: uppercase !important;
        border-radius: 0px;
        font-size: 16px !important;
        font-weight: 600 !important;
        display: inline-block !important;
        cursor: pointer;
        color: #fff !important;
        display: inline-block;
        -webkit-transition: all .5s ease-out 0s;
        -moz-transition: all .5s ease-out 0s;
        -ms-transition: all .5s ease-out 0s;
        -o-transition: all .5s ease-out 0s;
        transition: all .5s ease-out 0s;
        background-image: linear-gradient(to bottom, #ff8400, #ff5800 0%, #ff8400);
        background-position: top;
        background-size: 200%;
        box-shadow: 0 15px 20px rgba(66, 63, 141, 0.12)
    }

    .btn_0 i {
        color: #ffffff;
        font-size: 13px;
        font-weight: 500;
        position: relative;
        left: 26px;
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s
    }

    .btn_0:hover i {
        left: 30px
    }

    .btn_0:hover {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        background-position: top;
        background-image: linear-gradient(to top, #ff8400, #ff5800 0%, #ff8400);
        color: #fff
    }

    .btn_10 {
        color: #fff;
        border: none;
        padding: 14px 34px;
        text-transform: capitalize;
        border-radius: 0px;
        font-size: 16px;
        font-weight: 600;
        display: inline-block;
        border-radius: 30px;
        box-shadow: 0 15px 20px rgba(66, 63, 141, 0.12)
    }

    .btn_10 i {
        color: #ffffff;
        font-size: 13px;
        font-weight: 500;
        position: relative;
        left: 26px;
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s
    }

    .btn_10:hover i {
        left: 30px
    }

    .btn_10.get-btn {
        padding: 14px 47px
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .btn_10.get-btn {
            padding: 14px 27px
        }
    }

    @media (max-width: 575px) {
        .btn_10.get-btn {
            padding: 14px 27px
        }
    }

    .border-btn {
        border: 1px solid #fff;
        color: #fff;
        background: none;
        text-transform: normal;
        padding: 17px 39px !important;
        -moz-user-select: none;
        cursor: pointer;
        display: inline-block;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 1px;
        position: relative;
        transition: color 0.4s linear;
        position: relative;
        overflow: hidden;
        border-radius: 30px;
        z-index: 1
    }

    .border-btn i {
        color: #fff !important;
        font-size: 16px;
        margin-right: 10px;
        color: var(--themecolor);
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .border-btn::before {
        border: 1px solid transparent;
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 101%;
        height: 101%;
        background: #fff;
        z-index: -1;
        transition: transform 0.5s;
        transition-timing-function: ease;
        transform-origin: 0 0;
        transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
        transform: scaleY(0);
        border-radius: 0
    }

    .border-btn.border-btn2 {
        border: 1px solid var(--themecolor) !important;
        color: var(--themecolor) !important;
        border-radius: 30px
    }

    .border-btn.border-btn2:hover {
        color: #fff !important
    }

    .border-btn.border-btn2:hover::before {
        border: 1px solid transparent !important;
        background: var(--themecolor)
    }

    .border-btn:hover {
        color: var(--themecolor)
    }

    .border-btn:hover::before {
        transform: scaleY(1);
        border: 1px solid transparent
    }

    .border-btn:hover i {
        color: var(--themecolor) !important
    }

    .about-btn {
        padding: 30px 40px
    }

    .blog-btn {
        text-transform: uppercase !important;
        padding: 15px 18px;
        font-size: 13px !important;
        line-height: 1px
    }

    .browse-btn {
        color: #CEBD9C !important;
        font-weight: 500;
        font-size: 16px;
        position: relative;
        display: inline-block
    }

    .browse-btn::before {
        position: absolute;
        content: "";
        background: #CEBD9C;
        width: 100%;
        height: 2px;
        bottom: -2px
    }

    .browse-btn:hover {
        color: var(--themecolor);
        letter-spacing: 1px
    }

    .browse-btn.browse-btn2 {
        color: #fff
    }

    .browse-btn.browse-btn2::before {
        background: #fff
    }

    .header-btn {
        padding: 25px 34px !important;
        display: inline-block !important
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-btn {
            padding: 17px 12px !important;
            font-size: 14px !important
        }
    }

    @media (max-width: 575px) {
        .header-btn {
            padding: 17px 12px !important;
            font-size: 14px !important
        }
    }

    .header-btn::after {
        position: unset !important
    }

    .header-btn i {
        padding-right: 9px;
        font-size: 17px;
        color: #fff
    }

    .header-btn2 {
        padding: 20px 32px !important;
        font-size: 16px !important;
        font-weight: 400 !important
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .header-btn2 {
            display: none
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-btn2 {
            padding: 16px 18px !important;
            font-size: 13px !important
        }
    }

    @media (max-width: 575px) {
        .header-btn2 {
            padding: 16px 18px !important;
            font-size: 13px !important
        }
    }

    .hero-btn {
        padding: 29px 45px
    }

    .cal-btn i {
        color: #09cc7f !important;
        font-size: 31px;
        font-weight: 300;
        margin-right: 10px
    }

    .cal-btn>p {
        color: #072366 !important;
        font-weight: 700;
        font-size: 16px;
        display: inline-block;
        margin: 0 !important;
        position: relative;
        top: -7px
    }

    .slider-btn2 {
        color: #fff;
        font-size: 16px;
        font-weight: 500;
        text-decoration: underline;
        padding: 17px 24px;
        display: inline-block
    }

    .slider-btn2:hover {
        color: #fff !important;
        text-decoration: underline !important;
        letter-spacing: 0.2px
    }

    @media (max-width: 575px) {
        .slider-btn2 {
            padding-left: 0
        }
    }

    .black-btn {
        padding: 14px 35px;
        background: #000;
        display: inline-block
    }

    .black-btn::before {
        background: #331391
    }

    .borders-btn {
        padding: 10px 64px;
        background: none;
        border: 1px solid var(--themecolor);
        display: inline-block;
        color: var(--themecolor);
        border-radius: 30px;
        text-transform: uppercase
    }

    .submit-btn {
        width: 100%;
        background: var(--themecolor);
        font-family: "Jost", sans-serif;
        text-transform: inherit !important;
        padding: 25px 43px;
        color: #fff !important;
        cursor: pointer;
        display: inline-block;
        font-size: 16px !important;
        font-weight: 500 !important;
        border-radius: 35px;
        line-height: 1;
        line-height: 0;
        cursor: pointer;
        -moz-user-select: none;
        transition: color 0.4s linear;
        position: relative;
        z-index: 1;
        border: 0;
        overflow: hidden
    }

    .submit-btn::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 101%;
        height: 101%;
        background: #292621;
        z-index: 1;
        border-radius: 5px;
        transition: transform 0.5s;
        transition-timing-function: ease;
        transform-origin: 0 0;
        transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
        transform: scaleX(0);
        border-radius: 0px
    }

    .submit-btn:hover {
        color: #fff !important
    }

    .submit-btn:hover::before {
        transform: scaleX(1);
        z-index: -1
    }

    .submit-btn i {
        font-size: 20px;
        margin-right: 10px;
        color: #fff;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .submit-btn.download-btn {
        border-radius: 0;
        padding: 20px 43px
    }

    .submit-btn2 {
        background: var(--themecolor);
        height: 50px;
        padding: 10px 36px;
        border: 0;
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        border-radius: 0px;
        text-transform: capitalize;
        font-weight: 400;
        letter-spacing: 1px
    }

    .white-btn {
        background: #fff;
        padding: 25px 36px;
        font-size: 14px;
        font-weight: 500;
        text-transform: capitalize;
        color: #222222;
        border-radius: 25px;
        cursor: pointer;
        display: inline-block;
        line-height: 0;
        -moz-user-select: none;
        cursor: pointer;
        transition: color 0.4s linear;
        position: relative;
        z-index: 1;
        border: 0;
        overflow: hidden
    }

    @media (max-width: 575px) {
        .white-btn {
            padding: 25px 18px
        }
    }

    .white-btn::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 101%;
        height: 101%;
        background: var(--themecolor);
        z-index: 1;
        border-radius: 5px;
        transition: transform 0.5s;
        transition-timing-function: ease;
        transform-origin: 0 0;
        transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
        transform: scaleX(0);
        border-radius: 0
    }

    .white-btn.white-btn2 {
        padding: 20px 29px
    }

    .white-btn.white-btn3 {
        padding: 25px 54px;
        border-radius: 30px;
        color: #777
    }

    .white-btn:hover {
        color: #fff !important;
        box-shadow: 0px 3px 31px 2px rgba(207, 207, 207, 0.7)
    }

    .white-btn:hover::before {
        transform: scaleX(1);
        z-index: -1
    }

    .btn_1 {
        background: #292621;
        font-weight: 500;
        border: 1px solid #292621;
        text-transform: uppercase;
        color: #fff !important;
        display: inline-block;
        padding: 15px 47px;
        line-height: 16px;
        font-size: 14px
    }

    .btn_1:hover {
        background: none;
        border: 1px solid #292621;
        color: #292621 !important
    }

    .btn_2 {
        color: #fff !important;
        border: 1px solid #fff;
        display: inline-block;
        padding: 15px 39px;
        text-transform: capitalize;
        font-size: 13px
    }

    .btn_2:hover {
        background-color: #fff;
        border: 1px solid #fff;
        color: var(--themecolor) !important
    }

    .btn_02 {
        color: #301A22 !important;
        border: 1px solid #edeff2;
        display: inline-block;
        padding: 5px 21px;
        text-transform: capitalize;
        font-size: 13px;
        border-radius: 4px
    }

    .btn_02:hover {
        background-color: #fff;
        border: 1px solid var(--themecolor);
        color: var(--themecolor) !important
    }

    .btn_01 {
        color: #292621 !important;
        border: 1px solid #d7dbe3;
        display: inline-block;
        padding: 14px 33px;
        text-transform: capitalize;
        font-size: 13px;
        background: #fff
    }

    .btn_01:hover {
        background-color: #fff;
        border: 1px solid var(--themecolor);
        color: var(--themecolor) !important
    }

    .product_btn {
        font-size: 12px;
        background-color: var(--themecolor);
        display: inline-block;
        color: #fff;
        padding: 2px 15px;
        text-transform: uppercase;
        border: 1px solid var(--themecolor)
    }

    .product_btn:hover {
        border: 1px solid var(--themecolor);
        background-color: transparent;
        color: var(--themecolor)
    }

    .btn.focus,
    .btn:focus {
        outline: 0;
        box-shadow: none
    }

    .btn.focus,
    .btn:focus {
        outline: 0;
        box-shadow: none
    }

    .fb-btn {
        background: #3b5997;
        padding: 15px 26px
    }

    .fb-btn:hover::before {
        background: var(--themecolor) !important
    }

    .twit-btn {
        background: #1da1f2;
        padding: 15px 26px
    }

    .twit-btn:hover::before {
        background: var(--themecolor) !important
    }

    .more-btn {
        color: #F1FBFF;
        font-size: 16px
    }

    .more-btn:hover {
        letter-spacing: 0.3px
    }

    .more-btn i {
        -ms-transform: rotate(20deg);
        transform: rotate(45deg);
        display: inline-block;
        line-height: 1;
        font-size: 18px;
        font-weight: 700;
        position: relative;
        top: 3px;
        left: 5px
    }

    .boxed-btn {
        background: #fff;
        color: var(--themecolor) !important;
        display: inline-block;
        padding: 18px 44px;
        font-family: "Jost", sans-serif;
        font-size: 14px;
        font-weight: 400;
        border: 0;
        border: 1px solid var(--themecolor);
        text-align: center;
        color: var(--themecolor);
        cursor: pointer
    }

    .boxed-btn:hover {
        background: var(--themecolor);
        color: #fff !important;
        border: 1px solid var(--themecolor)
    }

    .boxed-btn:focus {
        outline: none
    }

    .boxed-btn.large-width {
        width: 220px
    }

    .boxed-btn2 {
        padding: 4px 20px !important
    }

    .full-menu {
        padding: 35px 55px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .full-menu {
            float: left;
            margin-bottom: 30px;
            padding: 29px 55px
        }
    }

    @media (max-width: 575px) {
        .full-menu {
            float: left;
            margin-bottom: 30px;
            padding: 29px 55px
        }
    }

    .share-btn {
        border-radius: 50%;
        padding: 12px 17px !important
    }

    .share-btn i {
        margin: 0
    }

    .header-area .header-top {
        background: #fff;
        padding: 8px 0px;
        border-bottom: 1px solid #edeff2
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .header-area .header-top {
            padding: 8px 0px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-area .header-top {
            padding: 17px 0px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-area .header-top {
            padding: 17px 0px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-area .header-top .header-info-left {
            display: none
        }
    }

    .header-area .header-top .header-info-left ul li {
        margin-right: 15px;
        padding-right: 15px;
        display: inline-block
    }

    .header-area .header-top .header-info-left ul li:last-child {
        margin-right: 0px;
        padding-right: 0;
        border-right: 0
    }

    .header-area .header-top .header-info-left ul li a {
        color: #292621;
        font-size: 14px
    }

    .header-area .header-top .header-info-left ul li i {
        margin-right: 12px;
        color: #74706B
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-area .header-top .header-info-left ul li {
            margin-right: 10px;
            font-size: 13px
        }
    }

    .header-area .header-top .header-info-right ul.order-list li {
        margin-right: 15px;
        padding-right: 15px;
        border-right: 1px solid #edeff2;
        display: inline-block
    }

    .header-area .header-top .header-info-right ul.order-list li:last-child {
        margin-right: 0px
    }

    .header-area .header-top .header-info-right ul.order-list li a {
        color: #292621;
        font-size: 14px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-area .header-top .header-info-right ul.order-list li {
            margin-right: 10px;
            font-size: 13px
        }
    }

    .header-area .header-top .header-info-right .header-social li {
        display: inline-block
    }

    .header-area .header-top .header-info-right .header-social li a {
        color: #74706B;
        font-size: 14px;
        padding-left: 14px
    }

    .header-area .header-top .header-info-right .header-social li a i {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        transform: rotateY(0deg);
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        -o-transform: rotateY(0deg)
    }

    .header-area .header-top .header-info-right .header-social li a:hover i {
        color: var(--themecolor);
        transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        -o-transform: rotateY(180deg)
    }

    .header-area .header-mid {
        background: #fff
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-area .header-mid {
            padding: 15px 0px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-area .header-mid {
            padding: 15px 0px
        }
    }

    @media (max-width: 575px) {
        .header-area .header-mid {
            padding: 15px 0px
        }
    }

    .header-area .header-mid .menu-wrapper {
        display: flex;
        align-content: center;
        justify-content: space-between;
        /* flex-wrap:wrap; */
        align-items: center;
        padding: 1rem 0;
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li {
        display: inline-block;
        position: relative;
        z-index: 1
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li a {
        font-size: 16px;
        font-family: "Jost", sans-serif;
        color: #141517;
        font-weight: 600;
        padding: 34px 21px;
        display: inline-block;
        text-transform: capitalize;
        display: block;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .header-area .header-mid .menu-wrapper .main-menu ul li a {
            padding: 41px 10px
        }
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li a i {
        color: #292621;
        margin-left: 2px;
        font-size: 12px
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li:hover>a {
        color: var(--themecolor)
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li.new {
        position: relative
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li.new::before {
        position: absolute;
        content: "New";
        background: var(--themecolor);
        color: #fff;
        text-align: center;
        border-radius: 4px;
        font-size: 9px;
        top: 19px;
        right: 17px;
        padding: 1px 4px;
        letter-spacing: 1px;
        font-weight: 500
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li.new::after {
        position: absolute;
        height: 9px;
        width: 6px;
        background: var(--themecolor);
        content: "";
        right: 32px;
        top: 30px;
        -webkit-transform: rotate(56deg);
        -ms-transform: rotate(56deg);
        transform: rotate(56deg)
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li:hover>ul.submenu {
        visibility: visible;
        opacity: 1;
        top: 100%
    }

    .header-area .header-mid .menu-wrapper .main-menu ul li:hover>ul.submenu::before {
        top: -8px
    }

    .header-area .header-mid .menu-wrapper .main-menu ul ul.submenu {
        position: absolute;
        width: 170px;
        background: #fff;
        left: 0;
        top: 90%;
        visibility: hidden;
        opacity: 0;
        box-shadow: 0 0 10px 3px rgba(0, 0, 0, 0.05);
        padding: 17px 0;
        border-top: 3px solid var(--themecolor);
        border-radius: 7px 7px 3px 3px;
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s
    }

    .header-area .header-mid .menu-wrapper .main-menu ul ul.submenu>li {
        margin-left: 7px;
        display: block
    }

    .header-area .header-mid .menu-wrapper .main-menu ul ul.submenu>li>a {
        padding: 6px 10px !important;
        font-size: 16px;
        color: #292621;
        text-transform: capitalize
    }

    .header-area .header-mid .menu-wrapper .main-menu ul ul.submenu>li>a:hover {
        color: var(--themecolor);
        background: none;
        letter-spacing: 0.4px
    }

    .header-area .header-mid .menu-wrapper .main-menu ul ul.submenu::before {
        border-style: solid;
        border-width: 0 6px 6px 6px;
        border-color: transparent transparent red transparent;
        content: "";
        top: -5px;
        left: 13%;
        position: absolute;
        transition: .3s;
        z-index: -1;
        overflow: hidden;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-area .header-mid .menu-wrapper .header-right {
            margin-right: 82px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .header-area .header-mid .menu-wrapper .header-right {
            margin-right: 73px
        }
    }

    @media (max-width: 575px) {
        .header-area .header-mid .menu-wrapper .header-right {
            position: absolute;
            top: 165px;
            z-index: 3;
            right: 14px
        }
    }

    .header-area .header-mid .menu-wrapper .header-right ul {
        display: flex !important;
        justify-content: space-between
    }

    .header-area .header-mid .menu-wrapper .header-right .nav-search {
        display: inline-block
    }

    .header-area .header-mid .menu-wrapper .header-right span {
        color: #292621;
        font-size: 24px;
        cursor: pointer;
        padding: 31px 13px;
        font-weight: 400
    }

    .header-area .header-mid .menu-wrapper .header-right span:hover {
        color: var(--themecolor);
        top: -10px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-area .header-mid .menu-wrapper .header-right span {
            padding: 21px 19px
        }
    }

    @media (max-width: 575px) {
        .header-area .header-mid .menu-wrapper .header-right span {
            padding: 6px 9px;
            color: var(--themecolor)
        }
    }

    .header-area .header-mid .menu-wrapper .header-right .cart {
        position: relative
    }

    .header-area .header-mid .menu-wrapper .header-right .cart::after {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        position: absolute;
        /* content:""; */
        background: var(--themecolor);
        color: #fff;
        text-align: center;
        border-radius: 50%;
        font-size: 12px;
        top: -7px;
        right: 0px;
        padding: 1px 7px
    }

    .header-area .header-mid .menu-wrapper .header-right .cart:hover::after {
        top: -9px
    }

    .header-area .header-bottom {
        background: #16161a;
        padding: 11px 0px
    }

    .header-area .header-bottom p {
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        margin: 0
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .header-sticky.sticky-bar {
            padding: 22px 0px
        }
    }

    @media (max-width: 575px) {
        .header-sticky.sticky-bar .header-right {
            display: none
        }
    }

    .mobile_menu {
        position: absolute;
        right: 0px;
        width: 100%;
        z-index: 99
    }

    .mobile_menu .slicknav_menu {
        background: transparent;
        margin-top: 0px !important
    }

    .mobile_menu .slicknav_menu .slicknav_btn {
        top: -45px;
        right: 15px
    }

    @media (min-width: 425px) {
        .mobile_menu .slicknav_menu .slicknav_btn {
            top: -50px;
        }
    }

    @media (min-width: 768px) {
        .mobile_menu .slicknav_menu .slicknav_btn {
            top: -52px;
        }
    }

    .mobile_menu .slicknav_menu .slicknav_btn .slicknav_icon-bar {
        background-color: var(--themecolor) !important
    }

    .mobile_menu .slicknav_menu .slicknav_nav {
        margin-top: 8px !important
    }

    .mobile_menu .slicknav_menu .slicknav_nav a:hover {
        background: transparent;
        color: var(--themecolor)
    }

    .mobile_menu .slicknav_menu .slicknav_nav a {
        font-size: 15px;
        padding: 7px 10px
    }

    .mobile_menu .slicknav_menu .slicknav_nav .slicknav_item a {
        padding: 0 !important
    }

    #search_input_box {
        position: fixed;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        width: 100%;
        max-width: 1296px;
        z-index: 999;
        text-align: center;
        background: var(--themecolor);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2)
    }

    #search_input_box ::placeholder {
        color: #fff
    }

    @media only screen and (min-width: 1200px) and (max-width: 1400px) {
        #search_input_box {
            max-width: 1116px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        #search_input_box {
            max-width: 936px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        #search_input_box {
            max-width: 696px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        #search_input_box {
            max-width: 516px
        }
    }

    @media (max-width: 991px) {
        #search_input_box {
            margin-top: 15px
        }
    }

    #search_input_box .search-inner {
        padding: 5px 13px
    }

    #search_input_box .form-control {
        background: transparent;
        border: 0;
        color: #ffffff;
        font-weight: 400;
        font-size: 15px;
        padding: 0;
        height: 38px
    }

    #search_input_box .form-control:focus {
        box-shadow: none
    }

    #search_input_box .btn {
        width: 0;
        height: 0;
        padding: 0;
        border: 0
    }

    #search_input_box .ti-close {
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        padding: 10px;
        padding-right: 0
    }

    #search_1 {
        padding-top: 4px
    }

    .slider-height {
        min-height: 700px;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .slider-height {
            min-height: 700px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .slider-height {
            min-height: 550px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .slider-height {
            min-height: 500px
        }
    }

    @media (max-width: 575px) {
        .slider-height {
            min-height: 410px
        }
    }

    .slider-height2 {
        min-height: 150px;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .slider-height2 {
            min-height: 200px
        }
    }

    @media (max-width: 575px) {
        .slider-height2 {
            min-height: 200px
        }
    }

    .slider-bg1 {
        background-image: url(../img/hero/h1_hero1.jpg)
    }

    .slider-bg2 {
        background-image: url(../img/hero/h1_hero2.jpg)
    }

    .slider-area,
    .slider-area2 {
        background-size: cover;
        background-repeat: no-repeat
    }

    .slider-area.slider-area2,
    .slider-area2.slider-area2 {
        background-image: url(../img/hero/hero2.jpg)
    }

    .slider-area.slider-area3,
    .slider-area2.slider-area3 {
        background-image: url(../img/hero/hero3.jpg)
    }

    .slider-area.slider-area4,
    .slider-area2.slider-area4 {
        background-image: url(../img/hero/hero4.jpg)
    }

    .slider-area.slider-area5,
    .slider-area2.slider-area5 {
        background-image: url(../img/hero/hero5.jpg)
    }

    .slider-area .hero-caption,
    .slider-area2 .hero-caption {
        text-align: center
    }

    .slider-area .hero-caption span,
    .slider-area2 .hero-caption span {
        color: var(--themecolor);
        font-family: "Clicker Script", cursive;
        font-size: 50px;
        line-height: 1.2;
        font-weight: 400;
        margin-bottom: 1px;
        display: block
    }

    @media (max-width: 575px) {

        .slider-area .hero-caption span,
        .slider-area2 .hero-caption span {
            margin-bottom: 30px;
            font-size: 56px
        }
    }

    .slider-area .hero-caption h1,
    .slider-area2 .hero-caption h1 {
        font-size: 55px;
        font-weight: 500;
        color: #292621;
        line-height: 1.3;
        margin-bottom: 2px
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {

        .slider-area .hero-caption h1,
        .slider-area2 .hero-caption h1 {
            font-size: 60px;
            line-height: 1.2
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {

        .slider-area .hero-caption h1,
        .slider-area2 .hero-caption h1 {
            font-size: 50px;
            line-height: 1.2
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {

        .slider-area .hero-caption h1,
        .slider-area2 .hero-caption h1 {
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 20px
        }
    }

    @media (max-width: 575px) {

        .slider-area .hero-caption h1,
        .slider-area2 .hero-caption h1 {
            font-size: 28px;
            line-height: 1.2;
            margin-bottom: 20px
        }
    }

    .slider-area .hero-caption p,
    .slider-area2 .hero-caption p {
        color: #74706B;
        font-size: 18px;
        font-weight: 400;
        margin-bottom: 31px;
        padding: 0 50px
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {

        .slider-area .hero-caption p,
        .slider-area2 .hero-caption p {
            font-size: 21px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {

        .slider-area .hero-caption p,
        .slider-area2 .hero-caption p {
            font-size: 20px;
            margin-bottom: 41px
        }
    }

    @media (max-width: 575px) {

        .slider-area .hero-caption p,
        .slider-area2 .hero-caption p {
            font-size: 15px;
            padding: 0 0px;
            line-height: 1.6;
            margin-bottom: 32px
        }
    }

    .slider-area .hero-caption.hero-caption2 h2,
    .slider-area2 .hero-caption.hero-caption2 h2 {
        color: #292621;
        font-size: 35px;
        font-weight: 500;
        margin-bottom: 12px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {

        .slider-area .hero-caption.hero-caption2 h2,
        .slider-area2 .hero-caption.hero-caption2 h2 {
            font-size: 32x
        }
    }

    @media (max-width: 575px) {

        .slider-area .hero-caption.hero-caption2 h2,
        .slider-area2 .hero-caption.hero-caption2 h2 {
            font-size: 32px
        }
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin: 0
    }

    .breadcrumb a {
        color: #74706B;
        font-size: 14px;
        text-transform: capitalize;
        line-height: 1;
        font-weight: 400
    }

    .breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        display: inline-block;
        color: #74706B;
        content: "|";
        font-size: 14px;
        padding: 0 4px;
        padding-right: 8px
    }

    .hero-overly {
        position: relative;
        z-index: 0
    }

    .hero-overly::before {
        position: absolute;
        content: "";
        background-color: rgba(35, 72, 33, 0.3);
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        z-index: 1;
        background-repeat: no-repeat
    }

    .header-transparent {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 9
    }

    .slider-active button.slick-arrow {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        position: absolute;
        top: 50%;
        left: 0px;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        background: none;
        border: 0;
        padding: 0;
        z-index: 2;
        height: 100px;
        width: 50px;
        cursor: pointer;
        background: rgba(41, 38, 33, 0.2)
    }

    .slider-active button.slick-arrow:hover {
        background: #292621
    }

    .slider-active button.slick-arrow:hover i {
        color: #fff
    }

    .slider-active button.slick-arrow i {
        font-size: 20px;
        line-height: 60px
    }

    .slider-active button.slick-next {
        left: auto;
        right: 0px
    }

    .items-product1 .single-items {
        position: relative
    }

    .items-product1 .single-items .items-img {
        overflow: hidden;
        position: relative;
        z-index: 0
    }

    .items-product1 .single-items .items-img::before {
        position: absolute;
        width: 100%;
        height: 40%;
        bottom: 0;
        content: "";
        z-index: 1
    }

    .items-product1 .single-items .items-img img {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        width: 100%;
        transform: scale(1)
    }

    .items-product1 .single-items .items-details {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        position: absolute;
        left: 25px;
        bottom: 0px;
        text-align: center;
        right: 0
    }

    .items-product1 .single-items .items-details h4 a {
        color: #fff;
        font-size: 24px;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 9px
    }

    @media (max-width: 575px) {
        .items-product1 .single-items .items-details h4 a {
            font-size: 18px;
            line-height: 1.1
        }
    }

    .items-product1 .single-items .items-details p {
        color: #fff;
        font-size: 16px;
        font-weight: 300
    }

    .items-product1 .single-items .items-details .browse-btn {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        opacity: 0;
        visibility: hidden
    }

    .items-product1 .single-items:hover .items-img img {
        transform: scale(1.02)
    }

    .items-product1 .single-items:hover .items-details {
        bottom: 40px
    }

    .items-product1 .single-items:hover .items-details .browse-btn {
        opacity: 1;
        visibility: visible
    }

    .testimonial-area {
        background: #F3EAD8;
        position: relative
    }

    .testimonial-area .testimonial-caption .testimonial-top-cap img {
        margin-bottom: 30px;
        width: auto;
        display: inline-block
    }

    .testimonial-area .testimonial-caption .testimonial-top-cap h2 {
        font-size: 34px;
        font-weight: 500;
        color: #292621;
        margin-bottom: 40px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap h2 {
            margin-bottom: 30px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap h2 {
            margin-bottom: 30px
        }
    }

    @media (max-width: 575px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap h2 {
            font-size: 29px;
            margin-bottom: 20px
        }
    }

    .testimonial-area .testimonial-caption .testimonial-top-cap p {
        line-height: 1.5;
        padding: 0 200px;
        margin-bottom: 32px;
        font-size: 22px;
        color: #292621;
        font-weight: 400
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap p {
            font-size: 20px;
            padding: 0px 100px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap p {
            font-size: 18px;
            padding: 0px;
            padding: 0px 80px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap p {
            font-size: 18px;
            padding: 0px 30px;
            margin-bottom: 30px
        }
    }

    @media (max-width: 575px) {
        .testimonial-area .testimonial-caption .testimonial-top-cap p {
            font-size: 15px;
            padding: 0px;
            margin-bottom: 30px
        }
    }

    .testimonial-area .testimonial-caption .testimonial-founder .founder-text {
        margin-left: 20px;
        text-align: left
    }

    .testimonial-area .testimonial-caption .testimonial-founder .founder-text span {
        font-family: "Jost", sans-serif;
        color: #292621;
        font-size: 14px;
        font-weight: 500;
        text-align: left
    }

    @media (max-width: 575px) {
        .testimonial-area .testimonial-caption .testimonial-founder .founder-text span {
            font-size: 26px
        }
    }

    .testimonial-area .testimonial-caption .testimonial-founder .founder-text p {
        color: #74706B;
        font-weight: 500;
        line-height: 1.5
    }

    .testimonial-area .testimonial-banner {
        position: relative;
        right: -55px
    }

    @media only screen and (min-width: 1200px) and (max-width: 1400px) {
        .testimonial-area .testimonial-banner {
            left: 0px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .testimonial-area .testimonial-banner {
            left: 0px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .testimonial-area .testimonial-banner {
            left: 0px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .testimonial-area .testimonial-banner {
            left: 0px
        }
    }

    @media (max-width: 575px) {
        .testimonial-area .testimonial-banner {
            left: 0px
        }
    }

    .testimonial-area .testimonial-banner img {
        width: 100%
    }

    .testimonial-area .testimonial-shape {
        position: absolute;
        left: 0em;
        top: 31%
    }

    .h1-testimonial-active button.slick-arrow {
        position: absolute;
        top: 50%;
        left: 0px;
        transform: translateY(-50%);
        border: 0;
        padding: 0;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        line-height: 40px;
        cursor: pointer;
        background: none;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s;
        z-index: 2
    }

    @media (max-width: 575px) {
        .h1-testimonial-active button.slick-arrow {
            display: none
        }
    }

    .property-controls a {
        cursor: pointer;

    }


    .h1-testimonial-active .slick-dots li button {
        position: absolute;
        top: -2px;
        left: -2px;
        right: 0;
        bottom: 0;
        width: 14px;
        height: 14px;
        content: '';
        border: 1px solid #e6e6e6;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
    }

    .h1-testimonial-active .slick-dots li {
        width: 10px;
        height: 10px;
        margin: 5px;
        border-radius: 50%;
        background: #e6e6e6;
        position: relative;
    }

    .h1-testimonial-active button.slick-arrow i {
        color: black;
        /* rgba(41,38,33,0.3); */
        font-size: 24px
    }

    .h1-testimonial-active button.slick-next {
        left: auto;
        right: 0px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .h1-testimonial-active button.slick-next {
            right: -28px
        }
    }

    .slick-initialized .slick-slide {
        outline: 0
    }

    .categories-area {
        padding-top: 70px;
        padding-bottom: 10px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .categories-area {
            padding-top: 70px;
            padding-bottom: 10px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .categories-area {
            padding-top: 65px;
            padding-bottom: 0px
        }
    }

    @media (max-width: 575px) {
        .categories-area {
            padding-top: 65px;
            padding-bottom: 0px
        }
    }

    .categories-area .col-lg-3:nth-child(4) .single-cat::before {
        background: 0
    }

    .categories-area .single-cat {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        z-index: 1;
        position: relative
    }

    .categories-area .single-cat::before {
        position: absolute;
        content: "";
        width: 1px;
        height: 95%;
        background: #edeff2;
        bottom: 0;
        right: -2%;
        top: 1%
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .categories-area .single-cat::before {
            position: unset
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .categories-area .single-cat::before {
            position: unset
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .categories-area .single-cat::before {
            position: unset
        }
    }

    @media (max-width: 575px) {
        .categories-area .single-cat::before {
            position: unset
        }
    }

    .categories-area .single-cat .cat-icon img {
        margin-bottom: 26px;
        display: inline-block
    }

    .categories-area .single-cat .cat-cap h5 {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 12px;
        display: block;
        text-transform: capitalize;
        color: #2B2B2B;
        font-family: "Jost", sans-serif
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .categories-area .single-cat .cat-cap h5 {
            font-size: 17px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .categories-area .single-cat .cat-cap h5 {
            font-size: 17px
        }
    }

    @media (max-width: 575px) {
        .categories-area .single-cat .cat-cap h5 {
            font-size: 23px
        }
    }

    .categories-area .single-cat .cat-cap p {
        color: #57667e;
        font-size: 16px;
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .categories-area .single-cat .cat-cap p {
            font-size: 15px
        }
    }

    .categories-area .single-cat .cat-cap a {
        color: #1c165c;
        font-size: 16px;
        font-weight: 600;
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s
    }

    .categories-area .single-cat:hover .cat-cap h5 {
        color: #000
    }

    .services-area2 .single-services {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        background-color: #000000;
        border-radius: 25px;
        padding: 29px 20px 29px 80px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .services-area2 .single-services {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 29px 20px 29px 40px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .services-area2 .single-services {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 29px 20px 29px 40px;
            margin-bottom: 40px
        }
    }

    @media (max-width: 575px) {
        .services-area2 .single-services {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 29px 20px 29px 20px;
            margin-bottom: 40px
        }
    }

    @media (max-width: 575px) {
        .services-area2 .single-services img {
            width: 100%
        }
    }

    .services-area2 .single-services .features-caption {
        /* margin-left:50px; */
        width: 100%;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .services-area2 .single-services .features-caption {
            margin-left: 0px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .services-area2 .single-services .features-caption {
            margin-left: 0px
        }
    }

    @media (max-width: 575px) {
        .services-area2 .single-services .features-caption {
            margin-left: 0px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .services-area2 .single-services .features-caption img {
            margin-bottom: 30px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .services-area2 .single-services .features-caption img {
            margin-bottom: 30px
        }
    }

    @media (max-width: 575px) {
        .services-area2 .single-services .features-caption img {
            margin-bottom: 30px
        }
    }

    .services-area2 .single-services .features-caption h3 {
        color: #fff;
        font-size: 40px;
        line-height: 1.2;
        margin-bottom: 9px;
        font-weight: 400;
        display: block
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .services-area2 .single-services .features-caption h3 {
            font-size: 24px
        }
    }

    @media (max-width: 575px) {
        .services-area2 .single-services .features-caption h3 {
            font-size: 24px
        }
    }

    .services-area2 .single-services .features-caption p {
        font-size: 14px;
        line-height: 1.5;
        color: #fff;
        margin-bottom: 30px
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .services-area2 .single-services .features-caption p {
            font-size: 15px
        }
    }

    @media (max-width: 575px) {
        .services-area2 .single-services .features-caption p {
            font-size: 15px
        }
    }

    .services-area2 .single-services .features-caption .review .rating {
        display: inline-block
    }

    .services-area2 .single-services .features-caption .review .rating i {
        font-size: 16px;
        color: #fff
    }

    .services-area2 .single-services .features-caption .review p {
        display: inline-block;
        font-size: 13px
    }

    .services-area2 .single-services .features-caption .price {
        display: inline-block
    }

    .services-area2 .single-services .features-caption .price span {
        font-weight: 500;
        color: #fff;
        font-size: 32px;
        margin-bottom: 9px;
        display: block
    }

    .services-active button.slick-arrow {
        position: absolute;
        border: 0;
        padding: 0;
        z-index: 2;
        cursor: pointer;
        top: 50%;
        transform: translateY(-50%);
        left: auto;
        background: none
    }

    .services-active button.slick-arrow i {
        font-size: 30px;
        color: rgba(255, 255, 255, 0.3);
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s
    }

    .services-active button.slick-arrow i:hover {
        color: #fff
    }

    .services-active button.slick-prev {
        left: 30px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .services-active button.slick-prev {
            left: -25px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .services-active button.slick-prev {
            left: -10px
        }
    }

    .services-active button.slick-next {
        right: 30px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .services-active button.slick-next {
            right: -25px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .services-active button.slick-next {
            right: -10px
        }
    }

    .nav-button nav {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: 40px;
        padding-bottom: 0px;
        position: relative;
        border-bottom: 1px solid #edeff2
    }

    @media (max-width: 575px) {
        .nav-button nav {
            border: 0
        }
    }

    .nav-button nav .nav-tabs {
        border: 0
    }

    .nav-button nav .nav-tabs .nav-item {
        display: block
    }

    @media (max-width: 575px) {
        .nav-button nav .nav-tabs .nav-item {
            font-size: 18px
        }
    }

    .nav-button nav .nav-tabs .nav-link {
        font-family: "Jost", sans-serif;
        color: #292621;
        font-size: 16px;
        font-weight: 500;
        border: 0;
        padding: 36px 12px;
        padding-top: 0;
        border-bottom: 4px solid transparent;
        margin-right: 15px
    }

    @media (max-width: 575px) {
        .nav-button nav .nav-tabs .nav-link {
            border-bottom: 0;
            margin-right: 0;
            padding: 10px 12px
        }
    }

    .nav-button nav .nav-tabs .nav-link:last-child {
        margin-right: 0
    }

    .nav-button nav .nav-tabs .nav-link.active {
        color: var(--themecolor);
        border-bottom: 4px solid var(--themecolor);
        background: none
    }

    @media (max-width: 575px) {
        .nav-button nav .nav-tabs .nav-link.active {
            border-bottom: 0
        }
    }

    .nav-button nav .nav-tabs .nav-link:hover {
        border-bottom: 4px solid var(--themecolor)
    }

    @media (max-width: 575px) {
        .nav-button nav .nav-tabs .nav-link:hover {
            border-bottom: 0
        }
    }

    .nav-button .nav-tittle h2 {
        color: #292621;
        font-size: 34px;
        font-weight: 500;
        line-height: 1.3;
        margin-bottom: 2px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .nav-button .nav-tittle h2 {
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 20px
        }
    }

    @media (max-width: 575px) {
        .nav-button .nav-tittle h2 {
            font-size: 28px;
            line-height: 1.2;
            margin-bottom: 20px
        }
    }

    .latest-items {
        padding-top: 95px;
        padding-bottom: 100px;
        text-align: center
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .latest-items {
            padding-top: 95px;
            padding-bottom: 100px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .latest-items {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    @media (max-width: 575px) {
        .latest-items {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    .latest-items.latest-items2 {
        padding: 0
    }

    .latest-items:first-child {
        margin-left: 0
    }

    .latest-items:last-child {
        margin-right: 0
    }

    .latest-items .properties {
        margin: 0 12px
    }

    .latest-items .properties .properties-card {
        background-color: #fff
    }

    .latest-items .properties .properties-card .properties-img {
        position: relative;
        overflow: hidden
    }

    .latest-items .properties .properties-card .properties-img img {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        width: 100%;
        transform: scale(1)
    }

    .latest-items .properties .properties-card .properties-img .socal_icon {
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s;
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        opacity: 0;
        visibility: hidden;
        bottom: 20px;
        text-align: center
    }

    .latest-items .properties .properties-card .properties-img .socal_icon a {
        -webkit-transition: all .5s ease-out 0s;
        -moz-transition: all .5s ease-out 0s;
        -ms-transition: all .5s ease-out 0s;
        -o-transition: all .5s ease-out 0s;
        transition: all .5s ease-out 0s;
        background: #fff;
        color: #292621;
        width: 64px;
        height: 50px;
        display: inline-block;
        font-size: 24px;
        text-align: center;
        line-height: 54px;
        margin: -3px
    }

    .latest-items .properties .properties-card .properties-img .socal_icon a:hover {
        background: var(--themecolor);
        color: #fff
    }

    .latest-items .properties .properties-card .properties-caption {
        padding: 14px 20px 2px 0px;
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s
    }

    .latest-items .properties .properties-card .properties-caption h3 a {
        color: #292621;
        font-size: 16px;
        font-weight: 400;
        margin-bottom: 6px
    }

    .latest-items .properties .properties-card .properties-caption .properties-footer {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s
    }

    @media (max-width: 575px) {
        .latest-items .properties .properties-card .properties-caption .properties-footer {
            padding: 19px 10px 20px 12px
        }
    }

    .latest-items .properties .properties-card .properties-caption .properties-footer .price span {
        color: #74706B;
        cursor: pointer;
        font-weight: 500;
        font-size: 16px
    }

    .latest-items .properties .properties-card .properties-caption .properties-footer .price span span {
        display: inline-block;
        color: #CEBD9C;
        text-decoration: line-through;
        margin: 0;
        margin-left: 12px
    }

    .latest-items .properties:hover .properties-caption h3 a {
        color: var(--themecolor)
    }

    .latest-items .properties:hover .properties-caption .properties-footer .price span {
        color: #292621
    }

    .latest-items .properties:hover .properties-img img {
        transform: scale(1.03)
    }

    .latest-items .properties:hover .properties-img .socal_icon {
        opacity: 1;
        visibility: visible
    }

    .latest-items-active button.slick-arrow {
        position: absolute;
        border: 0;
        padding: 0;
        z-index: 2;
        cursor: pointer;
        top: 50%;
        transform: translateY(-50%);
        left: auto;
        background: none
    }

    .latest-items-active button.slick-arrow i {
        font-size: 30px;
        color: rgba(32, 69, 112, 0.3);
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s
    }

    .latest-items-active button.slick-arrow i:hover {
        color: var(--themecolor)
    }

    .latest-items-active button.slick-prev {
        left: -40px
    }

    @media only screen and (min-width: 1200px) and (max-width: 1600px) {
        .latest-items-active button.slick-prev {
            left: -20px
        }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1400px) {
        .latest-items-active button.slick-prev {
            left: -30px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .latest-items-active button.slick-prev {
            left: -27px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .latest-items-active button.slick-prev {
            left: -25px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .latest-items-active button.slick-prev {
            left: -10px
        }
    }

    .latest-items-active button.slick-next {
        right: -40px
    }

    @media only screen and (min-width: 1200px) and (max-width: 1600px) {
        .latest-items-active button.slick-next {
            right: -20px
        }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1400px) {
        .latest-items-active button.slick-next {
            right: -30px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .latest-items-active button.slick-next {
            right: -27px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .latest-items-active button.slick-next {
            right: -20px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .latest-items-active button.slick-next {
            right: -10px
        }
    }

    .subscribe-area .subscribe-padding {
        padding-bottom: 40px;
        margin-bottom: 60px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.14)
    }

    .subscribe-area .subscribe-caption span {
        font-family: "Jost", sans-serif;
        text-transform: capitalize;
        font-size: 20px;
        color: var(--themecolor);
        margin-bottom: 10px;
        display: block
    }

    .subscribe-area .subscribe-caption h3 {
        color: #fff;
        font-family: "Jost", sans-serif;
        font-size: 24px;
        font-weight: 500;
        line-height: 1.3;
        margin-bottom: 12px
    }

    @media (max-width: 575px) {
        .subscribe-area .subscribe-caption h3 {
            padding: 0 0px;
            font-size: 25px
        }
    }

    @media (max-width: 575px) {
        .subscribe-area .subscribe-caption h3 {
            padding: 0 0px;
            font-size: 25px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .subscribe-area .subscribe-caption h3 {
            padding: 0 0px
        }
    }

    .subscribe-area .subscribe-caption p {
        color: #fff;
        font-size: 15px
    }

    .subscribe-area .subscribe-caption form input {
        width: 74%;
        height: 60px;
        border: 0;
        color: #000;
        background: #fff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 0;
        padding: 15px 24px;
        font-size: 16px
    }

    .subscribe-area .subscribe-caption form input::placeholder {
        color: #000;
        font-size: 16px
    }

    @media (max-width: 575px) {
        .subscribe-area .subscribe-caption form input {
            width: 100%;
            margin-bottom: 20px
        }
    }

    .subscribe-area .subscribe-caption form button.subscribe-btn {
        width: 24%;
        height: 60px;
        border: 0;
        background: var(--themecolor);
        border-radius: 0;
        padding: 13px 24px;
        color: #fff;
        margin-left: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 500
    }

    @media (max-width: 575px) {
        .subscribe-area .subscribe-caption form button.subscribe-btn {
            width: 100%;
            margin-bottom: 20px;
            margin-left: 0px
        }
    }

    .footer-wrapper {
        background: #171613
    }

    .footer-wrapper .footer-area .footer-pera p {
        color: #BBB9B5;
        font-size: 14px;
        margin-bottom: 19px;
        line-height: 1.8
    }

    .footer-wrapper .footer-area .footer-pera.footer-pera2 p {
        padding: 0
    }

    .footer-wrapper .footer-area .footer-tittle h4 {
        color: #ffffff;
        font-size: 18px;
        margin-bottom: 30px;
        font-weight: 400
    }

    .footer-wrapper .footer-area .footer-tittle ul li {
        margin-bottom: 8px
    }

    .footer-wrapper .footer-area .footer-tittle ul li a {
        color: #BBB9B5;
        font-weight: 400;
        font-size: 16px;
        text-decoration: underline transparent
    }

    .footer-wrapper .footer-area .footer-tittle ul li a:hover {
        color: #BBB9B5;
        text-decoration: underline;
        letter-spacing: .4px
    }

    .footer-wrapper .footer-area .footer-tittle ul li span {
        color: red
    }

    .footer-wrapper .footer-area .footer-tittle p {
        color: #BBB9B5;
        font-size: 16px
    }

    .footer-wrapper .footer-area .footer-form form {
        position: relative
    }

    .footer-wrapper .footer-area .footer-form form input {
        width: 100%;
        height: 50px;
        padding: 10px 20px;
        border: 1px solid #BBB9B5;
        border-radius: 30px;
        background: none;
        color: #BBB9B5
    }

    .footer-wrapper .footer-area .footer-form form input::placeholder {
        color: #BBB9B5;
        font-size: 16px
    }

    .footer-wrapper .footer-area .footer-form form .form-icon button {
        position: absolute;
        top: 0;
        right: 0;
        background: none;
        border: 0;
        cursor: pointer;
        padding: 17px 22px;
        line-height: 1;
        border-radius: 0 3px 3px 0
    }

    .footer-wrapper .footer-area .footer-form form .form-icon button i {
        color: var(--themecolor)
    }

    .footer-wrapper .footer-area .info.error {
        color: var(--themecolor)
    }

    .footer-bottom-area .footer-border {
        border-top: 1px solid rgba(255, 255, 255, 0.14);
        padding-top: 39px;
        padding-bottom: 1px
    }

    .footer-bottom-area .footer-copy-right p {
        color: #BBB9B5;
        font-weight: 300;
        font-size: 16px;
        line-height: 2
    }

    .footer-bottom-area .footer-copy-right p i {
        color: var(--themecolor)
    }

    .footer-bottom-area .footer-copy-right p a {
        color: var(--themecolor)
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .footer-social {
            padding-top: 20px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .footer-social {
            padding-top: 20px
        }
    }

    @media (max-width: 575px) {
        .footer-social {
            padding-top: 20px
        }
    }

    .footer-social a {
        color: #677F8B;
        font-size: 24px;
        display: inline-block;
        text-align: center;
        margin-left: 23px
    }

    .footer-social a i {
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        display: inline-block;
        transform: rotateY(0deg);
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        -o-transform: rotateY(0deg)
    }

    .footer-social a:hover {
        color: var(--themecolor)
    }

    .footer-social a:hover i {
        transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        -o-transform: rotateY(180deg)
    }

    @media (max-width: 575px) {
        .listing-area {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .listing-area {
            padding-top: 70px;
            padding-bottom: 70px
        }
    }

    .listing-area .count span {
        color: #001d38;
        font-size: 18px
    }

    @media (max-width: 575px) {
        .listing-area .count span {
            margin-bottom: 30px
        }
    }

    .category-listing {
        border: 1px solid #edeff2;
        padding: 30px 19px 30px 30px
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .category-listing {
            padding: 30px 19px 30px 16px
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .category-listing {
            padding: 30px 19px 30px 16px
        }
    }

    .category-listing .single-listing .input-form input {
        width: 100%;
        height: 45px;
        background: #fff;
        color: #777777;
        font-size: 18px;
        font-weight: 400;
        padding: 9px 33px 9px 18px;
        border: 1px solid #edeff2;
        border-radius: 5px;
        position: relative;
        margin-bottom: 20px
    }

    .category-listing .single-listing .select-job-items1 .nice-select,
    .category-listing .single-listing .select-job-items2 .nice-select {
        width: 100%;
        height: 45px;
        background: #fff;
        border-radius: 30px;
        padding: 11px 19px 11px 18px;
        color: #140C40;
        line-height: 20px;
        border: 1px solid #edeff2;
        margin-bottom: 20px
    }

    @media (max-width: 575px) {

        .category-listing .single-listing .select-job-items1 .nice-select,
        .category-listing .single-listing .select-job-items2 .nice-select {
            padding-left: 25px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {

        .category-listing .single-listing .select-job-items1 .nice-select,
        .category-listing .single-listing .select-job-items2 .nice-select {
            padding-left: 25px
        }
    }

    .category-listing .single-listing .select-job-items1 .nice-select .list,
    .category-listing .single-listing .select-job-items2 .nice-select .list {
        width: 100%
    }

    .category-listing .single-listing .select-job-items1 .nice-select.open .list,
    .category-listing .single-listing .select-job-items2 .nice-select.open .list {
        width: 100%;
        border-radius: 0;
        border: 0
    }

    .category-listing .single-listing .select-job-items1 .nice-select::after,
    .category-listing .single-listing .select-job-items2 .nice-select::after {
        border-bottom: 3px solid #232F55;
        border-right: 3px solid #232F55;
        height: 9px;
        width: 9px;
        margin-top: -6px;
        right: 29px
    }

    .category-listing .single-listing .select-job-items1 .nice-select:focus,
    .category-listing .single-listing .select-job-items2 .nice-select:focus {
        border-color: #EEE1E0
    }

    .category-listing .single-listing .select-Categories .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: #232F55;
        font-size: 16px
    }

    @media (max-width: 575px) {
        .category-listing .single-listing .select-Categories .container {
            font-size: 14px
        }
    }

    .category-listing .single-listing .select-Categories .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0
    }

    .category-listing .single-listing .select-Categories .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        border: 1px solid #edeff2;
        border-radius: 50%
    }

    .category-listing .single-listing .select-Categories .container input:checked~.checkmark {
        background-color: var(--themecolor);
        border: 2px solid transparent
    }

    .category-listing .single-listing .select-Categories .checkmark:after {
        content: "";
        position: absolute;
        display: none
    }

    .category-listing .single-listing .select-Categories .container input:checked~.checkmark:after {
        display: block
    }

    .category-listing .single-listing .select-Categories .container .checkmark::after {
        left: 6px;
        top: 2px;
        width: 7px;
        height: 12px;
        border: solid white;
        border-width: 0px 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg)
    }

    .range_item p {
        margin-bottom: 0
    }

    .price_value input {
        border: 0px;
        text-align: center;
        max-width: 50px;
        background-color: transparent
    }

    .price_value {
        align-items: center
    }

    .irs-to,
    .irs-from,
    .irs-max,
    .irs-min {
        display: none
    }

    .price_rangs_aside .l_w_title h3 {
        line-height: 20px;
        margin-bottom: 0px
    }

    .irs-bar {
        height: 2px;
        top: 33px;
        border-top: 1px solid #ff3368;
        border-bottom: 1px solid #ff3368;
        background: #ff3368;
        background: linear-gradient(to top, #ff3368 0%, #ff3368 100%)
    }

    .irs-line {
        height: 2px;
        top: 33px;
        background: linear-gradient(to bottom, #ffeaef -50%, #ffeaef 150%);
        border: 1px solid #edeff2;
        border-radius: 16px;
        -moz-border-radius: 16px
    }

    .irs-slider {
        height: 15px;
        width: 15px;
        border: 1px solid #ff3368;
        background-color: #ff3368;
        background: #fff;
        top: 26px;
        box-shadow: none;
        border-radius: 4px
    }

    @media (max-width: 991px) {
        .product_bar_item {
            width: 100% !important
        }
    }

    @media (max-width: 991px) {
        .product_top_bar {
            margin-top: 70px
        }

        .product_top_bar h2 {
            font-size: 25px
        }

        .product_bar_single {
            margin-left: 0;
            margin-right: 5px
        }

        .product_bar_single .nice-select {
            padding-left: 15px;
            padding-right: 35px
        }
    }

    .single-product {
        text-align: center;
        margin-bottom: 50px
    }

    .single-product .product-img {
        position: relative;
        overflow: hidden
    }

    .single-product .product-img .p_icon {
        width: 90%;
        padding: 7px 30px;
        position: absolute;
        bottom: -100px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        background: rgba(255, 32, 32, 0.4);
        transition: all 400ms ease
    }

    .single-product .product-img .p_icon a {
        display: inline-block;
        height: 36px;
        line-height: 40px;
        width: 36px;
        text-align: center;
        background: #fff;
        border-radius: 30px;
        color: #2a2a2a;
        margin-right: 25px
    }

    .single-product .product-img .p_icon a:last-child {
        margin-right: 0px
    }

    .single-product .product-img .p_icon a:hover {
        color: #fff;
        background: var(--themecolor)
    }

    .single-product .product-btm {
        padding: 22px 25px 18px;
        border: 1px solid #f0f2f1;
        text-align: left
    }

    .single-product .product-btm h4 {
        color: #4a4a4a;
        font-size: 14px;
        font-weight: 400;
        text-transform: uppercase;
        margin-bottom: 0px;
        -webkit-transition: all .2s ease-out 0s;
        -moz-transition: all .2s ease-out 0s;
        -ms-transition: all .2s ease-out 0s;
        -o-transition: all .2s ease-out 0s;
        transition: all .2s ease-out 0s
    }

    .single-product .product-btm h5 {
        margin-bottom: 0px;
        font-size: 18px;
        color: #797979
    }

    .single-product .product-btm span {
        font-size: 20px;
        font-weight: 500;
        line-height: 16px;
        color: #2a2a2a
    }

    .single-product:hover .product-img .p_icon {
        bottom: 0px
    }

    .single-product:hover .product-btm h4 {
        color: var(--themecolor)
    }

    .new_product {
        background: #f6f6f6;
        padding: 90px 15px;
        text-align: center
    }

    .new_product .product-img {
        padding: 90px 0px
    }

    .new_product h5 {
        font-size: 20px;
        color: #4a4a4a;
        margin-bottom: 20px
    }

    .new_product h3 {
        font-size: 32px;
        font-weight: 700
    }

    .new_product h4 {
        font-size: 30px;
        font-weight: 400;
        margin-bottom: 25px
    }

    .most_product_inner {
        margin-bottom: -30px
    }

    .most_p_list .media {
        margin-bottom: 30px
    }

    .most_p_list .media .d-flex {
        padding-right: 20px
    }

    .most_p_list .media .media-body {
        vertical-align: middle;
        align-self: center
    }

    .most_p_list .media .media-body h4 {
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: normal;
        color: #2a2a2a
    }

    .most_p_list .media .media-body h3 {
        font-size: 16px;
        font-weight: 500;
        color: #797979;
        margin-bottom: 0px
    }

    .cat_product_area .btn_2 {
        border: 1px solid #606060;
        color: #606060;
        margin-top: 80px
    }

    .cat_product_area .latest_product_inner {
        padding-top: 30px
    }

    .cat_product_area .latest_product_inner .single-product {
        margin-bottom: 50px
    }

    .sub-menu ul {
        margin-top: 15px;
        padding-top: 15px;
        padding-left: 25px;
        border-top: 1px solid #606060
    }

    .left_widgets {
        margin-bottom: 30px
    }

    .left_widgets:last-child {
        margin-bottom: 0px
    }

    .widgets_inner p {
        font-size: 14px;
        text-transform: capitalize;
        color: #000;
        font-weight: 400;
        margin-bottom: 20px
    }

    .widgets_inner input[type=checkbox],
    .widgets_inner input[type=radio] {
        margin-right: 15px
    }

    .widgets_inner {
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 0px;
        padding-bottom: 15px
    }

    @media (max-width: 991px) {
        .widgets_inner {
            padding-left: 15px;
            padding-right: 15px
        }
    }

    @media (max-width: 991px) {
        .l_w_title {
            padding-left: 0;
            padding-right: 0
        }
    }

    .l_w_title h3 {
        margin-bottom: 20px;
        font-size: 14px;
        font-family: "Jost", sans-serif;
        color: #2a2a2a;
        font-weight: 500;
        line-height: 40px;
        position: relative;
        background-color: #e8f0f2;
        padding: 10px 15px 10px 30px;
        text-transform: uppercase
    }

    .product_top_bar {
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap
    }

    .product_bar_single {
        margin-left: 20px;
        border-radius: 0
    }

    .product_bar_single .nice-select {
        background-color: #fff;
        text-transform: capitalize;
        border: 1px solid #eee;
        color: #606060;
        border-radius: 0;
        padding-left: 30px;
        padding-right: 70px;
        border-radius: 0
    }

    .product_bar_single .nice-select:after {
        height: 8px;
        margin-top: -6px;
        right: 16px;
        width: 8px
    }

    .p_filter_widgets .widgets_inner {
        border-bottom: 1px solid #eeeeee
    }

    .p_filter_widgets .widgets_inner:last-child {
        border-bottom: 0px
    }

    .p_filter_widgets .list {
        border-top: 1px solid #ddd;
        padding-top: 25px;
        margin-top: 25px
    }

    .p_filter_widgets .list:first-child {
        padding-top: 0;
        margin-top: 0;
        border-top: 0px solid transparent
    }

    .p_filter_widgets .list li {
        margin-bottom: 18px;
        -webkit-transition: .5s;
        transition: .5s
    }

    .p_filter_widgets .list li a {
        font-size: 14px;
        font-weight: normal;
        color: #606060;
        position: relative
    }

    .p_filter_widgets .list li.active a:before,
    .p_filter_widgets .list li:hover a:before {
        background: var(--themecolor);
        border-color: var(--themecolor)
    }

    .p_filter_widgets .list li:last-child {
        margin-bottom: 0px
    }

    .product_top_bar {
        clear: both;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        padding: 10px 0;
        margin-bottom: 40px
    }

    @media (max-width: 576px) {
        .product_top_bar {
            display: block !important
        }
    }

    .product_top_bar h2 {
        margin-bottom: 0
    }

    @media (max-width: 991px) {
        .product_top_bar h2 {
            margin-bottom: 20px
        }
    }

    .product_top_bar .left_dorp .sorting {
        display: inline-block;
        clear: none;
        border: 1px solid #eeeeee;
        border-radius: 0px;
        height: 40px;
        width: 210px;
        padding-left: 20px
    }

    .product_top_bar .left_dorp .sorting span {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #555555
    }

    .product_top_bar .left_dorp .sorting .list {
        width: 100%;
        border-radius: 0px
    }

    .product_top_bar .left_dorp .sorting .list li {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #555555
    }

    .product_top_bar .left_dorp .sorting:after {
        content: "\f0d7";
        font: normal normal normal 14px/1 FontAwesome;
        transform: rotate(0);
        border: none;
        color: #555555;
        margin-top: -6px;
        right: 20px
    }

    .product_top_bar .left_dorp .show {
        clear: none;
        display: inline-block;
        clear: none;
        border: 1px solid #eeeeee;
        border-radius: 0px;
        height: 40px;
        width: 120px;
        padding-left: 20px;
        margin-left: 10px
    }

    .product_top_bar .left_dorp .show span {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #555555
    }

    .product_top_bar .left_dorp .show .list {
        width: 100%;
        border-radius: 0px
    }

    .product_top_bar .left_dorp .show .list li {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #555555
    }

    .product_top_bar .left_dorp .show:after {
        content: "\f0d7";
        font: normal normal normal 14px/1 FontAwesome;
        transform: rotate(0);
        border: none;
        color: #555555;
        margin-top: -6px;
        right: 20px
    }

    @media (max-width: 576px) {
        .product_top_bar .single_product_menu {
            width: 50%;
            float: left;
            margin-bottom: 20px
        }
    }

    .product_top_bar .single_product_menu p {
        color: #020202;
        font-weight: 500
    }

    @media (max-width: 576px) {
        .product_top_bar .single_product_menu p {
            font-size: 13px;
            line-height: 13px
        }
    }

    .product_top_bar .single_product_menu p span {
        color: var(--themecolor)
    }

    .product_top_bar .single_product_menu h5 {
        font-size: 13px;
        font-weight: 500;
        text-transform: capitalize;
        margin-bottom: 0
    }

    .product_top_bar .single_product_menu .nice-select {
        height: 0;
        border: 0px;
        line-height: 15px;
        font-weight: 300;
        text-transform: capitalize
    }

    .product_top_bar .single_product_menu .nice-select:after {
        margin-top: 0;
        border-bottom: 1px solid #999;
        border-right: 1px solid #999;
        right: 0px
    }

    .product_top_bar .single_product_menu .top_pageniation {
        line-height: 15px
    }

    .product_top_bar .single_product_menu .top_pageniation ul {
        margin-left: 20px
    }

    .product_top_bar .single_product_menu .top_pageniation ul li {
        display: inline-block;
        margin-left: 10px
    }

    .product_top_bar .single_product_menu .input-group {
        width: 150px
    }

    .product_top_bar .single_product_menu .input-group .form-control {
        border: 0px solid transparent;
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        text-align: center;
        text-transform: capitalize
    }

    .product_top_bar .single_product_menu .input-group .input-group-text {
        background-color: transparent;
        border: 0px solid transparent;
        border-bottom: 1px solid #ddd
    }

    .most_p_withoutbox {
        padding-bottom: 120px
    }

    @media (max-width: 991px) {
        .product_bar_item {
            width: 100% !important
        }
    }

    @media (max-width: 991px) {
        .product_top_bar {
            margin-top: 70px
        }

        .product_top_bar h2 {
            font-size: 25px
        }

        .product_bar_single {
            margin-left: 0;
            margin-right: 5px
        }

        .product_bar_single .nice-select {
            padding-left: 15px;
            padding-right: 35px
        }
    }

    .s_product_img .carousel {
        position: relative
    }

    .s_product_img .carousel .carousel-indicators {
        margin: 0px;
        right: 20px;
        width: auto;
        left: auto;
        bottom: 30px
    }

    .s_product_img .carousel .carousel-indicators li {
        height: 60px;
        width: 60px;
        background: transparent;
        text-indent: 0;
        margin-right: 10px;
        position: relative
    }

    .s_product_img .carousel .carousel-indicators li:after {
        display: none
    }

    .s_product_img .carousel .carousel-indicators li:before {
        content: "";
        background: rgba(197, 50, 45, 0.8);
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .s_product_img .carousel .carousel-indicators li.active:before {
        opacity: 1
    }

    @media (max-width: 576px) {
        .s_product_text {
            margin-top: 30px
        }
    }

    .s_product_text h5 {
        font-weight: 700;
        font-size: 15px;
        text-transform: capitalize;
        margin-bottom: 40px
    }

    @media (max-width: 576px) {
        .s_product_text h5 {
            margin-bottom: 15px
        }
    }

    .s_product_text h5 span {
        margin: 0 10px
    }

    .s_product_text h3 {
        font-size: 24px;
        font-weight: 700;
        color: #2a2a2a;
        margin-bottom: 10px
    }

    .s_product_text h2 {
        font-size: 24px;
        font-weight: bold;
        color: var(--themecolor);
        margin-bottom: 15px
    }

    .s_product_text .list li {
        margin-bottom: 5px
    }

    .s_product_text .list li a {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        font-weight: normal;
        color: #555555
    }

    .s_product_text .list li a span {
        width: 90px;
        display: inline-block
    }

    .s_product_text .list li a span:hover {
        color: #555
    }

    .s_product_text .list li a.active {
        color: var(--themecolor)
    }

    .s_product_text .list li a.active span {
        color: #555
    }

    .s_product_text .list li:last-child {
        margin-bottom: 0px
    }

    .s_product_text p {
        padding-top: 20px;
        border-top: 1px dotted #d5d5d5;
        margin: 20px 0
    }

    .s_product_text .card_area .main_btn {
        line-height: 38px;
        padding: 0px 38px;
        text-transform: uppercase;
        margin-right: 10px
    }

    .s_product_text .card_area .icon_btn {
        margin-right: 10px;
        background: #f6f6f6;
        border-radius: 3px;
        color: #2a2a2a;
        display: inline-block;
        line-height: 40px;
        text-align: center;
        padding: 0px 13px;
        font-size: 14px
    }

    .s_product_text .card_area .icon_btn:hover {
        background: #fff;
        box-shadow: -14.142px 14.142px 20px 0px rgba(0, 0, 0, 0.1)
    }

    .cart_area {
        padding: 50px 0 50px
    }

    @media (max-width: 991px) {
        .cart_area {
            padding: 50px 0 40px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {
        .cart_area {
            padding: 50px 0 50px
        }
    }

    .cart_area .product_count {
        display: inline-block;
        position: relative;
        margin-bottom: 24px;
        overflow: hidden
    }

    .cart_area .product_count input {
        width: 76px;
        border: 1px solid #eeeeee;
        border-radius: 3px;
        padding-left: 10px
    }

    .cart_area .product_count .input-number-increment {
        position: absolute;
        right: 0;
        top: -7px;
        padding: 10px;
        border-left: 1px solid #eee;
        display: inline-block
    }

    .cart_area .product_count .input-number-increment:after {
        position: absolute;
        content: "";
        left: 0;
        bottom: 7px;
        width: 100%;
        height: 1px;
        background-color: #eee
    }

    .cart_area .product_count .input-number-decrement {
        position: absolute;
        right: 0;
        bottom: -9px;
        padding: 10px;
        border-left: 1px solid #eee;
        display: inline-block
    }

    @media (max-width: 576px) {
        .cart_area .media {
            display: block
        }
    }

    @media only screen and (min-width: 480px) and (max-width: 767px) {
        .cart_area .media {
            display: block
        }
    }

    .product_description_area {
        padding-bottom: 120px;
        margin-top: 60px
    }

    @media (max-width: 991px) {
        .product_description_area {
            margin-top: 0px;
            padding-bottom: 70px
        }
    }

    .product_description_area .nav.nav-tabs {
        display: block;
        border: none;
        padding: 10px 0px
    }

    .product_description_area .nav.nav-tabs li {
        display: inline-block;
        margin-right: 7px
    }

    .product_description_area .nav.nav-tabs li:last-child {
        margin-right: 0px
    }

    .product_description_area .nav.nav-tabs li a {
        padding: 0px;
        border: none;
        line-height: 38px;
        background: #fff;
        border: 1px solid #eeeeee;
        border-radius: 0px;
        padding: 0px 30px;
        color: #2a2a2a;
        font-size: 13px;
        font-weight: normal;
        border-radius: 50px
    }

    @media (max-width: 991px) {
        .product_description_area .nav.nav-tabs li a {
            padding: 0px 20px;
            margin-bottom: 10px
        }
    }

    .product_description_area .nav.nav-tabs li a.active {
        background: var(--themecolor);
        color: #fff !important;
        border-color: var(--themecolor)
    }

    .product_description_area .tab-content {
        padding-top: 30px
    }

    .product_description_area .tab-content .total_rate .box_total {
        background: #f4f4f4;
        text-align: center;
        padding-top: 20px;
        padding-bottom: 20px;
        border: 1px solid #eee
    }

    .product_description_area .tab-content .total_rate .box_total h4 {
        color: var(--themecolor);
        font-size: 48px;
        font-weight: bold
    }

    .product_description_area .tab-content .total_rate .box_total h5 {
        color: #2a2a2a;
        margin-bottom: 0px;
        font-size: 24px
    }

    .product_description_area .tab-content .total_rate .box_total h6 {
        color: #2a2a2a;
        margin-bottom: 0px;
        font-size: 14px;
        color: #797979;
        font-weight: normal
    }

    .product_description_area .tab-content .total_rate .rating_list {
        margin-bottom: 30px
    }

    .product_description_area .tab-content .total_rate .rating_list h3 {
        font-size: 18px;
        color: #2a2a2a;
        font-family: "Roboto", sans-serif;
        font-weight: 700;
        margin-bottom: 10px
    }

    .product_description_area .tab-content .total_rate .rating_list .list li a {
        font-size: 14px;
        color: #797979
    }

    .product_description_area .tab-content .total_rate .rating_list .list li a i {
        color: #fbd600
    }

    .product_description_area .tab-content .total_rate .rating_list .list li:nth-child a i:last-child {
        color: #eeeeee
    }

    .product_description_area .tab-content .table {
        margin-bottom: 0px
    }

    .product_description_area .tab-content .table tbody tr td {
        padding-left: 65px;
        padding-right: 65px;
        padding-top: 14px;
        padding-bottom: 14px
    }

    .product_description_area .tab-content .table tbody tr td h5 {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        font-weight: normal;
        color: #797979;
        margin-bottom: 0px;
        white-space: nowrap
    }

    .product_description_area .tab-content .table tbody tr:first-child td {
        border-top: 0px
    }

    .review_item {
        margin-bottom: 35px
    }

    .review_item:last-child {
        margin-bottom: 0px
    }

    .review_item p {
        color: #797979
    }

    .review_item .media {
        position: relative
    }

    .review_item .media .d-flex {
        padding-right: 15px
    }

    .review_item .media .media-body {
        vertical-align: middle;
        align-self: center
    }

    .review_item .media .media-body h4 {
        margin-bottom: 0px;
        font-size: 14px;
        color: #2a2a2a;
        font-family: "Roboto", sans-serif;
        margin-bottom: 8px
    }

    .review_item .media .media-body i {
        color: #fbd600
    }

    .review_item .media .media-body h5 {
        font-size: 13px;
        font-weight: normal;
        color: #797979
    }

    .review_item .media .media-body .reply_btn {
        border: 1px solid #e0e0e0;
        padding: 0px 28px;
        display: inline-block;
        line-height: 32px;
        border-radius: 16px;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #2a2a2a;
        position: absolute;
        right: 0px;
        top: 14px
    }

    .review_item .media .media-body .reply_btn:hover {
        background: var(--themecolor);
        border-color: var(--themecolor);
        color: #fff
    }

    .review_item p {
        padding-top: 10px;
        margin-bottom: 0px
    }

    .review_item.reply {
        padding-left: 28px
    }

    .review_box h4 {
        font-size: 24px;
        color: #2a2a2a;
        margin-bottom: 20px;
        font-weight: 700
    }

    .review_box p {
        margin-bottom: 0px;
        display: inline-block;
        font-weight: 500
    }

    .review_box .list {
        display: inline-block;
        padding-left: 10px;
        padding-right: 10px
    }

    .review_box .list li {
        display: inline-block
    }

    .review_box .list li a {
        display: inline-block;
        color: #fbd600
    }

    .review_box .form-control {
        height: 50px;
        border-radius: 0
    }

    .review_box ::placeholder {
        font-size: 14px
    }

    .review_box .contact_form {
        margin-top: 15px
    }

    .cart_inner .table {
        margin-bottom: 30px;
        border-bottom: 1px solid #eee
    }

    .cart_inner .table thead tr th {
        border-top: 0px;
        font-size: 14px;
        font-weight: 500;
        font-family: "Roboto", sans-serif;
        color: #797979;
        border-bottom: 0px !important
    }

    .cart_inner .table tbody tr td {
        padding-top: 30px;
        padding-bottom: 30px;
        vertical-align: middle;
        align-self: center
    }

    .cart_inner .table tbody tr td .media .d-flex {
        padding-right: 30px
    }

    .cart_inner .table tbody tr td .media .d-flex img {
        border: 1px solid #eeeeee;
        border-radius: 3px;
        max-width: 150px
    }

    .cart_inner .table tbody tr td .media .media-body {
        vertical-align: middle;
        align-self: center
    }

    .cart_inner .table tbody tr td .media .media-body p {
        margin-bottom: 0px
    }

    .cart_inner .table tbody tr td h5 {
        font-size: 14px;
        color: #2a2a2a;
        font-family: "Roboto", sans-serif;
        margin-bottom: 0px
    }

    .cart_inner .table tbody tr td .product_count {
        margin-bottom: 0px
    }

    .cart_inner .table tbody tr td .product_count input {
        width: 100px;
        padding-left: 30px;
        height: 50px;
        outline: none;
        box-shadow: none
    }

    .cart_inner .table tbody tr td .product_count .increase {
        top: -2px
    }

    .cart_inner .table tbody tr td .product_count .increase:before {
        content: "";
        height: 40px;
        width: 1px;
        position: absolute;
        left: -3px;
        top: 0px;
        background: #eeeeee
    }

    .cart_inner .table tbody tr td .product_count .increase:after {
        content: "";
        height: 1px;
        width: 30px;
        position: absolute;
        left: -3px;
        top: 22px;
        background: #eeeeee
    }

    .cart_inner .table tbody tr td .product_count .reduced {
        bottom: -6px
    }

    .cart_inner .table tbody tr.bottom_button .gray_btn {
        line-height: 38px;
        background: #f6f6f6;
        border: 1px solid #eeeeee;
        border-radius: 3px;
        padding: 0px 40px;
        display: inline-block;
        color: #2a2a2a;
        text-transform: uppercase;
        font-weight: 500
    }

    .cart_inner .table tbody tr.bottom_button td:last-child {
        width: 60px
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text {
        margin-left: -446px
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text input {
        width: 200px;
        padding: 0px 15px;
        border-radius: 3px;
        border: 1px solid #eeeeee;
        height: 40px;
        font-size: 14px;
        color: #cccccc;
        font-family: "Roboto", sans-serif;
        font-weight: normal;
        margin-right: -3px;
        outline: none;
        box-shadow: none
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text input.placeholder {
        font-size: 14px;
        color: #cccccc;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text input:-moz-placeholder {
        font-size: 14px;
        color: #cccccc;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text input::-moz-placeholder {
        font-size: 14px;
        color: #cccccc;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text input::-webkit-input-placeholder {
        font-size: 14px;
        color: #cccccc;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text .main_btn {
        height: 40px;
        line-height: 38px;
        text-transform: uppercase;
        padding: 0px 38px;
        margin-right: -3px
    }

    .cart_inner .table tbody tr.bottom_button td .cupon_text .gray_btn {
        padding: 0px 40px
    }

    .cart_inner .table tbody tr.shipping_area td:nth-child(3) {
        vertical-align: top
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box {
        margin-left: -250px;
        text-align: right
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li {
        margin-bottom: 12px;
        color: #606060
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li input {
        margin-left: 10px
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li:last-child {
        margin-bottom: 0px
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li a {
        padding-right: 30px;
        font-size: 14px;
        color: #797979;
        position: relative
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li a:before {
        content: "";
        height: 16px;
        width: 16px;
        border: 1px solid #cdcdcd;
        display: inline-block;
        border-radius: 50%;
        position: absolute;
        right: 0px;
        top: 50%;
        transform: translateY(-50%)
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li a:after {
        content: "";
        height: 10px;
        width: 10px;
        border-radius: 50%;
        background: var(--themecolor);
        display: inline-block;
        position: absolute;
        right: 3px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .list li.active a:after {
        opacity: 1
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box h6 {
        font-size: 14px;
        font-weight: normal;
        color: #2a2a2a;
        font-family: "Roboto", sans-serif;
        margin-top: 20px;
        margin-bottom: 20px
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box h6 i {
        color: #797979;
        padding-left: 5px
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .shipping_select {
        display: block;
        width: 100%;
        background: #f4f4f4;
        border: 1px solid #f4f4f4;
        height: 40px;
        margin-bottom: 20px
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .shipping_select .list {
        width: 100%;
        border-radius: 0px
    }

    .cart_inner .table tbody tr.shipping_area .shipping_box .shipping_select .list li {
        font-size: 14px;
        font-weight: normal;
        color: #797979
    }

    .cart_inner .table tbody tr.out_button_area .checkout_btn_inner {
        margin-left: -388px
    }

    .cart_inner .table tbody tr.out_button_area .checkout_btn_inner .main_btn {
        height: 40px;
        padding: 0px 30px;
        line-height: 38px;
        text-transform: uppercase
    }

    .gray_btn {
        line-height: 38px;
        background: #f6f6f6;
        border: 1px solid #eeeeee;
        border-radius: 3px;
        padding: 0px 40px;
        display: inline-block;
        color: #2a2a2a;
        text-transform: uppercase;
        font-weight: 500
    }

    .checkout_area {
        padding: 50px 0 50px
    }

    @media (max-width: 991px) {
        .checkout_area {
            padding: 50px 0 40px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {
        .checkout_area {
            padding: 50px 0 50px
        }
    }

    .checkout_area p {
        font-size: 14px
    }

    .checkout_area .form-control {
        font-size: 14px;
        height: 40px
    }

    .checkout_area .form-control {
        border: 1px solid #eee
    }

    .checkout_area .form-control :focus {
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        outline: 0;
        box-shadow: none
    }

    .checkout_area .form-control .form-control input {
        height: 50px
    }

    .post_code {
        display: block;
        width: 100%;
        background: #f4f4f4;
        border: 1px solid #f4f4f4;
        height: 40px;
        margin-bottom: 20px;
        padding: 8px 15px
    }

    .check_title h2 {
        font-size: 14px;
        font-weight: normal;
        font-family: "Roboto", sans-serif;
        background: #f4f4f4;
        line-height: 40px;
        padding-left: 30px;
        margin-bottom: 0px
    }

    @media (max-width: 991px) {
        .check_title h2 {
            line-height: 17px;
            padding: 12px
        }
    }

    .check_title h2 a {
        color: var(--themecolor);
        text-decoration: underline
    }

    .returning_customer p {
        margin-top: 15px;
        padding-left: 30px;
        margin-bottom: 25px
    }

    @media (max-width: 991px) {
        .returning_customer p {
            padding-left: 0
        }
    }

    .returning_customer .contact_form {
        max-width: 710px;
        margin-left: 15px
    }

    @media (max-width: 991px) {
        .returning_customer .contact_form {
            margin-left: -15px
        }
    }

    .returning_customer .contact_form .form-group {
        margin-bottom: 20px
    }

    .returning_customer .contact_form .form-group input {
        border: 1px solid #eeeeee;
        height: 40px;
        border-radius: 3px;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #797979;
        font-weight: normal
    }

    .returning_customer .contact_form .form-group input.placeholder {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #797979;
        font-weight: normal
    }

    .returning_customer .contact_form .form-group input:-moz-placeholder {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #797979;
        font-weight: normal
    }

    .returning_customer .contact_form .form-group input::-moz-placeholder {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #797979;
        font-weight: normal
    }

    .returning_customer .contact_form .form-group input::-webkit-input-placeholder {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #797979;
        font-weight: normal
    }

    .returning_customer .contact_form .form-group .submit_btn {
        margin-top: 0px
    }

    .returning_customer .contact_form .form-group .creat_account {
        display: inline-block;
        margin-left: 15px
    }

    .returning_customer .contact_form .form-group .creat_account input {
        height: auto;
        margin-right: 10px
    }

    .returning_customer .contact_form .form-group .lost_pass {
        display: block;
        margin-top: 20px;
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        color: #797979;
        font-weight: normal
    }

    .p_star {
        display: inline-block;
        position: relative
    }

    .p_star input {
        background: #fff
    }

    .p_star input:focus+.placeholder {
        display: none
    }

    .p_star .placeholder {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 30px;
        z-index: 1
    }

    .p_star .placeholder::before {
        content: attr(data-placeholder);
        color: #777
    }

    .p_star .placeholder::after {
        content: " *";
        color: tomato
    }

    .cupon_area {
        margin-bottom: 40px
    }

    .cupon_area input {
        margin-left: 30px;
        max-width: 730px;
        width: 100%;
        display: block;
        height: 40px;
        border-radius: 3px;
        padding: 0px 15px;
        border: 1px solid #eeeeee;
        outline: none;
        box-shadow: none;
        margin-top: 20px;
        margin-bottom: 20px
    }

    @media (max-width: 991px) {
        .cupon_area input {
            margin-left: 0
        }
    }

    .cupon_area .tp_btn {
        margin-left: 30px
    }

    @media (max-width: 991px) {
        .cupon_area .tp_btn {
            margin-left: 0
        }
    }

    .tp_btn {
        border: 1px solid #eeeeee;
        display: inline-block;
        line-height: 38px;
        padding: 0px 40px;
        color: #2a2a2a;
        text-transform: capitalize;
        font-family: "Roboto", sans-serif;
        font-weight: 500;
        border-radius: 50px
    }

    .tp_btn:hover {
        background: var(--themecolor);
        color: #fff;
        border-color: var(--themecolor)
    }

    .billing_details h3 {
        font-size: 18px;
        color: #2a2a2a;
        padding-bottom: 10px;
        margin-bottom: 30px
    }

    .billing_details .contact_form .form-group {
        margin-bottom: 20px
    }

    .billing_details .contact_form .form-group input {
        border-radius: 3px;
        color: #797979
    }

    .billing_details .contact_form .form-group input.placeholder {
        color: #797979
    }

    .billing_details .contact_form .form-group input:-moz-placeholder {
        color: #797979
    }

    .billing_details .contact_form .form-group input::-moz-placeholder {
        color: #797979
    }

    .billing_details .contact_form .form-group input::-webkit-input-placeholder {
        color: #797979
    }

    .billing_details .contact_form .form-group textarea {
        height: 150px;
        border-radius: 0px;
        padding: 20px 20px;
        margin-top: 15px
    }

    .billing_details .contact_form .form-group .country_select {
        width: 100%
    }

    .billing_details .contact_form .form-group .country_select span {
        color: #797979
    }

    .billing_details .contact_form .form-group .country_select .list {
        width: 100%;
        border-radius: 0px
    }

    .billing_details .contact_form .form-group .country_select .list li {
        font-size: 14px;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .billing_details .contact_form .form-group .creat_account #f-option2 {
        margin-right: 5px
    }

    .billing_details .contact_form .form-group .creat_account #f-option3 {
        margin-right: 5px
    }

    .billing_details .contact_form .form-group .creat_account a {
        color: var(--themecolor)
    }

    .order_box {
        background: #f4f4f4;
        padding: 30px
    }

    .order_box h2 {
        border-bottom: 1px solid #dddddd;
        font-size: 18px;
        font-weight: 500;
        color: #2a2a2a;
        padding-bottom: 15px
    }

    .order_box .list li a {
        font-size: 14px;
        color: #797979;
        font-weight: normal;
        border-bottom: 1px solid #eeeeee;
        display: block;
        line-height: 42px
    }

    .order_box .list li a span {
        float: right
    }

    .order_box .list li a .middle {
        float: none;
        width: 50px;
        text-align: right;
        display: inline-block;
        margin-left: 30px;
        color: #2a2a2a
    }

    .order_box .list li:nth-child(4) a .middle {
        margin-left: 48px
    }

    .order_box .list_2 li a {
        text-transform: uppercase;
        color: #2a2a2a;
        font-weight: 500
    }

    .order_box .list_2 li a span {
        color: #797979;
        text-transform: capitalize
    }

    .order_box .list_2 li:last-child a span {
        color: #2a2a2a
    }

    .order_box .payment_item h4 {
        font-size: 14px;
        text-transform: uppercase;
        color: #2a2a2a;
        font-weight: 500;
        padding-left: 22px;
        position: relative;
        margin-bottom: 15px;
        margin-top: 15px
    }

    .order_box .payment_item h4:before {
        content: "";
        width: 14px;
        height: 14px;
        border-radius: 50%;
        border: 1px solid #cdcdcd;
        background: #fff;
        display: block;
        position: absolute;
        left: 0px;
        top: 50%;
        transform: translateY(-50%)
    }

    .order_box .payment_item h4:after {
        content: "";
        height: 4px;
        width: 4px;
        background: #fff;
        border-radius: 50%;
        display: block;
        position: absolute;
        left: 5px;
        top: 8px
    }

    .order_box .payment_item h4 img {
        padding-left: 60px
    }

    .order_box .payment_item p {
        background: #fff;
        padding: 20px
    }

    .order_box .payment_item.active h4:before {
        background: var(--themecolor);
        border-color: var(--themecolor)
    }

    .order_box .creat_account {
        margin: 15px 0
    }

    .order_box .creat_account label {
        padding-left: 10px;
        font-size: 12px;
        color: #2a2a2a
    }

    .order_box .creat_account a {
        color: var(--themecolor)
    }

    .tracking_box_area .tracking_box_inner p {
        max-width: 870px;
        color: #2a2a2a;
        margin-bottom: 25px
    }

    .tracking_box_area .tracking_box_inner .tracking_form {
        max-width: 645px
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group {
        margin-bottom: 30px
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group input {
        height: 40px;
        border: 1px solid #eee;
        padding: 0px 15px;
        outline: none;
        box-shadow: none;
        border-radius: 0px;
        font-size: 14px;
        color: #797979;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group input.placeholder {
        font-size: 14px;
        color: #797979;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group input:-moz-placeholder {
        font-size: 14px;
        color: #797979;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group input::-moz-placeholder {
        font-size: 14px;
        color: #797979;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group input::-webkit-input-placeholder {
        font-size: 14px;
        color: #797979;
        font-family: "Roboto", sans-serif;
        font-weight: normal
    }

    .tracking_box_area .tracking_box_inner .tracking_form .form-group:last-child {
        margin-bottom: 0px
    }

    .radion_btn input[type="radio"] {
        position: absolute;
        visibility: hidden
    }

    .radion_btn {
        position: relative;
        margin-top: 10px;
        margin-bottom: 15px
    }

    .radion_btn img {
        position: absolute;
        right: 40px;
        top: 0px
    }

    .radion_btn label {
        display: block;
        position: relative;
        font-weight: 300;
        font-size: 1.35em;
        padding: 0px 25px 21px 25px;
        height: 14px;
        z-index: 9;
        cursor: pointer;
        -webkit-transition: all 0.25s linear;
        font-family: "Roboto", sans-serif;
        font-weight: 500;
        color: #2a2a2a;
        font-size: 13px;
        letter-spacing: 0.25px;
        text-transform: uppercase
    }

    .radion_btn .check {
        display: block;
        position: absolute;
        border: 1px solid #cdcdcd;
        border-radius: 100%;
        height: 14px;
        width: 14px;
        top: 5px;
        left: 0px;
        background: #fff;
        z-index: 5;
        transition: border 0.25s linear;
        -webkit-transition: border 0.25s linear
    }

    .radion_btn .check::before {
        display: block;
        position: absolute;
        content: "";
        border-radius: 100%;
        height: 4px;
        width: 4px;
        top: 4px;
        left: 4px;
        margin: auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear
    }

    .radion_btn input[type="radio"]:checked~.check {
        border: 1px solid var(--themecolor);
        background: var(--themecolor)
    }

    .radion_btn input[type="radio"]:checked~.check::before {
        background: #fff
    }

    .radion_btn input[type="radio"]:checked~label {
        color: #000
    }

    .login_part .login_part_text,
    .login_part .login_part_form {
        padding: 80px 70px;
        height: 600px;
        display: table
    }

    @media (max-width: 991px) {

        .login_part .login_part_text,
        .login_part .login_part_form {
            padding: 30px;
            height: 400px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {

        .login_part .login_part_text,
        .login_part .login_part_form {
            padding: 20px;
            height: 400px
        }
    }

    .login_part .login_part_text .login_part_text_iner,
    .login_part .login_part_text .login_part_form_iner,
    .login_part .login_part_form .login_part_text_iner,
    .login_part .login_part_form .login_part_form_iner {
        display: table-cell;
        vertical-align: middle
    }

    .login_part .login_part_text {
        background-image: -moz-linear-gradient(16deg, #ff005a 0%, #ff5d2d 64%, #ffba00 100%);
        background-image: -webkit-linear-gradient(16deg, #ff005a 0%, #ff5d2d 64%, #ffba00 100%);
        background-image: -ms-linear-gradient(16deg, #ff005a 0%, #ff5d2d 64%, #ffba00 100%);
        background-size: 200% auto
    }

    .login_part .login_part_text h2 {
        font-size: 24px;
        font-weight: 700;
        line-height: 35px;
        color: #fff;
        margin-bottom: 17px
    }

    .login_part .login_part_text p {
        color: #fff;
        line-height: 25px
    }

    @media (max-width: 991px) {
        .login_part .login_part_form {
            padding: 0
        }
    }

    .login_part .login_part_form h3 {
        font-size: 26px;
        line-height: 36px;
        font-weight: 700;
        margin-bottom: 80px
    }

    @media (max-width: 991px) {
        .login_part .login_part_form h3 {
            margin-bottom: 20px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {
        .login_part .login_part_form h3 {
            margin-bottom: 20px
        }
    }

    .login_part .login_part_form .form-control {
        border: 0px solid transparent;
        border-bottom: 1px solid #eee;
        border-radius: 0
    }

    .login_part .login_part_form .form-control ::placeholder {
        color: #c3c3c3
    }

    .login_part .creat_account {
        margin-top: 11px
    }

    .login_part .creat_account label {
        font-size: 14px;
        margin-bottom: 0;
        margin-left: 10px
    }

    .login_part .lost_pass {
        text-align: right;
        float: right;
        text-transform: capitalize
    }

    .lSSlideOuter .lSPager.lSGallery img {
        display: block;
        height: auto;
        max-width: 100%;
        padding: 5px
    }

    .s_product_text .card_area {
        padding: 20px 0
    }

    .s_product_text .card_area .product_count input {
        border: 0px solid transparent;
        text-align: center
    }

    .s_product_text .product_count {
        border: 1px solid #ddd;
        border-radius: 50px;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        align-items: center;
        padding: 12px 15px
    }

    .s_product_text .product_count .input-number {
        display: inline-block;
        width: 60px
    }

    @media (max-width: 576px) {
        .s_product_text .product_count .input-number {
            width: 30px
        }
    }

    .s_product_text .Wishlist {
        position: absolute;
        left: 0px;
        top: 0px;
        width: 1920px;
        height: 3162px;
        z-index: 365
    }

    .s_product_text .add_to_cart {
        margin: 25px 0
    }

    .s_product_text .like_us {
        color: var(--themecolor);
        border-radius: 50%;
        background-color: #fff;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        display: inline-block;
        margin-left: 20px;
        box-shadow: -14.142px 14.142px 20px 0px rgba(0, 0, 0, 0.1)
    }

    .s_product_text .like_us:hover {
        background-color: var(--themecolor);
        color: #fff
    }

    .lslide {
        background-color: #fff;
        margin: 0 auto;
        text-align: center
    }

    .lSPager .lSGallery {
        margin-top: 20px
    }

    .card_area .social_icon {
        margin-top: 40px
    }

    .card_area .social_icon a {
        display: inline-block;
        border-radius: 50%;
        background-color: #3b5998;
        width: 45px;
        height: 45px;
        line-height: 45px;
        text-align: center;
        color: #fff;
        margin-right: 15px
    }

    .card_area .social_icon a:hover {
        background-color: var(--themecolor)
    }

    .card_area .social_icon .tw {
        background-color: #55acee
    }

    .card_area .social_icon .li {
        background-color: #0077b5
    }

    .cart_area .btn_1 {
        border: 1px solid transparent
    }

    .cart_area .btn_1:hover {
        border: 1px solid var(--themecolor) !important
    }

    .checkout-cap {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        padding-top: 8px;
        overflow: hidden
    }

    @media (max-width: 575px) {
        .checkout-cap {
            display: block
        }
    }

    .checkout-cap input[type=checkbox]+label {
        display: inline-block;
        margin: 0.2em;
        cursor: pointer;
        padding: 0;
        margin: 0 0 13px 0
    }

    .checkout-cap input[type=checkbox] {
        display: none
    }

    .checkout-cap input[type="checkbox"]+label::before {
        content: "\2714";
        border: 0.1em solid #e4e4e4;
        border-radius: 0.2em;
        display: inline-block;
        width: 20px;
        height: 20px;
        padding-left: 0.2em;
        padding-bottom: 0.3em;
        margin-right: 10px;
        vertical-align: bottom;
        color: transparent;
        transition: .2s
    }

    .checkout-cap input[type=checkbox]+label:active:before {
        transform: scale(0)
    }

    .checkout-cap input[type=checkbox]:checked+label:before {
        background-color: var(--themecolor);
        border-color: var(--themecolor);
        color: #fff;
        line-height: 18px
    }

    .login-bg {
        height: 100vh;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url(../img/hero/h1_hero.jpg)
    }

    .login-form-area {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        min-height: 100vh;
        padding: 15px 0
    }

    .login-form-area .login-form {
        background: #fff;
        padding: 55px 60px 50px 50px;
        box-shadow: 0px 10px 30px 0px rgba(13, 12, 13, 0.2);
        min-width: 700px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .login-form-area .login-form {
            padding: 40px 20px 20px 26px;
            min-width: 95%
        }
    }

    @media (max-width: 575px) {
        .login-form-area .login-form {
            padding: 40px 20px 20px 26px;
            min-width: 95%
        }
    }

    .login-form-area .login-form .login-heading {
        text-align: center
    }

    .login-form-area .login-form .login-heading span {
        color: #140C40;
        font-size: 30px;
        font-weight: 600;
        margin-bottom: 16px;
        display: block;
        text-transform: capitalize
    }

    .login-form-area .login-form .input-box {
        padding-top: 35px;
        padding-bottom: 75px
    }

    @media (max-width: 575px) {
        .login-form-area .login-form .input-box {
            padding-top: 28px;
            padding-bottom: 10px
        }
    }

    .login-form-area .login-form .input-box .single-input-fields label {
        display: block;
        font-size: 17px;
        margin-bottom: 6px;
        color: #140C40;
        text-transform: capitalize;
        font-weight: 500;
        text-align: left
    }

    .login-form-area .login-form .input-box .single-input-fields input {
        border: 1px solid #C9C9C9;
        width: 100%;
        height: 50px;
        margin-bottom: 20px;
        padding: 0 25px;
        color: #000
    }

    .login-form-area .login-form .input-box .single-input-fields input::placeholder {
        color: #777777;
        font-weight: 300;
        font-size: 13px
    }

    .login-form-area .login-form .login-footer {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .login-form-area .login-form .login-footer {
            display: block;
            text-align: start
        }
    }

    @media (max-width: 575px) {
        .login-form-area .login-form .login-footer {
            display: block;
            text-align: start
        }
    }

    .login-form-area .login-form .login-footer p {
        margin: 0
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .login-form-area .login-form .login-footer p {
            margin-bottom: 28px;
            display: block
        }
    }

    @media (max-width: 575px) {
        .login-form-area .login-form .login-footer p {
            margin-bottom: 28px;
            display: block
        }
    }

    .login-form-area .login-form .login-footer p a {
        color: var(--themecolor)
    }

    .login-check {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        padding-top: 8px;
        overflow: hidden
    }

    @media (max-width: 575px) {
        .login-check {
            display: block
        }
    }

    .login-check input[type=checkbox]+label {
        display: inline-block;
        margin: 0.2em;
        cursor: pointer;
        padding: 0;
        margin: 0 0 13px 0
    }

    .login-check input[type=checkbox] {
        display: none
    }

    .login-check input[type="checkbox"]+label::before {
        content: "\2714";
        border: 0.1em solid #e4e4e4;
        border-radius: 0.2em;
        display: inline-block;
        width: 20px;
        height: 20px;
        padding-left: 0.2em;
        padding-bottom: 0.3em;
        margin-right: 10px;
        vertical-align: bottom;
        color: transparent;
        transition: .2s
    }

    .login-check input[type=checkbox]+label:active:before {
        transform: scale(0)
    }

    .login-check input[type=checkbox]:checked+label:before {
        background-color: var(--themecolor);
        border-color: var(--themecolor);
        color: #fff;
        line-height: 18px
    }

    .login-check a {
        color: var(--themecolor);
        font-size: 14px;
        font-weight: 400
    }

    .login-check a:hover {
        color: var(--themecolor)
    }

    @media (max-width: 575px) {
        .login-check a {
            float: left;
            display: block;
            padding-top: 7px;
            margin-bottom: 10px
        }
    }

    .profile-form-area {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        min-height: 100vh;
        padding: 15px 0
    }

    .profile-form-area .profile-form {
        background: #fff;
        padding: 55px 60px 50px 50px;
        box-shadow: 0px 10px 30px 0px rgba(13, 12, 13, 0.2);
        min-width: 700px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile-form-area .profile-form {
            padding: 40px 20px 20px 26px;
            min-width: 95%
        }
    }

    @media (max-width: 575px) {
        .profile-form-area .profile-form {
            padding: 40px 20px 20px 26px;
            min-width: 95%
        }
    }

    .profile-form-area .profile-form .profile-heading {
        text-align: center
    }

    .profile-form-area .profile-form .profile-heading span {
        color: #140C40;
        font-size: 30px;
        font-weight: 600;
        margin-bottom: 16px;
        display: block;
        text-transform: capitalize
    }

    .profile-form-area .profile-form .input-box {
        padding-top: 35px;
        padding-bottom: 60px
    }

    @media (max-width: 575px) {
        .profile-form-area .profile-form .input-box {
            padding-top: 28px;
            padding-bottom: 20px
        }
    }

    .profile-form-area .profile-form .input-box .single-input-fields label {
        display: block;
        font-size: 17px;
        margin-bottom: 6px;
        color: #140C40;
        text-transform: capitalize;
        font-weight: 500;
        text-align: left
    }

    .profile-form-area .profile-form .input-box .single-input-fields input {
        border: 1px solid #C9C9C9;
        width: 100%;
        height: 50px;
        margin-bottom: 20px;
        border-radius: 20px;

        padding: 0 25px;
        color: #000
    }

    .profile-form-area .profile-form .input-box .single-input-fields input::placeholder {
        color: #777777;
        font-weight: 300;
        font-size: 13px;
    }

    .profile-form-area .profile-form .profile-footer {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile-form-area .profile-form .profile-footer {
            display: block;
            text-align: start
        }
    }

    @media (max-width: 575px) {
        .profile-form-area .profile-form .profile-footer {
            display: block;
            text-align: start
        }
    }

    .profile-form-area .profile-form .profile-footer p {
        margin: 0
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile-form-area .profile-form .profile-footer p {
            margin-bottom: 28px;
            display: block
        }
    }

    @media (max-width: 575px) {
        .profile-form-area .profile-form .profile-footer p {
            margin-bottom: 28px;
            display: block
        }
    }

    .profile-form-area .profile-form .profile-footer p a {
        color: var(--themecolor)
    }

    .register-form-area {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        min-height: 100vh;
        padding: 15px 0
    }

    .register-form-area .register-form {
        background: #fff;
        padding: 55px 60px 50px 50px;
        box-shadow: 0px 10px 30px 0px rgba(13, 12, 13, 0.2);
        min-width: 700px
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .register-form-area .register-form {
            padding: 40px 20px 20px 26px;
            min-width: 95%
        }
    }

    @media (max-width: 575px) {
        .register-form-area .register-form {
            padding: 40px 20px 20px 26px;
            min-width: 95%;
            margin-top: 65px;
        }
    }

    .register-form-area .register-form .register-heading {
        text-align: center
    }

    .register-form-area .register-form .register-heading span {
        color: #140C40;
        font-size: 30px;
        font-weight: 600;
        margin-bottom: 16px;
        display: block;
        text-transform: capitalize
    }

    .register-form-area .register-form .input-box {
        padding-top: 35px;
        padding-bottom: 60px
    }

    @media (max-width: 575px) {
        .register-form-area .register-form .input-box {
            padding-top: 28px;
            padding-bottom: 20px
        }
    }

    .register-form-area .register-form .input-box .single-input-fields label {
        display: block;
        font-size: 17px;
        margin-bottom: 6px;
        color: #140C40;
        text-transform: capitalize;
        font-weight: 500;
        text-align: left
    }

    .register-form-area .register-form .input-box .single-input-fields input {
        border: 1px solid #C9C9C9;
        width: 100%;
        height: 50px;
        margin-bottom: 20px;
        padding: 0 25px;
        color: #000
    }

    .register-form-area .register-form .input-box .single-input-fields input::placeholder {
        color: #777777;
        font-weight: 300;
        font-size: 13px
    }

    .register-form-area .register-form .register-footer {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: justify;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .register-form-area .register-form .register-footer {
            display: block;
            text-align: start
        }
    }

    @media (max-width: 575px) {
        .register-form-area .register-form .register-footer {
            display: block;
            text-align: start
        }
    }

    .register-form-area .register-form .register-footer p {
        margin: 0
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .register-form-area .register-form .register-footer p {
            margin-bottom: 28px;
            display: block
        }
    }

    @media (max-width: 575px) {
        .register-form-area .register-form .register-footer p {
            margin-bottom: 28px;
            display: block
        }
    }

    .register-form-area .register-form .register-footer p a {
        color: var(--themecolor)
    }


    .submit-btn3 {
        background: var(--themecolor);
        height: 60px;
        padding: 10px 43px;
        border: 0;
        color: #fff;
        text-transform: capitalize;
        cursor: pointer;
        font-size: 16px;
        border-radius: 0px
    }

    .home-blog {
        background: #F6F6F6;
        padding-top: 80px;
        padding-bottom: 29px
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .home-blog {
            padding-top: 80px;
            padding-bottom: 29px
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .home-blog {
            padding-top: 80px;
            padding-bottom: 29px
        }
    }

    @media (max-width: 575px) {
        .home-blog {
            padding-top: 80px;
            padding-bottom: 29px
        }
    }

    .home-blog .single-blogs .blog-img {
        margin-bottom: 25px;
        width: 100%
    }

    .home-blog .single-blogs .blog-img img {
        display: inherit;
        -webkit-transition: all .4s ease-out 0s;
        -moz-transition: all .4s ease-out 0s;
        -ms-transition: all .4s ease-out 0s;
        -o-transition: all .4s ease-out 0s;
        transition: all .4s ease-out 0s;
        width: 100%
    }

    .home-blog .single-blogs .blogs-cap span {
        color: #74706B;
        margin-bottom: 11px;
        display: block
    }

    .home-blog .single-blogs .blogs-cap h5 a {
        font-size: 22px;
        line-height: 1.4;
        margin-bottom: 12px;
        font-weight: 500;
        display: block;
        color: #292621
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .home-blog .single-blogs .blogs-cap h5 a {
            font-size: 20px
        }
    }

    .home-blog .single-blogs .blogs-cap h5 a:hover {
        color: var(--themecolor)
    }

    .home-blog .single-blogs .blogs-cap p {
        color: #74706B;
        margin-bottom: 24px
    }

    .home-blog .single-blogs .blogs-cap a.red-btn {
        color: #292621;
        text-decoration: underline;
        font-weight: 600
    }

    .home-blog .single-blogs .blogs-cap a.red-btn:hover {
        letter-spacing: .5px
    }

    .home-blog .single-blogs:hover .blogs-cap h5 a {
        color: var(--themecolor)
    }

    .latest-blog-area .area-heading {
        margin-bottom: 70px
    }

    .blog_area a {
        color: "Jost", sans-serif !important;
        text-decoration: none;
        transition: .4s
    }

    .blog_area a:hover,
    .blog_area a :hover {
        background: -webkit-linear-gradient(131deg, var(--themecolor) 0%, var(--themecolor) 99%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-decoration: none;
        transition: .4s
    }

    .single-blog {
        overflow: hidden;
        margin-bottom: 30px
    }

    .single-blog:hover {
        box-shadow: 0px 10px 20px 0px rgba(42, 34, 123, 0.1)
    }

    .single-blog .thumb {
        overflow: hidden;
        position: relative
    }

    .single-blog .thumb:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #000;
        opacity: 0;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .single-blog h4 {
        border-bottom: 1px solid #dfdfdf;
        padding-bottom: 34px;
        margin-bottom: 25px
    }

    .single-blog a {
        font-size: 20px;
        font-weight: 600
    }

    .single-blog .date {
        color: #666666;
        text-align: left;
        display: inline-block;
        font-size: 13px;
        font-weight: 300
    }

    .single-blog .tag {
        text-align: left;
        display: inline-block;
        float: left;
        font-size: 13px;
        font-weight: 300;
        margin-right: 22px;
        position: relative
    }

    .single-blog .tag:after {
        content: '';
        position: absolute;
        width: 1px;
        height: 10px;
        background: #acacac;
        right: -12px;
        top: 7px
    }

    @media (max-width: 1199px) {
        .single-blog .tag {
            margin-right: 8px
        }

        .single-blog .tag:after {
            display: none
        }
    }

    .single-blog .likes {
        margin-right: 16px
    }

    @media (max-width: 800px) {
        .single-blog {
            margin-bottom: 30px
        }
    }

    .single-blog .single-blog-content {
        padding: 30px
    }

    .single-blog .single-blog-content .meta-bottom p {
        font-size: 13px;
        font-weight: 300
    }

    .single-blog .single-blog-content .meta-bottom i {
        color: #edeff2;
        font-size: 13px;
        margin-right: 7px
    }

    @media (max-width: 1199px) {
        .single-blog .single-blog-content {
            padding: 15px
        }
    }

    .single-blog:hover .thumb:after {
        opacity: .7;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    @media (max-width: 1199px) {
        .single-blog h4 {
            transition: all 300ms linear 0s;
            border-bottom: 1px solid #dfdfdf;
            padding-bottom: 14px;
            margin-bottom: 12px
        }

        .single-blog h4 a {
            font-size: 18px
        }
    }

    .full_image.single-blog {
        position: relative
    }

    .full_image.single-blog .single-blog-content {
        position: absolute;
        left: 35px;
        bottom: 0;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    @media (min-width: 992px) {
        .full_image.single-blog .single-blog-content {
            bottom: 100px
        }
    }

    .full_image.single-blog h4 {
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s;
        border-bottom: none;
        padding-bottom: 5px
    }

    .full_image.single-blog a {
        font-size: 20px;
        font-weight: 600
    }

    .full_image.single-blog .date {
        color: #fff
    }

    .full_image.single-blog:hover .single-blog-content {
        opacity: 1;
        visibility: visible;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .l_blog_item .l_blog_text .date {
        margin-top: 24px;
        margin-bottom: 15px
    }

    .l_blog_item .l_blog_text .date a {
        font-size: 12px
    }

    .l_blog_item .l_blog_text h4 {
        font-size: 18px;
        border-bottom: 1px solid #eeeeee;
        margin-bottom: 0px;
        padding-bottom: 20px;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .l_blog_item .l_blog_text p {
        margin-bottom: 0px;
        padding-top: 20px
    }

    .causes_slider .owl-dots {
        text-align: center;
        margin-top: 80px
    }

    .causes_slider .owl-dots .owl-dot {
        height: 14px;
        width: 14px;
        background: #eeeeee;
        display: inline-block;
        margin-right: 7px
    }

    .causes_slider .owl-dots .owl-dot:last-child {
        margin-right: 0px
    }

    .causes_item {
        background: #fff
    }

    .causes_item .causes_img {
        position: relative
    }

    .causes_item .causes_img .c_parcent {
        position: absolute;
        bottom: 0px;
        width: 100%;
        left: 0px;
        height: 3px;
        background: rgba(255, 255, 255, 0.5)
    }

    .causes_item .causes_img .c_parcent span {
        width: 70%;
        height: 3px;
        position: absolute;
        left: 0px;
        bottom: 0px
    }

    .causes_item .causes_img .c_parcent span:before {
        content: "75%";
        position: absolute;
        right: -10px;
        bottom: 0px;
        color: #fff;
        padding: 0px 5px
    }

    .causes_item .causes_text {
        padding: 30px 35px 40px 30px
    }

    .causes_item .causes_text h4 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        cursor: pointer
    }

    .causes_item .causes_text p {
        font-size: 14px;
        line-height: 24px;
        font-weight: 300;
        margin-bottom: 0px
    }

    .causes_item .causes_bottom a {
        width: 50%;
        border: 1px solid;
        text-align: center;
        float: left;
        line-height: 50px;
        color: #fff;
        font-size: 14px;
        font-weight: 500
    }

    .causes_item .causes_bottom a+a {
        border-color: #eeeeee;
        background: #fff;
        font-size: 14px
    }

    .latest_blog_area {
        background: #f9f9ff
    }

    .single-recent-blog-post {
        margin-bottom: 30px
    }

    .single-recent-blog-post .thumb {
        overflow: hidden
    }

    .single-recent-blog-post .thumb img {
        transition: all 0.7s linear
    }

    .single-recent-blog-post .details {
        padding-top: 30px
    }

    .single-recent-blog-post .details .sec_h4 {
        line-height: 24px;
        padding: 10px 0px 13px;
        transition: all 0.3s linear
    }

    .single-recent-blog-post .date {
        font-size: 14px;
        line-height: 24px;
        font-weight: 400
    }

    .single-recent-blog-post:hover img {
        transform: scale(1.23) rotate(10deg)
    }

    .tags .tag_btn {
        font-size: 12px;
        font-weight: 500;
        line-height: 20px;
        border: 1px solid #eeeeee;
        display: inline-block;
        padding: 1px 18px;
        text-align: center
    }

    .tags .tag_btn+.tag_btn {
        margin-left: 2px
    }

    .blog_categorie_area {
        padding-top: 30px;
        padding-bottom: 30px
    }

    @media (min-width: 900px) {
        .blog_categorie_area {
            padding-top: 80px;
            padding-bottom: 80px
        }
    }

    @media (min-width: 1100px) {
        .blog_categorie_area {
            padding-top: 120px;
            padding-bottom: 120px
        }
    }

    .categories_post {
        position: relative;
        text-align: center;
        cursor: pointer
    }

    .categories_post img {
        max-width: 100%
    }

    .categories_post .categories_details {
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background: rgba(34, 34, 34, 0.75);
        color: #fff;
        transition: all 0.3s linear;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center
    }

    .categories_post .categories_details h5 {
        margin-bottom: 0px;
        font-size: 18px;
        line-height: 26px;
        text-transform: uppercase;
        color: #fff;
        position: relative
    }

    .categories_post .categories_details p {
        font-weight: 300;
        font-size: 14px;
        line-height: 26px;
        margin-bottom: 0px
    }

    .categories_post .categories_details .border_line {
        margin: 10px 0px;
        background: #fff;
        width: 100%;
        height: 1px
    }

    .categories_post:hover .categories_details {
        background: rgba(222, 99, 32, 0.85)
    }

    .blog_area {
        padding: 50px 0 50px
    }

    @media (max-width: 991px) {
        .blog_area {
            padding: 50px 0 40px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {
        .blog_area {
            padding: 50px 0 50px
        }
    }

    .blog_item {
        margin-bottom: 50px
    }

    .blog_details {
        padding: 30px 0 20px 10px;
        box-shadow: 0px 10px 20px 0px rgba(221, 221, 221, 0.3)
    }

    @media (min-width: 768px) {
        .blog_details {
            padding: 60px 30px 35px 35px
        }
    }

    .blog_details p {
        margin-bottom: 30px
    }

    .blog_details a {
        color: #ff8b23
    }

    .blog_details a:hover {
        color: var(--themecolor)
    }

    .blog_details h2 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 8px
    }

    @media (min-width: 768px) {
        .blog_details h2 {
            font-size: 24px;
            margin-bottom: 15px
        }
    }

    .blog-info-link li {
        float: left;
        font-size: 14px
    }

    .blog-info-link li a {
        color: #999999
    }

    .blog-info-link li i,
    .blog-info-link li span {
        font-size: 13px;
        margin-right: 5px
    }

    .blog-info-link li::after {
        content: "|";
        padding-left: 10px;
        padding-right: 10px
    }

    .blog-info-link li:last-child::after {
        display: none
    }

    .blog-info-link::after {
        content: "";
        display: block;
        clear: both;
        display: table
    }

    .blog_item_img {
        position: relative
    }

    .blog_item_img .blog_item_date {
        position: absolute;
        bottom: -10px;
        left: 10px;
        display: block;
        color: #fff;
        background-color: var(--themecolor);
        padding: 8px 15px;
        border-radius: 5px
    }

    @media (min-width: 768px) {
        .blog_item_img .blog_item_date {
            bottom: -20px;
            left: 40px;
            padding: 13px 30px
        }
    }

    .blog_item_img .blog_item_date h3 {
        font-size: 22px;
        font-weight: 600;
        color: #fff;
        margin-bottom: 0;
        line-height: 1.2
    }

    @media (min-width: 768px) {
        .blog_item_img .blog_item_date h3 {
            font-size: 30px
        }
    }

    .blog_item_img .blog_item_date p {
        font-size: 18px;
        margin-bottom: 0;
        color: #fff
    }

    @media (min-width: 768px) {
        .blog_item_img .blog_item_date p {
            font-size: 18px
        }
    }

    .blog_right_sidebar .widget_title {
        font-size: 20px;
        margin-bottom: 40px
    }

    .blog_right_sidebar .widget_title::after {
        content: "";
        display: block;
        padding-top: 15px;
        border-bottom: 1px solid #f0e9ff
    }

    .blog_right_sidebar .single_sidebar_widget {
        background: #fbf9ff;
        padding: 30px;
        margin-bottom: 30px
    }

    .blog_right_sidebar .single_sidebar_widget .btn_1 {
        margin-top: 0px
    }

    .blog_right_sidebar .search_widget .form-control {
        height: 50px;
        border-color: #f0e9ff;
        font-size: 13px;
        color: #999999;
        padding-left: 20px;
        border-radius: 0;
        border-right: 0
    }

    .blog_right_sidebar .search_widget .form-control::placeholder {
        color: #999999
    }

    .blog_right_sidebar .search_widget .form-control:focus {
        border-color: #f0e9ff;
        outline: 0;
        box-shadow: none
    }

    .blog_right_sidebar .search_widget .input-group button {
        background: var(--themecolor);
        border-left: 0;
        border: 1px solid #f0e9ff;
        padding: 12px 15px;
        border-left: 0;
        cursor: pointer
    }

    .blog_right_sidebar .search_widget .input-group button i {
        color: #fff
    }

    .blog_right_sidebar .search_widget .input-group button span {
        font-size: 14px;
        color: #999999
    }

    .blog_right_sidebar .newsletter_widget .form-control {
        height: 50px;
        border-color: #f0e9ff;
        font-size: 13px;
        color: #999999;
        padding-left: 20px;
        border-radius: 0
    }

    .blog_right_sidebar .newsletter_widget .form-control::placeholder {
        color: #999999
    }

    .blog_right_sidebar .newsletter_widget .form-control:focus {
        border-color: #f0e9ff;
        outline: 0;
        box-shadow: none
    }

    .blog_right_sidebar .newsletter_widget .input-group button {
        background: #fff;
        border-left: 0;
        border: 1px solid #f0e9ff;
        padding: 4px 15px;
        border-left: 0
    }

    .blog_right_sidebar .newsletter_widget .input-group button i,
    .blog_right_sidebar .newsletter_widget .input-group button span {
        font-size: 14px;
        color: #fff
    }

    .blog_right_sidebar .post_category_widget .cat-list li {
        border-bottom: 1px solid #f0e9ff;
        transition: all 0.3s ease 0s;
        padding-bottom: 12px
    }

    .blog_right_sidebar .post_category_widget .cat-list li:last-child {
        border-bottom: 0
    }

    .blog_right_sidebar .post_category_widget .cat-list li a {
        font-size: 14px;
        line-height: 20px;
        color: #888888
    }

    .blog_right_sidebar .post_category_widget .cat-list li a p {
        margin-bottom: 0px
    }

    .blog_right_sidebar .post_category_widget .cat-list li+li {
        padding-top: 15px
    }

    .blog_right_sidebar .popular_post_widget .post_item .media-body {
        justify-content: center;
        align-self: center;
        padding-left: 20px
    }

    .blog_right_sidebar .popular_post_widget .post_item .media-body h3 {
        font-size: 16px;
        line-height: 20px;
        margin-bottom: 6px;
        transition: all 0.3s linear
    }

    .blog_right_sidebar .popular_post_widget .post_item .media-body a:hover {
        color: #fff
    }

    .blog_right_sidebar .popular_post_widget .post_item .media-body p {
        font-size: 14px;
        line-height: 21px;
        margin-bottom: 0px
    }

    .blog_right_sidebar .popular_post_widget .post_item+.post_item {
        margin-top: 20px
    }

    .blog_right_sidebar .tag_cloud_widget ul li {
        display: inline-block
    }

    .blog_right_sidebar .tag_cloud_widget ul li a {
        display: inline-block;
        border: 1px solid #eeeeee;
        background: #fff;
        padding: 4px 20px;
        margin-bottom: 8px;
        margin-right: 3px;
        transition: all 0.3s ease 0s;
        color: #888888;
        font-size: 13px
    }

    .blog_right_sidebar .tag_cloud_widget ul li a:hover {
        background: var(--themecolor);
        color: #fff !important;
        -webkit-text-fill-color: #fff;
        text-decoration: none;
        -webkit-transition: 0.5s;
        transition: 0.5s
    }

    .blog_right_sidebar .instagram_feeds .instagram_row {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        margin-right: -6px;
        margin-left: -6px
    }

    .blog_right_sidebar .instagram_feeds .instagram_row li {
        width: 33.33%;
        float: left;
        padding-right: 6px;
        padding-left: 6px;
        margin-bottom: 15px
    }

    .blog_right_sidebar .br {
        width: 100%;
        height: 1px;
        background: #eee;
        margin: 30px 0px
    }

    .blog-pagination {
        margin-top: 80px
    }

    .blog-pagination .page-link {
        font-size: 14px;
        position: relative;
        display: block;
        padding: 0;
        text-align: center;
        margin-left: -1px;
        line-height: 45px;
        width: 45px;
        height: 45px;
        border-radius: 0 !important;
        color: #8a8a8a;
        border: 1px solid #f0e9ff;
        margin-right: 10px
    }

    .blog-pagination .page-link i,
    .blog-pagination .page-link span {
        font-size: 13px
    }

    .blog-pagination .page-item.active .page-link {
        background-color: #fbf9ff;
        border-color: #f0e9ff;
        color: #888888
    }

    .blog-pagination .page-item:last-child .page-link {
        margin-right: 0
    }

    .single-post-area .blog_details {
        box-shadow: none;
        padding: 0
    }

    .single-post-area .social-links {
        padding-top: 10px
    }

    .single-post-area .social-links li {
        display: inline-block;
        margin-bottom: 10px
    }

    .single-post-area .social-links li a {
        color: #cccccc;
        padding: 7px;
        font-size: 14px;
        transition: all 0.2s linear
    }

    .single-post-area .blog_details {
        padding-top: 26px
    }

    .single-post-area .blog_details p {
        margin-bottom: 20px;
        font-size: 15px
    }

    .single-post-area .quote-wrapper {
        background: rgba(130, 139, 178, 0.1);
        padding: 15px;
        line-height: 1.733;
        color: #888888;
        font-style: italic;
        margin-top: 25px;
        margin-bottom: 25px
    }

    @media (min-width: 768px) {
        .single-post-area .quote-wrapper {
            padding: 30px
        }
    }

    .single-post-area .quotes {
        background: #fff;
        padding: 15px 15px 15px 20px;
        border-left: 2px solid
    }

    @media (min-width: 768px) {
        .single-post-area .quotes {
            padding: 25px 25px 25px 30px
        }
    }

    .single-post-area .arrow {
        position: absolute
    }

    .single-post-area .arrow .lnr {
        font-size: 20px;
        font-weight: 600
    }

    .single-post-area .thumb .overlay-bg {
        background: rgba(0, 0, 0, 0.8)
    }

    .single-post-area .navigation-top {
        padding-top: 15px;
        border-top: 1px solid #f0e9ff
    }

    .single-post-area .navigation-top p {
        margin-bottom: 0
    }

    .single-post-area .navigation-top .like-info {
        font-size: 14px
    }

    .single-post-area .navigation-top .like-info i,
    .single-post-area .navigation-top .like-info span {
        font-size: 16px;
        margin-right: 5px
    }

    .single-post-area .navigation-top .comment-count {
        font-size: 14px
    }

    .single-post-area .navigation-top .comment-count i,
    .single-post-area .navigation-top .comment-count span {
        font-size: 16px;
        margin-right: 5px
    }

    .single-post-area .navigation-top .social-icons li {
        display: inline-block;
        margin-right: 15px
    }

    .single-post-area .navigation-top .social-icons li:last-child {
        margin: 0
    }

    .single-post-area .navigation-top .social-icons li i,
    .single-post-area .navigation-top .social-icons li span {
        font-size: 14px;
        color: #999999
    }

    .single-post-area .blog-author {
        padding: 40px 30px;
        background: #fbf9ff;
        margin-top: 50px
    }

    @media (max-width: 600px) {
        .single-post-area .blog-author {
            padding: 20px 8px
        }
    }

    .single-post-area .blog-author img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        margin-right: 30px
    }

    @media (max-width: 600px) {
        .single-post-area .blog-author img {
            margin-right: 15px;
            width: 45px;
            height: 45px
        }
    }

    .single-post-area .blog-author a {
        display: inline-block
    }

    .single-post-area .blog-author a:hover {
        color: var(--themecolor)
    }

    .single-post-area .blog-author p {
        margin-bottom: 0;
        font-size: 15px
    }

    .single-post-area .blog-author h4 {
        font-size: 16px
    }

    .single-post-area .navigation-area {
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
        margin-top: 55px
    }

    .single-post-area .navigation-area p {
        margin-bottom: 0px
    }

    .single-post-area .navigation-area h4 {
        font-size: 18px;
        line-height: 25px
    }

    .single-post-area .navigation-area .nav-left {
        text-align: left
    }

    .single-post-area .navigation-area .nav-left .thumb {
        margin-right: 20px;
        background: #000
    }

    .single-post-area .navigation-area .nav-left .thumb img {
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .single-post-area .navigation-area .nav-left .lnr {
        margin-left: 20px;
        opacity: 0;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .single-post-area .navigation-area .nav-left:hover .lnr {
        opacity: 1
    }

    .single-post-area .navigation-area .nav-left:hover .thumb img {
        opacity: .5
    }

    @media (max-width: 767px) {
        .single-post-area .navigation-area .nav-left {
            margin-bottom: 30px
        }
    }

    .single-post-area .navigation-area .nav-right {
        text-align: right
    }

    .single-post-area .navigation-area .nav-right .thumb {
        margin-left: 20px;
        background: #000
    }

    .single-post-area .navigation-area .nav-right .thumb img {
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .single-post-area .navigation-area .nav-right .lnr {
        margin-right: 20px;
        opacity: 0;
        -webkit-transition: all .3s ease-out 0s;
        -moz-transition: all .3s ease-out 0s;
        -ms-transition: all .3s ease-out 0s;
        -o-transition: all .3s ease-out 0s;
        transition: all .3s ease-out 0s
    }

    .single-post-area .navigation-area .nav-right:hover .lnr {
        opacity: 1
    }

    .single-post-area .navigation-area .nav-right:hover .thumb img {
        opacity: .5
    }

    @media (max-width: 991px) {
        .single-post-area .sidebar-widgets {
            padding-bottom: 0px
        }
    }

    .comments-area {
        background: transparent;
        border-top: 1px solid #eee;
        padding: 45px 0;
        margin-top: 50px
    }

    @media (max-width: 414px) {
        .comments-area {
            padding: 50px 8px
        }
    }

    .comments-area h4 {
        margin-bottom: 35px;
        font-size: 18px
    }

    .comments-area h5 {
        font-size: 16px;
        margin-bottom: 0px
    }

    .comments-area .comment-list {
        padding-bottom: 48px
    }

    .comments-area .comment-list:last-child {
        padding-bottom: 0px
    }

    .comments-area .comment-list.left-padding {
        padding-left: 25px
    }

    @media (max-width: 413px) {
        .comments-area .comment-list .single-comment h5 {
            font-size: 12px
        }

        .comments-area .comment-list .single-comment .date {
            font-size: 11px
        }

        .comments-area .comment-list .single-comment .comment {
            font-size: 10px
        }
    }

    .comments-area .thumb {
        margin-right: 20px
    }

    .comments-area .thumb img {
        width: 70px;
        border-radius: 50%
    }

    .comments-area .date {
        font-size: 14px;
        color: #999999;
        margin-bottom: 0;
        margin-left: 20px
    }

    .comments-area .comment {
        margin-bottom: 10px;
        color: #777777;
        font-size: 15px
    }

    .comments-area .btn-reply {
        background-color: transparent;
        color: #888888;
        padding: 5px 18px;
        font-size: 14px;
        display: block;
        font-weight: 400
    }

    .comment-form {
        border-top: 1px solid #eee;
        padding-top: 45px;
        margin-top: 50px;
        margin-bottom: 20px
    }

    .comment-form .form-group {
        margin-bottom: 30px
    }

    .comment-form h4 {
        margin-bottom: 40px;
        font-size: 18px;
        line-height: 22px
    }

    .comment-form .name {
        padding-left: 0px
    }

    @media (max-width: 767px) {
        .comment-form .name {
            padding-right: 0px;
            margin-bottom: 1rem
        }
    }

    .comment-form .email {
        padding-right: 0px
    }

    @media (max-width: 991px) {
        .comment-form .email {
            padding-left: 0px
        }
    }

    .comment-form .form-control {
        border: 1px solid #f0e9ff;
        border-radius: 5px;
        height: 48px;
        padding-left: 18px;
        font-size: 13px;
        background: transparent
    }

    .comment-form .form-control:focus {
        outline: 0;
        box-shadow: none
    }


    .comment-form .form-control::placeholder {
        font-weight: 300;
        color: #999999
    }

    .comment-form .form-control::placeholder {
        color: #777777
    }

    .comment-form textarea {
        padding-top: 18px;
        border-radius: 12px;
        height: 100% !important
    }

    .comment-form ::-webkit-input-placeholder {
        font-size: 13px;
        color: #777
    }

    .comment-form ::-moz-placeholder {
        font-size: 13px;
        color: #777
    }

    .comment-form :-ms-input-placeholder {
        font-size: 13px;
        color: #777
    }

    .comment-form :-moz-placeholder {
        font-size: 13px;
        color: #777
    }

    .media {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    .img-fluid {
        width: 100%
    }

    .form-group {
        margin-bottom: 1rem
    }

    .dropdown .dropdown-menu {
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s
    }

    .contact-info {
        margin-bottom: 25px
    }

    .contact-info__icon {
        margin-right: 20px
    }

    .contact-info__icon i,
    .contact-info__icon span {
        color: #8f9195;
        font-size: 27px
    }

    .contact-info .media-body h3 {
        font-size: 16px;
        margin-bottom: 0;
        font-size: 16px;
        color: #2a2a2a
    }

    .contact-info .media-body h3 a:hover {
        color: #1f2b7b
    }

    .contact-info .media-body p {
        color: #8a8a8a
    }

    .contact-title {
        font-size: 27px;
        font-weight: 600;
        margin-bottom: 20px
    }

    .form-contact label {
        font-size: 14px
    }

    .form-contact .form-group {
        margin-bottom: 30px
    }

    .form-contact .form-control {
        border: 1px solid #e5e6e9;
        border-radius: 0px;
        height: 48px;
        padding-left: 18px;
        font-size: 13px;
        background: transparent
    }

    .form-contact .form-control:focus {
        outline: 0;
        box-shadow: none
    }

    .form-contact .form-control::placeholder {
        font-weight: 300;
        color: #999999
    }

    .form-contact textarea {
        border-radius: 0px;
        height: 100% !important
    }

    .modal-message .modal-dialog {
        position: absolute;
        top: 36%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%) !important;
        margin: 0px;
        max-width: 500px;
        width: 100%
    }

    .modal-message .modal-dialog .modal-content .modal-header {
        text-align: center;
        display: block;
        border-bottom: none;
        padding-top: 50px;
        padding-bottom: 50px
    }

    .modal-message .modal-dialog .modal-content .modal-header .close {
        position: absolute;
        right: -15px;
        top: -15px;
        padding: 0px;
        color: #fff;
        opacity: 1;
        cursor: pointer
    }

    .modal-message .modal-dialog .modal-content .modal-header h2 {
        display: block;
        text-align: center;
        padding-bottom: 10px
    }

    .modal-message .modal-dialog .modal-content .modal-header p {
        display: block
    }

    .contact-section {
        padding: 50px 0 50px
    }

    @media (max-width: 991px) {
        .contact-section {
            padding: 50px 0 40px
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {
        .contact-section {
            padding: 50px 0 50px
        }
    }

    .contact-section .btn_2 {
        background-color: #191d34;
        padding: 18px 60px;
        border-radius: 50px;
        margin-top: 0
    }

    .contact-section .btn_2:hover {
        background-color: #1f2b7b
    }

    .bradcam_area {
        background-size: cover;
        background-position: center center;
        padding: 160px 0;
        background-position: bottom;
        background-repeat: no-repeat
    }

    @media (max-width: 767px) {
        .bradcam_area {
            padding: 150px 0
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .bradcam_area {
            padding: 150px 0
        }
    }

    .bradcam_area h3 {
        font-size: 50px;
        color: #fff;
        font-weight: 900;
        margin-bottom: 0;
        font-family: "Jost", sans-serif;
        text-transform: capitalize
    }

    @media (max-width: 767px) {
        .bradcam_area h3 {
            font-size: 30px
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .bradcam_area h3 {
            font-size: 40px
        }
    }

    .popup_box {
        background: #fff;
        display: inline-block;
        z-index: 9;
        width: 681px;
        padding: 60px 40px
    }

    @media (max-width: 767px) {
        .popup_box {
            width: 320px;
            padding: 45px 30px
        }
    }

    @media only screen and (min-width: 480px) and (max-width: 767px) {
        .popup_box {
            width: 420px !important;
            padding: 45px 30px
        }
    }

    .popup_box h3 {
        text-align: center;
        font-size: 22px;
        color: #1F1F1F;
        margin-bottom: 46px
    }

    .popup_box .boxed-btn3 {
        width: 100%;
        text-transform: capitalize
    }

    .popup_box .nice-select {
        -webkit-tap-highlight-color: transparent;
        background-color: #fff;
        border: solid 1px #E2E2E2;
        box-sizing: border-box;
        clear: both;
        cursor: pointer;
        display: block;
        float: left;
        font-family: "Jost", sans-serif;
        font-weight: normal;
        width: 100% !important;
        line-height: 50px;
        outline: none;
        padding-left: 18px;
        padding-right: 30px;
        position: relative;
        text-align: left !important;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        white-space: nowrap;
        width: auto;
        border-radius: 0;
        margin-bottom: 30px;
        height: 50px !important;
        font-size: 16px;
        font-weight: 400;
        color: #919191
    }

    .popup_box .nice-select::after {
        content: "\f0d7";
        display: block;
        height: 5px;
        margin-top: -5px;
        pointer-events: none;
        position: absolute;
        right: 17px;
        top: 3px;
        transition: all 0.15s ease-in-out;
        width: 5px;
        font-family: fontawesome;
        color: #919191;
        font-size: 15px
    }

    .popup_box .nice-select.open .list {
        opacity: 1;
        pointer-events: auto;
        -webkit-transform: scale(1) translateY(0);
        -ms-transform: scale(1) translateY(0);
        transform: scale(1) translateY(0);
        height: 200px;
        overflow-y: scroll
    }

    .popup_box .nice-select.list {
        height: 200px;
        overflow-y: scroll
    }

    #test-form {
        display: inline-block;
        margin: auto;
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
    }

    @media (max-width: 767px) {
        #test-form {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transform: none;
            -ms-transform: none;
            transform: none
        }
    }

    #test-form .mfp-close-btn-in .mfp-close {
        color: #333;
        display: none !important
    }

    #test-form button.mfp-close {
        display: none !important
    }

    @media (max-width: 767px) {
        #test-form button.mfp-close {
            display: block !important;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto
        }
    }

    #test-form button.mfp-close {
        overflow: visible;
        cursor: pointer;
        background: transparent;
        border: 0;
        -webkit-appearance: none;
        display: block;
        outline: none;
        padding: 0;
        z-index: 1046;
        box-shadow: none;
        touch-action: manipulation;
        width: 40px;
        height: 40px;
        background: #4A3600;
        text-align: center;
        line-height: 20px;
        position: absolute;
        right: 0;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        position: absolute;
        right: -6px;
        color: #fff !important
    }

    .mfp-bg {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1042;
        overflow: hidden;
        position: fixed;
        background: #4A3600;
        opacity: 0.6
    }

    @media (max-width: 767px) {
        .gj-picker.gj-picker-md.timepicker {
            width: 310px;
            left: 6px !important
        }
    }

    @media (max-width: 767px) {
        .gj-picker.gj-picker-md.datepicker.gj-unselectable {
            width: 320px;
            left: 0 !important
        }
    }

    .overlay2::before {
        background: -moz-linear-gradient(left, rgba(48, 26, 34, 0.95) 0%, rgba(48, 26, 34, 0) 100%);
        background: -webkit-linear-gradient(left, rgba(48, 26, 34, 0.95) 0%, rgba(48, 26, 34, 0) 100%);
        background: linear-gradient(to right, rgba(48, 26, 34, 0.95) 0%, rgba(48, 26, 34, 0) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f2301a22', endColorstr='#00301a22', GradientType=1)
    }

    .btn.slider-btn,
    .btn_10 {
        background-image: -moz-linear-gradient(0deg, #f14437 0%, #ed5b0d 99%);
        background-image: -webkit-linear-gradient(0deg, #f14437 0%, #ed5b0d 99%);
        background-image: -ms-linear-gradient(0deg, #f14437 0%, #ed5b0d 99%)
    }

    .items-product1 .single-items .items-img::before {
        background: -moz-linear-gradient(top, rgba(41, 38, 33, 0) 0%, #292621 100%);
        background: -webkit-linear-gradient(top, rgba(41, 38, 33, 0) 0%, #292621 100%);
        background: linear-gradient(to bottom, rgba(41, 38, 33, 0) 0%, #292621 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00292621', endColorstr='#292621', GradientType=0)
    }

    .sample-text-area {
        background: #fff;
        padding: 100px 0 70px 0
    }

    .text-heading {
        margin-bottom: 30px;
        font-size: 24px
    }

    b,
    sup,
    sub,
    u,
    del {
        color: #1f2b7b
    }

    .typography h1,
    .typography h2,
    .typography h3,
    .typography h4,
    .typography h5,
    .typography h6 {
        color: #828bb2
    }

    .button-area {
        background: #fff
    }

    .button-area .border-top-generic {
        padding: 70px 15px;
        border-top: 1px dotted #eee
    }

    .button-group-area .genric-btn {
        margin-right: 10px;
        margin-top: 10px
    }

    .button-group-area .genric-btn:last-child {
        margin-right: 0
    }

    .genric-btn {
        display: inline-block;
        outline: none;
        line-height: 40px;
        padding: 0 30px;
        font-size: .8em;
        text-align: center;
        text-decoration: none;
        font-weight: 500;
        cursor: pointer;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s
    }

    .genric-btn:focus {
        outline: none
    }

    .genric-btn.e-large {
        padding: 0 40px;
        line-height: 50px
    }

    .genric-btn.large {
        line-height: 45px
    }

    .genric-btn.medium {
        line-height: 30px
    }

    .genric-btn.small {
        line-height: 25px
    }

    .genric-btn.radius {
        border-radius: 3px
    }

    .genric-btn.circle {
        border-radius: 20px
    }

    .genric-btn.arrow {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center
    }

    .genric-btn.arrow span {
        margin-left: 10px
    }

    .genric-btn.default {
        color: #415094;
        background: #f9f9ff;
        border: 1px solid transparent
    }

    .genric-btn.default:hover {
        border: 1px solid #f9f9ff;
        background: #fff
    }

    .genric-btn.default-border {
        border: 1px solid #f9f9ff;
        background: #fff
    }

    .genric-btn.default-border:hover {
        color: #415094;
        background: #f9f9ff;
        border: 1px solid transparent
    }

    .genric-btn.primary {
        color: #fff;
        background: #1f2b7b;
        border: 1px solid transparent
    }

    .genric-btn.primary:hover {
        color: #1f2b7b;
        border: 1px solid #1f2b7b;
        background: #fff
    }

    .genric-btn.primary-border {
        color: #1f2b7b;
        border: 1px solid #1f2b7b;
        background: #fff
    }

    .genric-btn.primary-border:hover {
        color: #fff;
        background: #1f2b7b;
        border: 1px solid transparent
    }

    .genric-btn.success {
        color: #fff;
        background: #4cd3e3;
        border: 1px solid transparent
    }

    .genric-btn.success:hover {
        color: #4cd3e3;
        border: 1px solid #4cd3e3;
        background: #fff
    }

    .genric-btn.success-border {
        color: #4cd3e3;
        border: 1px solid #4cd3e3;
        background: #fff
    }

    .genric-btn.success-border:hover {
        color: #fff;
        background: #4cd3e3;
        border: 1px solid transparent
    }

    .genric-btn.info {
        color: #fff;
        background: #38a4ff;
        border: 1px solid transparent
    }

    .genric-btn.info:hover {
        color: #38a4ff;
        border: 1px solid #38a4ff;
        background: #fff
    }

    .genric-btn.info-border {
        color: #38a4ff;
        border: 1px solid #38a4ff;
        background: #fff
    }

    .genric-btn.info-border:hover {
        color: #fff;
        background: #38a4ff;
        border: 1px solid transparent
    }

    .genric-btn.warning {
        color: #fff;
        background: #f4e700;
        border: 1px solid transparent
    }

    .genric-btn.warning:hover {
        color: #f4e700;
        border: 1px solid #f4e700;
        background: #fff
    }

    .genric-btn.warning-border {
        color: #f4e700;
        border: 1px solid #f4e700;
        background: #fff
    }

    .genric-btn.warning-border:hover {
        color: #fff;
        background: #f4e700;
        border: 1px solid transparent
    }

    .genric-btn.danger {
        color: #fff;
        background: #f44a40;
        border: 1px solid transparent
    }

    .genric-btn.danger:hover {
        color: #f44a40;
        border: 1px solid #f44a40;
        background: #fff
    }

    .genric-btn.danger-border {
        color: #f44a40;
        border: 1px solid #f44a40;
        background: #fff
    }

    .genric-btn.danger-border:hover {
        color: #fff;
        background: #f44a40;
        border: 1px solid transparent
    }

    .genric-btn.link {
        color: #415094;
        background: #f9f9ff;
        text-decoration: underline;
        border: 1px solid transparent
    }

    .genric-btn.link:hover {
        color: #415094;
        border: 1px solid #f9f9ff;
        background: #fff
    }

    .genric-btn.link-border {
        color: #415094;
        border: 1px solid #f9f9ff;
        background: #fff;
        text-decoration: underline
    }

    .genric-btn.link-border:hover {
        color: #415094;
        background: #f9f9ff;
        border: 1px solid transparent
    }

    .genric-btn.disable {
        color: #222, 0.3;
        background: #f9f9ff;
        border: 1px solid transparent;
        cursor: not-allowed
    }

    .generic-blockquote {
        padding: 30px 50px 30px 30px;
        background: #f9f9ff;
        border-left: 2px solid #1f2b7b
    }

    .progress-table-wrap {
        overflow-x: scroll
    }

    .progress-table {
        background: #f9f9ff;
        padding: 15px 0px 30px 0px;
        min-width: 800px
    }

    .progress-table .serial {
        width: 11.83%;
        padding-left: 30px
    }

    .progress-table .country {
        width: 28.07%
    }

    .progress-table .visit {
        width: 19.74%
    }

    .progress-table .percentage {
        width: 40.36%;
        padding-right: 50px
    }

    .progress-table .table-head {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    .progress-table .table-head .serial,
    .progress-table .table-head .country,
    .progress-table .table-head .visit,
    .progress-table .table-head .percentage {
        color: #415094;
        line-height: 40px;
        text-transform: uppercase;
        font-weight: 500
    }

    .progress-table .table-row {
        padding: 15px 0;
        border-top: 1px solid #edf3fd;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }

    .progress-table .table-row .serial,
    .progress-table .table-row .country,
    .progress-table .table-row .visit,
    .progress-table .table-row .percentage {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center
    }

    .progress-table .table-row .country img {
        margin-right: 15px
    }

    .progress-table .table-row .percentage .progress {
        width: 80%;
        border-radius: 0px;
        background: transparent
    }

    .progress-table .table-row .percentage .progress .progress-bar {
        height: 5px;
        line-height: 5px
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-1 {
        background-color: #6382e6
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-2 {
        background-color: #e66686
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-3 {
        background-color: #f09359
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-4 {
        background-color: #73fbaf
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-5 {
        background-color: #73fbaf
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-6 {
        background-color: #6382e6
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-7 {
        background-color: #a367e7
    }

    .progress-table .table-row .percentage .progress .progress-bar.color-8 {
        background-color: #e66686
    }

    .single-gallery-image {
        margin-top: 30px;
        background-repeat: no-repeat !important;
        background-position: center center !important;
        background-size: cover !important;
        height: 200px
    }

    .list-style {
        width: 14px;
        height: 14px
    }

    .unordered-list li {
        position: relative;
        padding-left: 30px;
        line-height: 1.82em !important
    }

    .unordered-list li:before {
        content: "";
        position: absolute;
        width: 14px;
        height: 14px;
        border: 3px solid #1f2b7b;
        background: #fff;
        top: 4px;
        left: 0;
        border-radius: 50%
    }

    .ordered-list {
        margin-left: 30px
    }

    .ordered-list li {
        list-style-type: decimal-leading-zero;
        color: #1f2b7b;
        font-weight: 500;
        line-height: 1.82em !important
    }

    .ordered-list li span {
        font-weight: 300;
        color: #828bb2
    }

    .ordered-list-alpha li {
        margin-left: 30px;
        list-style-type: lower-alpha;
        color: #1f2b7b;
        font-weight: 500;
        line-height: 1.82em !important
    }

    .ordered-list-alpha li span {
        font-weight: 300;
        color: #828bb2
    }

    .ordered-list-roman li {
        margin-left: 30px;
        list-style-type: lower-roman;
        color: #1f2b7b;
        font-weight: 500;
        line-height: 1.82em !important
    }

    .ordered-list-roman li span {
        font-weight: 300;
        color: #828bb2
    }

    .single-input {
        display: block;
        width: 100%;
        line-height: 40px;
        border: none;
        outline: none;
        background: #f9f9ff;
        padding: 0 20px
    }

    .single-input:focus {
        outline: none
    }

    .input-group-icon {
        position: relative
    }

    .input-group-icon .icon {
        position: absolute;
        left: 20px;
        top: 0;
        line-height: 40px;
        z-index: 3
    }

    .input-group-icon .icon i {
        color: #797979
    }

    .input-group-icon .single-input {
        padding-left: 45px
    }

    .single-textarea {
        display: block;
        width: 100%;
        line-height: 40px;
        border: none;
        outline: none;
        background: #f9f9ff;
        padding: 0 20px;
        height: 100px;
        resize: none
    }

    .single-textarea:focus {
        outline: none
    }

    .single-input-primary {
        display: block;
        width: 100%;
        line-height: 40px;
        border: 1px solid transparent;
        outline: none;
        background: #f9f9ff;
        padding: 0 20px
    }

    .single-input-primary:focus {
        outline: none;
        border: 1px solid #1f2b7b
    }

    .single-input-accent {
        display: block;
        width: 100%;
        line-height: 40px;
        border: 1px solid transparent;
        outline: none;
        background: #f9f9ff;
        padding: 0 20px
    }

    .single-input-accent:focus {
        outline: none;
        border: 1px solid #eb6b55
    }

    .single-input-secondary {
        display: block;
        width: 100%;
        line-height: 40px;
        border: 1px solid transparent;
        outline: none;
        background: #f9f9ff;
        padding: 0 20px
    }

    .single-input-secondary:focus {
        outline: none;
        border: 1px solid #f09359
    }

    .default-switch {
        width: 35px;
        height: 17px;
        border-radius: 8.5px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .default-switch input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer
    }

    .default-switch input+label {
        position: absolute;
        top: 1px;
        left: 1px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #1f2b7b;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
        box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.2);
        cursor: pointer
    }

    .default-switch input:checked+label {
        left: 19px
    }

    .primary-switch {
        width: 35px;
        height: 17px;
        border-radius: 8.5px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .primary-switch input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .primary-switch input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%
    }

    .primary-switch input+label:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        border-radius: 8.5px;
        cursor: pointer;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s
    }

    .primary-switch input+label:after {
        content: "";
        position: absolute;
        top: 1px;
        left: 1px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #fff;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
        box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.2);
        cursor: pointer
    }

    .primary-switch input:checked+label:after {
        left: 19px
    }

    .primary-switch input:checked+label:before {
        background: #1f2b7b
    }

    .confirm-switch {
        width: 35px;
        height: 17px;
        border-radius: 8.5px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .confirm-switch input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .confirm-switch input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%
    }

    .confirm-switch input+label:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        border-radius: 8.5px;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
        cursor: pointer
    }

    .confirm-switch input+label:after {
        content: "";
        position: absolute;
        top: 1px;
        left: 1px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #fff;
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        -o-transition: all 0.2s;
        transition: all 0.2s;
        box-shadow: 0px 4px 5px 0px rgba(0, 0, 0, 0.2);
        cursor: pointer
    }

    .confirm-switch input:checked+label:after {
        left: 19px
    }

    .confirm-switch input:checked+label:before {
        background: #4cd3e3
    }

    .primary-checkbox {
        width: 16px;
        height: 16px;
        border-radius: 3px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .primary-checkbox input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .primary-checkbox input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 3px;
        cursor: pointer;
        border: 1px solid #f1f1f1
    }

    .primary-checkbox input:checked+label {
        background: url(../img/elements/primary-check.png) no-repeat center center/cover;
        border: none
    }

    .confirm-checkbox {
        width: 16px;
        height: 16px;
        border-radius: 3px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .confirm-checkbox input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .confirm-checkbox input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 3px;
        cursor: pointer;
        border: 1px solid #f1f1f1
    }

    .confirm-checkbox input:checked+label {
        background: url(../img/elements/success-check.png) no-repeat center center/cover;
        border: none
    }

    .disabled-checkbox {
        width: 16px;
        height: 16px;
        border-radius: 3px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .disabled-checkbox input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .disabled-checkbox input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 3px;
        cursor: pointer;
        border: 1px solid #f1f1f1
    }

    .disabled-checkbox input:disabled {
        cursor: not-allowed;
        z-index: 3
    }

    .disabled-checkbox input:checked+label {
        background: url(../img/elements/disabled-check.png) no-repeat center center/cover;
        border: none
    }

    .primary-radio {
        width: 16px;
        height: 16px;
        border-radius: 8px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .primary-radio input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .primary-radio input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        cursor: pointer;
        border: 1px solid #f1f1f1
    }

    .primary-radio input:checked+label {
        background: url(../img/elements/primary-radio.png) no-repeat center center/cover;
        border: none
    }

    .confirm-radio {
        width: 16px;
        height: 16px;
        border-radius: 8px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .confirm-radio input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .confirm-radio input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        cursor: pointer;
        border: 1px solid #f1f1f1
    }

    .confirm-radio input:checked+label {
        background: url(../img/elements/success-radio.png) no-repeat center center/cover;
        border: none
    }

    .disabled-radio {
        width: 16px;
        height: 16px;
        border-radius: 8px;
        background: #f9f9ff;
        position: relative;
        cursor: pointer
    }

    .disabled-radio input {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        opacity: 0
    }

    .disabled-radio input+label {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        cursor: pointer;
        border: 1px solid #f1f1f1
    }

    .disabled-radio input:disabled {
        cursor: not-allowed;
        z-index: 3
    }

    .disabled-radio input:checked+label {
        background: url(../img/elements/disabled-radio.png) no-repeat center center/cover;
        border: none
    }

    .default-select {
        height: 40px
    }

    .default-select .nice-select {
        border: none;
        border-radius: 0px;
        height: 40px;
        background: #f9f9ff;
        padding-left: 20px;
        padding-right: 40px
    }

    .default-select .nice-select .list {
        margin-top: 0;
        border: none;
        border-radius: 0px;
        box-shadow: none;
        width: 100%;
        padding: 10px 0 10px 0px
    }

    .default-select .nice-select .list .option {
        font-weight: 300;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        line-height: 28px;
        min-height: 28px;
        font-size: 12px;
        padding-left: 20px
    }

    .default-select .nice-select .list .option.selected {
        color: #1f2b7b;
        background: transparent
    }

    .default-select .nice-select .list .option:hover {
        color: #1f2b7b;
        background: transparent
    }

    .default-select .current {
        margin-right: 50px;
        font-weight: 300
    }

    .default-select .nice-select::after {
        right: 20px
    }

    .form-select {
        height: 40px;
        width: 100%
    }

    .form-select .nice-select {
        border: none;
        border-radius: 0px;
        height: 40px;
        background: #f9f9ff;
        padding-left: 45px;
        padding-right: 40px;
        width: 100%
    }

    .form-select .nice-select .list {
        margin-top: 0;
        border: none;
        border-radius: 0px;
        box-shadow: none;
        width: 100%;
        padding: 10px 0 10px 0px
    }

    .form-select .nice-select .list .option {
        font-weight: 300;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        line-height: 28px;
        min-height: 28px;
        font-size: 12px;
        padding-left: 45px
    }

    .form-select .nice-select .list .option.selected {
        color: #1f2b7b;
        background: transparent
    }

    .form-select .nice-select .list .option:hover {
        color: #1f2b7b;
        background: transparent
    }

    .form-select .current {
        margin-right: 50px;
        font-weight: 300
    }

    .form-select .nice-select::after {
        right: 20px
    }

    .mt-10 {
        margin-top: 10px
    }

    .section-top-border {
        padding: 50px 0;
        border-top: 1px dotted #eee
    }

    .mb-30 {
        margin-bottom: 30px
    }

    .mt-30 {
        margin-top: 30px
    }

    .switch-wrap {
        margin-bottom: 10px
    }


    .c-btn_ {
        background: var(--themecolor);
        padding: 0.5rem 2rem;
        height: unset;
        border-radius: 10px;
    }

    .profile_picture {
        border-radius: 10px;
        width: 100%;

    }

    #cart_product_padding {
        background: #fff;
        padding: 50px 10px 50px 10px;
        box-shadow: 0px 10px 30px 0px rgb(13 12 13 / 20%);
        border-radius: 30px
    }

    @media screen and (max-width: 768px) {
        #cart_product_padding {
            padding: 10px 25px 10px 25px;
        }
    }

    @media screen and (min-width: 768px) {
        .profile_picture {
            border-radius: 10px;
            width: 300px;
        }
    }


    .c-product .c-product-back {
        background-color: #f7f7f7;
        height: 30vh;
    }

    .c-product .h1-testimonial-active button.slick-arrow i {
        color: white;
    }

    .c-product .c-product-card {
        margin-top: -13rem;
    }

    .c-product .c-product-card .c-top {
        background-color: #fff !important;
        padding: 0;
        box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -webkit-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -moz-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        border-radius: 15px !important;
    }

    .c-product .c-product-card .c-top .c-slider {
        padding: 0;
    }

    .c-product .c-product-card .c-top .c-slider .c-slider-img .c-siBox img {
        border-radius: 15px;
        height: 300px;
        object-fit: cover;
        width: 100%;
    }

    .c-product .c-product-card .c-top .c-Columnflex {
        display: flex;
    }

    .c-product .c-product-card .c-top .features-caption {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        padding: 1rem 0;
    }

    @media screen and (min-width: 768px) {
        .c-product .c-product-card .c-top .features-caption {
            padding: 1rem;
        }
    }

    .c-product .c-product-card .c-top .features-caption .c-name {
        background-color: var(--themecolor);
        border-radius: 15px;
        width: 100%;
        padding: 0.5rem 1rem;
    }

    .c-product .c-product-card .c-top .features-caption .c-name h4 {
        word-break: break-all;
        color: #fff;
        font-weight: bold;
        font-family: "msyhbold";
        margin-bottom: 0;
    }

    .c-product .c-product-card .c-top .features-caption .c-desc {
        padding-top: 0.5rem;
    }

    .c-product .c-product-card .c-top .features-caption .c-desc p {
        color: #000;
        margin-bottom: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        /* -webkit-line-clamp: 5; */
        -webkit-box-orient: vertical;
    }

    .c-product .c-product-card .c-detail {
        background-color: transparent !important;
    }

    .c-product .c-product-card .c-detail .features-caption h1 {
        color: #000 !important;
        text-align: center;
    }

    .c-product .c-product-card .c-detail .features-caption p {
        color: #000 !important;
        text-align: center;
    }

    .c-product .c-product-card .c-detail .features-caption .price {
        display: block !important;
        padding: 1rem 0;
    }

    .c-product .c-product-card .c-detail .features-caption .price h2 {
        color: #000 !important;
        text-align: center;
        margin-bottom: 0;
        font-weight: bold;
        font-family: "msyhbold";
    }

    .c-product .c-product-card .c-detail .features-caption .c-discount .c-discount-text {
        margin-bottom: 0 !important;
    }

    .c-product .c-product-card .c-detail .features-caption .c-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-btn .r-btn {
        background-color: var(--secondary_color);
        width: fit-content;
        color: #fff;
        font-weight: bold;
        font-family: "msyhbold";
        text-align: center;
        padding: 0.5rem 2rem;
        border-radius: 5px;
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX h2 {
        color: #000 !important;
        text-align: center;
        margin-bottom: 0;
        font-weight: bold;
        font-family: "msyhbold";
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget {
        padding: 1rem 0;
        margin: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget .quantity {
        overflow: hidden;
        margin-right: 0;
        float: unset;
        border-radius: 5px;
        border: 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget .quantity .pro-qty {
        border: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget .quantity .qtybtn {
        color: #000;
        width: 15%;
        float: unset;
        border-radius: 5px;
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget .quantity .minus_qty {
        background-color: #ebebeb;
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget .quantity .add_qty {
        background-color: var(--themecolor);
    }

    .c-product .c-product-card .c-detail .features-caption .c-priceBOX .product__details__widget .quantity input {
        background-color: #fff;
        width: 30%;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option {
        padding: 3rem 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories {
        box-shadow: 1px 1px 23px -2px rgba(0, 0, 0, 0.77);
        -webkit-box-shadow: 1px 1px 23px -2px rgba(0, 0, 0, 0.77);
        -moz-box-shadow: 1px 1px 23px -2px rgba(0, 0, 0, 0.77);
        border-radius: 15px;
        padding: 1.5rem;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX {
        padding-bottom: 1rem;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-title {
        background-color: var(--themecolor);
        border-radius: 10px;
        width: 100%;
        padding: 0.5rem 1rem;
        margin: auto;
    }

    @media screen and (min-width: 768px) {
        .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-title {
            width: 40%;
        }
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-title .menu_title {
        word-break: break-all;
        color: #fff !important;
        font-weight: bold;
        font-family: "msyhbold";
        margin-bottom: 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX {
        margin: 1rem 0;
        display: inline-flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
        align-items: center;
    }

    .c-selection {
        cursor: pointer !important;

    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection {
        padding: 0.2rem 0.5rem;
        position: relative;
        max-width: 100%;
        margin: 0.2rem 1rem;
        cursor: pointer;
        flex-grow: 0;
        flex-basis: 100%;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 1px 1px 10px -2px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: 1px 1px 10px -2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 1px 1px 10px -2px rgba(0, 0, 0, 0.2);
    }

    @media screen and (min-width: 768px) {
        .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection {
            margin: 0.5rem 1rem;
        }
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection .c-selection-box {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-left: 0;
        cursor: pointer;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection .c-selection-box .c-sb-box {
        display: flex;
        align-items: center;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection .c-selection-box .c-sb-box .c-sbb-left {
        display: flex;
        align-items: center;
    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection .c-selection-box .c-sb-box .c-sbb-left .c-single {
        display: none;
        margin-left: 0;

    }

    .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection .c-selection-box .c-sb-box p {
        margin-bottom: 0;
    }

    @media screen and (min-width: 768px) {
        .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection {
            max-width: 28%;
            flex-basis: 50%;
        }
    }

    @media screen and (min-width: 992px) {

        .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection {
            max-width: 17.5%;
            margin: 12px;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-product .c-product-card .c-detail .features-caption .c-option .select-Categories .c-optionBOX .c-selectionBOX .c-selection {
            max-width: 18%;
        }

        .login_image img {
            border-radius: 15px;
            margin-bottom: 50px;
        }
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes {
        background-color: unset;
        overflow: unset;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .slick-next {
        right: -35px;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .ti-angle-left {
        font-weight: bold;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .ti-angle-right {
        font-weight: bold;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .slick-prev {
        left: -35px;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-title {
        color: #000 !important;
        text-align: center;
        margin-bottom: 0;
        font-weight: bold;
        font-family: "msyhbold";
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex {
        padding-bottom: 1rem;
        width: 100%;
        background-color: #fff;
        border-radius: 15px;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 450px;
        box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -webkit-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -moz-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        border-radius: 15px !important;
        margin: 1rem 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-Pimg {
        border-radius: 15px;
        height: 200px;
        object-fit: cover;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-name {
        padding-top: 0.5rem;
        text-align: left;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-name h4 {
        font-family: "msyhbold";
        color: #000;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-desc {
        padding-top: 0.5rem;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-desc p {
        text-align: left;
        font-family: "msyhlight";
        color: #000;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-btm {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-btm .c-btn {
        background-color: var(--themecolor);
        color: #fff;
        border-radius: 15px;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-btm .t-price {
        font-family: "msyhbold";
        margin-bottom: 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-btm .t-promo-price {
        font-family: "msyhbold";
        margin-bottom: 0;
        text-decoration: line-through;
        color: #aaaaaa;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard {
        background-color: #fff;
        border-radius: 15px;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard:hover {
        background-color: #eaeaea;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-tag {
        background-color: var(--secondary_color);
        font-family: "msyhbold";
        color: #fff;
        width: 30%;
        padding: 0 0.5rem;
        text-align: center;
        border-radius: 15px;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-productImg {
        width: 100%;
        padding-top: 0.5rem;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-productImg img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 15px;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-name {
        padding-top: 0.5rem;
        text-align: left;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-name h3 {
        font-family: "msyhbold";
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-desc {
        padding-top: 0.5rem;
        text-align: left;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-top .c-desc p {
        font-family: "msyhlight";
        color: #000;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-height: 1.3;
        -webkit-box-orient: vertical;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-btm {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-btm .c-btn {
        background-color: var(--themecolor);
        color: #fff;
        border-radius: 15px;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-btm .t-price {
        font-family: "msyhbold";
        margin-bottom: 0;
    }

    .c-product .c-product-card .c-detail .features-caption .c-likes .c-Cardflex .c-listingCard .c-btm .t-promo-price {
        font-family: "msyhbold";
        margin-bottom: 0;
        text-decoration: line-through;
        color: #aaaaaa;
    }

    .c-login-back {
        background-color: #f7f7f7;
        height: 30vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .c-login-back .c-header h1 {
        font-family: "HanYiChaoCuHeiJian-1";
    }

    .c-login-form {
        margin-top: -8rem;
        min-height: 80vh !important;
    }

    @media screen and (min-width: 992px) {
        .c-login-form {
            margin-top: -14rem;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-login-form {
            margin-top: -15rem;
        }
    }

    .c-login-form .login-form {
        min-width: 80% !important;
        border-radius: 10px;
        padding: 1rem 2rem !important;
    }

    @media screen and (min-width: 768px) {
        .c-login-form .login-form {
            min-width: 60% !important;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-login-form .login-form {
            min-width: 40% !important;
        }
    }

    .c-login-form .c-input {
        border-radius: 10px;
    }

    .c-login-form .c-label {
        font-family: "msyhbold" !important;
    }

    .c-login-form .login-footer a {
        font-family: "msyh";
        color: var(--secondary_color) !important;
    }

    .c-login-form .login-footer .c-btn {
        background-color: var(--secondary_color) !important;
        padding: 0.5rem 3rem;
        height: unset;
        border-radius: 10px;
    }


    .c-register-back {
        background-color: #f7f7f7;
        height: 30vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .c-register-back .c-header h1 {
        font-family: "HanYiChaoCuHeiJian-1";
    }


    .c-profile-back {
        background-color: #f7f7f7;
        height: 15vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .c-profile-back .c-header h1 {
        font-family: "HanYiChaoCuHeiJian-1";
    }

    .c-register-form {
        margin-top: -7rem;
        min-height: 80vh !important;
    }

    @media screen and (min-width: 992px) {
        .c-register-form {
            margin-top: -5rem;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-register-form {
            margin-top: -7rem;
        }
    }

    .c-register-form .register-form {
        max-width: 80% !important;
        min-width: 80% !important;
        border-radius: 10px;
        padding: 1rem 2rem !important;
    }

    @media screen and (min-width: 768px) {
        .c-register-form .register-form {
            max-width: 60% !important;
            min-width: 60% !important;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-register-form .register-form {
            max-width: 40% !important;
            min-width: 40% !important;
        }
    }

    .c-register-form .c-input {
        border-radius: 10px;
    }

    .c-register-form .c-label {
        font-family: "msyhbold" !important;
    }

    .c-register-form .register-footer a {
        font-family: "msyh";
        color: var(--secondary_color) !important;
    }

    .c-register-form .register-footer .c-btn {
        background-color: var(--secondary_color) !important;
        padding: 0.5rem 2rem;
        height: unset;
        border-radius: 10px;
    }

    .c-home {
        background-color: #f4f4f4;
    }

    .c-home .c-slider-btn {
        border-radius: 15px;
    }

    .c-home .c-about {
        width: 100%;
        padding: 2rem;
        text-align: center;
        margin: auto;
    }

    @media screen and (min-width: 768px) {
        .c-home .c-about {
            width: 80%;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-home .c-about {
            width: 50%;
        }
    }

    .c-home .c-about .c-subtitle {
        font-family: "HanYiChaoCuHeiJian-1";
        text-align: center;
        padding-bottom: 2rem;
    }

    .c-home .c-about p {
        font-family: "msyh-1";
    }

    .c-home .c-home-listing {
        padding-bottom: 3rem;
        padding-top: 0;
    }

    .c-home .c-home-listing .c-subtitle {
        font-family: "HanYiChaoCuHeiJian-1";
        text-align: center;
        padding-bottom: 2rem;
    }

    .c-home .c-home-listing .c-home-listing-left {
        border-right: 2px solid #dbdbdb;
    }

    .c-home .c-home-listing .c-home-listing-left .c-category-listing {
        padding: 0 1rem 0;
        border: 0;
    }

    .c-home .c-home-listing .c-home-listing-left .c-category-listing .c-hll-search {
        box-shadow: -1px 1px 43px -12px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: -1px 1px 43px -12px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -1px 1px 43px -12px rgba(0, 0, 0, 0.75);
        border-radius: 15px;
    }

    .c-home .c-home-listing .c-home-listing-left .c-category-listing .c-hll-search .c-searchbar {
        border-radius: 15px;
    }

    .c-home .c-home-listing .c-home-listing-left .c-category-listing .c-hll-search .c-btn {
        background-color: var(--themecolor);
        color: #fff;
        border-radius: 15px;
    }

    .c-home .c-home-listing .c-home-listing-left .c-category-listing .c-checkmark {
        border-color: #dbdbdb !important;
    }

    .c-home .category-listing .single-listing .select-Categories .container input:checked~.checkmark {
        background-color: var(--secondary_color) !important;
        border-color: var(--secondary_color) !important;
    }

    .c-home .c-subAbout {
        padding: 1rem;
        background-image: url(../../assets/img/blog/single_blog_2.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-blend-mode: overlay;
        background-color: rgba(0, 0, 0, 0.8);
        background-size: cover;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .c-home .c-subAbout .c-text {
        width: 100%;
        padding: 2rem;
        text-align: center;
        margin: auto;
    }

    @media screen and (min-width: 768px) {
        .c-home .c-subAbout .c-text {
            width: 80%;
        }
    }

    @media screen and (min-width: 1440px) {
        .c-home .c-subAbout .c-text {
            width: 50%;
        }
    }

    .c-home .c-subAbout .c-text p {
        font-family: "msyh-1";
        color: #fff;
    }

    .c-productList .c-Cardflex {
        cursor: pointer;
        padding-bottom: 1rem;
        width: 100%;
    }

    .c-productList .c-Cardflex .c-listingCard {
        background-color: #fff;
        border-radius: 15px;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .c-productList .c-Cardflex .c-listingCard:hover {
        background-color: #eaeaea;
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-tag {
        background-color: var(--secondary_color);
        font-family: "msyhbold";
        color: #fff;
        width: 30%;
        padding: 0 0.5rem;
        text-align: center;
        border-radius: 15px;
        width: fit-content;
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-productImg {
        width: 100%;
        padding-top: 0.5rem;
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-productImg img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 15px;
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-name {
        padding-top: 0.5rem;
        text-align: left;
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-name h3 {
        font-family: "msyhbold";
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-desc {
        padding-top: 0.5rem;
        text-align: left;
    }

    .c-productList .c-Cardflex .c-listingCard .c-top .c-desc p {
        font-family: "msyhlight";
        color: #000;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-height: 1.3;
        -webkit-box-orient: vertical;
    }

    .c-productList .c-Cardflex .c-listingCard .c-btm {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-productList .c-Cardflex .c-listingCard .c-btm .c-btn {
        background-color: var(--themecolor);
        color: #fff;
        border-radius: 15px;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
    }

    .c-productList .c-Cardflex .c-listingCard .c-btm .t-price {
        font-family: "msyhbold";
        margin-bottom: 0;
    }

    .c-productList .c-Cardflex .c-listingCard .c-btm .t-promo-price {
        font-family: "msyhbold";
        margin-bottom: 0;
        text-decoration: line-through;
        color: #aaaaaa;
    }

    .c-productList .product__pag a {
        margin-bottom: 10px;
    }

    footer .c-footer {
        background-color: #f4f4f4;
        border-top: 10px solid var(--themecolor);
    }

    footer .c-footer .footer-tittle li {
        padding-bottom: 1rem;
    }

    footer .c-footer .c-footer-bold-title {
        color: #000 !important;
        font-family: "msyhbold";
        font-size: 18px !important;
        font-weight: bold !important;
        margin-bottom: 0.5rem !important;
    }

    footer .c-footer .c-footer-bold {
        color: #000 !important;
        font-family: "msyhbold";
        font-size: 18px !important;
        font-weight: bold !important;
    }

    footer .c-footer .c-footer-bold_ {
        color: #000 !important;
        font-family: "msyhbold";
        font-size: 18px !important;
        font-weight: bold !important;
        margin-bottom: 0 !important;
    }

    footer .c-footer .c-footer-light_ {
        color: #000 !important;
        font-family: "msyh-2";
        font-size: 18px !important;
        margin-bottom: 0 !important;
    }

    footer .c-footer .c-social {
        display: flex;
        align-items: center;
    }

    footer .c-footer .c-social li {
        padding-right: 1rem;
    }

    footer .c-footer .c-social li .c-social-bold {
        color: #000 !important;
        font-weight: bold !important;
        margin-bottom: 0 !important;
    }

    header .c-logo img {
        width: 100%;
    }

    @media screen and (min-width: 425px) {
        header .c-logo img {
            width: 100%;
        }
    }

    header .c-li {
        padding: 0 0.5rem !important;
        margin-bottom: 0;
        color: #000;
        font-family: "msyhbold";
        font-weight: bold;
    }

    header .slicknav_nav {
        margin-top: 0 !important;
    }

    header .c-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header .c-logo-mob {
        display: flex;
        align-items: center;
        margin-right: 4rem;
    }

    @media screen and (min-width: 992px) {
        header .c-logo-mob {
            margin-right: 0;
        }
    }

    header .c-logo-mob .c-lm-img {
        position: relative;
        margin: 0 0.5rem;
        padding: 0.2rem;
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header .c-logo-mob .c-lm-img .c-cart-logo {
        position: relative;
        cursor: pointer;
        color: #000;
    }

    header .c-logo-mob .c-lm-img .c-cart-logo .c-fa {
        font-size: 1.5rem;
    }

    header .c-logo-mob .c-lm-img .numberCircle {
        border-radius: 50%;
        width: 20px;
        height: 20px;
        /* padding: 6px; */
        background-color: #be1622;
        color: #fff;
        text-align: center;
        position: absolute;
        top: -0.5rem;
        left: 1.2rem;
        font-size: smaller;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart {
        background-color: #333333;
        min-width: 23rem;
        padding: 1rem;
        display: none;
    }

    @media screen and (min-width: 768px) {
        header .c-logo-mob .c-lm-img .c-dropdown-cart {
            display: block;
        }
    }

    .c-dc-header {
        border-bottom: 1px solid #000;
    }

    .c-dc-header p {
        color: #000;
        margin: 0;
        padding-bottom: 0.5rem;
        font-family: "msyhbold";
    }

    .shopping-cart {
        max-height: 260px;
        overflow-y: scroll;
    }

    .shopping-cart .c-cart-item {
        display: flex;
        padding: 1rem 0.5rem;
        position: relative;
    }

    .shopping-cart .c-cart-item .c-dc-delete {
        position: absolute;
        color: #fff;
        background-color: var(--secondary_color);
        width: 25px;
        height: 25px;
        justify-content: center;
        align-items: center;
        display: flex;
        top: 6px;
        left: 0px;
        border-radius: 50%;
        z-index: 10;
    }

    .shopping-cart .c-cart-item .c-cart-img {
        position: relative;
        padding-right: 0.5rem;
    }

    .shopping-cart .c-cart-item .c-cart-img img {
        width: 90px;
        height: 90px;
        object-fit: cover;
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-title {
        display: block;
        align-items: center;
        justify-content: space-between;
    }

    @media screen and (min-width: 768px) {
        .shopping-cart .c-cart-item .c-cart-desc .c-title {
            display: flex;
        }
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-title .c-dc-name p {
        color: #000f;
        margin: 0;
        font-family: "msyhbold";
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100px;
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-title .c-price {
        color: #000;
        margin: 0;
        font-family: "msyhbold";
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box {
        display: block;
        align-items: center;
        justify-content: center;
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quan {
        margin: 0;
        padding-right: 0;
        font-weight: 600;
        color: #000;
        text-align: center;
    }

    @media screen and (min-width: 768px) {
        .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quan {
            padding-right: 1rem;
            text-align: left;
        }
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box h4 {
        margin: 0;
        font-family: "YSHaoShenTi-2";
        padding-right: 1rem;
        color: #be1622;
        font-weight: bold;
    }

    @media screen and (min-width: 1440px) {
        .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box h4 {
            padding-right: 2rem;
        }
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity {
        width: 80%;
        border: 1px solid #fff;
        border-radius: 10px;
        margin: auto;
    }

    @media screen and (min-width: 768px) {

        .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity {
            width: 60%;
            border: 1px solid #fff;
            border-radius: 10px;
            margin: auto;
        }
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-btn-left {
        border: 0;
        padding: 0.5rem;
    }

    @media screen and (min-width: 768px) {
        .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-btn-left {
            padding: 1rem;
        }
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-btn-right {
        border: 0;
        padding: 0.5rem;
    }

    @media screen and (min-width: 768px) {
        .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-btn-right {
            padding: 1rem;
        }
    }

    .shopping-cart .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-input {
        background-color: #333333;
        color: #fff;
        border: 0;
        border: 0;
        text-align: center;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart .c-pay-button-box {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 0;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart .c-pay-button-box .c-button {
        margin: auto;
        background-color: #be1622;
        border-radius: 10px;
        font-family: "msyhbold";
        width: 80%;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart .c-pay-button-box .c-button a {
        color: #fff;
        text-decoration: none;
        width: 100%;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart .c-dc-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #fff;
        padding-top: 0.5rem;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart .c-dc-total h5 {
        color: #fff;
        margin: 0;
        font-family: "msyhbold";
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile {
        display: block;
        background-color: #333333;
        min-width: 19rem;
        padding: 1rem;
        top: 75%;
        left: -2.5rem;
    }

    @media screen and (min-width: 768px) {
        header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile {
            display: none;
        }
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-header {
        border-bottom: 1px solid #000;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-header p {
        color: #000;
        margin: 0;
        font-family: "msyhbold";
    }

    .c-dc-scroll {
        max-height: 360px;
        overflow-y: scroll;
    }

    @media screen and (min-width: 768px) {
        .c-dc-scroll {

            max-height: 260px;
        }
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item {
        display: flex;
        padding: 1rem 0.5rem;
        position: relative;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-dc-delete {
        position: absolute;
        color: #000;
        background-color: #bc001d;
        width: 25px;
        height: 25px;
        justify-content: center;
        align-items: center;
        display: flex;
        top: 6px;
        left: 0px;
        border-radius: 50%;
        z-index: 10;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-img {
        position: relative;
        padding-right: 0.5rem;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-img img {
        width: 90px;
        height: 90px;
        object-fit: cover;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-title {
        display: block;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 0.5rem;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-title .c-dc-name p {
        color: #000;
        margin: 0;
        font-family: "msyhbold";
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100px;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-title .c-price {
        color: #000;
        margin: 0;
        font-family: "msyhbold";
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box {
        display: block;
        align-items: center;
        justify-content: center;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box .c-quan {
        margin: 0;
        padding-right: 0;
        font-weight: 600;
        color: #000;
        text-align: center;
    }

    @media screen and (min-width: 768px) {
        header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box .c-quan {
            padding-right: 1rem;
            text-align: left;
        }
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box h4 {
        margin: 0;
        font-family: "YSHaoShenTi-2";
        padding-right: 1rem;
        color: #be1622;
        font-weight: bold;
    }

    @media screen and (min-width: 1440px) {
        header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box h4 {
            padding-right: 2rem;
        }
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box .c-quantity {
        width: 100%;
        border: 1px solid #000;
        border-radius: 10px;
        margin: auto;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-btn-left {
        border: 0;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-btn-right {
        border: 0;
    }

    header .c-logo-mob .c-lm-img .c-dropdown-cart-mobile .c-dc-scroll .c-cart-item .c-cart-desc .c-quantity-box .c-quantity .c-input {
        background-color: #333333;
        color: #000;
        border: 0;
        border: 0;
        text-align: center;
    }

    .c-pay-button-box {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1rem 0;
    }

    .c-pay-button-box .c-button {
        margin: auto;
        background-color: var(--secondary_color);
        border-radius: 10px;
        font-family: "msyhbold";
        width: 80%;
    }

    .c-pay-button-box .c-button a {
        color: #fff;
        text-decoration: none;
        width: 100%;
    }

    .c-dc-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #000;
        padding-top: 0.5rem;
    }

    .c-dc-total h5 {
        color: #000;
        margin: 0;
        font-family: "msyhbold";
    }

    header .c-logo-mob .c-lm-img .c-burger .slicknav_nav {
        margin-top: 0 !important;
    }

    header .c-logo-mob .c-lm-img_ {
        position: relative;
        margin: 0 0.5rem;
        padding: 0.2rem;
        background-color: var(--themecolor);
        border-radius: 10px;
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header .c-logo-mob .c-lm-img_ .c-cart-logo {
        position: relative;
        cursor: pointer;
    }

    header .c-logo-mob .c-lm-img_ .c-cart-logo .c-fa {
        font-size: 1.5rem;
        color: #fff;
    }

    header .c-logo-mob .c-lm-img_ .c-dropdown-a {
        width: 100%;
        text-align: center;
    }

    header .c-logo-mob .c-lm-img_ .c-dropdown-a p {
        margin-bottom: 0;
        border-bottom: 1px solid #dbdbdb;
        padding: 0.5rem 0;
        color: #000;
        font-family: "msyhbold";
        font-weight: bold;
    }

    .c-member .c-member-back {
        background-color: #f7f7f7;
        height: 30vh;
    }

    .c-member .c-memberCON {
        margin-top: -10rem;
        padding-bottom: 3rem;
    }

    .c-member .c-memberCON .c-mc-top {
        background-color: #fff;
        padding: 1rem;
        box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -webkit-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -moz-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-top .col-img .c-profile-img {
        width: 50%;
        margin: auto;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-img .c-profile-img {
            width: 100%;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-img .c-profile-img img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-top .col-info {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-info {
            width: 100%;
            align-items: unset;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-name {
        text-align: center;
        margin: 1rem 0;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-info .c-name {
            text-align: unset;
            margin: unset;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-name h4 {
        margin-bottom: 0;
        font-family: "msyhbold";
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-contact {
        text-align: center;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-info .c-contact {
            text-align: unset;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-contact p {
        margin-bottom: 0;
        font-family: "msyh";
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-address {
        text-align: center;
        margin: 1rem 0;
        width: 100%;
    }

    @media screen and (min-width: 768px) {
        .c-member .c-memberCON .c-mc-top .col-info .c-address {
            width: 50%;
        }
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-info .c-address {
            text-align: unset;
            margin: unset;
            width: 100%;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-address p {
        margin-bottom: 0;
        font-family: "msyh";
    }

    .c-member .c-memberCON .c-mc-top .col-info .c-btn {
        background-color: var(--themecolor);
        color: #fff;
        border-radius: 10px;
        font-family: "msyhbold";
        text-align: center;
        padding: 0.5rem 1rem;
        width: 40%;
        text-align: center;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-info .c-btn {
            width: fit-content;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-qr {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    .c-member .c-memberCON .c-mc-top .col-qr .c-qr-img {
        width: 50%;
        margin: auto;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-qr .c-qr-img {
            width: 100%;
        }
    }

    .c-member .c-memberCON .c-mc-top .col-qr .c-qr-img img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-top .col-qr .c-btn {
        cursor: pointer;
        background-color: var(--themecolor);
        color: #fff;
        border-radius: 10px;
        font-family: "msyhbold";
        text-align: center;
        padding: 0.5rem 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40%;
    }

    @media screen and (min-width: 992px) {
        .c-member .c-memberCON .c-mc-top .col-qr .c-btn {
            width: 80%;
        }
    }

    .c-member .c-memberCON .c-mc-bottom {
        margin-top: 3rem;
        background-color: #fff;
        padding: 1rem;
        box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -webkit-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        -moz-box-shadow: 2px 1px 5px 1px rgba(0, 0, 0, 0.49);
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill {
        display: flex;
        justify-content: space-between;
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .nav-item {
        padding: 0.5rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .nav-pills .nav-link.active {
        color: #fff;
        width: 100%;
        background-color: var(--themecolor);
        border-radius: 10px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .nav-pills .show>.nav-link {
        color: #fff;
        width: 100%;
        background-color: var(--themecolor);
        border-radius: 10px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .nav-pills .nav-link {
        color: #000;
        width: 100%;
        font-family: "msyhbold";
        border-radius: 10px;
        padding: 0.5rem 2rem;
        box-shadow: 1px 1px 10px -2px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: 1px 1px 10px -2px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 1px 1px 10px -2px rgba(0, 0, 0, 0.2);
    }

    @media screen and (min-width: 768px) {
        .c-member .c-memberCON .c-mc-bottom .c-nav-pill .nav-pills .nav-link {
            padding: 0.5rem 3rem;
        }
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .c-left {
        width: 60%;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .c-right {
        width: 30%;
        display: flex;
        justify-content: flex-end;
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .c-right .c-point {
        background-color: #f7f7f7;
        border-radius: 10px;
        width: 100%;
        height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem 0;
    }

    @media screen and (min-width: 768px) {
        .c-member .c-memberCON .c-mc-bottom .c-nav-pill .c-right .c-point {
            width: 50%;
        }
    }

    .c-member .c-memberCON .c-mc-bottom .c-nav-pill .c-right .c-point p {
        margin-bottom: 0;
        font-family: "msyhbold";
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher h4 {
        width: 100%;
        text-align: left;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 1rem 0;
        font-family: "msyhbold";
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher h4 span {
        background: #fff;
        padding: 0 1rem 0 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST {
        padding: 1rem 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST .c-card {
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST .c-card .c-productImg {
        width: 100%;
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST .c-card .c-productImg img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST .c-card .c-btnBOX {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST .c-card .c-btnBOX .c-btn {
        cursor: pointer;
        width: 48%;
        border-radius: 10px;
        background-color: var(--themecolor);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
        color: #fff;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher .c-voucherLIST .c-card .c-btnBOX .c-red {
        background-color: var(--secondary_color);
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other h4 {
        width: 100%;
        text-align: left;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 1rem 0;
        font-family: "msyhbold";
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other h4 span {
        background: #fff;
        padding: 0 1rem 0 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST {
        padding: 1rem 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST .c-card {
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST .c-card .c-productImg {
        width: 100%;
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST .c-card .c-productImg img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST .c-card .c-btnBOX {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST .c-card .c-btnBOX .c-btn {
        cursor: pointer;
        width: 48%;
        border-radius: 10px;
        background-color: var(--themecolor);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
        color: #fff;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-voucher-other .c-voucherLIST .c-card .c-btnBOX .c-red {
        background-color: var(--secondary_color);
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift h4 {
        width: 100%;
        text-align: left;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 1rem 0;
        font-family: "msyhbold";
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift h4 span {
        background: #fff;
        padding: 0 1rem 0 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST {
        padding: 1rem 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST .c-card {
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST .c-card .c-productImg {
        width: 100%;
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST .c-card .c-productImg img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST .c-card .c-btnBOX {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST .c-card .c-btnBOX .c-btn {
        cursor: pointer;
        width: 48%;
        border-radius: 10px;
        background-color: var(--themecolor);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
        color: #fff;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift .c-giftLIST .c-card .c-btnBOX .c-red {
        background-color: var(--secondary_color);
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other h4 {
        width: 100%;
        text-align: left;
        border-bottom: 1px solid #000;
        line-height: 0.1em;
        margin: 1rem 0;
        font-family: "msyhbold";
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other h4 span {
        background: #fff;
        padding: 0 1rem 0 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST {
        padding: 1rem 0;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST .c-card {
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST .c-card .c-productImg {
        width: 100%;
        padding-bottom: 1rem;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST .c-card .c-productImg img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST .c-card .c-btnBOX {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST .c-card .c-btnBOX .c-btn {
        cursor: pointer;
        width: 48%;
        border-radius: 10px;
        background-color: var(--themecolor);
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "msyhbold";
        padding: 0.5rem 1rem;
        color: #fff;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-gift-other .c-giftLIST .c-card .c-btnBOX .c-red {
        background-color: var(--secondary_color);
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-points .table thead th {
        font-family: "msyhbold";
        border-top: 0px solid #dee2e6;
        border-color: transparent;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-points .table th {
        border-color: transparent;
    }

    .c-member .c-memberCON .c-mc-bottom .c-pillCT .c-points .table td {
        border-color: transparent;
        padding: 0 0.75rem;
        font-family: "msyh";
    }

    .c-member .c-modal-content .c-modal-header {
        border: 0;
    }

    .c-member .c-modal-content .c-modal-header .c-close {
        font-weight: unset;
        font-family: "msyh";
    }

    .c-member .c-modal-content .c-modal-body .c-qr-title {
        text-align: center;
    }

    .c-member .c-modal-content .c-modal-body .c-qr-title h4 {
        margin-bottom: 0;
        font-family: "msyhbold";
        margin-bottom: 0;
    }

    .c-member .c-modal-content .c-modal-body .c-qr-img {
        width: 80%;
        margin: auto;
    }

    @media screen and (min-width: 768px) {
        .c-member .c-modal-content .c-modal-body .c-qr-img {
            width: 60%;
        }
    }

    .c-member .c-modal-content .c-modal-body .c-qr-img img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-modal-content .c-modal-body .c-voucher-img {
        width: 100%;
        margin: auto;
    }

    .c-member .c-modal-content .c-modal-body .c-voucher-img img {
        width: 100%;
        border-radius: 15px;
    }

    .c-member .c-modal-content .c-modal-body .c-voucher-title {
        padding-top: 1rem;
    }

    .c-member .c-modal-content .c-modal-body .c-voucher-title h4 {
        font-family: "msyhbold";
        margin-bottom: 0.5rem;
    }

    .c-member .c-modal-content .c-modal-body .c-voucher-title p {
        margin-bottom: 0;
    }

    .c-member .c-modal-content .c-modal-footer {
        justify-content: center;
        border: 0;
    }

    .c-member .c-modal-content .c-btn {
        cursor: pointer;
        background-color: var(--secondary_color);
        padding: 1rem 2rem;
        color: #fff;
        border-radius: 5px;
        font-family: "msyhbold";
        text-align: center;
        width: fit-content;
        font-size: 20px !important;
    }

    .c-member .c-modal-content .c-btnUSED {
        cursor: pointer;
        background-color: #959595;
        padding: 1rem 2rem;
        color: #fff;
        border-radius: 5px;
        font-family: "msyhbold";
        text-align: center;
        width: fit-content;
        font-size: 20px !important;
    }

    /*# sourceMappingURL=custom.css.map */
</style>