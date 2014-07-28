Hello Ponty Team,<br>
<br>
you've got a new request for your Reflect API!
<br>
<br>
The request comes from <b><?php echo $name ?></b> with the E-Mail <b><?php echo $email ?></b>
<br>
<br>
The application name is:
<br>
<b> <?php
    echo $app_name;
    ?></b>
<br>
<br>
The link to the app is:
<br>
<b> <?php
    echo $app_link;
    ?></b>
<br>
<br>
The users message for you is:
<br>
<b> <?php
echo $contact_message;
?></b>
<br>
<br>
Click this link to accept the request:<br>
<br>
<?php
echo $accept_link;
?>
<br>
<br>
Click this link to decline the request:<br>
<br>
<?php
echo $decline_link
?>
<br>
<br>
The user will be automatically informed by E-Mail about your decision. You can change all users API settings in the Admin Webinterface.<br>
<br>
Best Regards<br>
<br>
Your Virtual Secretary<br>