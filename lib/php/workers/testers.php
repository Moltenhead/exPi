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
        $xp_all_uuid = $pdo->query(
          'SELECT uuid FROM experiences')->fetchAll(PDO::FETCH_COLUMN, 0);

        return (in_array($xp_uuid, $xp_all_uuid)) ?
          TRUE :
          FALSE;
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
