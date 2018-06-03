<?php
/*OBJECT PATH GENERATOR*/
function objPath($access_type, $object_name)
{
  global $href_opt, $root_opt;

  //option list string, used in $access_type missmatch cases
  $opt_string = '';
  foreach ($root_opt as $opt_id => $opt) {
    $opt_string .= '<b>"' . $opt . '"</b> or ';
  }
  foreach ($href_opt as $opt_id => $opt) {
    $opt_string .= '<b>"' . $opt . '"</b> or ';
  }

  if (gettype($object_name) === 'string') {
    if (gettype($access_type) === 'string') {
      if (in_array(strtoupper($access_type), $href_opt) OR in_array(strtoupper($access_type), $root_opt)) {
        //ternary operator
        return (!in_array(strtoupper($access_type), $root_opt)) ?
          constant('H_' . strtoupper($access_type)) . $object_name :
          constant(strtoupper($access_type) . '_ROOT') . $object_name;
          //ternary end
      } else {
        $trace = debug_backtrace();
        trigger_error(
          'invalid parameter, unexpected \'' .
          $access_type .
          '\' on first parameter' .
          ' in ' . $trace[0]['file'] .
          ' line ' . $trace[0]['line'] .
          ', expecting ' .
          $opt_string,
          E_USER_ERROR
        );
      }
    } else {
      $trace = debug_backtrace();
      trigger_error(
        'invalid parameter, unexpected ' .
        gettype($access_type) .
        ' on first parameter' .
        ' in ' . $trace[0]['file'] .
        ' line ' . $trace[0]['line'] .
        ' expecting \'string\' type',
        E_USER_ERROR
      );
    }
  } else if (is_null($object_name)) {
    $trace = debug_backtrace();
    trigger_error(
      'second parameter is NULL.',
      E_USER_NOTICE
    );
    return Null;
  } else {
    $trace = debug_backtrace();
    trigger_error(
      'invalid parameter, unexpected ' .
      gettype($object_name) .
      ' on second parameter' .
      ' in ' . $trace[0]['file'] .
      ' line ' . $trace[0]['line'] .
      ', expecting \'string\' type',
      E_USER_ERROR
    );
  }
}
?>
