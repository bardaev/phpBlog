<?php

namespace MyProject\Models;

use MyProject\Models\ActiveRecordEntity;

class Articles extends ActiveRecordEntity {

    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @param int $authorId
     */
    public function setAuthorId(User $authorId): void {
        $this->authorId = $authorId->getId();
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setText(string $text): void {
        $this->text = $text;
    }

    protected static function getTableName(): string {
        return 'articles';
    }

    public function getAuthor(): User {
        return User::getById($this->authorId);
    }
}