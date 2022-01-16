<?php

include_once 'vendor/autoload.php';

$client = new Google\Client();
$jsonKey = 'gcp-vision-208716-58a0c3fc8b02.json';
$client->setAuthConfig($jsonKey);
$client->setScopes([
    'https://www.googleapis.com/auth/calendar.readonly',
    'https://www.googleapis.com/auth/calendar',
    'https://www.googleapis.com/auth/calendar.events',
    'https://www.googleapis.com/auth/calendar.events.readonly',
    'https://www.googleapis.com/auth/calendar.addons.execute',
    'https://www.googleapis.com/auth/calendar.settings.readonly',
//    'https://www.googleapis.com/auth/calendar.events',
//    'https://www.googleapis.com/auth/admin.reports.audit.readonly'
]);

$client->setSubject('calendar-api@gcp-vision-208716.iam.gserviceaccount.com');

$client->setAccessType('offline');

$cal_id = 'hassan@aaclean.us';

$calendarService = new Google\Service\Calendar($client);

$event = new Google\Service\Calendar\Event(array(
    'summary' => 'test link generate', //'Google Calendar ',
    'description' => 'Book Room', //'Book Room',
    'start' => array(
        'dateTime' => '2022-01-16T14:30:00-00:00',//'2018-08-16T14:30:00-00:00',
        'timeZone' => 'Asia/Kolkata',
    ),
    'end' => array(
        'dateTime' => '2022-01-16T14:30:00-01:00',//'2018-08-16T14:30:00-01:00',
        'timeZone' => 'Asia/Kolkata',
    ),
    'attendees' => array(
//        array(
//            'email' => 'hassan.jobz@gmail.com',
//            'organizer' => true
//        ),
//        array(
//            'email' => 'info@aaclean.us',
//            'resource' => true
//        ),
    ),
    "creator"=> array(
        "email" => "hassan@aaclean.us",
        "displayName" => "Hassan",
        "self"=> true
    ),
    'reminders' => array(
        'useDefault' => FALSE,
        'overrides' => array(
            array('method' => 'popup', 'minutes' => 10),
        ),
    ),
//    'conferenceData' => array(
//        'createRequest' => array(
//            'conferenceSolutionKey' => array(
//                'type' => 'hangoutsMeet'
//            ),
//            'requestId' => 'ADGGSH'. time()
//        )
//    )
));

$createdEvent = $calendarService->events->insert($cal_id, $event, array('conferenceDataVersion' => 1));

//$createdEvent->getId();exit;
print_r($createdEvent->getId());exit();

?>