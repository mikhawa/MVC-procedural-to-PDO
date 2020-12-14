<?php

/**
 * PDO connect function
 * @param PDO $connect
 * @param string $login
 * @param string $pwd
 * @return false|mixed
 */
function connectUser(PDO $connect, string $login, string $pwd)
{

    // traitement des données
    $login = htmlspecialchars(strip_tags(trim($login)), ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($pwd)), ENT_QUOTES);

    // request
    $sql = "SELECT u.idusers, u.users_name, p.idpermissions, p.permissions_name
	FROM users u
    INNER JOIN permissions p 
		ON p.idpermissions = u.permissions_idpermissions
    WHERE u.users_name= :login AND u.users_pwd= :pwd ;";

    $prepare = $connect->prepare($sql);
    $prepare->bindValue(":login", $login, PDO::PARAM_STR);
    $prepare->bindValue(":pwd", $pwd, PDO::PARAM_STR);
    try {
        $prepare->execute();
        if ($prepare->rowCount()) {
            return $prepare->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}

// disconnect user
function disconnectModel()
{
    // Destroy session's variables
    $_SESSION = array();

    // Destroy the cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy real session
    session_destroy();
}

// find all user (Rédacteur and administateur)
function AllUser($c)
{
    $sql = "SELECT idusers, users_name FROM users ORDER BY users_name ASC;";
    $request = mysqli_query($c, $sql);
    return mysqli_fetch_all($request, MYSQLI_ASSOC);
}