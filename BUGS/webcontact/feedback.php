<?
/*
    CHFEEDBACK.PHP Feedback Form PHP Script Ver 2.07
    Generated by thesitewizard.com's Feedback Form Wizard.
    Copyright 2000-2006 by Christopher Heng. All rights reserved.
    thesitewizard and thefreecountry are trademarks of Christopher Heng.

    $Id: phpscript.txt,v 1.8 2006/02/28 13:07:11 developer Exp $

    Get the latest version, free, from:
        http://www.thesitewizard.com/wizards/feedbackform.shtml

	You can read the Frequently Asked Questions (FAQ) at:
		http://www.thesitewizard.com/wizards/faq.shtml
	
	I can be contacted at:
		http://www.thesitewizard.com/feedback.php
	Note that I do not normally respond to questions that have
	already been answered in the FAQ, so *please* read the FAQ.

    LICENCE TERMS
    
    1. You may use this script on your website, with or
    without modifications, free of charge.
    
    2. You may NOT distribute or republish this script,
    whether modified or not. The script can only be
    distributed by the author, Christopher Heng.
    
    3. THE SCRIPT AND ITS DOCUMENTATION ARE PROVIDED
    "AS IS", WITHOUT WARRANTY OF ANY KIND, NOT EVEN THE
    IMPLIED WARRANTY OF MECHANTABILITY OR FITNESS FOR A
    PARTICULAR PURPOSE. YOU AGREE TO BEAR ALL RISKS AND
    LIABILITIES ARISING FROM THE USE OF THE SCRIPT,
    ITS DOCUMENTATION AND THE INFORMATION PROVIDED BY THE
    SCRIPTS AND THE DOCUMENTATION.

    If you cannot agree to any of the above conditions, you
    may not use the script. 
    
    Although it is NOT required, I would be most grateful
    if you could also link to thesitewizard.com at:

       http://www.thesitewizard.com/

*/

// ------------- CONFIGURABLE SECTION ------------------------

// $mailto - set to the email address you want the form
// sent to, eg
//$mailto		= "youremailaddress@example.com" ;

$mailto = 'Amandeep_Gill@brown.edu' ;

// $subject - set to the Subject line of the email, eg
//$subject	= "Feedback Form" ;

$subject = "BUGS webcontact" ;

// the pages to be displayed, eg
//$formurl		= "http://www.example.com/feedback.html" ;
//$errorurl		= "http://www.example.com/error.html" ;
//$thankyouurl	= "http://www.example.com/thankyou.html" ;

$formurl = "http://www.brown.edu/Students/BUGS/webcontact/webcontact.htm" ;
$errorurl = "http://www.brown.edu/Students/BUGS/webcontact/error.htm" ;
$thankyouurl = "http://www.brown.edu/Students/BUGS/webcontact/output.htm" ;

$uself = 0;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;
$name = $_POST['name'] ;
$email = $_POST['email'] ;
$comments = $_POST['comments'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (empty($name) || empty($email) || empty($comments)) {
   header( "Location: $errorurl" );
   exit ;
}
if ( ereg( "[\r\n]", $name ) || ereg( "[\r\n]", $email ) ) {
	header( "Location: $errorurl" );
	exit ;
}

if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =

	"This message was sent from:\n" .
	"$http_referrer\n" .
	"------------------------------------------------------------\n" .
	"Name of sender: $name\n" .
	"Email of sender: $email\n" .
	"------------------------- COMMENTS -------------------------\n\n" .
	$comments .
	"\n\n------------------------------------------------------------\n" ;

mail($mailto, $subject, $messageproper,
	"From: \"$name\" <$email>" . $headersep . "Reply-To: \"$name\" <$email>" . $headersep . "X-Mailer: chfeedback.php 2.07" );
header( "Location: $thankyouurl" );
exit ;

?>
