<?php

/**
 * Миграция создает коллекцию 'user' и индекс для поля 'uuid'.
 */
class m170317_160046_add_user_collection extends \yii\mongodb\Migration
{
    /** Название коллекции */
    const COLLECTION_NAME = 'user';

    /** @inheritdoc */
    public function up()
    {
        $this->createCollection(self::COLLECTION_NAME);
        $this->createIndex(self::COLLECTION_NAME, 'uuid', ['unique' => true]);
    }

    /** @inheritdoc */
    public function down()
    {
        $this->dropCollection(self::COLLECTION_NAME);
    }
}
