<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230418084026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video_trick ADD trick_id INT DEFAULT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE video_trick ADD CONSTRAINT FK_5792A0BCB281BE2E FOREIGN KEY (trick_id) REFERENCES tricks (id)');
        $this->addSql('ALTER TABLE video_trick ADD CONSTRAINT FK_5792A0BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5792A0BCB281BE2E ON video_trick (trick_id)');
        $this->addSql('CREATE INDEX IDX_5792A0BCA76ED395 ON video_trick (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE video_trick DROP FOREIGN KEY FK_5792A0BCB281BE2E');
        $this->addSql('ALTER TABLE video_trick DROP FOREIGN KEY FK_5792A0BCA76ED395');
        $this->addSql('DROP INDEX IDX_5792A0BCB281BE2E ON video_trick');
        $this->addSql('DROP INDEX IDX_5792A0BCA76ED395 ON video_trick');
        $this->addSql('ALTER TABLE video_trick DROP trick_id, DROP user_id');
    }
}
