<?php
    include('../config/connection.php');
    function redirect_to(string $location){
        header('Location: '.$location);
    }
    function login(int $id): bool
    {   
        $user = ['status'=>true,'id'=>$id];
        log_user_in($user);
        remember_me($_SESSION['id']);
        return false;
    }
    function log_user_in(array $user): bool
    {
        // prevent session fixation attack
        if (session_regenerate_id()) {
            // set username & id in the session
            $_SESSION['isLogged'] = $user['status'];
            $_SESSION['user_id'] = $user['id'];
            redirect_to('userpage.php');
            return true;
        }

        return false;
    }
    function logout(): void
    {
        if (is_user_logged_in()) {
            // delete the user token
            delete_user_token($_SESSION['user_id']);

            // delete session
            unset($_SESSION['isLogged'], $_SESSION['id']);

            // remove the remember_me cookie
            if (isset($_COOKIE['remember_me'])) {
                unset($_COOKIE['remember_me']);
                setcookie('remember_user', null, -1);
            }

            // remove all session data
            session_destroy();
            // redirect to the index page
            redirect_to('../index.php');
        }
    }
    function is_user_logged_in(): bool
    {
        // check the session
        if ($_SESSION['isLogged']= true) {
            return true;
        }

        // check the remember_me in cookie
        $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_SANITIZE_STRING);

        if ($token && token_is_valid($token)) {
            $user = find_user_by_token($token);
            if ($user) {
                return log_user_in($user);
            }
        }
        return false;
    }
    function remember_me(int $user_id, int $day = 15)
    {
        [$selector, $validator, $token] = generate_tokens();

        // remove all existing token associated with the user id
        delete_user_token($user_id);

        // set expiration date
        $expired_seconds = time() + 60 * 60 * 24 * $day;

        // insert a token to the database
        $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s', $expired_seconds);

        if (insert_user_token($user_id, $selector, $hash_validator, $expiry)) {
            setcookie('remember_me', $token, $expired_seconds);
        }
    }
    //Verify token if valid
    function token_is_valid(string $token): bool 
    { // parse the token to get the selector and validator 
        [$selector, $validator] = parse_token($token);

        $tokens = find_user_token_by_selector($selector);
        if (!$tokens) {
            return false;
        }
        
        return password_verify($validator, $tokens['hashed_validator']);
    }
    //Generate tokens
    function generate_tokens(): array
    {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));

        return [$selector, $validator, $selector . ':' . $validator];
    }

    //Separate selector and validator
    function parse_token(string $token): ?array
    {
        $parts = explode(':', $token);

        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }
    //Create new row in database
    function insert_user_token(int $user_id, string $selector, string $hashed_validator, string $expiry): bool
    {
        global $db;
        $sql = 'INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
                VALUES(:user_id, :selector, :hashed_validator, :expiry)';

        $statement = $db()->prepare($sql);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':selector', $selector);
        $statement->bindValue(':hashed_validator', $hashed_validator);
        $statement->bindValue(':expiry', $expiry);

        return $statement->execute();
        
    }

    //Find user token inside database
    function find_user_token_by_selector(string $selector)
    {
        global $db;
        $sql = 'SELECT id, selector, hashed_validator, user_id, expiry
                    FROM user_tokens
                    WHERE selector = :selector AND
                        expiry >= now()
                    LIMIT 1';

        $statement = $db()->prepare($sql);
        $statement->bindValue(':selector', $selector);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    //Delete user token by id
    function delete_user_token(int $user_id): bool
    {
        global $db;
        $id = $user_id;
        $sql = "DELETE FROM user_tokens WHERE user_id = $id";
        mysqli_query($db,$sql);
        return true;
    }
    function find_user_by_token(string $token)
    {
        global $db;
        $tokens = parse_token($token);

        if (!$tokens) {
            return null;
        }

        $sql = 'SELECT users.id, username
                FROM users
                INNER JOIN user_tokens ON user_id = users.id
                WHERE selector = :selector AND
                    expiry > now()
                LIMIT 1';

        $statement = $db()->prepare($sql);
        $statement->bindValue(':selector', $tokens[0]);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }


?>
















<?php
    // function login(){
    //     $_SESSION['logged']
    // }
    // function remember_me(){

    // }
    //  //Generate tokens
    // function generate_tokens(): array
    // {
    // $selector = bin2hex(random_bytes(16));
    // $validator = bin2hex(random_bytes(32));

    // return [$selector, $validator, $selector . ':' . $validator];
    // }
    // function insert_tokens(int $id,array $tokens){

    // }
    // function create_cookie(){}
    // function is_user_logged_in(){}
    // function logout(){}
?>