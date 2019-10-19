<?php


use yii\db\Migration;

class m160222_061746_init extends Migration
{
    public function safeUp()
    {
        $options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'access_token' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'role' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $options);

        $this->createTable('{{%file_storage}}', [
            'id' => $this->primaryKey(),
            'base_url' => $this->string(1024)->notNull(),
            'path' => $this->string(1024)->notNull(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer()->notNull()
        ], $options);

        $this->createTable('{{%settings}}', [
            'key' => $this->string(128)->notNull(),
            'value' => $this->text()->notNull(),
            'comment' => $this->text(),
            'editable' => $this->boolean()->defaultValue(true),
            'updated_at' => $this->integer(),
            'created_at' => $this->integer()
        ], $options);
        $this->addPrimaryKey('pk_key_settings', '{{%settings}}', 'key');
        $this->createIndex('idx_key_settings', '{{%settings}}', 'key', true);
        $time = time();
        $this->batchInsert('{{%settings}}', ['key', 'value', 'comment', 'editable', 'created_at', 'updated_at'], [
            ['siteName', 'Yii', 'Название сайта', false, $time, $time],
            ['adminEmail', 'admin@example.com', 'Email администратора сайта', false, $time, $time],
        ]);

        $this->createTable('{{%log}}', [
            'id' => $this->bigPrimaryKey(),
            'level' => $this->integer(),
            'category' => $this->string(),
            'log_time' => $this->double(),
            'prefix' => $this->text(),
            'message' => $this->text(),
            'read' => $this->boolean()->defaultValue(false),
        ], $options);
        $this->createIndex('idx_log_level', '{{%log}}', 'level');
        $this->createIndex('idx_log_category', '{{%log}}', 'category');
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%file_storage}}');
        $this->dropTable('{{%settings}}');
        $this->dropTable('{{%log}}');
    }
}
