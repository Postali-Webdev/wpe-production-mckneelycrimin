<?php 
global $qode_options_passage; 

$title_in_grid = false;
if(isset($qode_options_passage['title_in_grid'])){
if ($qode_options_passage['title_in_grid'] == "yes") $title_in_grid = true;
}

?>	

<?php get_header(); ?>

			<div class="title animate" >
				<?php if($title_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
				<?php } ?>
				
				<?php if($title_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
                
			</div>
            <div class="PA_header"><div class="container_inner"><?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?><h1><?php the_title(); ?></h1></div></div>
			<div class="container top_move">
                <div class="bottom_green_bar"></div>
				<div class="container_inner">
					<div class="container_inner2 clearfix">
                        <div class="page_not_found">
                        								
                                <div class="two_columns_75_25 clearfix">
                                <div class="column1"><div class="column_inner">      
                                <h1>404 - Page not found</h1>	                  
                                <p>Our apologies, but the page you requested could not be found.</p>
                                <h4>Maybe these links are what you are looking for?</h4>

<ul class="two_column_list">
<li><a href="https://www.fresnocriminalattorney.com/sex-crimes/" title="Sex Crimes">Sex Crimes</a></li>
<li><a href="https://www.fresnocriminalattorney.com/federal-crimes-defense/" title="Federal Crimes">Federal Crimes</a></li>
<li><a href="https://www.fresnocriminalattorney.com/drug-crimes/" title="Drug Charges">Drug Charges</a></li>
<li><a href="https://www.fresnocriminalattorney.com/firearms-crimes/" title="Firearms">Firearms</a></li>
<li><a href="https://www.fresnocriminalattorney.com/theft/" title="Theft">Theft</a></li>
<li><a href="https://www.fresnocriminalattorney.com/fraud/" title="Fraud">Fraud</a></li>
<li><a href="https://www.fresnocriminalattorney.com/assault/" title="Assault">Assault</a></li>
<li><a href="https://www.fresnocriminalattorney.com/felony-crimes/" title="Felony Crimes">Felony Crimes</a></li>
<li><a href="https://www.fresnocriminalattorney.com/property-crimes/" title="Property Crimes">Property Crimes</a></li>
<li><a href="https://www.fresnocriminalattorney.com/dui-traffic-offenses/" title="DUI">DUI &#038; Traffic</a></li>
<li><a href="https://www.fresnocriminalattorney.com/juvenile-offenses/" title="Juvenile Crimes">Juvenile Crimes</a></li>
<li><a href="https://www.fresnocriminalattorney.com/criminal-defense/" title="Criminal Defense">Criminal Defense</a></li>
	</ul>                            
                                If not, perhaps you should head <a href="/" title="Head back home">Back Home</a> and try again.
                            	</div></div>
                                
                                <div class="column2"><div class="column_inner">  

                                <h5>Address & Contact</h5> 
  
                                    2300 Tulare Street, Ste. 115 <br />
                                    Fresno, California 93721 <br />
                                    <p></p><strong>Email</strong>: <a href="mailto:advice@fresnocriminalattorney.com" title="email mike mckneely">advice@fresnocriminalattorney.com</a> <br />
                                   <strong> Phone</strong>: <a href="tel:559-443-7442" class="ibp" title="Call Michael McKneely, Criminal Defense Lawyer Today">(559) 443-7442</a><br />
									<strong>Fax</strong>: (559) 860-0150 </p>
                                    
                                    <p class="more"><a href="https://www.google.com/maps/place/2300+Tulare+St+%23115,+Fresno,+CA+93721/@36.7360141,-119.7867994,19.25z/data=!4m5!3m4!1s0x80945e203119d20b:0x34e8301b645bf39f!8m2!3d36.7360844!4d-119.7865392" title="office location" class="learnMore">Driving Directions</a></p>
                                </div></div>
                                
                                </div> <!-- end 2 columns -->   
						</div>
                        
						
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	