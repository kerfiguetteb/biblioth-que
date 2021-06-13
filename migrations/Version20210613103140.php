<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210613103140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunteur ADD emprunt_id INT NOT NULL');
        $this->addSql('ALTER TABLE emprunteur ADD CONSTRAINT FK_952067DEAE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id)');
        $this->addSql('CREATE INDEX IDX_952067DEAE7FEF94 ON emprunteur (emprunt_id)');
        $this->addSql('ALTER TABLE livre ADD emprunt_id INT NOT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id)');
        $this->addSql('CREATE INDEX IDX_AC634F99AE7FEF94 ON livre (emprunt_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunteur DROP FOREIGN KEY FK_952067DEAE7FEF94');
        $this->addSql('DROP INDEX IDX_952067DEAE7FEF94 ON emprunteur');
        $this->addSql('ALTER TABLE emprunteur DROP emprunt_id');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99AE7FEF94');
        $this->addSql('DROP INDEX IDX_AC634F99AE7FEF94 ON livre');
        $this->addSql('ALTER TABLE livre DROP emprunt_id');
    }
}
