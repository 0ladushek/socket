<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $users = [
            [
                'username' => 'user1',
                'auth_key' => 'gGUkattUDtJeMGjxtzFWOKtEYz_4bvrP',
                'password_hash' => '$2y$13$mHcU9ctcVCn1tNjg6AmiUeMk0kY9KX3EOfXY6fRq/mv6dBmIvGObW',
                'email' => 'user@mail.com',
                'status' => 10,
                'created_at' => 1520608772,
                'updated_at' => 1520608772,
            ],
            [
                'username' => 'user2',
                'auth_key' => 'TbuS-U1p6FYLB6Hl0e0B_ZjWnyYujhpg',
                'password_hash' => '$2y$13$YJG7u.Hk1O6omdqrdZG5yOaPXt0vnpdHvfcdwjQS3ntRdKxFnoXk2',
                'email' => 'user2@mail.com',
                'status' => 10,
                'created_at' => 1520608772,
                'updated_at' => 1520608772,
            ],
            [
                'username' => 'user3',
                'auth_key' => 'rQOHJDitzFk9uS24-9tFlqKQHeVToMpI',
                'password_hash' => '$2y$13$KF5vIHUAWc3zwMqj5heEWea8hfy0YNVB29i8Gtp9Xxid9rmDKGZPq',
                'email' => 'user3@mail.com',
                'status' => 10,
                'created_at' => 1520608772,
                'updated_at' => 1520608772,
            ],
        ];

        foreach ($users as $user) {
            $this->insert('user', $user);
        }
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
