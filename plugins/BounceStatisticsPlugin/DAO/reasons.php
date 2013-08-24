<?php
/**
 * BounceStatisticsPlugin for phplist
 * 
 * This file is a part of BounceStatisticsPlugin.
 *
 * @category  phplist
 * @package   BounceStatisticsPlugin
 * @author    Duncan Cameron
 * @copyright 2011-2013 Duncan Cameron
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 */

/**
 * This file contains mappings of the bounce reasons
 */

$reasons = array(
    'Unrouteable address' => array('Unrouteable address'),
    'Unknown user' => array(
        'bad address',
        'Check the address',
        'Delivery to the following recipients failed',
        'does not exist',
        'e-mail address was not found',
        'e-mail address you entered couldn\'t be found',
        'email address is unknown',
        'invalid address',
        'Invalid mailbox',
        'invalid recipient',
        'mailbox not available',
        'mailbox unavailable',
        'Mailbox unknown or not accepting mail.',
        'no mailbox here by that name',
        'No such person',
        'No such recipient',
        'No such user',
        'not a valid mailbox',
        'not listed',
        'Not our Customer',
        'Recipient address rejected',
        'recipients in your email are invalid',
        'The email account that you tried to reach is disabled',
        'Reject No user',
        'This account has been disabled or discontinued',
        'This user doesn\'t have a %account',
        'Unable to deliver',
        'Unable to process recipient',
        'unknown or illegal alias',
        'Unknown user',
        'User unknown',
        'RESOLVER.ADR.RecipNotFound; not found'
    ),
    'Reverse DNS lookup failed' => array(
        'do not have reverse-DNS',
        'does not have a reverse (address-to-name) DNS entry',
        'DNS:NR',
        'Fix reverse DNS for',
        'invalid DNS PTR',
        'invalid RDNS record',
        'must have a PTR record with a valid Reverse DNS entry',
        'no valid Reverse DNS',
        'no reverse DNS entry',
        'Sender IP must resolve',
        'This server requires PTR for unauthenticated connections'
    ),
    'Blocked by Verizon' => array(
        'currently blocked by Verizon'
    ),
    'Blocked by AOL' => array(
        'postmaster.info.aol.com/errors'
    ),
    'Blocked by RoadRunner' => array(
        'postmaster.rr.com/amIBlockedByRR'
    ),
    'Rejected by Yahoo Groups' => array(
        'help.yahoo.com/l/us/yahoo/groups'
    ),
    'Rejected by recipient' => array(
        'recipient is only accepting mail from specific email addresses',
        'www.sendio.com/authentication-about'
    ),
    'Blocked by spam filter or SPF' => array(
        'Access denied',
        'Administrative prohibition',
        'as possible spam',
        'b.barracudacentral.org',
        'Bad CT IP Reputation',
        'blacklisted IP address',
        'blocked by EarthLink',
        'Blocked by SpamAssassin',
        'Blocked for abuse',
        'blocked using Barracuda',
        'blocked due to spam content in the message',
        'cbl.abuseat.org',
        'classified as SPAM',
        'classified as spam',
        'Connection blocked',
        'Connection not authorized',
        'Connection refused due to abuse',
        'Currently Sending Spam',
        'dnsbl-lookup.cgi',
        'Domain/IP address is blocked by the reputation server',
        'Email rejected due to security policies',
        'envelope blocked',
        'High probability of spam',
        'incoming email as possible spam',
        'in a black list at web.dnsbl.sorbs.net',
        'IP is DNSBL listed',
        'is currently blacklisted',
        'is restricted',
        'like spam or phish to me',
        'Local Policy Violation',
        'Mail refused by local domain enforcement policy',
        'Mailbox unavailable or access denied',
        'Message detected as spam',
        'Message identified as SPAM',
        'message looks like SPAM',
        'message refused',
        'Message refused',
        'Message rejected',
        'one or more DNS blacklists',
        'psbl.surriel.com',
        'Recipient address rejected: Blocked',
        'Rejected by content scanner',
        'rejected by our anti-spam software',
        'rejected due to classification as BULK MAIL',
        'rejected for policy reasons',
        'Requested action not taken: message refused',
        'Rule imposed mailbox access',
        'spamhaus',
        'Spamhaus',
        'Sending address not accepted due to spam filter',
        '5.0.0 Spam',
        'Spam mail rejected',
        'Spam Message',
        'Spam source blocked',
        'Spamming not allowed',
        'SPF unauthorized mail is prohibited',
        'www.barracudanetworks.com'
    ),
    'Unsolicited' => array(
        'appears to be unsolicited',
        'detected unsolicited content'
    ),
    'retry time not reached for any host after a long failure period' => array('retry time not reached for any host after a long failure period'),
    'Address rejected' => array('Address rejected'),
    'malformed address' => array('malformed address'),
    'retry timeout exceeded' => array('retry timeout exceeded'),
    'mailbox name not allowed' => array('mailbox name not allowed'),
    'transaction failed' => array('554 transaction failed'),
    'Relaying not allowed' => array(
        'Authentication is required for relay',
        'relay not permitted',
        'Relaying denied',
        'relaying not allowed',
        'Unable to relay',
        'we do not relay'
    ),
    'Unknown domain' => array(
        'The account or domain may not exist, they may be blacklisted, or missing the proper dns entries',
        'Host or domain name not found',
        'couldn\'t find any host by that name',
        'This domain is not hosted here',
        'No such domain',
        'Domain name %does not resolve'
    ),
    'Mailbox full' => array(
        'does not have%enough disk space',
        'exceeded storage allocation',
        'exceeds allowed size',
        'mailbox is full',
        'mailfolder is full',
        'over quota',
        'over the allowed quota',
        'quota exceeded',
        'Quota exceeded'
    ),
    'Delivery delayed' => array('Delivery to the following recipients has been delayed'),
    'Delivery failed' => array(
        'Delivery to the following recipients failed',
        'this message has been in the queue too long'
    ),
    '550 code' => array('550')
);

