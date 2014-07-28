<?php

/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * 
 * @author Martin Michalek <michalek.dev@gmail.com>
 */
$lang['server']                = 'LDAP server. Adresa (<code>localhost</code>) alebo úplné URL (<code>ldap://server.tld:389</code>)';
$lang['port']                  = 'Port LDAP servera, ak nebolo vyššie zadané úplné URL';
$lang['usertree']              = 'Umiestnenie účtov používateľov. Napr. <code>ou=People, dc=server, dc=tld</code>';
$lang['grouptree']             = 'Umiestnenie skupín používateľov. Napr. <code>ou=Group, dc=server, dc=tld</code>';
$lang['userfilter']            = 'LDAP filter pre vyhľadávanie používateľských účtov. Napr. <code>(&amp;(uid=%{user})(objectClass=posixAccount))</code>';
$lang['groupfilter']           = 'LDAP filter pre vyhľadávanie skupín. Napr. <code>(&amp;(objectClass=posixGroup)(|(gidNumber=%{gid})(memberUID=%{user})))</code>';
$lang['version']               = 'Použitá verzia protokolu. Možno bude potrebné nastaviť na hodnotu <code>3</code>';
$lang['starttls']              = 'Použiť TLS pripojenie?';
$lang['bindpw']                = 'Heslo vyššie uvedeného používateľa';
$lang['debug']                 = 'Zobraziť doplňujúce ladiace informácie pri chybe';
$lang['deref_o_0']             = 'LDAP_DEREF_NEVER';
$lang['deref_o_1']             = 'LDAP_DEREF_SEARCHING';
$lang['deref_o_2']             = 'LDAP_DEREF_FINDING';
$lang['deref_o_3']             = 'LDAP_DEREF_ALWAYS';
