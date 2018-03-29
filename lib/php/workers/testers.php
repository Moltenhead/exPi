<?php
/*USER CONNECTION DETECTION*/
function isConnected()
{
  return (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
}

/*XP UUID DETECTION*/
//TODO: avoid PDOException on inexistent uuid
function xpExists($pdo)
{
  if ($pdo != null && gettype($pdo) === 'object') {
    if ($pdo instanceof PDO) {
      if (isset($_GET['xp']) && $_GET['xp'] != null) {
        $xp_uuid = htmlspecialchars($_GET['xp']);

        $que_string = 'SELECT id FROM experiences WHERE uuid = ' .
          $xp_uuid;

        return ($pdo->exec($que_string)->rowCount === 1) ?
          TRUE :
          FALSE;
      } else {
        return FALSE;
      }
    } else {
      $trace = debug_backtrace();
      trigger_error(
        'invalide class as parameter, got \'' . $pdo .
        '\' in ' . $trace[0]['file'] .
        ' line ' . $trace[0]['line'] .
        ', expecting PDO',
        E_USER_NOTICE);
    }
  } else if ($pdo != null && gettype($pdo) !== 'object') {
    $trace = debug_backtrace();
    trigger_error(
      'invalide parameter type, got \'' . gettype($pdo) .
      '\' in ' . $trace[0]['file'] .
      ' line ' . $trace[0]['line'] .
      ', expecting PDOobject',
      E_USER_NOTICE);
  } else {
    $trace = debug_backtrace();
    trigger_error(
      'invalide parameter, got \'' . gettype($pdo) .
      '\' in ' . $trace[0]['file'] .
      ' line ' . $trace[0]['line'],
      E_USER_NOTICE);
  }
}
?>
