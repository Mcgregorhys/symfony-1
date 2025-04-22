<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422123026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE followers (user_source INT NOT NULL, user_target INT NOT NULL, INDEX IDX_8408FDA73AD8644E (user_source), INDEX IDX_8408FDA7233D34C1 (user_target), PRIMARY KEY(user_source, user_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE likes (user_id INT NOT NULL, post_id INT NOT NULL, INDEX IDX_49CA4E7DA76ED395 (user_id), INDEX IDX_49CA4E7D4B89032C (post_id), PRIMARY KEY(user_id, post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE dislikes (user_id INT NOT NULL, post_id INT NOT NULL, INDEX IDX_2DF3BE11A76ED395 (user_id), INDEX IDX_2DF3BE114B89032C (post_id), PRIMARY KEY(user_id, post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE followers ADD CONSTRAINT FK_8408FDA73AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE followers ADD CONSTRAINT FK_8408FDA7233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7D4B89032C FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dislikes ADD CONSTRAINT FK_2DF3BE11A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dislikes ADD CONSTRAINT FK_2DF3BE114B89032C FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE followers DROP FOREIGN KEY FK_8408FDA73AD8644E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE followers DROP FOREIGN KEY FK_8408FDA7233D34C1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7D4B89032C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dislikes DROP FOREIGN KEY FK_2DF3BE11A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dislikes DROP FOREIGN KEY FK_2DF3BE114B89032C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE followers
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE likes
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dislikes
        SQL);
    }
}
