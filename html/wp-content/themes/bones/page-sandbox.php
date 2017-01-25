<?php
/*
 Template Name: Sandbox
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
      
      <!-- Good2Go: Maxmind IP lookup -->
      <div class="pen" id="maxmindLookup">      
        <div class="m-all">
          <h2>Maxmind IP Lookup Testing:</h2>
          <pre class="code-sandbox" id="maxmind"></pre>
        </div>
      </div>

      <!-- Good2Go: Quoteflow Breadcrumbs -->
      <div id="g2g-crumbs" class="pen">
        <style>
          #breadcrumbs {
            width:950px;
            height: 38px;
            background: #ffffcf;
            overflow:hidden;
          	border: 2px solid #ff5c00;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
          }
          
          #breadcrumbs ul {
            padding:0;
            margin:0;
          }
          
          .first {
            float:left;
            z-index:5;
            width:230px;
          }
          .second {
            float:left;
            z-index: 4;
            width:230px;
          }
          .third {
            float:left;
            z-index: 3;
            width:230px;
          }
          .fourth {
            float:right;
            width:255px;
          }
          
          #breadcrumbs ul li{
            position:relative;
            
            -webkit-font-smoothing: antialiased;
            color: #989898;
            font-size: 15px;
            font-family: "Open Sans", sans-serif;
            letter-spacing: .2px;
            font-weight:700;
            line-height:34px;
            text-align:center;
            
            display:block;
            height:34px;
          }
          #breadcrumbs ul li.active, #breadcrumbs ul li.completed{
            color: #ffffff;
            background: #ff7d41; /* Old browsers */
            background: -moz-linear-gradient(top,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: -webkit-gradient(top,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  #ff7d41 0%,#ff9e43 50%,#ff8403 51%,#ffa300 100%); /* Chrome10-25,Safari5.1-6 */
            background: -o-linear-gradient(top,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: -ms-linear-gradient(top,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: linear-gradient(top,  #ff7d41 0%,#ff9e43 50%,#ff8403 51%,#ffa300 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
          }
          
          #breadcrumbs ul li.arrow:after{
          	position: absolute;
          	top: 3px; right: -12px;
          	width: 26px;
          	height: 26px;
          	
          	-ms-transform: rotate(135deg) skewX(0deg) skewY(0deg);
          	-webkit-transform: rotate(135deg) skewX(0deg) skewY(0deg);
          	transform: rotate(135deg) skewX(0deg) skewY(0deg);
          	
            background: #ffffcf; /* Old browsers */
            border-top:2px solid #ff5c00;
            border-left: 2px solid #ff5c00;
          	content: '';
          }
          #breadcrumbs ul li.arrow.active:after, #breadcrumbs ul li.arrow.completed:after{
          	position: absolute;
          	top: 3px; right: -12px;
          	width: 26px;
          	height: 26px;
          	
          	-ms-transform: rotate(135deg) skewX(0deg) skewY(0deg);
          	-webkit-transform: rotate(135deg) skewX(0deg) skewY(0deg);
          	transform: rotate(135deg) skewX(0deg) skewY(0deg);
          	
            background: #ff7d41; /* Old browsers */
            background: -moz-linear-gradient(45deg,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: -webkit-gradient(45deg,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(45deg,  #ff7d41 0%,#ff9e43 50%,#ff8403 51%,#ffa300 100%); /* Chrome10-25,Safari5.1-6 */
            background: -o-linear-gradient(45deg,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: -ms-linear-gradient(45deg,  #ff7d41 0%, #ff9e43 50%, #ff8403 51%, #ffa300 100%); /* FF3.6-15 */
            background: linear-gradient(45deg,  #ff7d41 0%,#ff9e43 50%,#ff8403 51%,#ffa300 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
          	content: '';
          }
        </style>
        <div id="breadcrumbs">
          <ul>
            <li class="arrow active first" data-step="0">
              1. Vehicle
            </li>
            <li class="arrow second" data-step="1">
              2. Driver
            </li>
            <li class="arrow third" data-step="2">
              3. Insurance Quote
            </li>
            <li class="fourth" data-step="3">
              4. Payment Information
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Good2Go: Pay By Phone Sidebar CTA -->
      <div id="g2g-phone-sidebar" class="pen">
        <style>
          .help-call {
            margin: 0 10px 30px 10px;
            padding: 0 0 10px 0;
            border-bottom: 5px solid #4a5457;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-family: "Open Sans", sans-serif;
            max-width:255px;
          }
          .help-call-inner{
            max-width: 230px;
            margin:0 auto;
          }
          .help-call img {
            width: 130px;
            height: auto;
            position: absolute;
            top: 0;
            right: 15px;
          }
          .help-call .help-header {
            margin: 30px 0 0 0;
            font-size: 38px;
            font-weight: 700;
            display: inline-block;
            line-height: 125%;
            position: relative;
            z-index: 2;
            color: #4a5457;
          }
          .help-call .help-number {
            display: block;
            position: relative;
            z-index: 2;
            margin: 10px 0 0 0;
            line-height: 125%;
            font-size: 24px;
            font-weight: 700;
            color: #4a5457;
          }
          .help-call .help-number-numbers {
            display: block;
            position: relative;
            text-align: right;
            z-index: 2;
            font-weight: 700;
            margin: 0 5px 10px 0;
            line-height: 125%;
            font-size: 20px;
            font-weight: 600;
            color: #4a5457;
          }
          .help-call .help-disclaimer {
            margin: 5px 0 0 0;
            display: block;
            font-size: 14px;
            position: relative;
            z-index: 2;
            font-weight: 500;
            line-height: 130%;
            color: #4a5457;
          }  
        </style>
        <div class="help-call">
          <div class="help-call-inner">
            <span class="help-header">Need<br>Help?</span>
            <img width="369" height="402" src="https://direct.good2go.com/wp-content/uploads/2015/08/G2G-Customer-Service-Rep.png" class="rep-image" alt=""> <span class="help-number call-text-number phone-number">CALL 855-MINIMO1</span>
            <span class="help-number-numbers numbers par-number phone-number">(855-646-4661)</span>
            <span class="help-disclaimer">Our support team is available 24/7 </span>
          </div>
        </div>
      </div>
		</div>
	</div>
<?php get_footer(); ?>

