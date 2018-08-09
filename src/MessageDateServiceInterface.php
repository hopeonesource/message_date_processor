<?php

namespace Drupal\message_date_processor;

/**
 * Interface MessageDateServiceInterface.
 */
interface MessageDateServiceInterface {

  /**
   * Removes message dates from message_dates table by posting node id
   *
   * @param int $nodeId
   * Posting node id
   *
   */
  public function removeMessageDate(int $nodeId);

  /**
   * Adds message dates and associated posting node id to message_dates table
   *
   * @param array $value
   * key value pairs of 'nid','message_date','processed'
   *
   */
  public function addMessageDate(array $value);
}
