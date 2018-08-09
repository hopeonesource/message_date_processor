<?php

namespace Drupal\message_date_processor;
use Drupal\Core\Database\Driver\mysql\Connection;

/**
 * Class MessageDateService.
 */
class MessageDateService implements MessageDateServiceInterface {

  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var \Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $connection;
  /**
   * Constructs a new MessageDateService object.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * @inheritdoc
   */
  public function removeMessageDate(int $nodeId){
    $this->connection->delete('message_dates')
      ->condition('nid', $nodeId)->execute();
  }

  /**
   * @inheritdoc
   */
  public function addMessageDate(array $values){
    $this->connection->insert('message_dates')
      ->fields([
        'nid','message_date','processed'
      ])->values($values)->execute();
  }
}
