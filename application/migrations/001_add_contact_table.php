<?php
class Migration_Add_Contact_Table extends CI_Migration
{
	// load dependencies
	public function __construct()
	{
		$this->load->database();
		$this->load->dbforge();
	}

    public function up()
    {
        // create the meeting_attendance table if it does not exist
        if (!$this->db->table_exists('contact'))
        {
            $this->dbforge->add_field('id');

            $fields = array(
				'changed ' => array(
                    'type' => 'INT',
                    'constraint' => 11
                ),
                'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 256
                ),
                'list_order' => array(
                    'type' => 'INT',
                    'constraint' => 11
                )
            );
            $this->dbforge->add_field($fields);
			$this->dbforge->create_table('contact');
        }
    }

    // tear this down
    public function down()
    {
        if ($this->db->table_exists('contact'))
		{
			$this->dbforge->drop_table('contact');
		}
    }
}
