<?php
/**
 * Limb Web Application Framework
 *
 * @link http://limb-project.com
 *
 * @copyright  Copyright &copy; 2004-2007 BIT
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 * @version    $Id: WactOptionRenderTest.class.php 5202 2007-03-07 08:47:03Z serega $
 * @package    wact
 */

require_once 'limb/wact/src/components/form/form.inc.php';
require_once 'limb/wact/src/components/form/select.inc.php';

class WactOptionRenderTest extends UnitTestCase
{
  protected $renderer;

  function setUp()
  {
    $this->renderer=  new WactOptionRenderer();
  }

  function testRender()
  {
    ob_start();
    $this->renderer->renderOption('foo','bar',FALSE);
    $out = ob_get_contents();
    ob_end_clean();
    $this->assertEqual($out,'<option value="foo">bar</option>');
  }

  function testRenderNoContents()
  {
    ob_start();
    $this->renderer->renderOption('foo','',$selected = FALSE);
    $out = ob_get_contents();
    ob_end_clean();
    $this->assertEqual($out,'<option value="foo">foo</option>');
  }

  function testRenderEntities()
  {
    ob_start();
    $this->renderer->renderOption('x > y','& v < z',$selected = FALSE);
    $out = ob_get_contents();
    ob_end_clean();
    $this->assertEqual($out,'<option value="x &gt; y">&amp; v &lt; z</option>');
  }

  function testRenderEntitiesNoContents()
  {
    ob_start();
    $this->renderer->renderOption('x > y', FALSE, $selected = FALSE);
    $out = ob_get_contents();
    ob_end_clean();
    $this->assertEqual($out,'<option value="x &gt; y">x &gt; y</option>');
  }

  function testSelected()
  {
    ob_start();
    $this->renderer->renderOption('foo','bar',TRUE);
    $out = ob_get_contents();
    ob_end_clean();
    $this->assertEqual($out,'<option value="foo" selected="true">bar</option>');
  }
}
?>