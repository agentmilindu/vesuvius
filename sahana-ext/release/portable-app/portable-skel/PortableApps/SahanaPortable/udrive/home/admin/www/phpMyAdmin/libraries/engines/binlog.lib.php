<?php
/* $Id: binlog.lib.php,v 1.1 2008-06-05 12:30:13 chamindra Exp $ */
// vim: expandtab sw=4 ts=4 sts=4:

class PMA_StorageEngine_binlog extends PMA_StorageEngine
{
    /**
     * returns string with filename for the MySQL helppage
     * about this storage engne
     *
     * @return  string  mysql helppage filename
     */
    function getMysqlHelpPage()
    {
        return 'binary-log';
    }
}

?>
