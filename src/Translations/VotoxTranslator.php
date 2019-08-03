<?php

namespace App\Translations;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use PDO;

final class VotoxTranslator implements IVotoxTranslator {

    use TranslatorTrait;

    /** @var Connection */
    private $connection = null;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }

    /**
     * @param string $text
     * @param string $language
     * @return string
     * @throws DBALException
     */
    public function translate(string $text, string $language): string {
        $preparationStatement = $this->connection->prepare("SELECT `search`, `replace` FROM `{$language}_preparation`");
        $preparationStatement->execute();
        $preparationTable = $preparationStatement->fetchAll(PDO::FETCH_KEY_PAIR);

        $preparedText = $this->replace($preparationTable, $this->sanitize($text));

        $translationStatement = $this->connection->prepare("SELECT `source`, `votox` FROM `{$language}_to_votox`");
        $translationStatement->execute();
        $translationTable = $translationStatement->fetchAll(PDO::FETCH_KEY_PAIR);

        return $this->replace($translationTable, $preparedText);
    }
}