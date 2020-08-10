<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810152407 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE migration_versions');
        $this->addSql('DROP TABLE testtable');
        $this->addSql('DROP INDEX emp_name ON employees');
        $this->addSql('DROP INDEX emp_up_name ON employees');
        $this->addSql('ALTER TABLE employees DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE employees DROP subsidiary_id, DROP last_name_up, CHANGE employee_id employee_id INT AUTO_INCREMENT NOT NULL, CHANGE date_of_birth date_of_birth DATE NOT NULL, CHANGE junk junk VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE employees ADD PRIMARY KEY (employee_id)');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY sales_emp_fk');
        $this->addSql('DROP INDEX sales_dt_pr ON sales');
        $this->addSql('DROP INDEX sales_subid_empid_dt ON sales');
        $this->addSql('DROP INDEX IDX_6B8170448C03F15CD4A7BDA2 ON sales');
        $this->addSql('ALTER TABLE sales DROP employee_id, DROP subsidiary_id, CHANGE sale_id sale_id INT AUTO_INCREMENT NOT NULL, CHANGE product_id product_id INT NOT NULL, CHANGE quantity quantity INT NOT NULL, CHANGE junk junk VARCHAR(200) NOT NULL');
        $this->addSql('DROP INDEX sales_inno_dt ON sales_inno');
        $this->addSql('ALTER TABLE sales_inno DROP employee_id, DROP subsidiary_id, CHANGE sale_id sale_id INT AUTO_INCREMENT NOT NULL, CHANGE junk junk VARCHAR(200) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE migration_versions (version VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, executed_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(version)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE testtable (group_id INT NOT NULL, order_id INT NOT NULL, value INT NOT NULL, UNIQUE INDEX order_id (order_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE employees MODIFY employee_id INT NOT NULL');
        $this->addSql('ALTER TABLE employees DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE employees ADD subsidiary_id NUMERIC(10, 0) NOT NULL, ADD last_name_up VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE employee_id employee_id NUMERIC(10, 0) NOT NULL, CHANGE date_of_birth date_of_birth DATE DEFAULT NULL, CHANGE junk junk CHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('CREATE INDEX emp_name ON employees (last_name)');
        $this->addSql('CREATE INDEX emp_up_name ON employees (last_name_up)');
        $this->addSql('ALTER TABLE employees ADD PRIMARY KEY (subsidiary_id, employee_id)');
        $this->addSql('ALTER TABLE sales ADD employee_id NUMERIC(10, 0) NOT NULL, ADD subsidiary_id NUMERIC(10, 0) NOT NULL, CHANGE sale_id sale_id NUMERIC(10, 0) NOT NULL, CHANGE product_id product_id NUMERIC(10, 0) NOT NULL, CHANGE quantity quantity NUMERIC(10, 0) NOT NULL, CHANGE junk junk CHAR(200) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT sales_emp_fk FOREIGN KEY (employee_id, subsidiary_id) REFERENCES employees (employee_id, subsidiary_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX sales_dt_pr ON sales (sale_date, product_id)');
        $this->addSql('CREATE INDEX sales_subid_empid_dt ON sales (subsidiary_id, employee_id, sale_date)');
        $this->addSql('CREATE INDEX IDX_6B8170448C03F15CD4A7BDA2 ON sales (employee_id, subsidiary_id)');
        $this->addSql('ALTER TABLE sales_inno ADD employee_id NUMERIC(10, 0) NOT NULL, ADD subsidiary_id NUMERIC(10, 0) NOT NULL, CHANGE sale_id sale_id NUMERIC(10, 0) NOT NULL, CHANGE junk junk CHAR(200) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('CREATE INDEX sales_inno_dt ON sales_inno (sale_date)');
    }
}
