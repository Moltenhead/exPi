<?php
/*normaly used after successful connection
* gets the essential informations from the connected user within the $db
*/
class User
{
  private $_uuid;
  private $_pseudo;
  private $_gender;
  private $_name;
  private $_surname;
  private $_mail;
  private $_birth;
  private $_avatar_href;
  private $_avatar_alt;
  private $_localisation = array(
    'longitude' => null,
    'latitude' => null
  );
  private $_interst101 = array(
    'themes' => array(),
    'places' => array(),
    'cities' => array(),
    'departments' => array(),
    'regions' => array(),
    'experiences' => array()
  );

  //TODO: in need of error alert on missused/missplaced arguments
  public function __construct($pdo, $user_uuid)
  {
    $que_user = $pdo->query(
      'SELECT
        u.uuid,
        l.mail,
        u.pseudo,
        u.gender,
        u.name,
        u.surname,
        u.birth,
        u.interest101_uuid,
        av.href,
        av.alt,
        u.localisation
        FROM users u
          INNER JOIN users_logins l ON u.id = l.user_id
          INNER JOIN users_avatars av ON u.avatar_uuid = av.uuid
            WHERE u.uuid = ' . $pdo->quote($user_uuid)
    );
    $data_user = $que_user->fetchAll(PDO::FETCH_ASSOC);
    $que_user->closeCursor();
    $data_user = $data_user[0];

    //setting the essential informations got from the previous query
    $this->_uuid = $data_user['uuid'];
    $this->_name = $data_user['pseudo'];
    $this->_gender = $data_user['gender'];
    $this->_name = $data_user['name'];
    $this->_surname = $data_user['surname'];
    $this->_mail = $data_user['mail'];
    $this->_birth = $data_user['birth'];
    $this->_avatar_href = $data_user['href'];
    $this->_avatar_alt = $data_user['alt'];

    //setting geolocalisation by explodeing localisation
    $tmp_localisation = explode('-', $data_user['localisation']);
    if(count($tmp_localisation) >= 2) {
      $this->_localisation['longitude'] = $tmp_localisation[0];
      $this->_localisation['latitude'] = $tmp_localisation[1];
    }

    /*query matching what we got within interest101_uuid
    * within the previous query
    * to create the full list from interests101
    * attached to the connected user
    */
    $que_interest101 = $pdo->query(
      'SELECT
        theme_ids AS themes,
        place_ids AS places,
        city_ids AS cities,
        department_ids AS dpts,
        region_ids AS regions,
        experience_ids AS xps
        FROM users_interest101
          WHERE uuid = ' . $pdo->quote($data_user['interest101_uuid'])
    );
    $data_interest101 = $que_interest101->fetchAll(PDO::FETCH_ASSOC);
    $que_interest101->closeCursor();
    $data_interest101 = $data_interest101[0];

    $this->_interest101['themes'] = explode('-', $data_interest101['themes']);
    $this->_interest101['places'] = explode('-', $data_interest101['places']);
    $this->_interest101['cities'] = explode('-', $data_interest101['cities']);
    $this->_interest101['departments'] = explode('-', $data_interest101['dpts']);
    $this->_interest101['regions'] = explode('-', $data_interest101['regions']);
    $this->_interest101['experiences'] = explode('-', $data_interest101['xps']);
  }

  public function get_interests($select)
  {
    switch ($select) {
      case 'themes' :
        return $this->interest101['themes'];
        break;
      case 'places' :
        return $this->interest101['places'];
        break;
      case 'cities' :
        return $this->interest101['cities'];
        break;
      case 'departments' :
        return $this->interest101['departments'];
        break;
      case 'regions' :
        return $this->interest101['regions'];
        break;
      case 'experiences' :
        return $this->interest101['experiences'];
        break;
      default :
        trigger_error(
          'invalid parameter, expecting \'themes\'' .
          'OR \'places\'' .
          'OR \'cities\'' .
          'OR \'departments\'' .
          'OR \'regions\'' .
          'OR \'experiences\'',
          E_USER_ERROR
        );
        break;
    }
  }
}
?>
