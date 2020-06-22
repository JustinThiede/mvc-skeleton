<?php declare(strict_types=1);
/**
 *
 *
 *
 * PHP version 7.4
 *
 *
 * @author Original Author <justin.thiede@visions.ch>
 * @copyright visions.ch
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/
 */

class Model
{
    protected PdoQuick       $db;
    protected SessionManager $sessionManager;

    public function __construct()
    {
        $this->db             = new PdoQuick(CONF_DB_HOST, CONF_DB_DB, CONF_DB_USER, CONF_DB_PW, CONF_DB_CHARSET);
        $this->sessionManager = new SessionManager();
    }
}
