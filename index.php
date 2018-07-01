<?php
require('util/date.php');
require('util/timezone.php');

use Util\Date as Util_Date;
use Util\Timezone as Util_Timezone;

if (!$_POST['event_list'] || ($_POST['event_list'] && !is_array($_POST['event_list'])) || !$_POST['start'] || !$_POST['end'] || !$_POST['locale']) {
    echo "Missing parameter";
    return;
}

Util_Timezone::set_timezone_by_locale($_POST['locale']);

$event_list = $_POST['event_list'];
$start_date = strtotime($_POST['start']);
$end_date = strtotime($_POST['end']);

$result_list = array();

foreach ($event_list as $event) {
    if (Util_Date::is_date_between_two_dates($event['date'], $start_date, $end_date)) {
        $result_list[] = $event;
    }
}

if (!$result_list) {
    echo "Nothing here for you";
    return;
}

foreach ($result_list as $result) {
    echo $result['name']." at ".date(Util_Date::FORMAT_DEFAULT, $result['date'])."\r\n";
}

exit(0);
