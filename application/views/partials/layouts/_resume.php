<?php
	if ($this->agent->is_mobile()) {
		echo "<div class ='center'>Scroll around US to see what I've been up to</div>";
	}
	if ($this->agent->is_mobile()) {
		$width = '100%';
		$height = '450px';
	} else {
		$width = '650px';
		$height = '450px';		
	}
?>
<div id = 'map'>
	<a id="pdfResume" href = "<?php echo BASE_URL; ?>public/pdfs/Full_Resume_May_2014.pdf" target="_blank">PDF Resume</a>
	<div id="resume_canvas" style="width:<?php echo $width;?>; height:<?php echo $height;?>"></div>
</div>
<div id = "resumemain">
</div>
<div id = "footer"></div>

<div id = "meOverlay" class ="overlay">
	<div id = "meOverlay-panel">
	<div class ="close_button"></div>
	<dl class = 'top'>   
		<dt  class = "title">About Me</dt>
	</dl>
	<dl>
		<dt>E-mail Address:</dt>
		<dd>nkato3@gmail.com</dd>
	</dl>
	<dl>
		<dt>Citizenship:</dt>
			<dd>USA</dd>
	</dl>	
		<dl>
			<dt>Computer Languages</dt>
		</dl>
				<ul>
				  <li>PHP (ZendFramework I, ZendFramework II, WordPress, and CodeIgniter), CSS (CSS3, Less), JavaScript (JQuery, Mustache, and YUI), AJAX, Java, Python, MATLAB, Unix, JSON, SQL, HTML (HTML5), XML, XSD, Tea, Assembly, C, and Verilog</li>
				</ul>
		<dl>
			<dt>Software Programs</dt>
		</dl>
				<ul>
				  <li>Eclipse, Perforce, Sublime, Git, Apache, Bamboo, GoPublish, JMeter, Jira, Fisheye, Maven, Content Editor (Content Management System), Tomcat, YSlow, Adobe Photoshop &amp; Illustrator, SharePoint, Multisim, MS Excel, MS PowerPoint, MS Visual Studio, Koala, Subversion, Windows and Unix Servers</li>
				</ul>
		<dl>
		        <dt>Additional</dt>
			</dl>
			<ul>
			  <li>Dermal, Solder, Mill, Breadboard, and multimeter, Arduino, GPS receivers, Texas Instruments 16 bit MSP430 Microcontroller, F5</li>
			  </ul>
	</div>
	<div class ="background"></div>
</div>

<div id = "highSchoolOverlay" class ="overlay">
	<div id ="highSchoolOverlay-panel">
		<div class ="close_button"></div>
		<dl class = 'top'>
			<dt class="title">Campbell Hall High School</dt>
		</dl>
		<dl>
			<dt>Graduated</dt>
		</dl>
		<ul>
			<li>2007</li>
		</ul>
		<dl>
			<dt>Awards</dt>
		</dl>
		<ul>
				<li>Japanese Language Award 2007</li>
				<li>Japanese Honors Society 2003-2007</li>
				<li>California Scholarship Federation 2007</li>
		</ul>
		<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href="http://www.campbellhall.org/" target="_blank">Campbell Hall Website</a></dd>
		</dl>
	</div>	
	<div class ="background"></div>
</div>
<div id = "collegeOverlay" class ="overlay">
	<div id ="collegeOverlay-panel">
		<div class ="close_button"></div>
		<dl class = 'top'>
			<dt class = "title">Swarthmore College</dt>
		</dl>
		<dl>
			<dt>Graduated</dt>
		</dl>
		<ul>
			<li>Bachelor of Arts Degree, May 29, 2011</li>
			<li class = "add">Major: Economics </li>
			<li >Bachelor of Science, May 29, 2011</li>
			<li class = "add">Major: Engineering (General)</li>
			<li class = "add">Engineer in Training, June 17, 2010</li>
		</ul>
		<dl>
			<dt>Awards</dt>
		</dl>
		<ul>
				<li>Delaware Valley Engineers Week Student Paper Competition, 2011</li>
				<li>American Leadership Award (Full Tuition), Richards Family Foundation, Spring/Fall 2009, Spring/Fall 2010, Spring 2011</li>
				<li>Experimental Summer Fellowship, Summer 2009</li>
				<li>San Fernando Valley Nikkei Youth Scholarship Award, Fall 2009</li>
		</ul>
		<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href = 'http://www.swarthmore.edu/' target='_blank'>Swarthmore College Website</a></dd>
			<dd><a href='http://colleges.usnews.rankingsandreviews.com/best-colleges/swarthmore-college-3370' target='_blank'> US News &amp; World Report</a></dd>
			<dd><a href='http://www.forbes.com/colleges/swarthmore-college/' target='_blank'>Forbes</a></dd>
		</dl>
	</div>
	<div class ="background"></div>
</div>
<div id ="PNTOverlay" class ="overlay">

	<div id ="PNTOverlay-panel">
	<div class ="close_button"></div>

	<dl class = 'top'>
		<dt class = "title">Position Navigation and Timing, <br/>Research and Innovative Technology Administration (RITA), US Department of Transportation</dt>
	</dl>
	<dl>
		<dt>Internship <span class = "date">Jun. to Aug.2010</span></dt>
	</dl>
		<ul>
		  <li>Wrote US DOT Strategic Plan Implantation with PNT FY 2010-FY2015 on position, navigation, and timing technology is used to accomplish the goals set by the US DOT Strategic Plan 2010-2015.</li>
		  <li>Developed a cognitive website template for different departments within RITA.  This was a collaborative project with PNT staff offering guidance and suggestions.</li>
		  <li>Reported directly to Ms. Karen Van Dyke, Director, Position, Navigation, Timing (PNT) (Acting), DOT/RITA.</li>
		  <li>Attended 2010 Asian-Pacific Economic Cooperation (APEC) Meeting on Global Navigation Satellite Systems (GNSS) Implementation Team in Seattle, Washington.  Nine APEC countries and several GNSS related companies such as Raytheon, MITRE, Boeing, and OnStar attended. </li>
		</ul>
		<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href="http://www.rita.dot.gov/pnt/" target="_blank">Position Navigation &amp; Timing Department</a></dd>
		</dl>
	</div>
	<div class ="background"></div>
</div>
<div id ="NIHOverlay" class ="overlay">
	<div id ="NIHOverlay-panel">
	<div class ="close_button"></div>
	<dl class = 'top'>
		<dt class = "title">Communications Engineering Branch,<br/> National Library of Medicine, National Institutes of Health, US Department of Health and Human Services</dt>
	</dl>
	<dl>
		<dt>Internship <span class = "date">Jun. to Aug. 2009</span></dt>
	</dl>
		<ul>
			<li>Assisted in the overall usability design and testing of Nursing Home Screener, a website that assists in finding information about the location and quality of nursing homes within the United States.</li>
			<li>Designed and created 3 tutorials for Nursing Home Screener, a questions and answer page, in addition to several explanations about how the quality of a nursing home is evaluated for the Nursing Home Screener.</li>
		</ul>
			<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href="http://archive.nlm.nih.gov/" target="_blank">Communications Engineering Branch</a></dd>
		</dl>	
	</div>
	<div class ="background"></div>
</div>
<div id ="USPTOOverlay" class ="overlay">
	<div id ="USPTOOverlay-panel">
	<div class ="close_button"></div>
	<dl class = 'top'>
		<dt class = "title">United States Patent and Trademark Office, US Department of Commerce </dt>
	</dl>
	<dl>
		<dt>Externship <span class = "date">Jan. 11 to 15, 2010</span></dt>
	</dl>
		<ul>
		  <li>Assisted in research of business method patents.</li>
		</ul>
			<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href="http://www.uspto.gov/" target="_blank">United States Patent and Trademark Office</a></dd>
		</dl>	
	</div>
	<div class ="background"></div>
</div>
<div id = "accentureOverlay" class ="overlay">
	<div id = "accentureOverlay-panel">
		<div class ="close_button"></div>
 		<dl class = 'top'>
 		<dt class = "title">Accenture LLC</dt>
 		</dl>
		 <dl>
	        <dt>Software Engineer <span class = "date">Jul. 2011 to Apr. 2013</span></dt>
			
	 	</dl>

      <ul>
	 		<li>Software Engineer and Developer for Disneyland.com, Disneyparks.com, Disneyvacations.com, and Aulani.com. Set up several environments through F5 Load Balancer, Windows servers and Linux servers. Developed new features, bug fixes, performance enhancements and triaged live site incidents using Java, PHP, Tea, HTML, Javascript, CSS and GoPublish. Supported the QA and SE teams by providing deployment documentation and led launch calls. Acted as offshore coordinator for a team of 5 developers in India.</li>
	 		<li>Led scrum daily stand up meetings, demos and retrospectives by following the Scrum (Agile) methodology</li>
	 		<li>Developed load test plan and scripts using JMeter and upgraded load test environment for Walt Disney World’s New Fantasyland Sweepstakes page.</li>
	 		<li>Lead developer for Disneyparks.com, “One More Disney Day” project.</li>
	 </ul>
		<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href="http://www.accenture.com/us-en/pages/index.aspx" target="_blank">Accenture LLC</a></dd>
			<dd><a href="http://resorts.disney.go.com/aulani-hawaii-resort/" target="_blank">Aulani Resort &amp; Spa</a></dd>
			<dd><a href="http://disneyparks.disney.go.com/" target="_blank">Disney Parks</a></dd>	
		</dl>
	</div>
	<div class ="background"></div>
</div>
<div id = "disneyOverlay" class ="overlay">
	<div id = "disneyOverlay-panel">
		<div class ="close_button"></div>
 		<dl class = 'top'>
 		<dt class = "title">Walt Disney Parks &amp; Resorts Technology</dt>
 		</dl>
 		<dl>

	    <dt>Full-Stack Engineer <span class = "date">May 2013 to Present</span></dt> 
	 	</dl>
      <ul>
	 		<li><strong>Hack Day Spring 2014</strong> – Upgraded the Mickey Mouse Car Antenna by adding soldering LED lights and being able to light on and off with a web application, using an Arduino, PHP, Java, HTML, and CSS</li>
	 		<li>Engineer for Disney World and My Disney Experience websites for users to pre-plan their vacations with Magic Bands. Set up global navigation for the Disneyworld.com mobile site. Develop new features, bug fixes, performance enhancements using PHP, HTML, Javascript and CSS.</li>
	 		<li>Contribute to entire SDLC (System Development Life-Cycle), including sprint planning, requirements gathering/clarifications with the production team, setting up development environments, coding and performing code reviews.</li>
	 		<li>Engineer for the Aulani Evolution Project to re-design aulani.com. </li>
	 </ul>
		<dl>
			<dt>Info Links:</dt>
		</dl>
		<dl>
			<dd><a href="http://disneyworld.disney.go.com/" target="_blank">Disney World</a></dd>
			<dd><a href="https://disneyworld.disney.go.com/plan/" target="_blank">My Disney Experience</a></dd>
		</dl>
	</div>
	<div class ="background"></div>
</div>
<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false" type = "text/javascript"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>

