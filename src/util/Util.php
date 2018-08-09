<?php

namespace Drupal\message_date_processor\util;


class Util {

  /**
   * @param $messageDate
   *
   * checks if submitted message date is greater than now (minus 60 minutes,
   * in case someone wants to send something out immediately) and less than
   * three months. Content providers need to revalidate their records every
   * three months. Well, actually, let's give them one month of wiggle room,
   * so let's add up to four months out (which is about 120 days).
   *
   * @return array
   */
  public static function checkDate($messageDate){

    $msgDate = new \DateTime( $messageDate, new \DateTimeZone('UTC') );
    $alertTime = $msgDate->format('U');
    return [
      'valid' => ($alertTime > time()-60*60 && $alertTime < (time()+60*60*24*120)),
      'alert_time' => $alertTime
    ];
  }
}