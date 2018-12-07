<?php
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

class SocisInit
{
    private $wordpressDatabase;

    public function __construct($wpdb)
    {
        $this->wordpressDatabase = $wpdb;
    }

    public function createDatabaseTables()
    {
        $this->createMemberTable();
        $this->createFeeTable();
        $this->createMembershipFeesTable();
        $this->createOrderTable();
    }

    private function createMemberTable()
    {
        $tableName = $this->wordpressDatabase->prefix . 'mc_member';
        $charset_collate = $this->wordpressDatabase->get_charset_collate();

        $sql = "CREATE TABLE $tableName (
		id int(11) NOT NULL AUTO_INCREMENT,
		name varchar(255),
		surnames varchar(255),
		document_number varchar(20),
		email varchar(255),
		telephone varchar (20),
		address varchar(255),
		postal_code varchar(10),
		city varchar (255),
		province varchar(255),
		registration_date datetime,
		PRIMARY KEY (id)
	) $charset_collate;";

        dbDelta($sql);
    }

    private function createFeeTable()
    {
        $tableName = $this->wordpressDatabase->prefix . 'mc_fee';
        $charset_collate = $this->wordpressDatabase->get_charset_collate();

        $sql = "CREATE TABLE $tableName (
            id int(11) NOT NULL AUTO_INCREMENT,
            name varchar(255),
            year varchar(4),
            renewal_start_date datetime,
            registration_date datetime,
            PRIMARY KEY (id)
        ) $charset_collate;";

        dbDelta($sql);
    }

    private function createMembershipFeesTable()
    {
        $tableName = $this->wordpressDatabase->prefix . 'mc_membership_fees';
        $charset_collate = $this->wordpressDatabase->get_charset_collate();

        $sql = "CREATE TABLE $tableName (
            id int(11) NOT NULL AUTO_INCREMENT,
            member_id int(11),
            fee_id int(11),
            active tinyint(1),
            registration_date datetime,
            status varchar(50),
            PRIMARY KEY (id)
        ) $charset_collate;";

        dbDelta($sql);
    }

    private function createOrderTable()
    {
        $tableName = $this->wordpressDatabase->prefix . 'mc_order';
        $charset_collate = $this->wordpressDatabase->get_charset_collate();

        $sql = "CREATE TABLE $tableName (
            id int(11) NOT NULL AUTO_INCREMENT,
            member_id int(11),
            fee_id int(11),
            number_order varchar(20),
            name varchar(50),
            status varchar(20),
            creation_date datetime,
            payment_date datetime,
            security_key varchar(255),
            PRIMARY KEY (id)
        ) $charset_collate;";

        dbDelta($sql);
    }
}
