<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m230112_190750_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()

    {

        $this->createTable('{{%article}}', [

            'id' => $this->primaryKey(),

            'title' => $this->string(),

            'description' => $this->text(),

            'date' => $this->date(),

            'image' => $this->string(),

            'tag' => $this->string(),

            'viewed' => $this->integer(),

            'topic_id' => $this->integer(),

            'user_id' => $this->integer(),

        ]);

// create index for column `topic_id`

        $this->createIndex(

            'idx-topic_id',

            'article',

            'topic_id'

        );

// add foreign key for table `topic`

        $this->addForeignKey(

            'fk-topic_id',

            'article',

            'topic_id',

            'topic',

            'id',

            'CASCADE'

        );

// create index for column `user_id`

        $this->createIndex(

            'idx-post-user_id',

            'article',

            'user_id'

        );

// add foreign key for table `user`

        $this->addForeignKey(

            'fk-post-user_id',

            'article',

            'user_id',

            'user',

            'id',

            'CASCADE'

        );

    }

    /**
     * {@inheritdoc}
     */

    public function safeDown()

    {

        $this->dropTable('{{%article}}');

    }

}