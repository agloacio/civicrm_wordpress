<?php
/*
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC. All rights reserved.                        |
 |                                                                    |
 | This work is published under the GNU AGPLv3 license with some      |
 | permitted exceptions and without any warranty. For full license    |
 | and copyright information, see https://civicrm.org/licensing       |
 +--------------------------------------------------------------------+
 */

namespace Civi\Core\Event;

/**
 * This triggers when a smarty parse error happens via \Smarty::trigger_error
 * Event: civi.smarty.error
 *
 * Class SmartyErrorEvent
 * @package Civi\API\Event
 */
class SmartyErrorEvent extends GenericHookEvent {

  /**
   * The error message generated by smarty
   * @var string
   */
  public $errorMsg;

  /**
   * The error type - one of PHP error constants
   * @var int
   */
  public $errorType;

  /**
   * @param string $errorMsg
   * @param int $errorType
   */
  public function __construct($errorMsg, $errorType) {
    $this->errorMsg = $errorMsg;
    $this->errorType = $errorType;
  }

  /**
   * @inheritDoc
   */
  public function getHookValues() {
    return [$this->errorMsg, $this->errorType];
  }

}
