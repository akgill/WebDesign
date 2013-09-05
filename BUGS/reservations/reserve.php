<?
/*
author: Amandeep K. Gill
date: November 15, 2006
version: 1.3

I don't care if you take this php file and reuse it to your own needs.  And you were expecting a claim of intellectual property.  This program simply sends an email to the form owner at $email and sends the same email to $senderemail.  It also prevents people from leaving blank any form field except for their own email address by using javascript to send the user an alert and to return them to the form page.
*/

  $email = 'Amandeep_Gill@brown.edu';
  $senderemail = $_REQUEST['email'] ;
  $name = $_REQUEST['name'] ;
  $number = $_REQUEST['number'];
  $show = $_REQUEST['show'];
  $message = 
  
"Hello $name, this email confirms that you have reserved tickets for the BUGS production of RUDDIGORE.

You have requested $number tickets for this show: $show

(If you've reserved tickets for the Sunday gag show, please be aware that it may not be suitable for children (PG-13) and will definitely not be suitable for G&S purists!)

Please note that reservations must be made at least 12 hours prior to showtime, or they may not be processed -- even if you get this email.

The production will be in Alumnae Hall of the Brown University Campus.
Campus Map: http://fm-cad.plantops.brown.edu/maps/PAUR_Campus_Map.pdf

Seating will begin 30 minutes prior to the showtime.  Please arrive at least 15 minutes before showtime to guarantee seating.  All tickets are open seating.

Admission is free, but BUGS depends on audience donations.

http://www.brown.edu/Students/BUGS/";

  if (!empty($name)){  
  
  		if (!empty($senderemail)){  
		
  			if (!empty($number)){			
				
					if (!empty($show)){
						mail( $senderemail, "Ruddigore Reservation", $message, "From: $email" );
  						mail( $email, "Ruddigore Reservation", $message, "From: $senderemail" );
  						header( "Location: http://www.brown.edu/Students/BUGS/reservations/output.htm" );
					}
		
					else{
						echo '<script language="javascript">
						history.back(); 
						alert("Please select a show time.")
						</script>;';
					}
			}					
			else{
			echo '<script language="javascript">
			history.back(); 
			alert("Please enter a number of tickets that you would like to reserve.")
			</script>;';
			}
  		}
	
		else{
		echo '<script language="javascript">
  		history.back(); 
  		alert("Please enter an email address of the form someone@someplace.com .")
  		</script>;';
		}	
  }
  
  else{
  echo '<script language="javascript">
  history.back(); 
  alert("Please enter your first and last name.")
  </script>;';
  }
  exit;
?>