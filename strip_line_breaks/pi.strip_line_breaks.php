<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Strip Line Breaks Plugin
 * Copyright Dan Hodos, http://onedesigncompany.com/
 */

$plugin_info = array(
  'pi_name'     => 'Strip Line Breaks',
  'pi_version'    => '1.0.0',
  'pi_author'     => 'Dan Hodos',
  'pi_author_url'   => 'http://onedesigncompany.com/',
  'pi_description'  => 'Removes line breaks from the string within the tag pair',
  'pi_usage'      => Strip_line_breaks::usage()
);

/**
 * Strip line breaks is a plugin that will remove line breaks in the text
 * within the tag pair.
 *
 * @package StripLineBreaks
 */
class Strip_line_breaks {
  public $return_data = "";

  public function Strip_line_breaks()
  {
    $this->EE =& get_instance();
    $tagdata = $this->EE->TMPL->tagdata;
    $this->return_data = (string)str_replace(array("\r", "\r\n", "\n"),"", $tagdata);
    return;
  }

  /**
   * ExpressionEngine plugins require this for displaying
   * usage in the control panel
   * @access public
   * @return string
   */
    public function usage()
  {
    ob_start();
?>
Strip line breaks is a plugin that will remove line breaks in the text within the tag pair.

    {exp:strip_line_breaks}
    This<br>
    is<br>
    on<br>
    many<br>
    lines
    {/exp:strip_line_break}

will result in the string:

    This<br>is<br>on<br>many<br>lines

<?php
    $buffer = ob_get_contents();
    ob_end_clean();
    return $buffer;
  }

}

/* End of file pi.strip_line_breaks.php */
/* Location: ./system/expressionengine/third_party/plugin_name/pi.strip_line_breaks.php */
