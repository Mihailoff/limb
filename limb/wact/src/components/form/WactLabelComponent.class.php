<?php
/**
 * Limb Web Application Framework
 *
 * @link http://limb-project.com
 *
 * @copyright  Copyright &copy; 2004-2007 BIT
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 * @version    $Id$
 * @package    wact
 */

/**
* Represents an HTML label tag
*/
class WactLabelComponent extends WactRuntimeTagComponent
{
  /**
  * CSS class attribute to display on error
  * Determined by tag errorclass attribute
  * @var string
  */
  public $errorclass;

  /**
  * CSS style attribute to display on error
  * Determined by tag errorstyle attribute
  */
  public $errorstyle;

  /**
  * If either are set, assigns the attributes for error class or style
  * @see WactFormComponent::setErrors
  */
  function setError()
  {
    if (isset($this->errorclass))
      $this->setAttribute('class', $this->errorclass);
    if (isset($this->errorstyle))
      $this->setAttribute('style', $this->errorstyle);
  }
}
?>