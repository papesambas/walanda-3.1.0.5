<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220713165656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(128) NOT NULL, description VARCHAR(255) NOT NULL, couleur VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_niveaux (categories_id INT NOT NULL, niveaux_id INT NOT NULL, INDEX IDX_7EFDA000A21214B7 (categories_id), INDEX IDX_7EFDA000AAC4B70E (niveaux_id), PRIMARY KEY(categories_id, niveaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, designation VARCHAR(100) NOT NULL, capacite INT NOT NULL, effectif INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_2ED7EC5B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, publication_id INT NOT NULL, users_id INT NOT NULL, contenu VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5F9E962A38B217A7 (publication_id), INDEX IDX_5F9E962A67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycles (id INT AUTO_INCREMENT NOT NULL, enseignement_id INT NOT NULL, designation VARCHAR(150) NOT NULL, INDEX IDX_72B88B24ABEC3B20 (enseignement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignements (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, type VARCHAR(100) NOT NULL, INDEX IDX_89D79280FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissements (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, slug VARCHAR(128) NOT NULL, forme VARCHAR(100) NOT NULL, adresse VARCHAR(255) NOT NULL, num_decision_creation VARCHAR(60) NOT NULL, num_decision_ouverture VARCHAR(60) NOT NULL, date_ouverture DATE DEFAULT NULL, num_social VARCHAR(60) DEFAULT NULL, num_fiscal VARCHAR(60) DEFAULT NULL, cpte_bancaire VARCHAR(100) DEFAULT NULL, telephone VARCHAR(30) NOT NULL, telephone_mobile VARCHAR(30) DEFAULT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medias (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, alt_text VARCHAR(255) DEFAULT NULL, file_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus (id INT AUTO_INCREMENT NOT NULL, publication_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, page_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, menu_order INT DEFAULT NULL, is_visible TINYINT(1) NOT NULL, link VARCHAR(255) DEFAULT NULL, INDEX IDX_727508CF38B217A7 (publication_id), INDEX IDX_727508CFBCF5E72D (categorie_id), INDEX IDX_727508CFC4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menus_menus (menus_source INT NOT NULL, menus_target INT NOT NULL, INDEX IDX_2317EF6380BBF257 (menus_source), INDEX IDX_2317EF63995EA2D8 (menus_target), PRIMARY KEY(menus_source, menus_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveaux (id INT AUTO_INCREMENT NOT NULL, cycle_id INT NOT NULL, designation VARCHAR(150) NOT NULL, slug VARCHAR(128) DEFAULT NULL, INDEX IDX_56F771A05EC1162 (cycle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, value VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(128) NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publications (id INT AUTO_INCREMENT NOT NULL, featured_image_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, slug VARCHAR(128) NOT NULL, contenu LONGTEXT NOT NULL, featured_text VARCHAR(100) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_active TINYINT(1) NOT NULL, is_published TINYINT(1) NOT NULL, is_favoris TINYINT(1) NOT NULL, INDEX IDX_32783AF43569D950 (featured_image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publications_categories (publications_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_93E085C2AFFB3979 (publications_id), INDEX IDX_93E085C2A21214B7 (categories_id), PRIMARY KEY(publications_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(150) NOT NULL, telephone VARCHAR(30) DEFAULT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), INDEX IDX_1483A5E9FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories_niveaux ADD CONSTRAINT FK_7EFDA000A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_niveaux ADD CONSTRAINT FK_7EFDA000AAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A38B217A7 FOREIGN KEY (publication_id) REFERENCES publications (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE cycles ADD CONSTRAINT FK_72B88B24ABEC3B20 FOREIGN KEY (enseignement_id) REFERENCES enseignements (id)');
        $this->addSql('ALTER TABLE enseignements ADD CONSTRAINT FK_89D79280FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id)');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CF38B217A7 FOREIGN KEY (publication_id) REFERENCES publications (id)');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CFBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE menus ADD CONSTRAINT FK_727508CFC4663E4 FOREIGN KEY (page_id) REFERENCES pages (id)');
        $this->addSql('ALTER TABLE menus_menus ADD CONSTRAINT FK_2317EF6380BBF257 FOREIGN KEY (menus_source) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menus_menus ADD CONSTRAINT FK_2317EF63995EA2D8 FOREIGN KEY (menus_target) REFERENCES menus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A05EC1162 FOREIGN KEY (cycle_id) REFERENCES cycles (id)');
        $this->addSql('ALTER TABLE publications ADD CONSTRAINT FK_32783AF43569D950 FOREIGN KEY (featured_image_id) REFERENCES medias (id)');
        $this->addSql('ALTER TABLE publications_categories ADD CONSTRAINT FK_93E085C2AFFB3979 FOREIGN KEY (publications_id) REFERENCES publications (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publications_categories ADD CONSTRAINT FK_93E085C2A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories_niveaux DROP FOREIGN KEY FK_7EFDA000A21214B7');
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CFBCF5E72D');
        $this->addSql('ALTER TABLE publications_categories DROP FOREIGN KEY FK_93E085C2A21214B7');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A05EC1162');
        $this->addSql('ALTER TABLE cycles DROP FOREIGN KEY FK_72B88B24ABEC3B20');
        $this->addSql('ALTER TABLE enseignements DROP FOREIGN KEY FK_89D79280FF631228');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9FF631228');
        $this->addSql('ALTER TABLE publications DROP FOREIGN KEY FK_32783AF43569D950');
        $this->addSql('ALTER TABLE menus_menus DROP FOREIGN KEY FK_2317EF6380BBF257');
        $this->addSql('ALTER TABLE menus_menus DROP FOREIGN KEY FK_2317EF63995EA2D8');
        $this->addSql('ALTER TABLE categories_niveaux DROP FOREIGN KEY FK_7EFDA000AAC4B70E');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5B3E9C81');
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CFC4663E4');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A38B217A7');
        $this->addSql('ALTER TABLE menus DROP FOREIGN KEY FK_727508CF38B217A7');
        $this->addSql('ALTER TABLE publications_categories DROP FOREIGN KEY FK_93E085C2AFFB3979');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A67B3B43D');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_niveaux');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE cycles');
        $this->addSql('DROP TABLE enseignements');
        $this->addSql('DROP TABLE etablissements');
        $this->addSql('DROP TABLE medias');
        $this->addSql('DROP TABLE menus');
        $this->addSql('DROP TABLE menus_menus');
        $this->addSql('DROP TABLE niveaux');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE publications');
        $this->addSql('DROP TABLE publications_categories');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
