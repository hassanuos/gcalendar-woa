<?php
include_once 'vendor/autoload.php';

$client = new Google_Client();

$application_creds = 'gcp-vision-208716-58a0c3fc8b02.json';

$credentials_file = file_exists($application_creds) ? $application_creds : false;
define("SCOPE", Google_Service_Calendar::CALENDAR);
define("APP_NAME", "Google Calendar API PHP");

$client->setAuthConfig($credentials_file);
$client->setApplicationName(APP_NAME);
$client->setScopes([SCOPE]);

$service = new Google_Service_Calendar($client);

//$event = new Google_Service_Calendar_Event([
//    'summary' => 'Google I/O 2015',
//    'location' => '800 Howard St., San Francisco, CA 94103',
//    'description' => 'A chance to hear more about Google\'s developer products.',
//    'start' => array(
//        'dateTime' => '2022-01-16T09:00:00-07:00',
//        'timeZone' => 'America/Los_Angeles',
//    ),
//    'end' => array(
//        'dateTime' => '2022-01-16T17:00:00-07:00',
//        'timeZone' => 'America/Los_Angeles',
//    ),
//    'attendees' => array(
////        array(
////            'email' => 'hassan.jobz@gmail.com',
////            'organizer' => true
////        ),
////        array(
////            'email' => 'info@aaclean.us',
////            'resource' => true
////        ),
//    ),
//    "creator"=> array(
//        "email" => "hassanuos2010@gmail.com",
//        "displayName" => "Hassan",
//        "self"=> true
//    ),
//    "guestsCanInviteOthers" => false,
//    "guestsCanModify" => false,
//    "guestsCanSeeOtherGuests" => false,
//]);
//
//$calendarId = 'primary';
//$event = $service->events->insert($calendarId, $event);
//printf('Event created: %s', $event->htmlLink);

$event = new Google_Service_Calendar_Event(array(
    'summary' => 'Google I/O 2015',
    'location' => '800 Howard St., San Francisco, CA 94103',
    'description' => 'A chance to hear more about Google\'s developer products.',
    'start' => array(
        'dateTime' => '2022-01-16T09:00:00-07:00',
        'timeZone' => 'America/Los_Angeles',
    ),
    'end' => array(
        'dateTime' => '2022-01-16T09:00:00-07:00',
        'timeZone' => 'America/Los_Angeles',
    ),
    'recurrence' => array(
        'RRULE:FREQ=DAILY;COUNT=2'
    ),
    'attendees' => array(
//        array('email' => 'hassanuos2010@gmail.com'),
//        array('email' => 'hassanuos2010@gmail.com'),
    ),
    "creator"=> array(
        "email" => "hassanuos2010@gmail.com",
        "displayName" => "Hassan",
        "self"=> true
    ),
    'reminders' => array(
        'useDefault' => FALSE,
        'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60),
            array('method' => 'popup', 'minutes' => 10),
        ),
    ),
));

$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
printf('Event created: %s\n', $event->htmlLink);