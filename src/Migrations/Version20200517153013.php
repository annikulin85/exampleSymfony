<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200517153013 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'my first migration in Symfony 5';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sales');
        $this->addSql('DROP TABLE sales_inno');
        $this->addSql('DROP TABLE testtable');
        $this->addSql('DROP INDEX emp_name ON employees');
        $this->addSql('DROP INDEX emp_up_name ON employees');
        $this->addSql('ALTER TABLE employees DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE employees DROP subsidiary_id, CHANGE employee_id employee_id INT AUTO_INCREMENT NOT NULL, CHANGE date_of_birth date_of_birth DATE NOT NULL, CHANGE junk junk VARCHAR(255) NOT NULL, CHANGE last_name_up last_name_up VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE employees ADD PRIMARY KEY (employee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sales (sale_id NUMERIC(10, 0) NOT NULL, employee_id NUMERIC(10, 0) NOT NULL, subsidiary_id NUMERIC(10, 0) NOT NULL, sale_date DATE NOT NULL, eur_value NUMERIC(17, 2) NOT NULL, product_id NUMERIC(10, 0) NOT NULL, quantity NUMERIC(10, 0) NOT NULL, junk CHAR(200) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX sales_dt_pr (sale_date, product_id), INDEX sales_subid_empid_dt (subsidiary_id, employee_id, sale_date), INDEX IDX_6B8170448C03F15CD4A7BDA2 (employee_id, subsidiary_id), PRIMARY KEY(sale_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sales_inno (sale_id NUMERIC(10, 0) NOT NULL, employee_id NUMERIC(10, 0) NOT NULL, subsidiary_id NUMERIC(10, 0) NOT NULL, sale_date DATE NOT NULL, eur_value NUMERIC(17, 2) NOT NULL, junk CHAR(200) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX sales_inno_dt (sale_date), PRIMARY KEY(sale_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE testtable (group_id INT NOT NULL, order_id INT NOT NULL, value INT NOT NULL, UNIQUE INDEX order_id (order_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT sales_emp_fk FOREIGN KEY (employee_id, subsidiary_id) REFERENCES employees (employee_id, subsidiary_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE employees MODIFY employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE employees DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE employees ADD subsidiary_id NUMERIC(10, 0) NOT NULL, CHANGE employee_id employee_id NUMERIC(10, 0) NOT NULL, CHANGE date_of_birth date_of_birth DATE DEFAULT NULL, CHANGE junk junk CHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE last_name_up last_name_up VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('CREATE INDEX emp_name ON employees (last_name)');
        $this->addSql('CREATE INDEX emp_up_name ON employees (last_name_up)');
        $this->addSql('ALTER TABLE employees ADD PRIMARY KEY (subsidiary_id, employee_id)');
    }
}
