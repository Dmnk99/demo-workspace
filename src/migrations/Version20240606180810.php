<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240606180810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Added project, project_type and question tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE project_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE project_type_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE project (id INT NOT NULL, type_id INT NOT NULL, title VARCHAR(255) NOT NULL, year INT NOT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2FB3D0EEC54C8C93 ON project (type_id)');
        $this->addSql('CREATE TABLE project_type (id INT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE question (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, value TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEC54C8C93 FOREIGN KEY (type_id) REFERENCES project_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE project_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE project_type_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_id_seq CASCADE');
        $this->addSql('ALTER TABLE project DROP CONSTRAINT FK_2FB3D0EEC54C8C93');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_type');
        $this->addSql('DROP TABLE question');
    }
}
