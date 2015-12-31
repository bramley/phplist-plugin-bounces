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
    'Unrouteable address' => array(
        'Unrouteable%address',
        'Unroutable%address',
        'No route to host'
    ),
    'Unknown user' => array(
        'account has been suspended',
        'Account not available',
        'bad address',
        'Check the address',
        'Delivery to the following recipients failed',
        'disabled or discontinued',
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
        'RESOLVER.ADR.RecipNotFound; not found',
        'No mail box available for this user',
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
    'Blocked by Comcast' => array(
        'Comcast%spam'
    ),
    'Blocked by AOL' => array(
        'postmaster.info.aol.com/errors'
    ),
    'Blocked by gmail' => array(
        'http://support.google.com/mail/bin/answer.py'
    ),
    'Blocked by RoadRunner' => array(
        'postmaster.rr.com/amIBlockedByRR'
    ),
    'Blocked by messagelabs' => array(
        'visit www.messagelabs.com/support'
    ),
    'Rejected by Yahoo Groups' => array(
        'help.yahoo.com/l/us/yahoo/groups'
    ),
    'Rejected by recipient' => array(
        'does not accept mail from',
        'recipient is only accepting mail from specific email addresses',
        'www.sendio.com/authentication-about'
    ),
    'Blocked by blacklist, spam filter or SPF' => array(
        'Access denied',
        'att.net/blocks',
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
        'content judged to be spam',
        'Currently Sending Spam',
        'dnsbl-lookup.cgi',
        'Domain/IP address is blocked by the reputation server',
        'Email rejected due to security policies',
        'filter has classified this message as spam',
        'envelope blocked',
        'High probability of spam',
        'incoming email as possible spam',
        'in a black list at web.dnsbl.sorbs.net',
        'IP is DNSBL listed',
        'is blacklisted',
        'is currently blacklisted',
        'is restricted',
        'Junk mail received',
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
        'sending MTA\'s poor reputation',
        'www.spamcop.net',
        'spam.cybernet1.com',
        'spamhaus',
        'Spamhaus',
        'Sending address not accepted due to spam filter',
        '5.0.0 Spam',
        'Spam content matched',
        'Spam mail rejected',
        'Spam Message',
        'Spam source blocked',
        'Spamming not allowed',
        'SPF unauthorized mail is prohibited',
        'Too much spam',
        'the Internet community may consider spam',
        'wasn\'t delivered because of security policies',
        'www.openspf.org',
        'blocked by SPF',
        'www.barracudanetworks.com',
        'add you to the accept list for',
    ),
    'Unsolicited' => array(
        'appears to be unsolicited',
        'detected unsolicited content'
    ),
    'retry time not reached for any host after a long failure period' => array('retry time not reached for any host after a long failure period'),
    'Address rejected' => array('Address rejected'),
    'Malformed address' => array('malformed address'),
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
        'maximum mailbox size reached',
        'Mailbox has exceeded the limit',
        'Not enough disk space',
        'does not have%enough disk space',
        'exceeded storage allocation',
        'exceeds allowed size',
        'full mailbox',
        'Mailbox full',
        'mailbox is full',
        'mailfolder is full',
        'Mailbox ist voll',
        'over quota',
        'over the allowed quota',
        'quota exceeded',
        'Quota exceeded',
        'Recipient overquota',
        'User exceeds storage quota',
        'larger than the space available',
    ),
    'Delivery delayed' => array(
        'Delivery to the following recipients has been delayed',
        'It will be retried until it is'
    ),
    'Delivery failed' => array(
        'Delivery to the following recipients failed',
        'this message has been in the queue too long',
        'Too many hops',
        'Hop count exceeded',
        'X-Notes; Delivery time expired',
    ),
    'Address no longer used' => array(
        'old addresses are no longer used',
        'Address no longer%in use',
    ),
    'Connection refused' => array('Connection refused'),
    'Connection timeout' => array(
        'retry timeout exceeded',
        'Connection%timed out'
    ),
    '550 code' => array('550'),
);

