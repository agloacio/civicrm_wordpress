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

namespace Civi\Api4\Query;

/**
 * Sql function
 */
class SqlFunctionRIGHT extends SqlFunction {

  protected static $category = self::CATEGORY_STRING;

  protected static $dataType = 'String';

  protected static function params(): array {
    return [
      [
        'optional' => FALSE,
        'must_be' => ['SqlField', 'SqlString'],
        'label' => ts('Source'),
      ],
      [
        'optional' => FALSE,
        'must_be' => ['SqlNumber'],
        'label' => ts('Number of characters'),
      ],
    ];
  }

  /**
   * @return string
   */
  public static function getTitle(): string {
    return ts('Right part of text');
  }

  /**
   * @return string
   */
  public static function getDescription(): string {
    return ts('Extracts a number of characters from text starting from the right.');
  }

}
